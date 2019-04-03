<?php

namespace App\Http\Controllers;


use Alert;
use App\Programs;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Anexos;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Programs::all();
        return view("programs.list")->with("programs",$programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("programs.create");
    }
  
    public function createWithoutRulesOperation(){
      
      return view("programs.withoutRulesOperation");
    }
    
    public function createWithRulesOperation(){
      
      return view("programs.withRulesOperation");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    public function storeWithRulesOperation(Request $request){
      $program = new Programs;
  
      //Se obtienen los valores de la vista
      $program->name = Input::get('name');
      $program->description = Input::get('description');
      $program->target_population = Input::get('poblacion');
      $program->responsable_unit = Input::get('unit_responsable');
      $program->executing_unit = Input::get('unit_ejecutora');
      $program->operation_rules = 1;
      $program->vinculo = Input::get("vinculo");
      
      $path=$request->file('file3')->store('/public/programs');
      $program->general_requirements = 'storage/programs/'.$request->file('file3')->hashName();

      $path=$request->file('file2')->store('/public/programs');
      $program->announcement_pdf = 'storage/programs/'.$request->file('file2')->hashName();
        
      if ($program->save()) {
          
        $anexos_programs = $request->anexos;
        $nombres_anexos = $request->nombre;
        $i = 0;
        
        if($anexos_programs != null){
          

          foreach ($anexos_programs as $anexos) {

            $program_anexos = new Anexos();
            $program_anexos->name = $nombres_anexos[$i];

            $path=$anexos->store('/public/anexos');
            $program_anexos->path = 'storage/anexos/'.$anexos->hashName();

            $program_anexos->program_id = $program->id;
            $program_anexos->save();
            $i++;
          }
        }
        Alert::success('Exitosamente','Programa Registrado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'added', $program->id, "programa");

        return redirect()->route('programs.list');
      } else {
        Alert::error('No se registró el programa', 'Error')->autoclose(4000);
        return redirect()->route('programs.list');
      }
    }
  
    public function storeWithoutRulesOperation(Request $request){
      $program = new Programs;
  
      //Se obtienen los valores de la vista
      $program->name = Input::get('name');
      $program->description = Input::get('description');
      $program->target_population = Input::get('poblacion');
      $program->responsable_unit = Input::get('unit_responsable');
      $program->executing_unit = Input::get('unit_ejecutora');
      $program->start_date = Input::get('start_date');
      $program->finish_date = Input::get('finish_date');
      $program->operation_rules = 0;
      $program->vinculo = Input::get("vinculo");
      
      $path=$request->file('file3')->store('/public/programs');
      $program->general_requirements = 'storage/programs/'.$request->file('file3')->hashName();

      $path=$request->file('file')->store('/public/programs');
      $program->specific_requirements = 'storage/programs/'.$request->file('file')->hashName();

      $path=$request->file('file2')->store('/public/programs');
      $program->announcement_pdf = 'storage/programs/'.$request->file('file2')->hashName();

      $program->p_amount_max = Input::get("p_amount_max");
      $program->m_amount_max = Input::get("m_amount_max");
      
        
      if ($program->save()) {
          
        $anexos_programs = $request->anexos;
        $nombres_anexos = $request->nombre;
        $i = 0;
        
        if($anexos_programs != null){
          

          foreach ($anexos_programs as $anexos) {

            $program_anexos = new Anexos();
            $program_anexos->name = $nombres_anexos[$i];

            $path=$anexos->store('/public/anexos');
            $program_anexos->path = 'storage/anexos/'.$anexos->hashName();

            $program_anexos->program_id = $program->id;
            $program_anexos->save();
            $i++;
          }
        }
        Alert::success('Exitosamente','Programa Registrado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'added', $program->id, "programa");

        return redirect()->route('programs.list');
      } else {
        Alert::error('No se registró el programa', 'Error')->autoclose(4000);
        return redirect()->route('programs.list');
      }
    }
  
    public function deleteAnexo($id){
      
        $anexo = Anexos::find($id);
        $program_id = $anexo->program_id;
       Alert::success('Exitosamente','Anexo Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $id, "anexo");
       
       unlink(public_path()."/".$anexo->path);
       
        $anexo->delete();

        return redirect()->route('programs.show',['id'=>$program_id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = DB::table("programs")->where("id","=",$id)->first();
        $anexos = DB::table("anexos")->where("program_id","=",$id)->get();
        if($program->operation_rules == 0){
          return view("programs.showWithoutRulesOperation")->with("program",$program)->with("anexos",$anexos);
        }else{
          $components = DB::table("components")->where("program_id","=",$id)->get();
          $subcomponents = DB::table("sub_components")->where("program_id","=",$id)->get();
          $concepts = DB::table("concepts")->where("program_id","=",$id)->get();
          return view("programs.showWithRulesOperation")->with("program",$program)->with("anexos",$anexos)
            ->with("components",$components)
            ->with("subcomponents",$subcomponents)
            ->with("concepts",$concepts);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Programs $program)
    {
        if($program->operation_rules == 0){
          return view('programs.editWithoutRulesOperation')->with("program",$program);  
        }else{
          return view('programs.editWithRulesOperation')->with("program",$program);  
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Programs $program, Request $request)
    {
       if($program->operation_rules == 0){
          $program->name = Input::get('name');
          $program->description = Input::get('description');
          $program->target_population = Input::get('poblacion');
          $program->responsable_unit = Input::get('unit_responsable');
          $program->executing_unit = Input::get('unit_ejecutora');
          $program->start_date = Input::get('start_date');
          $program->finish_date = Input::get('finish_date');
          $program->operation_rules = 0;
          $program->vinculo = Input::get("vinculo");
          
          if(Input::file("file3") != null){
            unlink(public_path()."/".$program->general_requirements);
            $path=$request->file('file3')->store('/public/programs');
            $program->general_requirements = 'storage/programs/'.$request->file('file3')->hashName();  
          }
          
          if(Input::file("file") != null){
            unlink(public_path()."/".$program->specific_requirements);
            $path=$request->file('file')->store('/public/programs');
            $program->specific_requirements = 'storage/programs/'.$request->file('file')->hashName();
          }
          
          if(Input::file("file2") != null){
            unlink(public_path()."/".$program->announcement_pdf);
            $path=$request->file('file2')->store('/public/programs');
            $program->announcement_pdf = 'storage/programs/'.$request->file('file2')->hashName();
          }
          

          $program->p_amount_max = Input::get("p_amount_max");
          $program->m_amount_max = Input::get("m_amount_max");


          if ($program->update()) {

            $anexos_programs = $request->anexos;
            $nombres_anexos = $request->nombre;
            $i = 0;

            if($anexos_programs != null){


              foreach ($anexos_programs as $anexos) {

                $program_anexos = new Anexos();
                $program_anexos->name = $nombres_anexos[$i];

                $path=$anexos->store('/public/anexos');
                $program_anexos->path = 'storage/anexos/'.$anexos->hashName();

                $program_anexos->program_id = $program->id;
                $program_anexos->save();
                $i++;
              }
            }
            Alert::success('Exitosamente','Programa Modificado')->autoclose(4000);

            insertToLog(Auth::user()->id, 'updated', $program->id, "programa");

            return redirect()->route('programs.list');
          } else {
            Alert::error('No se modificó el programa', 'Error')->autoclose(4000);
            return redirect()->route('programs.list');
          }
       }else{
         $program->name = Input::get('name');
          $program->description = Input::get('description');
          $program->target_population = Input::get('poblacion');
          $program->responsable_unit = Input::get('unit_responsable');
          $program->executing_unit = Input::get('unit_ejecutora');
          $program->operation_rules = 1;
          $program->vinculo = Input::get("vinculo");
         if(Input::file("file3") != null){
            unlink(public_path()."/".$program->general_requirements);
            $path=$request->file('file3')->store('/public/programs');
            $program->general_requirements = 'storage/programs/'.$request->file('file3')->hashName();
          }
          
          if(Input::file("file2") != null){
            unlink(public_path()."/".$program->announcement_pdf);
            $path=$request->file('file2')->store('/public/programs');
            $program->announcement_pdf = 'storage/programs/'.$request->file('file2')->hashName();
          }

          

          if ($program->update()) {

            $anexos_programs = $request->anexos;
            $nombres_anexos = $request->nombre;
            $i = 0;

            if($anexos_programs != null){


              foreach ($anexos_programs as $anexos) {

                $program_anexos = new Anexos();
                $program_anexos->name = $nombres_anexos[$i];

                $path=$anexos->store('/public/anexos');
                $program_anexos->path = 'storage/anexos/'.$anexos->hashName();

                $program_anexos->program_id = $program->id;
                $program_anexos->save();
                $i++;
              }
            }
            Alert::success('Exitosamente','Programa Modificado')->autoclose(4000);

            insertToLog(Auth::user()->id, 'updated', $program->id, "programa");

            return redirect()->route('programs.list');
          } else {
            Alert::error('No se modificó el programa', 'Error')->autoclose(4000);
            return redirect()->route('programs.list');
          }
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programs $program)
    {
        Alert::success('Exitosamente','Programa Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $program->id, "programa");
       
        if($program->operation_rules == 0){
          unlink(public_path()."/".$program->specific_requirements);  
        }
        unlink(public_path()."/".$program->general_requirements);
        unlink(public_path()."/".$program->announcement_pdf);
       
        $program->delete();

        return redirect()->route('programs.list');
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
  
  public function downloadGeneral($id){
    $path=DB::table('programs')
      ->select('general_requirements')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->general_requirements)){
      return redirect()->back();
    }
  }
  
  public function downloadSpecific($id){
    $path=DB::table('programs')
      ->select('specific_requirements')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->specific_requirements)){
      return redirect()->back();
    }
  }
  
  public function downloadConvocatoria($id){
    $path=DB::table('programs')
      ->select('announcement_pdf')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->announcement_pdf)){
      return redirect()->back();
    }
  }
  
  public function downloadAnexo($id){
    $path=DB::table('anexos')
      ->select('path')
      ->where('id',$id)
      ->first();
    if(!$this->downloadFile($path->path)){
      return redirect()->back();
    }
  }
}
