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

use App\Components;
use App\Concepts;
use App\Sub_Components;
use App\Programs;

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

  
    public function buscar(Request $request){
      $palabra = $request->word;
      
      $programas_sin_reglas = DB::table("programs")->where("name","LIKE","%$palabra%")->where("operation_rules","=",0)->get();
      $programas_con_reglas = DB::table("programs")->where("name","LIKE","%$palabra%")->where("operation_rules","=",1)->get();
      $componentes = DB::table("components")->where("name","LIKE","%$palabra%")->get();
      $subcomponentes = DB::table("sub_components")->where("name","LIKE","%$palabra%")->get();
      $conceptos = DB::table("concepts")->where("name","LIKE","%$palabra%")->get();
      
      return response()->json(['programas_sin_reglas'=>$programas_sin_reglas,"programas_con_reglas"=>$programas_con_reglas,"componentes"=>$componentes,"subcomponentes"=>$subcomponentes,"conceptos"=>$conceptos]);
    }
    /**
     * Funcion para mostrar los datos del dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fecha = date('Y-m-d');
      
      switch (Auth::user()->type) {
        case 1: //INFORMACION DASHBOARD PARA ADMINISTRADORES
            $solicitantes = DB::table("applicants")->count();
              $proyectos  = DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
          
          $fechas_programas = Programs::where("operation_rules","=",0)->where("finish_date",">=",$fecha)->get();
          $fechas_componentes = DB::table('components')->where("finish_date",">=",$fecha)->get();
          $fechas_subcomponentes = DB::table('sub_components')->where("finish_date",">=",$fecha)->get();
          
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("fechas_programas",$fechas_programas)
              ->with("fechas_componentes",$fechas_componentes)
              ->with("fechas_subcomponentes",$fechas_subcomponentes)
              ->with("programasSRO",$programasSRO);
            break;
        case 2: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
          $fechas_programas = Programs::where("operation_rules","=",0)->where("finish_date",">=",$fecha)->get();
          $fechas_componentes = DB::table('components')->where("finish_date",">=",$fecha)->get();
          $fechas_subcomponentes = DB::table('sub_components')->where("finish_date",">=",$fecha)->get();
          
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("fechas_programas",$fechas_programas)
              ->with("fechas_componentes",$fechas_componentes)
              ->with("fechas_subcomponentes",$fechas_subcomponentes)
              ->with("programasSRO",$programasSRO);
            break;
         case 3: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
          $fechas_programas = Programs::where("operation_rules","=",0)->where("finish_date",">=",$fecha)->get();
          $fechas_componentes = DB::table('components')->where("finish_date",">=",$fecha)->get();
          $fechas_subcomponentes = DB::table('sub_components')->where("finish_date",">=",$fecha)->get();
          
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("fechas_programas",$fechas_programas)
              ->with("fechas_componentes",$fechas_componentes)
              ->with("fechas_subcomponentes",$fechas_subcomponentes)
              ->with("programasSRO",$programasSRO);
            break;
         case 4: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
          $fechas_programas = Programs::where("operation_rules","=",0)->where("finish_date",">=",$fecha)->get();
          $fechas_componentes = DB::table('components')->where("finish_date",">=",$fecha)->get();
          $fechas_subcomponentes = DB::table('sub_components')->where("finish_date",">=",$fecha)->get();
          
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("fechas_programas",$fechas_programas)
              ->with("fechas_componentes",$fechas_componentes)
              ->with("fechas_subcomponentes",$fechas_subcomponentes)
              ->with("programasSRO",$programasSRO);
            break;
         case 5: //INFORMACION DASHBOARD PARA Empleados
           $solicitantes =DB::table("applicants")->count();
              $proyectos =DB::table("projects")->count();
          $programas =DB::table("programs")->count();
          $programasCRO =DB::table("programs")->where("operation_rules","=",1)->count();
          $programasSRO =DB::table("programs")->where("operation_rules","=",0)->count();
          $fechas_programas = Programs::where("operation_rules","=",0)->where("finish_date",">=",$fecha)->get();
          $fechas_componentes = DB::table('components')->where("finish_date",">=",$fecha)->get();
          $fechas_subcomponentes = DB::table('sub_components')->where("finish_date",">=",$fecha)->get();
          
            //Redirecciona a ls vista home o de dashboard
            return view('home')->with("solicitantes",$solicitantes)
              ->with("proyectos",$proyectos)
              ->with("programas",$programas)
              ->with("programasCRO",$programasCRO)
              ->with("fechas_programas",$fechas_programas)
              ->with("fechas_componentes",$fechas_componentes)
              ->with("fechas_subcomponentes",$fechas_subcomponentes)
              ->with("programasSRO",$programasSRO);
            break;
         
     
        default:
          return view('noaccess');
          break;
      }
    }
}
