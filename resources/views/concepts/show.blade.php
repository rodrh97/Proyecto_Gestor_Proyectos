@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Detalles del Concepto")

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
					<i class="icofont icofont-eye-alt bg-success" ></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Detalles del Concepto: {{ $concept->name }} </h4>
						<span style="text-transform: none;">Mostrando todos los detalles del concepto seleccionado.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('concepts.list') }}">Conceptos</a>
						</li>
						<li class="breadcrumb-item">Detalles del Concepto
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
						<h4 class="sub-title">Información General del Concepto</h4>
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
														<h6 class="m-b-30"> {{ $concept->name }} </h6>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Cantidad Máxima por Persona Física:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $concept->p_amount_max }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Cantidad Máxima por Persona Moral:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $concept->m_amount_max }}</h6>
													</div>
												</div>
                        @if($concept_count_1 == 1 && $concept_count_2==0)
                            <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Nombre del componente:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $concept->component_name }}</h6>
													</div>
												</div>
                        @endif
                        @if($concept_count_1 == 0 && $concept_count_2==1)
                            <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Nombre del subcomponente:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $concept->sub_component_name }}</h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Nombre de su componente:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $concept->component_name }}</h6>
													</div>
												</div>
                        @endif
                    
												
												
											</div>
                      <br>
                      <div class="col-sm-12">
												<center>
													
													<div class="contact-icon">
														
															<form id="form" name="form" action="{{ route('concepts.destroy', ['id' => $concept->id])}}" method="POST">
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Regresar"><i class="icofont icofont-arrow-left m-0"></i></button></a>
																@if(Auth::user()->type == 1 || Auth::user()->type == 2 )
                                <a href="{{ route('concepts.edit', ['id' => $concept->id]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="icofont icofont-edit m-0"></i></button></a>
                                 @endif
                                <a target="_blank" href="{{asset($concept->specific_requirements)}}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Visualizar archivo" ><span class="fas fa-eye"></span></a>
                                <a href="{{url('/concept/download',['id'=>$concept->id])}}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Descargar archivo de requerimientos especificos"><span class="fas fa-download"></span></a>
																@if(Auth::user()->type == 1 )
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