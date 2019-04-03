<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        ->select("programs.*","projects.id as project_id","applicants.type","applicants.first_name","applicants.last_name","applicants.second_last_name","status_projects.name as status_name","projects.status_date");
      
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
}
