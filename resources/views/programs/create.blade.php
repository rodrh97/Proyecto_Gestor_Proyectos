@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")

@section('body')
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fa fa-plus bg-success" ></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Añadir Programa</h4>
						<span style="text-transform: none;">Favor de seleccionar si el programa estará sujeto a reglas de operación o no.</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="page-header-breadcrumb">
					<ul class="breadcrumb-title">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">
								<i class="icofont icofont-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item"><a href="{{ route('programs.list') }}">Programas</a>
						</li>
						<li class="breadcrumb-item">Añadir Programa
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Page-header end -->

	<!-- Page-body start -->
	<div class="page-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-block">
            <br>
						<div class="row">
             <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <a href="{{ route('programs.createWithRulesOperation')}}">
                  <div class="card bg-inverse text-white widget-visitor-card">
                      <div class="card-block-small text-center"><br>
                          <h4>Añadir programa sujeto a reglas de operación </h4>
                          <i class="fa fa-lock"></i><br>
                      </div>
                  </div>
                 </a>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                 <a href="{{route('programs.createWithoutRulesOperation')}}">
                  <div class="card bg-inverse text-white widget-visitor-card">
                      <div class="card-block-small text-center"><br>
                          <h4>Añadir programa sin reglas de operación</h4>
                          <i class="fa fa-unlock-alt"></i><br>
                      </div>
                  </div>
                 </a>
              </div>
            </div>
            
            
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
