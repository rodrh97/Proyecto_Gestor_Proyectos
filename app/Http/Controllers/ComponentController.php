<?php

namespace App\Http\Controllers;

use Alert;
use App\Components;
use App\Concepts;
use App\Sub_Components;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ComponentController extends Controller
{
    public function index()
    {
        $components = DB::table('components')->join("programs","components.program_id","=","programs.id")->select("components.*","programs.name as program")->get();

        return view('components.list')
          ->with('components',$components)
          ->with('title', 'Listado de Componentes');
    }
  
    public function create()
    {
      $num_programs = DB::table("programs")->where("operation_rules","=","1")->count();
      $programs = DB::table("programs")->where("operation_rules","=","1")->get();
      if($num_programs == 0){
        Alert::error('Se requiere el registro de almenos un programa sujeto a reglas de operación', 'Error')->autoclose(4000);
        return view("programs.create");
      }else{
        return view('components.create')->with("programs",$programs);
      }
    }
  
    public function show($id){
      $component = DB::table("components")->join("programs","components.program_id","=","programs.id")
                  ->select("components.*","programs.name as program")->where("components.id","=",$id)->first();
      return view("components.show")->with("component",$component);
    }
  
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|max:128',
            
          ],[
            'name.required' => ' * Este campo es obligatorio.',
            'name.max' => ' * Este campo debe contener sólo 128 caracteres.',
            
          ]);
          
            
          $components = new Components;
      
      
          if(Input::get("start_date")!= null && Input::get("finish_date")!= null){
            $fecha = date('Y-m-d');
      
            if(Input::get("start_date") > Input::get("finish_date")){
              Alert::error('La fecha de inicio no puede ser después de la fecha de cierre', 'Error')->autoclose(4000);
              return redirect()->route('components.create');
            }

            
              //Se obtienen los valores de la vista
            $components->name = Input::get('name');
            $components->start_date = Input::get('start_date');
            $components->finish_date = Input::get('finish_date');
            $components->program_id = Input::get("program");
            $components->vinculo = Input::get("vinculo");
          }else{
            $components->vinculo = Input::get("vinculo");
            $components->name = Input::get('name');
            $components->program_id = Input::get("program");
          }
      
          
      
        //Se carga la imagen subida
        $file = Input::file('file');
        //Si se ingreso una imagen a guardar, entonces la guarda en storage en la carpeta de users
        if ($file!=null) {
            //Almacenando la imagen del alumno
            $path=$request->file('file')->store('/public/components');
            $components->path = 'storage/components/'.$request->file('file')->hashName();
        }

  
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($components->save()) {
            Alert::success('Exitosamente','Componente Registrado')->autoclose(4000);
  
            insertToLog(Auth::user()->id, 'added', $components->id, "componente");
  
            return redirect()->route('components.list');
          } else {
            Alert::error('No se registró el componente', 'Error')->autoclose(4000);
            return redirect()->route('components.list');
          }
    }
  
    public function edit(Components $component)
    {   
        $programs = DB::table("programs")->where("operation_rules","=","1")->get();
        return view('components.edit', ['component' => $component,'programs' => $programs]);
    }
  
    public function update(Components $component)
    {
        //Validaciones
        $data = request()->validate([
          'name' => 'required|max:128',
        ],[
          'name.required' => ' * Este campo es obligatorio.',
          'name.max' => ' * Este campo debe contener sólo 128 caracteres.',
        ]);
        
        $fecha = date('Y-m-d');
      
          if(Input::get("start_date")!= null && Input::get("finish_date")!= null){
            $fecha = date('Y-m-d');
      
            if(Input::get("start_date") > Input::get("finish_date")){
              Alert::error('La fecha de inicio no puede ser despues de la fecha de cierre', 'Error')->autoclose(4000);
              return redirect()->route('components.edit',['id'=>$component->id]);
            }

            
              //Se obtienen los valores de la vista
            $component->name = Input::get('name');
            $component->start_date = Input::get('start_date');
            $component->finish_date = Input::get('finish_date');
            $component->program_id = Input::get("program");
            $component->vinculo = Input::get("vinculo");
          }else{
            $component->name = Input::get('name');
            $component->program_id = Input::get("program");
            $component->vinculo = Input::get("vinculo");
          }
          //Imagen nueva(mandada atraves del file input)
          $image = Input::file('image');
          //Imagen actual(registrada en la base de datos)
          $image2 = $component->path;

          
        //Se almacena y se muestra mensaje de exito
        if ($component->update()) {
          
          if ($image!=null) {
            if($image2 != null){
              unlink(public_path()."/".$image2);
            }
              //Se realiza el almacenado de la nueva imagen(cargada en el file input)
              $path=Input::file('image')->store('/public/components');
              //Se obtiene el nombre de la imagen
              $image_url = 'storage/components/'.Input::file('image')->hashName();
              //Se realiza la nueva actualizacion al registro del usuario actual con el
              //nombre de la nueva imagen
            
              DB::update('UPDATE components SET path = ? WHERE id = ?', [$image_url, $component->id]);
          }

          
          Alert::success('Exitosamente','Componente Modificado')->autoclose(4000);

          insertToLog(Auth::user()->id, 'updated', $component->id, "componente");

          return redirect()->route('components.list');
        } else {
          Alert::error('No se modificó el componente', 'Error')->autoclose(4000);
          return redirect()->route('components.list');
        }
    }
  
     public function destroy(Components $component)
    {
         
        $subcomponents = DB::table("sub_components")->get();
        $concepts = DB::table("concepts")->get();
        foreach($subcomponents as $subcomponent){
          if($subcomponent->component_id == $component->id){
            foreach($concepts as $concept){
              if($concept->sub_component_id == $subcomponent->id){
                $borrarConcept = Concepts::find($concept->id);
                $borrarConcept->delete();
              }
            }
            $borrarSubcomponente = Sub_Components::find($subcomponent->id);
            $borrarSubcomponente->delete();
          }
        }
       
        $concepts2 =  DB::table("concepts")->get();
       foreach($concepts2 as $concept2){
          if($concept2->component_id == $component->id){
            $borrarConcept2 = Concepts::find($concept2->id);
            $borrarConcept2->delete();
          }
        }
        Alert::success('Exitosamente','Componente Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $component->id, "componente");
       
       unlink(public_path()."/".$component->path);
       
        $component->delete();

        return redirect()->route('components.list');
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
    $path=DB::table('components')
      ->select('path')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->path)){
      return redirect()->back();
    }
  }
  
}
