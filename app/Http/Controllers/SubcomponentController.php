<?php

namespace App\Http\Controllers;

use Alert;
use App\Sub_Components;
use App\Components;
use App\anexos_subcomponents;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Concepts;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SubcomponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcomponents = DB::table('sub_components')->join('components','sub_components.component_id','=','components.id')
                            ->select("sub_components.*","components.name as component")->get();

        return view('subcomponents.list')
          ->with('subcomponents',$subcomponents)
          ->with('title', 'Listado de Subcomponentes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $num_components = DB::table("components")->count();
        $components = DB::table("components")->get();
        
        return view('subcomponents.create')->with("components",$components);
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
            'name' => 'required|max:128',
          ],[
            'name.required' => ' * Este campo es obligatorio.',
            'name.max' => ' * Este campo debe contener sólo 128 caracteres.',
          ]);
          
          $component_id = DB::table("components")->where("id","=",Input::get("component"))->first();
          $subcomponent = new Sub_Components;
      
      
          if(Input::get("start_date")!= null && Input::get("finish_date")!= null){
            $fecha = date('Y-m-d');
      
            if(Input::get("start_date") > Input::get("finish_date")){
              Alert::error('La fecha de inicio no puede ser despues de la fecha de cierre', 'Error')->autoclose(4000);
              return redirect()->route('subcomponents.create');
            }

         
            
              //Se obtienen los valores de la vista
            $subcomponent->name = Input::get('name');
            $subcomponent->start_date = Input::get('start_date');
            $subcomponent->finish_date = Input::get('finish_date');
            $subcomponent->component_id = Input::get("component");
            $subcomponent->program_id = $component_id->program_id;
            $subcomponent->vinculo = Input::get("vinculo");
            $subcomponent->description = Input::get("description");
          }else{
            $subcomponent->name = Input::get('name');
            $subcomponent->component_id = Input::get("component");
            $subcomponent->program_id = $component_id->program_id;
            $subcomponent->vinculo = Input::get("vinculo");
            $subcomponent->description = Input::get("description");
            
            $component = Components::find(Input::get("component"));
            if($component->start_date != null){
              $subcomponent->start_date = $component->start_date;
              $subcomponent->finish_date = $component->finish_date;
            }
          }
      
          
      
        //Se carga la imagen subida
        $file = Input::file('file');
        //Si se ingreso una imagen a guardar, entonces la guarda en storage en la carpeta de users
        if ($file!=null) {
            //Almacenando la imagen del alumno
            $path=$request->file('file')->store('/public/subcomponents');
            $subcomponent->specific_requirements = 'storage/subcomponents/'.$request->file('file')->hashName();
        }

          
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($subcomponent->save()) {
            
            
            $anexos_subcomponent = $request->anexos;
            $nombres_anexos = $request->nombre;
            $i = 0;
            
            //dd($anexos_subcomponent,$nombres_anexos);
            if($anexos_subcomponent != null){

              $posiciones = array_keys($anexos_subcomponent);
              
              for($i=0;$i<sizeof($posiciones);$i++){
                if($nombres_anexos[$posiciones[$i]] != null){
                  $subcomponent_anexos = new anexos_subcomponents();
                  
                  $subcomponent_anexos->name = $nombres_anexos[$posiciones[$i]];

                  $path=$anexos_subcomponent[$posiciones[$i]]->store('/public/anexos_subcomponents');
                  $subcomponent_anexos->path = 'storage/anexos_subcomponents/'.$anexos_subcomponent[$posiciones[$i]]->hashName();

                  $subcomponent_anexos->subcomponent_id = $subcomponent->id;
                  $subcomponent_anexos->save();
                }
              }
              
              /*foreach ($anexos_subcomponent as $anexos) {
                
                  $subcomponent_anexos = new anexos_subcomponents();
                  
                  $subcomponent_anexos->name = $nombres_anexos[$i];

                  $path=$anexos->store('/public/anexos_subcomponents');
                  $subcomponent_anexos->path = 'storage/anexos_subcomponents/'.$anexos->hashName();

                  $subcomponent_anexos->subcomponent_id = $subcomponent->id;
                  $subcomponent_anexos->save();
                
                $i++;
              }*/
            }
            Alert::success('Exitosamente','Subcomponente Registrado')->autoclose(4000);
  
            insertToLog(Auth::user()->id, 'added', $subcomponent->id, "subcomponente");
  
            return redirect()->route('subcomponents.list');
          } else {
            Alert::error('No se registro el subcomponente', 'Error')->autoclose(4000);
            return redirect()->route('subcomponents.list');
          }
    }

  
  public function show($id){
      $subcomponent = DB::table('sub_components')->join('components','sub_components.component_id','=','components.id')
                            ->select("sub_components.*","components.name as component")->where("sub_components.id","=",$id)->first();
    $anexos = DB::table("anexos_subcomponentes")->where("subcomponent_id","=",$id)->get();
        return view('subcomponents.show')
          ->with('subcomponent',$subcomponent)
          ->with('anexos',$anexos);
    }
    /**
    
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_Components $subcomponent)
    {
        $components = DB::table("components")->get();
        return view('subcomponents.edit')->with("subcomponent",$subcomponent)->with("components",$components);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Sub_Components $subcomponent, Request $request)
    {
        //Validaciones
        $data = request()->validate([
          'name' => 'required|max:128',
        ],[
          'name.required' => ' * Este campo es obligatorio.',
          'name.max' => ' * Este campo debe contener sólo 128 caracteres.',
        ]);
        $component_id = DB::table("components")->where("id","=",Input::get("component"))->first();
        $fecha = date('Y-m-d');
      
          if(Input::get("start_date")!= null && Input::get("finish_date")!= null){
            $fecha = date('Y-m-d');
      
            if(Input::get("start_date") > Input::get("finish_date")){
              Alert::error('La fecha de inicio no puede ser despues de la fecha de cierre', 'Error')->autoclose(4000);
              return redirect()->route('subcomponents.edit',['id'=>$subcomponent->id]);
            }

           
              //Se obtienen los valores de la vista
            $subcomponent->name = Input::get('name');
            $subcomponent->start_date = Input::get('start_date');
            $subcomponent->finish_date = Input::get('finish_date');
            $subcomponent->component_id = Input::get("component");
            $subcomponent->program_id = $component_id->program_id;
            $subcomponent->vinculo = Input::get("vinculo");
            $subcomponent->description = Input::get("description");
          }else{
            $subcomponent->name = Input::get('name');
            $subcomponent->component_id = Input::get("component");
            $subcomponent->program_id = $component_id->program_id;
            $subcomponent->vinculo = Input::get("vinculo");
            $subcomponent->description = Input::get("description");
            
            $component = Components::find(Input::get("component"));
            if($component->start_date != null){
              $subcomponent->start_date = $component->start_date;
              $subcomponent->finish_date = $component->finish_date;
            }
          }
          //Imagen nueva(mandada atraves del file input)
          $image = Input::file('image');
          //Imagen actual(registrada en la base de datos)
          $image2 = $subcomponent->specific_requirements;

          
        //Se almacena y se muestra mensaje de exito
        if ($subcomponent->update()) {
          
          $anexos_subcomponent = $request->anexos;
            $nombres_anexos = $request->nombre;
            $i = 0;

            if($anexos_subcomponent != null){
              $posiciones = array_keys($anexos_subcomponent);
              
              for($i=0;$i<sizeof($posiciones);$i++){
                if($nombres_anexos[$posiciones[$i]] != null){
                  $subcomponent_anexos = new anexos_subcomponents();
                  
                  $subcomponent_anexos->name = $nombres_anexos[$posiciones[$i]];

                  $path=$anexos_subcomponent[$posiciones[$i]]->store('/public/anexos_subcomponents');
                  $subcomponent_anexos->path = 'storage/anexos_subcomponents/'.$anexos_subcomponent[$posiciones[$i]]->hashName();

                  $subcomponent_anexos->subcomponent_id = $subcomponent->id;
                  $subcomponent_anexos->save();
                }
              }
/*
              foreach ($anexos_subcomponent as $anexos) {

                $subcomponent_anexos = new anexos_subcomponents();
                $subcomponent_anexos->name = $nombres_anexos[$i];

                $path=$anexos->store('/public/anexos_subcomponents');
                $subcomponent_anexos->path = 'storage/anexos_subcomponents/'.$anexos->hashName();

                $subcomponent_anexos->subcomponent_id = $subcomponent->id;
                $subcomponent_anexos->save();
                $i++;
              }*/
            }
          
          
          if ($image!=null) {
            if($image2 != null){
              unlink(public_path()."/".$image2);
            }
              //Se realiza el almacenado de la nueva imagen(cargada en el file input)
              $path=Input::file('image')->store('/public/subcomponents');
              //Se obtiene el nombre de la imagen
              $image_url = 'storage/subcomponents/'.Input::file('image')->hashName();
              //Se realiza la nueva actualizacion al registro del usuario actual con el
              //nombre de la nueva imagen
            
              DB::update('UPDATE sub_components SET specific_requirements = ? WHERE id = ?', [$image_url, $subcomponent->id]);
          }

          
          Alert::success('Exitosamente','Subcomponente Modificado')->autoclose(4000);

          insertToLog(Auth::user()->id, 'updated',$subcomponent->id, "subcomponente");

          return redirect()->route('subcomponents.list');
        } else {
          Alert::error('No se modifico el subcomponente', 'Error')->autoclose(4000);
          return redirect()->route('subcomponents.list');
        }
    }
  
  
  
  public function deleteAnexo($id){
      
        $anexo = anexos_subcomponents::find($id);
        $subcomponente_id = $anexo->subcomponent_id;
       Alert::success('Exitosamente','Anexo Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $id, "anexo");
       
       unlink(public_path()."/".$anexo->path);
       
        $anexo->delete();

        return redirect()->route('subcomponents.show',['id'=>$subcomponente_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_Components $subcomponent)
    {
         
        $concepts2 =  DB::table("concepts")->get();
       foreach($concepts2 as $concept2){
          if($concept2->sub_component_id == $subcomponent->id){
            $borrarConcept2 = Concepts::find($concept2->id);
            $borrarConcept2->delete();
          }
        }
      
        Alert::success('Exitosamente','Subcomponente Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $subcomponent->id, "subcomponente");
       
        unlink(public_path()."/".$subcomponent->specific_requirements);
       
        $subcomponent->delete();

        return redirect()->route('subcomponents.list');
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
    $path=DB::table('sub_components')
      ->select('specific_requirements')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->specific_requirements)){
      return redirect()->back();
    }
  }
  
   public function downloadAnexo($id){
    $path=DB::table('anexos_subcomponentes')
      ->select('path')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->path)){
      return redirect()->back();
    }
  }
}
