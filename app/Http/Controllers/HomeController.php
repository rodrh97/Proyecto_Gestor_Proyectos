<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Career;
use App\Student;
use App\User;
use App\Skills;
use App\company;
use Alert;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Funcion para mostrar los datos del dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      switch (Auth::user()->type) {
        case 1: //INFORMACION DASHBOARD PARA ADMINISTRADORES
            
            //Redirecciona a ls vista home o de dashboard
            return view('home');
            break;
        case 2: //INFORMACION DASHBOARD PARA Empleados
         
            return view('noaccess');
            break;
          
     
        default:
          return view('noaccess');
          break;
      }
    }
}
