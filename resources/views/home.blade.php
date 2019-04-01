@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")

@switch(Auth::user()->type)
    @case(1)
      @section('body')
        <div class="page-body">

        </div>
      @endsection


      @break
    @case(5)
      @section('bodyEmpleado')
        <div class="page-body">
          
         
           
        </div>

      @endsection
      @break
@endswitch