<?php

namespace App\Http\Controllers;

use Alert;
use App\Applicants;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\State;
use App\City;

class ApplicantsController extends Controller
{
    public function index()
    {
        $applicants = DB::table('applicants')->join("cities","cities.id","=","applicants.city")->select("applicants.*","cities.name as Ciudad")->get();

        return view('applicants.list')
          ->with('applicants',$applicants)
          ->with('title', 'Listado de Componentes');
    }
  public function show($id)
    {
        //Se busca en todos los registros el usuario con el id mandado
        $applicant = DB::table('applicants as a')
          ->join('cities as c','c.id','a.city')
          ->select('a.*','c.name as city_name')
          ->where('a.id','=',$id)->first();//User::find($id);
        $proyectos = DB::table("projects")->join("programs","projects.program_id","=","programs.id")
            ->select("projects.*", "programs.name as name_program")->where("projects.applicant_id","=",$id)->get();
        return view('applicants.show', compact('applicant',"proyectos"));
    }
   public function create()
    {
        $cities= City::pluck('name','id');
        return view('applicants.create')->with('cities',$cities);
    }
  
  public function getCities(Request $request, $id){
        if($request->ajax()){
            $city = City::cities($id);
            return response()->json($city);
        }
    }
  
    public function store(Request $request)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'city' => 'required|max:4121|min:1',
            'ejido' => 'required|max:48356|min:1',
            'colony' => 'required',
            'street' => 'required',
            'number' => 'required',
            'zip' => 'required',
            
          ],[
            'first_name.required' => ' * Este campo es obligatorio.',
            'last_name.required' => ' * Este campo es obligatorio.',
            'second_last_name.required' => ' * Este campo es obligatorio.',
            'type.required' => ' * Este campo es obligatorio.',
            'phone.required' => ' * Este campo es obligatorio.',
            'city.required' => ' * Este campo es obligatorio.',
            'city.max' => ' * Favor de seleccionar un estado.',
            'city.min' => ' * Favor de seleccionar un estado.',
            'ejido.required' => ' * Este campo es obligatorio.',
            'ejido.max' => ' * Favor de seleccionar una ciudad.',
            'ejido.min' => ' * Favor de seleccionar una ciudad.',
            'colony.required' => ' * Este campo es obligatorio.',
            'street.required' => ' * Este campo es obligatorio.',
            'number.required' => ' * Este campo es obligatorio.',
            'zip.required' => ' * Este campo es obligatorio.',
            
          ]);
          
        if(Input::get('city') == "0"){
            Alert::error('Se debe seleccionar un estado', 'Error')->autoclose(4000);
            return redirect()->route('applicants.create');
          }
  
          $applicants = new Applicants;
  
          //Se obtienen los valores de la vista
          $applicants->first_name = Input::get('first_name');
          $applicants->last_name = Input::get('last_name');
          $applicants->second_last_name = Input::get('second_last_name');
          $applicants->type = Input::get('type');
          $applicants->phone = Input::get('phone');
          $applicants->city = Input::get('city');
          $applicants->ejido = Input::get('ejido');
          $applicants->colony = Input::get('colony');
          $applicants->street = Input::get('street');
          $applicants->number = Input::get('number');
          $applicants->zip = Input::get('zip');
          

  
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($applicants->save()) {
            Alert::success('Exitosamente','Solicitante Registrado')->autoclose(4000);
  
            insertToLog(Auth::user()->id, 'added', $applicants->id, "solicitante");
  
            return redirect()->route('applicants.list');
          } else {;
            Alert::error('No se registro el solicitante', 'Error')->autoclose(4000);
            return redirect()->route('applicants.list');
          }
    }
  
    public function edit(Applicants $id)
    {   
        
        $cities = City::pluck('name','id');
        
        return view('applicants.edit')->with('id',$id)->with('cities',$cities);
    }
  
    public function update(Applicants $applicant)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'city' => 'required|max:4121|min:1',
            'ejido' => 'required|max:48356|min:1',
            'colony' => 'required',
            'street' => 'required',
            'number' => 'required',
            'zip' => 'required',
            
          ],[
            'first_name.required' => ' * Este campo es obligatorio.',
            'last_name.required' => ' * Este campo es obligatorio.',
            'second_last_name.required' => ' * Este campo es obligatorio.',
            'type.required' => ' * Este campo es obligatorio.',
            'phone.required' => ' * Este campo es obligatorio.',
            'city.required' => ' * Este campo es obligatorio.',
            'city.max' => ' * Favor de seleccionar un estado.',
            'city.min' => ' * Favor de seleccionar un estado.',
            'ejido.required' => ' * Este campo es obligatorio.',
            'ejido.max' => ' * Favor de seleccionar una ciudad.',
            'ejido.min' => ' * Favor de seleccionar una ciudad.',
            'colony.required' => ' * Este campo es obligatorio.',
            'street.required' => ' * Este campo es obligatorio.',
            'number.required' => ' * Este campo es obligatorio.',
            'zip.required' => ' * Este campo es obligatorio.',
            
          ]);
          
        if(Input::get('city') == "0"){
            Alert::error('Se debe seleccionar un estado', 'Error')->autoclose(4000);
            return redirect()->route('applicants.create');
          }
  
  
          //Se obtienen los valores de la vista
          $applicant->first_name = Input::get('first_name');
          $applicant->last_name = Input::get('last_name');
          $applicant->second_last_name = Input::get('second_last_name');
          $applicant->type = Input::get('type');
          $applicant->phone = Input::get('phone');
          $applicant->city = Input::get('city');
          $applicant->ejido = Input::get('ejido');
          $applicant->colony = Input::get('colony');
          $applicant->street = Input::get('street');
          $applicant->number = Input::get('number');
          $applicant->zip = Input::get('zip');
      
        if ($applicant->update()) {
          
          Alert::success('Exitosamente','Solicitante Modificado')->autoclose(4000);

          insertToLog(Auth::user()->id, 'updated', $applicant->id, "solicitante");

          return redirect()->route('applicants.list');
        } else {
          Alert::error('No se modifico el solicitante', 'Error')->autoclose(4000);
          return redirect()->route('applicants.list');
        }
    }
  
     public function destroy(Applicants $applicant)
    {
       

        Alert::success('Exitosamente','Solicitante Eliminado')->autoclose(4000);

        insertToLog(Auth::user()->id, 'deleted', $applicant->id, "solicitante");
       
       
        $applicant->delete();

        return redirect()->route('applicants.list');
    }
  
}
