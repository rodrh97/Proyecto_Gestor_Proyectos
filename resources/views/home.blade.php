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
  <div class="row">
     <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#087bb6;">
            <div class="card-block-small text-center">
              <h4>Solicitantes</h4>
                <h1>{{$solicitantes}}</h1>
                
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#18abbc;">
            <div class="card-block-small text-center">
              <h4>Proyectos</h4>
                <h1>{{$proyectos}}</h1>
                
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>
    </div>
    
    </div>
  <div class="row">
  <div class="col-sm-12">
        <div class="card text-white widget-visitor-card" style="background-color:#084d90;">
            <div class="card-block-small text-center">
              <h4>Programas registrados en el sistema</h4>
                <h1>{{$programas}}</h1>
                
                <i class="fas fa-th-list"></i>
            </div>
        </div>
    </div>
  </div>
  
<div class="row">
    <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#7d8a92;">
            <div class="card-block-small text-center">
              <h4>Programas con reglas de operación</h4>
                <h1>{{$programasCRO}}</h1>
                
                <i class="fa fa-lock"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#c6c5c5;">
            <div class="card-block-small text-center">
              <h4>Programas sin reglas de operación</h4>
                <h1>{{$programasSRO}}</h1>
                
                <i class="fa fa-unlock-alt"></i>
            </div>
        </div>
    </div>
    
    
    </div>
    
    
</div>
@endsection