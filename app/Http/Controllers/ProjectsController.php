<?php

namespace App\Http\Controllers;

use Alert;
use App\projects_concepts;
use App\Sub_Components;
use App\Concepts;
use App\Programs;
use App\Projects;
use App\Visit_History;
use App\Documents;
use App\Components;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProjectsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects as p')
        ->join('applicants as a','a.id','p.applicant_id')
        ->join('programs as pr','pr.id','p.program_id')
        ->select('p.*','a.first_name','a.last_name','a.second_last_name','pr.name as program_name','pr.operation_rules')
        ->get();
        $count_programs=DB::table('programs')
          ->count();
        $count_applicants=DB::table('applicants')
          ->count();
        return view('projects.list')
          ->with('projects',$projects)
          ->with('count_programs',$count_programs)
          ->with('count_applicants',$count_applicants)
          ->with('title', 'Listado de Proyectos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = "indefinido";
        $count_programs=DB::table('programs')
          ->count();
        $count_applicants=DB::table('applicants')
          ->count();
      
        $applicants=DB::table('applicants')
          ->get();
      /*$programs=DB::table('programs')
      ->where("operation_rules","=",1)
      ->orWhere("operation_rules","=",0)  
      ->get();*/
      $programs_1=DB::table('programs as p')
      ->where('operation_rules',1)
      ->pluck('p.name','p.id','p.operation_rules');
      
      $programs_0=DB::table('programs as p')
      ->where('operation_rules',0)
      ->pluck('p.name','p.id','p.operation_rules');
      
      //$programs=DB::table('programs')->where("operation_rules","=",0)->get();
        //$programs_without_operation_rules=DB::table('programs')->where("operation_rules","=",0)->get();
      //$programs_without_operation_rules=DB::table('programs')->where("operation_rules","=",0)->get();
      
      $status_projects=DB::table('status_projects')->get();
          
        return view('projects.create')->with('count_programs',$count_programs)
          ->with('count_applicants',$count_applicants)->with('applicants',$applicants)->with('status_projects',$status_projects)->with("id",$id)
          ->with('programs_0',$programs_0)->with('programs_1',$programs_1);
    }
  
    /*public function Components(Request $request, $id){
        return Components::where('program_id','=',$id)->get();
    }*/
  public function getPrograms(Request $request, $id){
        if($request->ajax()){
            $program = Programs::programs($id);
            return response()->json($program);
        }
    }
  
    public function getComponents(Request $request, $id){
        if($request->ajax()){
            $component = Components::components($id);
            return response()->json($component);
        }
    }
    
    public function getSubComponents(Request $request, $id){
      
      
      if($request->ajax()){
            $subcomponent = Sub_Components::sub_components($id);
            return response()->json($subcomponent);
          
      }
    }
    
    public function getConcepts(Request $request, $id){
        if($request->ajax()){
            $concept = Concepts::concepts($id);
            return response()->json($concept);
        }
    }
  
    public function getConcepts_com(Request $request, $id){
        if($request->ajax()){
            $concept = Concepts::concepts_com($id);
            return response()->json($concept);
        }
    }
  
    
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
  public function createProject($id){
     $count_programs=DB::table('programs')
          ->count();
        $count_applicants=DB::table('applicants')
          ->count();
        $applicants=DB::table('applicants')
          ->get();
        $programs=DB::table('programs')
          ->get();
      $status_projects=DB::table('status_projects')->get();
           $programs_1=DB::table('programs as p')
      ->where('operation_rules',1)
      ->pluck('p.name','p.id','p.operation_rules');
      
      $programs_0=DB::table('programs as p')
      ->where('operation_rules',0)
      ->pluck('p.name','p.id','p.operation_rules');
        return view('projects.create')->with('count_programs',$count_programs)
          ->with('count_applicants',$count_applicants)->with('programs',$programs)
          ->with('programs_1',$programs_1)
          ->with('programs_0',$programs_0)->with('applicants',$applicants)->with('status_projects',$status_projects)->with("id",$id);
  }
    public function store(Request $request)
    {
             
        $data = request()->validate([
            'applicant'=>'required',
            
            'requested_concept'=>'required',
            'comments' =>'required',
            'status_project'=>'required',
            
            'component'=>'required',
            'concepts'=>'required',
          ],[
            'applicant.required'=>'* Este campo es obligatorio.',
            
            'requested_concept.required'=>'* Este campo es obligatorio.',
            'comments.required' =>'* Este campo es obligatorio',
            'status_project.required'=>'* Este campo es obligatorio',
            
            'component.required'=>'* Este campo es obligatorio',
            'concepts.required'=>'       * Se necesita almenos un concepto',
          ]);
          
          
          $verificacion_conceptos = $request->concepts;
      
          /*if($verificacion_conceptos == null){
            Alert::error('No es posible realizar el registro porque el programa seleccionado no posee conceptos', 'Error')->autoclose(4000);
            return redirect()->route('projects.list');
          }*/
      
          $fecha_actual=date("Y-m-d");
          $projects= new Projects;
          $projects->applicant_id=Input::get('applicant');
          if(Input::get('selection')==0){
            $projects->program_id=Input::get('program_0');
          }else if(Input::get('selection')==1){
            $projects->program_id=Input::get('program_1');
          }
          
          $projects->requested_concept=Input::get('requested_concept');
          $projects->status_project=Input::get('status_project');
          $projects->status_date=$fecha_actual;
          $projects->folio=null;
          
          $visit_history= new Visit_History;
          
          $visit_history->status_project_id=Input::get('status_project');
          
          $visit_history->comments=Input::get('comments');
          $visit_history->date=$fecha_actual;
           $visit_history->user_id=Auth::user()->id;
          
          
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($projects->save()) {
           $anexos_programs = $request->anexos;
            $nombres_anexos = $request->nombre;
            $i = 0;
            if($anexos_programs!=null){
            
              $posiciones = array_keys($anexos_programs);
              
              for($i=0;$i<sizeof($posiciones);$i++){
                if($nombres_anexos[$posiciones[$i]] != null){
                  $project_anexos = new Documents();
                  
                  $project_anexos->name = $nombres_anexos[$posiciones[$i]];

                  $path=$anexos_programs[$posiciones[$i]]->store('/public/documents');
                  $project_anexos->path = 'storage/documents/'.$anexos_programs[$posiciones[$i]]->hashName();

                  $project_anexos->project_id = $projects->id;
                  $project_anexos->save();
                  insertToLog(Auth::user()->id, 'added', $project_anexos->id, "documentos");
                }
              }
        /*foreach ($anexos_programs as $anexos) {
          
          $project_anexos = new Documents();
          $project_anexos->name = $nombres_anexos[$i];
          
          $path=$anexos->store('/public/documents');
          $project_anexos->path = 'storage/documents/'.$anexos->hashName();
                                                    
          $project_anexos->project_id = $projects->id;
          $project_anexos->save();
          insertToLog(Auth::user()->id, 'added', $project_anexos->id, "documentos");
          $i++;
        }*/
            }
            $concepts= $request->concepts;
            $i = 0;
            if(Input::get('selection')==1){
            
          foreach ($concepts  as $id) {
          
          $project_concept = new projects_concepts();
          $project_concept->concept_id = $id;
                                                    
          $project_concept->project_id = $projects->id;
          $project_concept->save();
          insertToLog(Auth::user()->id, 'added', $project_concept->id, "conceptos");
          $i++;
        }
            }
            
            $visit_history->project_id=$projects->id;
            $visit_history->save();
            insertToLog(Auth::user()->id, 'added', $projects->id, "proyecto");
            insertToLog(Auth::user()->id, 'added', $visit_history->id, "historial");
            Alert::success('Exitosamente','Proyecto Registrado')->autoclose(4000);
            return redirect()->route('projects.show',['id'=>$projects->id]);
          } else {
            Alert::error('No se registro el proyecto', 'Error')->autoclose(4000);
            return redirect()->route('projects.list');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $operation_rules = DB::table("projects")->join("programs","programs.id","=","projects.program_id")
        ->select("programs.operation_rules")->where("projects.id","=",$id)->first();
      
      $conceptos= null;
      $componente = null;
      $subcomponente = null;
      
      if($operation_rules->operation_rules == 0){
          $project = DB::table("projects")
              ->join("applicants","projects.applicant_id","=","applicants.id")
            ->join("status_projects","projects.status_project","=","status_projects.id")
              ->join("programs","programs.id","=","projects.program_id")
              ->select("projects.id as folio_interno",
                      "projects.folio as folio_externo",
                      "applicants.first_name",
                      "applicants.last_name",
                      "applicants.second_last_name",
                      "applicants.type",
                      "applicants.ejido",
                      "applicants.colony",
                      "applicants.street",
                      "applicants.number",
                      "applicants.zip",
                       "status_projects.name as status",
                      "programs.name as program_name",
                      "programs.responsable_unit",
                      "programs.executing_unit",
                      "programs.p_amount_max",
                      "programs.m_amount_max",
                      "projects.requested_concept")->where("projects.id","=",$id)->first();
          $documents = DB::table("projects")->join("documents","documents.project_id","=","projects.id")
                ->select("documents.name as documento","documents.path","documents.id")
                ->where("projects.id","=",$id)->get();
        
          $visitas = DB::table("projects")->join("visit_histories","visit_histories.project_id","=","projects.id")
                ->join("status_projects","status_projects.id","=","visit_histories.status_project_id")
                 ->select("visit_histories.comments as comentario",
                        "visit_histories.date as fecha",
                        "status_projects.name as estatus",
                         "visit_histories.id as id")
                ->where("projects.id","=",$id)->get();
      }else{
          $project = DB::table("projects")
              ->join("applicants","projects.applicant_id","=","applicants.id")
              ->join("status_projects","projects.status_project","=","status_projects.id")
              ->join("programs","programs.id","=","projects.program_id")
              ->select("projects.id as folio_interno",
                      "projects.folio as folio_externo",
                      "applicants.first_name",
                      "applicants.last_name",
                      "applicants.second_last_name",
                      "applicants.type",
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
        
          $conceptos = DB::table("projects")->join("projects_concepts","projects.id","=","projects_concepts.project_id")
            ->join("concepts","concepts.id","=","projects_concepts.concept_id")
            ->select("concepts.name as concepto","concepts.component_id as componente","concepts.sub_component_id as subcomponente","concepts.p_amount_max","concepts.m_amount_max")->where("projects.id","=",$id)->get();
          
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
                ->select("documents.name as documento","documents.path","documents.id")
                ->where("projects.id","=",$id)->get();
        
          $visitas = DB::table("projects")->join("visit_histories","visit_histories.project_id","=","projects.id")
                ->join("status_projects","status_projects.id","=","visit_histories.status_project_id")
                ->select("visit_histories.comments as comentario",
                        "visit_histories.date as fecha",
                        "status_projects.name as estatus",
                        "visit_histories.id as id")
                ->where("projects.id","=",$id)->get();
      }
      
        return view('projects.show')->with('project',$project)->with('documents',$documents)
          ->with('visitas',$visitas)->with('conceptos',$conceptos)->with('operation_rules',$operation_rules)->with('componente',$componente)->with('subcomponente',$subcomponente);
    }
    
    public function create_folio($id)
    {
        $project=DB::table('projects')
          ->where('id',$id)
          ->first();
        $status_project=DB::table('status_projects')
          ->where('id',6)
          ->first();
       return view('projects.create_folio')->with('project',$project)->with('status_project',$status_project);
    }
  
    public function store_create_folio($id)
    {
      
      $data = request()->validate([
            'folio'=>'required',
          ],[
            'folio.required'=>'* Este campo es obligatorio',
          ]);
      
      
      $test_projects = DB::table("projects")->where("id","!=",$id)->where("folio","=",Input::get("folio"))->count();
      
      if($test_projects == 0){
        $fecha_actual=date("Y-m-d");
        $visit_history= new Visit_History;  
        $visit_history->status_project_id=Input::get('status_project');
        $visit_history->comments=Input::get('comments');
        $visit_history->date=$fecha_actual;
        $visit_history->user_id=Auth::user()->id;
        $visit_history->project_id=Input::get('project_id');
        $visit_history->save();
        insertToLog(Auth::user()->id, 'added', $visit_history->id, "historial");
      
      
      
      
        $projects=DB::table('projects')
          ->where('id',$id)
          ->update(['folio'=>Input::get('folio')]);
        Alert::success('Exitosamente','Folio Agregado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'updated', $id, "proyecto");

         return redirect()->route('projects.list');
      }else{
        Alert::error('El folio ingresado ya existe asignado a otro proyecto', 'Error')->autoclose(4000);
            return redirect()->route('projects.list');
      }
      
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=DB::table('projects as p')
          ->where('p.id',$id)
          ->first();
      $documents=DB::table('documents')
        ->where('project_id',$id)
        ->get();
      $documents_count=DB::table('documents')
        ->where('project_id',$id)
        ->count();
      $status_projects=DB::table('status_projects')
          ->get();
        
       return view('projects.edit')->with('project',$project)->with('status_projects',$status_projects)->with('documents',$documents)
         ->with('documents_count',$documents_count);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'requested_concept'=>'required',
            'comments' =>'required',
            'status_project'=>'required',
            
          ],[
            'requested_concept.required'=>'* Este campo es obligatorio.',
            'comments.required' =>'* Este campo es obligatorio',
            'status_project.required'=>'* Este campo es obligatorio',
          ]);
        
          $fecha_actual=date("Y-m-d");
      
        $projects=DB::table('projects')
          ->where('id',$id)
          ->update(['requested_concept'=>Input::get('requested_concept'),'status_project'=>Input::get('status_project'),'status_date'=>$fecha_actual]);
          
          $visit_history= new Visit_History;
          
          $visit_history->status_project_id=Input::get('status_project');
          
          $visit_history->comments=Input::get('comments');
          $visit_history->date=$fecha_actual;
           $visit_history->user_id=Auth::user()->id;
          $visit_history->project_id=$id;
            
          
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($visit_history->save()) {
            $anexos_programs = $request->anexos;
            $nombres_anexos = $request->nombre;
            $i = 0;
            if($anexos_programs!=null){
            
              $posiciones = array_keys($anexos_programs);
              
              for($i=0;$i<sizeof($posiciones);$i++){
                if($nombres_anexos[$posiciones[$i]] != null){
                  $project_anexos = new Documents();
                  
                  $project_anexos->name = $nombres_anexos[$posiciones[$i]];

                  $path=$anexos_programs[$posiciones[$i]]->store('/public/documents');
                  $project_anexos->path = 'storage/documents/'.$anexos_programs[$posiciones[$i]]->hashName();

                  $project_anexos->project_id = $projects->id;
                  $project_anexos->save();
                  insertToLog(Auth::user()->id, 'added', $project_anexos->id, "documentos");
                }
              }
              
              
        /*foreach ($anexos_programs as $anexos) {
          
              $project_anexos = new Documents();
              $project_anexos->name = $nombres_anexos[$i];
          
              $path=$anexos->store('/public/documents');
              $project_anexos->path = 'storage/documents/'.$anexos->hashName();
                                                    
              $project_anexos->project_id = $id;
              $project_anexos->save();
              insertToLog(Auth::user()->id, 'added', $project_anexos->id, "documentos");
              $i++;
          }*/
        
            }
            Alert::success('Exitosamente','Proyecto Modificado')->autoclose(4000);
            
            insertToLog(Auth::user()->id, 'updated', $id, "proyecto");
            insertToLog(Auth::user()->id, 'added', $visit_history->id, "historial");
  
            return redirect()->route('projects.show',['id'=>$id]);
          } else {
            Alert::error('No se modifico proyecto', 'Error')->autoclose(4000);
            return redirect()->route('projects.show',['id'=>$id]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
       $concepts_count=DB::table('projects_concepts')
        ->where('project_id',$id)
        ->count();
       $concepts=DB::table('projects_concepts')
        ->where('project_id',$id)
        ->first();
        $documents=DB::table('documents')
        ->where('project_id',$id)
        ->first();
      $documents_count=DB::table('documents')
        ->where('project_id',$id)
        ->count();
      $visit_history=DB::table('visit_histories')
        ->where('project_id',$id)
        ->first();      
        $project=DB::table('projects')
        ->where('id',$id)
        ->first();
      Alert::success('Exitosamente','Proyecto Eliminado')->autoclose(4000);
      if ($concepts_count!=0){
      insertToLog(Auth::user()->id, 'deleted', $concepts->project_id, "conceptos del proyecto");
      $concepts=DB::table('projects_concepts')
        ->where('project_id',$id)
        ->delete();
      }
      if ($documents_count!=0){
      insertToLog(Auth::user()->id, 'deleted', $documents->project_id, "documentos del proyecto");
      $documents=DB::table('documents')
        ->where('project_id',$id)
        ->delete();
      }
      
      insertToLog(Auth::user()->id, 'deleted', $project->id, "proyecto");
      insertToLog(Auth::user()->id, 'deleted', $visit_history->project_id, "historial del proyecto");
       
        $visit_history=DB::table('visit_histories')
        ->where('project_id',$id)
        ->delete();      
        $project=DB::table('projects')
        ->where('id',$id)
        ->delete();
      
      return redirect()->route('projects.list');
      
    }
  
  public function deleteDocumento($id){
      
        $documento = Documents::find($id);
        $project_id = $documento->project_id;
       Alert::success('Exitosamente','Documento Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $id, "documento");
       
       unlink(public_path()."/".$documento->path);
       
        $documento->delete();

        return redirect()->route('projects.show',['id'=>$project_id]);
    }
  
  protected function downloadFile($src){
    if(is_file($src)){
      $finfo=finfo_open(FILEINFO_MIME_TYPE);
      $content_type=finfo_file($finfo,$src);
      finfo_close($finfo);
      $file_name=basename($src).PHP_EOL;
      $size=filesize($src);
      header("Content-Type: $content_type");
      header("Content-Disposition: attachment; filename=$file_name");
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: $size");
      readfile($src);
      return true;
    }else{
      return false;
    }
  }
  
  public function download($id){
    $path=DB::table('documents')
      ->select('path')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->path)){
      return redirect()->back();
    }
  }
}
