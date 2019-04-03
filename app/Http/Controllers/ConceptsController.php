<?php

namespace App\Http\Controllers;

use Alert;
use App\Concepts;
use App\Components;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ConceptsController extends Controller
{
 public function index()
    {
        $concepts = DB::table('concepts')->get();
        $count_components=DB::table('components')
          ->count();
        $count_sub_components=DB::table('sub_components')
          ->count();
        
        $components = DB::table("components")->get();
        $subcomponents = DB::table("sub_components")->get();
        return view('concepts.list')
          ->with('concepts',$concepts)
          ->with('count_components',$count_components)
          ->with('count_sub_components',$count_sub_components)
          ->with('components',$components)
          ->with('subcomponents',$subcomponents)
          ->with('title', 'Listado de Conceptos');
    }
  
    public function create()
    {
        $sub_components=DB::table('sub_components')
          ->get();
         $components=DB::table('components')->get();
      
      
      
      
      //dd($components);
      
        return view('concepts.create')->with('components',$components)
                                      ->with('sub_components',$sub_components);
    }
  
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|max:500',
            'file' =>'required',
          ],[
            'name.required' => ' * Este campo es obligatorio.',
            'name.max' => ' * Este campo debe contener sólo 500 caracteres.',
            'file.required' => ' * Se requiere de un archivo de identificación para registrar el solicitante.',
          ]);
           $division = preg_split("/[\s,]+/", Input::get('components'));
           $opcion=$division[0];
           $id=(int)$division[1];
           $concepts = new Concepts;
           $concepts->name = Input::get('name');
           $concepts->p_amount_max = Input::get('p_amount_max');
           $concepts->m_amount_max = Input::get('m_amount_max');
           
           if($opcion=="component"){
             $concepts->sub_component_id=null;
             $concepts->component_id = $id;
             $program1 = DB::table("components")->where("id","=",$id)->first();
             $concepts->program_id = $program1->program_id;
           }else{
             $concepts->sub_component_id=$id;
             $concepts->component_id =null;
             $program2 = DB::table("sub_components")->where("id","=",$id)->first();
             $concepts->program_id = $program2->program_id;
           }
        //Se carga la imagen subida
        $file = Input::file('file');
        //Si se ingreso una imagen a guardar, entonces la guarda en storage en la carpeta de users
        if ($file!=null) {
            //Almacenando la imagen del alumno
            $path=$request->file('file')->store('/public/concepts');
            $concepts->specific_requirements = 'storage/concepts/'.$request->file('file')->hashName();
        }else{
            Alert::error('Es necesario subir un archivo con los requisitos especificos', 'Error')->autoclose(4000);
            return redirect()->route('concepts.create');
        }
      
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($concepts->save()) {
            Alert::success('Exitosamente','Concepto Registrado')->autoclose(4000);
  
            insertToLog(Auth::user()->id, 'added', $concepts->id, "concepto");
  
            return redirect()->route('concepts.list');
          } else {
            Alert::error('No se registro el concepto', 'Error')->autoclose(4000);
            return redirect()->route('concepts.list');
          }
    }
  
    public function show($id)
    {
        //Se busca en todos los registros el usuario con el id mandado
        $concept_all = DB::table('concepts as c')
          ->where('c.id','=',$id)
           ->first();//User::find($id);
      if($concept_all->sub_component_id==null){
        $concept = DB::table('concepts as c')
          ->join('components as co','co.id','c.component_id')
          ->select('c.*','co.name as component_name')
          ->where('c.id','=',$id)
           ->first();
        $concept_count_1 = DB::table('concepts as c')
          ->join('components as co','co.id','c.component_id')
          ->select('c.*','co.name as component_name')
          ->where('c.id','=',$id)
          ->count();
        $concept_count_2 = DB::table('concepts as c')
          ->join('sub_components as s','s.id','c.sub_component_id')
          ->select('c.*','s.name as sub_component_name')
          ->where('c.id','=',$id)
          ->count();
      }else{
        $concept = DB::table('concepts as c')
          ->join('sub_components as s','s.id','c.sub_component_id')
          ->join('components as co','s.component_id','co.id')
          ->select('c.*','s.name as sub_component_name','co.name as component_name')
          ->where('c.id','=',$id)
           ->first();
        $concept_count_1 = DB::table('concepts as c')
          ->join('components as co','co.id','c.component_id')
          ->select('c.*','co.name as component_name')
          ->where('c.id','=',$id)
          ->count();
        $concept_count_2 = DB::table('concepts as c')
          ->join('sub_components as s','s.id','c.sub_component_id')
          ->select('c.*','s.name as sub_component_name')
          ->where('c.id','=',$id)
          ->count();
      }

        return view('concepts.show', compact('concept','concept_count_1','concept_count_2'));
    }
  
    public function edit($id)
    {   
        $concept=DB::table('concepts')
          ->where('id',$id)
          ->first();
        if($concept->sub_component_id==null){
         $flag=0;
        }else{
          $flag=1;
        }
        $sub_components=DB::table('sub_components')
          ->get();
         //$components=DB::table('components')->get();
  
       $components = Components::whereNotExists(function($query){
             $query->select(DB::raw(1))
                ->from('sub_components')
                ->whereRaw('components.id = sub_components.component_id');
              })->get();
        return view('concepts.edit', ['concept' => $concept])->with('components',$components)
                                      ->with('sub_components',$sub_components)->with('flag',$flag);
    }
  
    public function update($concept)
    { 
        $concepts=DB::table('concepts')
          ->where('id',$concept)
          ->first();
        $data = request()->validate([
            'name' => 'required|max:500',
            
          ],[
            'name.required' => ' * Este campo es obligatorio.',
            'name.max' => ' * Este campo debe contener sólo 500 caracteres.',
            
          ]);
           $division = preg_split("/[\s,]+/", Input::get('components'));
           $opcion=$division[0];
           $id=(int)$division[1];
           
  
           if($opcion=="component"){
             $concepts->sub_component_id=null;
             $concepts->component_id = $id;
             $program1 = DB::table("components")->where("id","=",$id)->first();
             $concepts->program_id = $program1->program_id;
           }else{
             $concepts->sub_component_id=$id;
             $concepts->component_id =null;
             $program2 = DB::table("sub_components")->where("id","=",$id)->first();
             $concepts->program_id = $program2->program_id;
           }
      $image = Input::file('file');
          //Imagen actual(registrada en la base de datos)
         $image2 = $concepts->specific_requirements;
         
         
        //Se almacena y se muestra mensaje de exito
        
          if ($image!=null) {
              unlink(public_path()."/".$image2);
              //Se realiza el almacenado de la nueva imagen(cargada en el file input)
              $path=Input::file('file')->store('/public/concepts');
              //Se obtiene el nombre de la imagen
              $image_url = 'storage/concepts/'.Input::file('file')->hashName();
              //Se realiza la nueva actualizacion al registro del usuario actual con el
              //nombre de la nueva imagen
            
              DB::update('UPDATE concepts SET specific_requirements = ? WHERE id = ?', [$image_url, $concepts->id]);
          }
      $concepts=DB::table('concepts')
          ->where('id',$concept)
          ->update(['name'=>Input::get('name'),'p_amount_max'=>Input::get('p_amount_max'),'m_amount_max'=>Input::get('m_amount_max'),'component_id'=>$concepts->component_id,'sub_component_id'=>$concepts->sub_component_id]);
          
          Alert::success('Exitosamente','Concepto Modificado')->autoclose(4000);

          insertToLog(Auth::user()->id, 'updated', $concept, "concepto");

          return redirect()->route('concepts.list');
      
        
    }
  
     public function destroy($concepts)
    {
       $concept=DB::table('concepts')
         ->where('id',$concepts)
         ->first();
        
        Alert::success('Exitosamente','Concepto Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $concept->id, "concepto");
       
       unlink(public_path()."/".$concept->specific_requirements);
       
        $concept=DB::table('concepts')
         ->where('id',$concepts)
         ->delete();

        return redirect()->route('concepts.list');
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
    $path=DB::table('concepts')
      ->select('specific_requirements')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->specific_requirements)){
      return redirect()->back();
    }
  }
}
