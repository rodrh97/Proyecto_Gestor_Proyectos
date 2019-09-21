<?php

namespace App\Http\Controllers;

use Alert;
use App\Glosary;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class GlosarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $glosary = Glosary::all();

        return view('glosario.list')
          ->with('glosary',$glosary)
          ->with('title', 'Glosario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('glosario.create');
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
            'definicion' => 'required|max:1000',
          ],[
            'name.required' => ' * Este campo es obligatorio.',
            'name.max' => ' * Este campo debe contener sólo 128 caracteres.',
            'definicion.required' => ' * Este campo es obligatorio.',
            'definicion.max' => ' * Este campo puede contener sólo 1000 caracteres.',
          ]);
  
          //Se crea una nueva habilidad
          $palabra = new Glosary;
  
          //Se obtienen los valores de la vista
          $palabra->word = Input::get('name');
          $palabra->definition = Input::get('definicion');
          
          $palabra_repetida1 = strtolower(Input::get("name"));
            
          $palabras = Glosary::all();
          foreach($palabras as $p){
            $palabra_repetida2 = strtolower($p->word);
            if($palabra_repetida1 == $palabra_repetida2){
              Alert::error('La palabra deseada ya se encuentra registrada', 'Palabra duplicada')->autoclose(5000);
              return redirect()->route('glosario.create');
            }
          }
  
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($palabra->save()) {
            Alert::success('Exitosamente','Palabra Añadida')->autoclose(4000);
  
            insertToLog(Auth::user()->id, 'added', $palabra->id, "palabra");
  
            return redirect()->route('glosario.list');
          } else {
            Alert::error('No se añadió la palabra', 'Error')->autoclose(4000);
            return redirect()->route('glosario.list');
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
        $word = Glosary::find($id);
      return view("glosario.show")->with("word",$word);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Glosary $word)
    {
        return view('glosario.edit', ['word' => $word]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Glosary $word)
    {
        $data = request()->validate([
            'name' => 'required|max:128',
            'definicion' => 'required|max:1000',
          ],[
            'name.required' => ' * Este campo es obligatorio.',
            'name.max' => ' * Este campo debe contener sólo 128 caracteres.',
            'definicion.required' => ' * Este campo es obligatorio.',
            'definicion.max' => ' * Este campo puede contener sólo 1000 caracteres.',
          ]);
  
  
          //Se obtienen los valores de la vista
          $word->word = Input::get('name');
          $word->definition = Input::get('definicion');

  
          //Se almacena y se muestran mensajes en caos de registro exitoso
          if ($word->update()) {
            Alert::success('Exitosamente','Palabra Modificada')->autoclose(4000);
  
            insertToLog(Auth::user()->id, 'updated', $word->id, "palabra");
  
            return redirect()->route('glosario.list');
          } else {
            Alert::error('No se modificó la palabra', 'Error')->autoclose(4000);
            return redirect()->route('glosario.list');
          }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Glosary $word)
    {
        $id = $word->id;
        if($word->delete()){
          Alert::success('Exitosamente','Palabra Eliminada')->autoclose(4000);

          insertToLog(Auth::user()->id, 'deleted', $id, "palabra");

          return redirect()->route('glosario.list');
        }else{
          Alert::error('No se eliminó la palabra', 'Error')->autoclose(4000);
            return redirect()->route('glosario.list');
        }
    }
}
