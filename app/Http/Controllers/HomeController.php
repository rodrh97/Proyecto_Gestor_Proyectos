<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
            $solicitantes = DB::table("applicants")->count();
              $proyectos  = DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("programasSRO",$programasSRO);
            break;
        case 2: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("programasSRO",$programasSRO);
            break;
         case 3: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("programasSRO",$programasSRO);
            break;
         case 4: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("programasSRO",$programasSRO);
            break;
         case 5: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("programasSRO",$programasSRO);
            break;
         
     
        default:
          return view('noaccess');
          break;
      }
    }
}
