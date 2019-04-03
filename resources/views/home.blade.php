@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")

@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
	@case(2)
		@section('bodyMonitoreo')
		@break
	@case(3)
		@section('bodyVinculacion')
		@break
	@case(4)
		@section('bodyAtencionE')
		@break
	@case(5)
		@section('bodyAtencionG')
		@break
@endswitch

<div class="page-body">
           
  </div>
@endsection