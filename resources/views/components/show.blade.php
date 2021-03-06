@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Detalles del Componente")


@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
@case(2)
		@section('bodyMonitoreo')
		@break
	@case(4)
		@section('bodyAtencionE')
		@break
	@case(5)
		@section('bodyAtencionG')
		@break
@endswitch
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont icofont-eye-alt bg-success"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Detalles del Componente: {{ $component->name }} </h4>
						<span style="text-transform: none;">Mostrando todos los detalles del componente seleccionado.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('components.list') }}">Componentes</a>
						</li>
						<li class="breadcrumb-item">Detalles del Componente
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Page-header end -->

	<!-- Page body start -->
	<div class="page-body">
		<div class="row">
			<div class="col-sm-12">
				<!-- Basic Form Inputs card start -->
				<div class="card">
					<div class="card-block">
						<h4 class="sub-title">Información General del Componente</h4>
						<div class="page-body">
							<div class="row">
								<div class="col-md-12 col-xl-12 ">
									<div class="card-block user-detail-card">
										<div class="row">
											<div class="col-sm-12 user-detail">
												
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-user"></i>Nombre:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30"> {{ $component->name }} </h6>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Fecha de inicio:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">
                              @if($component->start_date != null)
                              {{ $component->start_date }}
                              @else
                              Indefinido
                              @endif</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Fecha de cierre:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">
                            @if($component->finish_date != null)
                              {{ $component->finish_date }}
                              @else
                              Indefinido
                              @endif
                              </h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>URL:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30"><a href="{{ $component->vinculo }}" target="_blank">{{ $component->vinculo }}</a> </h6>
													</div>
												</div>
                        
                            <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Programa al que pertenece:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $component->program }}</h6>
													</div>
												</div>
                       
                    
												
												
											</div>
                      <br>
                      <div class="col-sm-12">
												<center>
													
													<div class="contact-icon">
														
															<form id="form" name="form" action="{{ route('components.destroy', ['id' => $component->id])}}" method="POST">
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Regresar"><i class="icofont icofont-arrow-left m-0"></i></button></a>
                                @if(Auth::user()->type == 1 || Auth::user()->type == 2 )
																<a href="{{ route('components.edit', ['id' => $component->id]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="icofont icofont-edit m-0"></i></button></a>
                                @endif
                                @if($component->path != null)
                                <a target="_blank" href="{{asset($component->path)}}" class="btn btn-default" title="Visualizar requerimientos especificos" ><span class="fas fa-eye"></span></a> 
                          <a href="{{url('/component/download',['id'=>$component->id])}}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Descargar requerimientos especificos"><span class="fas fa-download"></span></a>
                                @endif
                                @if(Auth::user()->type == 1)
																<button  onclick="archiveFunction()" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" type="submit" title="Eliminar"><span class="icofont icofont-ui-delete"></span></button>
                                @endif
															</form>
														
													</div>
												</center>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection