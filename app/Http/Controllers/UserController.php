<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use App\Career;
use App\Student;
use App\Teacher;
use App\Http\Requests;
use App\Helpers\DeleteHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Listar los usuarios registrados en el sistema
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consulta de todos usuarios a la BD(excluyendo al tipo de usuario 99)
        $users = DB::table('users')->where('id', '!=', 1)->get();

        return view('users.list')
          ->with('users', $users);
    }

    /**
     * Muestra un registro dependiendo de su id
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se busca en todos los registros el usuario con el id mandado
        $user = DB::table('users')->where('id','=',$id)->first();//User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Muestra el perfil personal del usuario en sesion activa
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function showOwnProfile()
    {
        //Se obtiene el id del usuario con la sesion activa
        $id=Auth::user()->id;

        switch(Auth::user()->type){
            case 1:
            case 2:
                $user = DB::table('users')->where('id', '=', $id)->first();
                break;
        }

        return view('profile.show', compact('user'));
    }

    

    public function create()
    {
        $user_type = DB::table("users_types")->get();
        return view('users.create')->with("user_type",$user_type);
    }

  
    //Se prepara el almacenado de un usuario
    public function store(Request $request)
    {
        
          //Validaciones requeridas
          $data = request()->validate([
              'first_name' => 'required|max:60',
              'last_name' => 'required|max:60',
              'password' => 'required|max:128',
              'email' => 'required|max:128',
              'oficina' => 'required',
          ], [
              'first_name.required' => ' * Este campo es obligatorio.',
              'first_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
              'last_name.required' => ' * Este campo es obligatorio.',
              'last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
              'password.required' => ' * Este campo es obligatorio.',
              'password.max' => ' * Este campo debe contener sólo 128 caracteres.',
              'oficina.required' => ' * Este campo es obligatorio.',
              'email.required' => ' * Este campo es obligatorio.',
          ]);
        

        $user = new User;
        //Se crea una nueva instancia de usuario
        $email_count=DB::table('users')
          ->count();
       $email=User::all();
        $flag=0;
        for($i=0;$i<$email_count;$i++){
          if($email[$i]->email==$user->email = Input::get('email')){
            $flag=1;
          }
          
        }
      
        

        if($flag==0){
          //Se llena el usuario con los datos ingresados en la vista
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->second_last_name = Input::get('second_last_name');
        $user->password = bcrypt(Input::get('password'));
        $user->email = Input::get('email');
        $user->type = Input::get('type');
        $user->office = Input::get('oficina');
        //Se carga la imagen subida
        $image = Input::file('image');
        //Si se ingreso una imagen a guardar, entonces la guarda en storage en la carpeta de users
        if ($image!=null) {
            //Almacenando la imagen del alumno
            $path=$request->file('image')->store('/public/users');
            $user->image_url = 'storage/users/'.$request->file('image')->hashName();
        }

        //dd($user);
        //Se muestran los mensajes de cofirmacion para cada tipo de usuario y se realiza
        //el almacenamiento necesario para cada tipo de usuario
        if ($user->type == 1) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Administrador Registrado');
            insertToLog(Auth::user()->id, 'added', Input::get('user_id'), "usuario");
            return redirect()->route('users.list');
        } elseif ($user->type == 2 || $user->type == 3 || $user->type == 4 || $user->type == 5 ) {   //En caso de que sea usuario(depto. tutorias)
            $user->save();
            Alert::success('Exitosamente', 'Empleado Registrado');
            insertToLog(Auth::user()->id, 'added', Input::get('user_id'), "usuario");
            return redirect()->route('users.list');
        }
          
        }else{
            Alert::error('Ya existe ese correo en el sistema', 'Error')->autoclose(4000);
            return redirect()->route('users.list');
        }
      
    }

    /**
     * Permite la edicion de un usuario mandado como parametro
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
              $user_type = DB::table("users_types")->get();

        return view('users.edit', compact('user','user_type'));
    }

    /**
     * Permite la edicion de un usuario mandado como parametro
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editOwnProfile()
    {
        $user = DB::table('users')->where('id', '=', Auth::user()->id)->first();//User::find(Auth::user()->id);
        return view('profile.edit', compact('user'));
    }

    /**
     * Permite realizar el actualizado del usuario en la base de datos
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'first_name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'oficina' => 'required',
        ], [
            
            'first_name.required' => ' * Este campo es obligatorio.',
            'first_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
            'last_name.required' => ' * Este campo es obligatorio.',
            'last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
            'oficina.required' => ' * Este campo es obligatorio.',
        ]);

        //Se cargan todos los datos mandados de la vista
        
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->second_last_name = Input::get('second_last_name');
        $user->type = Input::get('type');
        $user->office = Input::get('oficina');
        
        //Imagen nueva(mandada atraves del file input)
        $image = Input::file('image');
        //Imagen actual(registrada en la base de datos)
        $image2 = Input::get('image_2');

        //Se actualiza el usuario
        $user->update();
        //Si el usuario cambia la contraseña, se actualiza, es caso contrario se queda como estaba guardada
        if (Input::get('password') != null) {
            $password = bcrypt(Input::get('password'));
            DB::update('UPDATE users SET password = ? WHERE id = ?', [$password, $user->id]);
        }
        //Actualizar imagen, eliminando la anterior
        if ($image!=null) {
            if ($image2!='storage/no_image.png') {
                //Se realiza el eliminado de la imagen de la direccion fisica de
                //la imagen en el disco duro
                unlink(public_path()."/".$image2);
            }
            //Se realiza el almacenado de la nueva imagen(cargada en el file input)
            $path=Input::file('image')->store('/public/users');
            //Se obtiene el nombre de la imagen
            $image_url = 'storage/users/'.Input::file('image')->hashName();
            //Se realiza la nueva actualizacion al registro del usuario actual con el
            //nombre de la nueva imagen
            DB::update('UPDATE users SET image_url = ? WHERE id = ?', [$image_url, $user->id]);
        }

        if ($user->type == 1) {             //En caso de que el usuario sea administrador
            Alert::success('Exitosamente', 'Administrador Modificado');
            insertToLog(Auth::user()->id, 'updated', Input::get('id'), "usuario");
            return redirect()->route('users.list');
        } elseif ($user->type == 2 || $user->type == 3 || $user->type == 4 || $user->type == 5) {        
            Alert::success('Exitosamente', 'Empleado Modificado');
            insertToLog(Auth::user()->id, 'updated', Input::get('id'), "usuario");
            return redirect()->route('users.list');
        }
    }

    /**
     * Permite realizar la actualizacion del usuario en sesion
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateOwnProfile(User $user)
    {
        //Se obtiene el id del usuario en sesion
        $user_id = Auth::user()->id;
        $user = User::find(Auth::user()->id);


        //En caso de que el usuario que modifique su perfil no sea administrador
        //este sera forzado a usar solamente numeros en su university_id
        
            //Validaciones a los datos de entrada
            $data = request()->validate([
                'first_name' => 'required|max:60',
                'last_name' => 'required|max:60',
                'oficina' => 'required',
            ], [
                'id.required' => ' * Este campo es obligatorio.',
                'id.max' => ' * Este campo debe contener sólo 191 caracteres.',
                'first_name.required' => ' * Este campo es obligatorio.',
                'first_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
                'last_name.required' => ' * Este campo es obligatorio.',
                'last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
                'oficina.required' => ' * Este campo es obligatorio.',
            ]);
        

            //Se cargan todos los datos mandados de la vista
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->second_last_name = Input::get('second_last_name');
            $user->type = Auth::user()->type;
            $user->office = Input::get('oficina');

        //Imagen nueva(mandada atraves del file input)
        $image = Input::file('image');
        //Imagen actual(registrada en la base de datos)
        $image2 = Input::get('image_2');

        //Se actualiza el usuario
        $user->update();
        //Si el usuario cambia la contraseña, se actualiza, es caso contrario se queda como estaba guardada
        if (Input::get('password') != null) {
            $password = bcrypt(Input::get('password'));
            DB::update('UPDATE users SET password = ? WHERE id = ?', [$password, $user_id]);
        }


        //Actualizar imagen, eliminando la anterior
        if ($image!=null) {
            if ($image2!='storage/no_image.png') {
                //Se realiza el eliminado de la imagen de la direccion fisica de
                //la imagen en el disco duro
                unlink(public_path()."/".$image2);
            }
            //Se realiza el almacenado de la nueva imagen(cargada en el file input)
            $path=Input::file('image')->store('/public/users');
            //Se obtiene el nombre de la imagen
            $image_url = 'storage/users/'.Input::file('image')->hashName();
            //Se realiza la nueva actualizacion al registro del usuario actual con el
            //nombre de la nueva imagen
            DB::update('UPDATE users SET image_url = ? WHERE id = ?', [$image_url, $user_id]);
        }

        if ($user->type == 1) {             //En caso de que el usuario sea administrador
            Alert::success('Exitosamente', 'Perfil Modificado');
            return redirect()->route('profile.show_own_profile');
        } else{        //En caso de que sea usuario(depto. tutorias)
            Alert::success('Exitosamente', 'Perfil Modificado');
            return redirect()->route('profile.show_own_profile');
        }
    }

    /**
     * Permite el borrado(logico de un usuario)
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    { 
        if ($user->type == 1) {             //En caso de que sea administrador
            Alert::success('Exitosamente', 'Administrador Eliminado');
            insertToLog(Auth::user()->id, 'deleted', $user->id, "usuario");
            $user->delete();
            return redirect()->route('users.list');
        } else{
            Alert::success('Exitosamente', 'Empleado Eliminado');
            insertToLog(Auth::user()->id, 'deleted', $user->id, "usuario");
            $user->delete();
            return redirect()->route('users.list');
        }
    }

    /**
     * Restaurar(de manera logica) el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        //Se llama el delete helper que realiza el restaurado logico
        DeleteHelper::instance()->restoreLogicalDelete('users', 'id', $request->id);

        Alert::success('Exitosamente', 'Usuario Restaurado');
        insertToLog(Auth::user()->id, 'recover', $request->id, "usuario");
        return redirect()->route('users.list');
    }
}
