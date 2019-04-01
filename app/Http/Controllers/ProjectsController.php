<?php

namespace App\Http\Controllers;

use Alert;
use App\Projects;
use App\Visit_History;
use App\Documents;
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
        $projects = DB::table('projects')->get();
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
        $count_programs=DB::table('programs')
          ->count();
        $count_applicants=DB::table('applicants')
          ->count();
        $applicants=DB::table('applicants')
          ->get();
        $programs=DB::table('programs')
          ->get();
      $status_projects=DB::table('status_projects')->get();
          
        return view('projects.create')->with('count_programs',$count_programs)
          ->with('count_applicants',$count_applicants)->with('programs',$programs)
          ->with('applicants',$applicants)->with('status_projects',$status_projects);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
     
        $data = request()->validate([
            'applicant'=>'required',
            'program'=>'required',
            'requested_concept'=>'required',
            'comments' =>'required',
            'status_project'=>'required',
            
          ],[
            'applicant.required'=>'* Este campo es obligatorio.',
            'program.required'=>'* Este campo es obligatorio.',
            'requested_concept.required'=>'* Este campo es obligatorio.',
            'comments.required' =>'* Este campo es obligatorio',
            'status_project.required'=>'* Este campo es obligatorio',
          ]);
        
          $fecha_actual=date("Y-m-d");
          $projects= new Projects;
          $projects->applicant_id=Input::get('applicant');
          $projects->program_id=Input::get('program');
          $projects->requested_concept=Input::get('requested_concept');
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
        foreach ($anexos_programs as $anexos) {
          
          $project_anexos = new Documents();
          $project_anexos->name = $nombres_anexos[$i];
          
          $path=$anexos->store('/public/documents');
          $project_anexos->path = 'storage/documents/'.$anexos->hashName();
                                                    
          $project_anexos->project_id = $projects->id;
          $project_anexos->save();
          insertToLog(Auth::user()->id, 'added', $project_anexos->id, "documentos");
          $i++;
        }
            Alert::success('Exitosamente','Proyecto Registrado')->autoclose(4000);
            $visit_history->project_id=$projects->id;
            $visit_history->save();
            insertToLog(Auth::user()->id, 'added', $projects->id, "proyecto");
            insertToLog(Auth::user()->id, 'added', $visit_history->id, "historial");
  
            return redirect()->route('projects.list');
          } else {
            Alert::error('No se registro el proyecto', 'Error')->autoclose(4000);
            return redirect()->route('projects.list',[]);
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
      $projects=DB::table('projects as p')
        ->join('applicants as a','a.id','p.applicant_id')
        ->join('programs as pr','pr.id','p.program_id')
        ->select('p.*','a.first_name','a.last_name','a.second_last_name','pr.name as program_name')
        ->where('p.id',$id)
        ->get();
      $documents=DB::table('documents as d')
        ->where('d.project_id',$id)
        ->get();
      $visit_histories=DB::table('visit_histories as vh')
        ->join('status_projects as sp','sp.id','vh.status_project_id')
        ->select('vh.*','sp.name')
        ->where('vh.project_id',$id)
        ->orderBy('vh.created_at', 'desc')
        ->get();
        return view('projects.show')->with('projects',$projects)->with('documents',$documents)
          ->with('visit_histories',$visit_histories);
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
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=DB::table('projects')
          ->where('id',$id)
          ->first();
      $status_projects=DB::table('status_projects')
          ->get();
        
       return view('projects.edit')->with('project',$project)->with('status_projects',$status_projects);
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
          ->update(['requested_concept'=>Input::get('requested_concept')]);
          
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
        foreach ($anexos_programs as $anexos) {
          
          $project_anexos = new Documents();
          $project_anexos->name = $nombres_anexos[$i];
          
          $path=$anexos->store('/public/documents');
          $project_anexos->path = 'storage/documents/'.$anexos->hashName();
                                                    
          $project_anexos->project_id = $id;
          $project_anexos->save();
          insertToLog(Auth::user()->id, 'added', $project_anexos->id, "documentos");
          $i++;
        }
            Alert::success('Exitosamente','Proyecto Modificado')->autoclose(4000);
            
            insertToLog(Auth::user()->id, 'updated', $id, "proyecto");
            insertToLog(Auth::user()->id, 'added', $visit_history->id, "historial");
  
            return redirect()->route('projects.list');
          } else {
            Alert::error('No se modifico proyecto', 'Error')->autoclose(4000);
            return redirect()->route('projects.list');
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
      
        $documents=DB::table('documents')
        ->where('project_id',$id)
        ->first();
      $visit_history=DB::table('visit_histories')
        ->where('project_id',$id)
        ->first();      
        $project=DB::table('projects')
        ->where('id',$id)
        ->first();
      Alert::success('Exitosamente','Proyecto Eliminado')->autoclose(4000);
      insertToLog(Auth::user()->id, 'deleted', $documents->project_id, "documentos del proyecto");
      insertToLog(Auth::user()->id, 'deleted', $project->id, "proyecto");
      insertToLog(Auth::user()->id, 'deleted', $visit_history->project_id, "historial del proyecto");
       $documents=DB::table('documents')
        ->where('project_id',$id)
        ->delete();
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
