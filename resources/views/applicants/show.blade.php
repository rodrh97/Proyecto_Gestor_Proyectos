@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Detalles del Solicitante")


@switch(Auth::user()->type)
	@case(1)
		@section('body')
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
					<i class="icofont icofont-eye-alt" style="background-color:#FFB64D"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Detalles del Solicitante: {{ $applicant->first_name }} {{ $applicant->last_name }} {{ $applicant->second_last_name }}</h4>
						<span style="text-transform: none;">Mostrando todos los detalles del solicitante seleccionado.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('applicants.list') }}">Solicitantes</a>
						</li>
						<li class="breadcrumb-item">Detalles del Solicitante
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
						<h4 class="sub-title">Información General del Solicitante</h4>
						<div class="page-body">
							<div class="row">
								<div class="col-md-12 col-xl-12 ">
									<div class="card-block user-detail-card">
										<div class="row">
											<div class="col-sm-12 user-detail">
												
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-hashtag"></i>ID:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->id }}</h6>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-user"></i>Nombre Completo:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30"> {{ $applicant->first_name }} {{ $applicant->last_name }} {{ $applicant->second_last_name }}</h6>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Tipo:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">Persona {{ $applicant->type }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-phone"></i>Teléfono:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->phone }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-map"></i>Ciudad:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->city_name }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-map"></i>Localidad:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->ejido }}</h6>
													</div>
												</div>
                        
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-map-marked-alt"></i>Colonia:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->colony }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-map-marked-alt"></i>Calle:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->street }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-map-marked-alt"></i>Número de casa:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->number }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-hashtag"></i>Código Postal:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $applicant->zip }}</h6>
													</div>
												</div>
												
                        <br><br><br>
                        <h5><strong>Proyectos</strong></h5><br>
                        
                        @if($proyectos->isNotEmpty())
                      <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="base-style" class="table table-striped table-bordered ">
                       
                                  <thead>
                                      <tr>
                                          <th style="width:30%">Ver</th>
                                          <th style="width:50%">Solicitado en el programa</th>
                                          <th style="width:20%">Ver</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      
                                          @foreach($proyectos as $proyecto)
                                    <tr>
                                      @if($proyecto->folio == null)
                                        <td>Folio externo no ingresado</td> 
                                      @else
                                      <td>{{$proyecto->folio}}</td>
                                      @endif
                                     
                                        <td>{{$proyecto->name_program}}</td>
                                        
                                          <td><center><a href="{{ route('projects.show',['id'=>$proyecto->id])}}" class="btn btn-inverse col-lg-5" title="Visualizar información del proyecto" ><span class="fas fa-eye"></span></a> </center></td>
                                        
                                      </tr>
                                         @endforeach
                                      
                                      
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        @else
                        <center>
                          <div class="alert alert-warning icons-alert">
                            <strong>Sin proyectos</strong>
                            <p>El solicitante no posee proyectos.</p>
                          </div>
                        </center>
                        @endif
                        
											</div>
                      
                      
                      <br><br>

                      
                      <div class="col-sm-12">
												<center>
													
													<div class="contact-icon">
														
															<form id="form" name="form" action="{{ route('applicants.destroy', ['id' => $applicant->id])}}" method="POST">
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Regresar"><i class="icofont icofont-arrow-left m-0"></i></button></a>
																@if(Auth::user()->type == 1 || Auth::user()->type == 4 )
                                <a href="{{ route('applicants.edit', ['id' => $applicant->id]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="icofont icofont-edit m-0"></i></button></a>
																 @endif
                                @if(Auth::user()->type == 1 || Auth::user()->type == 4)
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