<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
{
    public function indexSinReglasOperacion(){
      $programs = DB::table("programs")->where("operation_rules","=",0)->get();
      $solicitantes = DB::table("applicants")->get();
      $projects = DB::table("projects")->join("programs","projects.program_id","=","programs.id")->select("projects.*")->where("programs.operation_rules","=",0)->get();
      return view("reports.create")->with("programs",$programs)
                            ->with("solicitantes",$solicitantes)
                            ->with("projects",$projects);
    }
  
    public function indexConReglasOperacion(){
      $programs = DB::table("programs")->get();
      $solicitantes = DB::table("applicants")->get();
      $projects = DB::table("projects")->get();
      return view("reports.createSin")->with("programs",$programs)
                            ->with("solicitantes",$solicitantes)
                            ->with("projects",$projects);
    }
  
    public function ObtenerDatosSin(Request $request){
      $query = DB::table("programs")->join("projects","projects.program_id","=","programs.id")
        ->join("applicants","applicants.id","=","projects.applicant_id")
        ->join("visit_histories","visit_histories.project_id","=","project.id")
        ->join("status_projects","status_projects.id","=","visit_histories.status_project_id")
        ->select("programs.name as name_program",
                "applicants.first_name as applicants_name",
                "applicants.last_name as applicants_last_name",
                "applicants.second_last_name as applicants_second_last_name",
                "projects.id as folio",
                "status_projects.name as status",
                "visit_histories.date as last_modificacion");
      
        if (!is_null($request->program_id)) { 
            $query->where('programs.id', '=', $request->program_id);
        }

        if (!is_null($request->solicitante_id)) { 
            $query->where('applicants.id', '=', $request->solicitante_id);
        }

        if (!is_null($request->project_id)) {
            $query->where('projects.id', '=', $request->project_id);
        }
/*
        if (!is_null($request->status_id) && $request->status_id !="-1") {  
            $query->where('status_projects.id', '=', $request->status_id);
        }
      */
       if (!is_null($request->start) && !is_null($request->end)) { 
          if ($request->start == $request->end) {
            $query->whereDate('visit_histories.date', getMySQLDate($request->end));
          }else{
            $query->whereBetween('visit_histories.date', [getMySQLDate($request->start), getMySQLDate($request->end)]);
          }
        }

        $result = $query->orderBy("visit_histories.date")->get();
        return response()->json(['response'=>$result]);
    }
  
    public function ObtenerDatosCon(Request $request){
      $query = DB::table("programs")->join("projects","projects.program_id","=","programs.id")
        ->join("applicants","applicants.id","=","projects.applicant_id")
        ->join("status_projects","projects.status_project","=","status_projects.id")
        ->select("programs.*","projects.requested_concept","projects.id as project_id","applicants.type","applicants.first_name","applicants.last_name","applicants.second_last_name","status_projects.name as status_name","projects.status_date");
      
        if (!is_null($request->program_id)) { 
            $query->where('programs.id', '=', $request->program_id);
        }
        if (!is_null($request->project_id)) { 
            $query->where('projects.id', '=', $request->project_id);
        }
        if (!is_null($request->solicitante_id)) { 
            $query->where('applicants.id', '=', $request->solicitante_id);
        }
        
        if (!is_null($request->status_id)) { 
            $query->where('status_projects.id', '=', $request->status_id);
        }
        
       if (!is_null($request->start) && !is_null($request->end)) { 
          if ($request->start == $request->end) {
            $query->where('projects.status_date',"=", $request->end);
          }else{
            $query->where('projects.status_date',">=",$request->start)->where("projects.status_date","<=",$request->end);
          }
        }
      
      if(!is_null($request->start) && is_null($request->end)) { 
        $query->where('projects.status_date',">=",$request->start);
      }
      
      if(is_null($request->start) && !is_null($request->end)) { 
        $query->where('projects.status_date',"<=",$request->end);
      }
        $result = $query->orderBy("programs.id")->get();
        return response()->json(['response'=>$result]);
    }
  
    public function generarProject($id){
      $fecha_actual=date("d-m-Y");
      $operation_rules = DB::table("projects")->join("programs","programs.id","=","projects.program_id")
        ->select("programs.operation_rules")->where("projects.id","=",$id)->first();
      
      $conceptos= null;
      $componente = null;
      $subcomponente = null;
      
      if($operation_rules->operation_rules == 0){
          $project = DB::table("projects")
              ->join("applicants","projects.applicant_id","=","applicants.id")
              ->join("programs","programs.id","=","projects.program_id")
                          ->join("status_projects","projects.status_project","=","status_projects.id")
              ->select("projects.id as folio_interno",
                      "projects.folio as folio_externo",
                      "applicants.first_name",
                      "applicants.last_name",
                      "applicants.second_last_name",
                      "applicants.type",
                       "applicants.phone",
                      "applicants.ejido",
                      "applicants.colony",
                      "applicants.street",
                      "applicants.number",
                      "applicants.zip",
                    "status_projects.name as status",
                      "programs.name as program_name",
                      "programs.responsable_unit",
                      "programs.executing_unit",
                      "projects.requested_concept")->where("projects.id","=",$id)->first();
          $documents = DB::table("projects")->join("documents","documents.project_id","=","projects.id")
                ->select("documents.name as documento")
                ->where("projects.id","=",$id)->get();
        
          $visitas = DB::table("projects")->join("visit_histories","visit_histories.project_id","=","projects.id")
                ->join("status_projects","status_projects.id","=","visit_histories.status_project_id")
                 ->select("visit_histories.comments as comentario",
                        "visit_histories.date as fecha",
                        "status_projects.name as estatus")
                ->where("projects.id","=",$id)->get();
      }else{
          $project = DB::table("projects")
              ->join("applicants","projects.applicant_id","=","applicants.id")
              ->join("programs","programs.id","=","projects.program_id")
              ->join("status_projects","projects.status_project","=","status_projects.id")
              ->select("projects.id as folio_interno",
                      "projects.folio as folio_externo",
                      "applicants.first_name",
                      "applicants.last_name",
                      "applicants.second_last_name",
                      "applicants.type",
                       "applicants.phone",
                      "applicants.ejido",
                      "applicants.colony",
                      "applicants.street",
                      "applicants.number",
                      "applicants.zip",
                      "programs.name as program_name",
                      "programs.responsable_unit",
                      "programs.executing_unit",
                       "status_projects.name as status",
                      "projects.requested_concept")->where("projects.id","=",$id)->first();
        
          $conceptos = DB::table("projects")->join("projects_concepts","projects.id","=","projects_concepts.project_id")
            ->join("concepts","concepts.id","=","projects_concepts.concept_id")
            ->select("concepts.name as concepto","concepts.component_id as componente","concepts.sub_component_id as subcomponente")->where("projects.id","=",$id)->get();
          
          $temp_componente = null;
          $temp_subcomponente = null;
          foreach($conceptos as $concept){
            $temp_componente = $concept->componente;
            $temp_subcomponente = $concept->subcomponente;
            break;
          }
          
          if($temp_componente != null){
            $componente = DB::table("components")->where("id","=",$temp_componente)->first();
          }
          
          if($temp_subcomponente != null){
            $subcomponente = DB::table("sub_components")->where("id","=",$temp_subcomponente)->first();
            $componente = DB::table("components")->where("components.id","=",$subcomponente->component_id)->first();
          }
        
          $documents = DB::table("projects")->join("documents","documents.project_id","=","projects.id")
                ->select("documents.name as documento")
                ->where("projects.id","=",$id)->get();
        
          $visitas = DB::table("projects")->join("visit_histories","visit_histories.project_id","=","projects.id")
                ->join("status_projects","status_projects.id","=","visit_histories.status_project_id")
                ->select("visit_histories.comments as comentario",
                        "visit_histories.date as fecha",
                        "status_projects.name as estatus")
                ->where("projects.id","=",$id)->get();
      }
      
      $pdf = PDF::loadView("pdf.project",compact("fecha_actual","operation_rules","project","documents","visitas","conceptos","componente","subcomponente"));
      return $pdf->download("project.pdf");
    }
  
  
  
  public function generarVisit($idVisita){
    
      $visita = DB::table("visit_histories")->join("status_projects","status_projects.id","=","visit_histories.status_project_id")
        ->select("visit_histories.comments","visit_histories.date","status_projects.name","visit_histories.project_id")->where("visit_histories.id","=",$idVisita)->first();
      
      $id = $visita->project_id;
      $fecha_actual=date("d-m-Y");
      $operation_rules = DB::table("projects")->join("programs","programs.id","=","projects.program_id")
        ->select("programs.operation_rules")->where("projects.id","=",$id)->first();
      
      $conceptos= null;
      $componente = null;
      $subcomponente = null;
      
      if($operation_rules->operation_rules == 0){
          $project = DB::table("projects")
              ->join("applicants","projects.applicant_id","=","applicants.id")
              ->join("programs","programs.id","=","projects.program_id")
                          ->join("status_projects","projects.status_project","=","status_projects.id")
              ->select("projects.id as folio_interno",
                      "projects.folio as folio_externo",
                      "applicants.first_name",
                      "applicants.last_name",
                      "applicants.second_last_name",
                      "applicants.type",
                      "applicants.ejido",
                      "applicants.colony",
                      "applicants.phone",
                      "applicants.street",
                      "applicants.number",
                      "applicants.zip",
                      "programs.name as program_name",
                      "programs.responsable_unit",
                      "programs.executing_unit",
                                              "status_projects.name as status",
                      "projects.requested_concept")->where("projects.id","=",$id)->first();
          
      }else{
          $project = DB::table("projects")
              ->join("applicants","projects.applicant_id","=","applicants.id")
              ->join("programs","programs.id","=","projects.program_id")
                          ->join("status_projects","projects.status_project","=","status_projects.id")

              ->select("projects.id as folio_interno",
                      "projects.folio as folio_externo",
                      "applicants.first_name",
                      "applicants.last_name",
                      "applicants.second_last_name",
                      "applicants.type",
                      "applicants.ejido",
                      "applicants.phone",
                      "applicants.colony",
                      "applicants.street",
                      "applicants.number",
                      "applicants.zip",
                      "programs.name as program_name",
                      "programs.responsable_unit",
                      "programs.executing_unit",
                                              "status_projects.name as status",
                      "projects.requested_concept")->where("projects.id","=",$id)->first();
        
          $conceptos = DB::table("projects")->join("projects_concepts","projects.id","=","projects_concepts.project_id")
            ->join("concepts","concepts.id","=","projects_concepts.concept_id")
            ->select("concepts.name as concepto","concepts.component_id as componente","concepts.sub_component_id as subcomponente")->where("projects.id","=",$id)->get();
          
          $temp_componente = null;
          $temp_subcomponente = null;
          foreach($conceptos as $concept){
            $temp_componente = $concept->componente;
            $temp_subcomponente = $concept->subcomponente;
            break;
          }
          
          if($temp_componente != null){
            $componente = DB::table("components")->where("id","=",$temp_componente)->first();
          }
          
          if($temp_subcomponente != null){
            $subcomponente = DB::table("sub_components")->where("id","=",$temp_subcomponente)->first();
            $componente = DB::table("components")->where("components.id","=",$subcomponente->component_id)->first();
          }
        
          
      }
      $pdf = PDF::loadView("pdf.visit",compact("fecha_actual","operation_rules","project","conceptos","componente","subcomponente","visita"));
      return $pdf->download("visit.pdf");
    }
}




