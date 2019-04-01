@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos ")

@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
	@case(2)
		@section('bodyEmpleado')
		@break
@endswitch

<!-- Main-body start -->
<div class="main-body">
	<!-- Page-body start -->
	<div class="page-body">
		<!--profile cover start-->
		<div class="row">
			<div class="col-lg-12">
				<div class="cover-profile">
					<div class="profile-bg-img">
						<img class="profile-bg-img img-fluid" src="{{asset('assets/images/user-profile/fondo19.jpg')}}" style="width: 1660px; height: 300px;" alt="bg-img">
						<div class="card-block user-info">
							<div class="col-md-12">
								<div class="media-left">
									<a class="profile-image">
										<img id="modal_img" src='{{ asset($user->image_url)}}' alt="{{ $user->first_name }} {{ $user->last_name }} {{ $user->second_last_name }}" class="img-fluid p-b-10 rounded" style="width:150px; height: 150px;">
										<div id="modal_show_img" class="modal">
											<span class="close">&times;</span>
											<img class="modal-content" id="img_content">
											<div id="caption"></div>
										</div>
									</a>
								</div>
								<div class="media-body row">
									<div class="col-lg-12">
										<div class="user-title">
											<h2> {{ $user->first_name }}</h2>
											<h2>{{ $user->last_name }} {{ $user->second_last_name }}</h2>
											@switch($user->type)
												@case(1)
												<span class="text-white">Administrador</span>
												@break
												
												@case(2)
												<span class="text-white">Monitoreo y difusión</span>
												@break
                      
                      @case(3)
												<span class="text-white">Vinculación estratégica</span>
												@break
                      
                      @case(4)
												<span class="text-white">Atención específica</span>
												@break
                      
                      @case(5)
												<span class="text-white">Atención general</span>
												@break
												@endswitch
										</div>
									</div>
									<div>
										<div class="pull-right cover-btn">
											<a href="{{ route('profile.edit') }}" title="Editar Perfil"><button type="button" class="btn btn-warning m-r-10 m-b-5"><i class="icofont icofont-ui-edit"></i> Editar Perfil</button></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--profile cover end-->
		<div class="row">
			<div class="col-lg-12">
				<!-- tab header end -->
				<!-- tab content start -->
				<div class="tab-content">
					<!-- tab panel personal start -->
					<div class="tab-pane active" id="personal" role="tabpanel">
						<!-- personal card start -->
						<div class="card">
							<div class="card-header">
								<h4 class="sub-title"><strong>Información General</strong></h4>
							</div>
							<div class="card-block">
								<div class="view-info">
									<div class="row">
										<div class="col-lg-12">
											<div class="general-info">
												<div class="row">
													<div class="col-lg-12 col-xl-6">
														<div class="table-responsive">
															<table class="table m-0">
																<tbody>
																
																	<tr>
																		<th scope="row">Nombre(s): </th>
																		<td>{{ $user->first_name }}</td>
																	</tr>
																	<tr>
																		<th scope="row">Apellido Paterno: </th>
																		<td>{{ $user->last_name }}</td>
																	</tr>
																	@if (!(is_null($user->second_last_name)))
																	<tr>
																		<th scope="row">Apellido Materno: </th>
																		<td>{{ $user->second_last_name }}</td>
																	</tr>
																	@endif
																	
																</tbody>
															</table>
														</div>
													</div>
													<!-- end of table col-lg-6 -->
													<div class="col-lg-12 col-xl-6">
														<div class="table-responsive">
															<table class="table">
																<tbody>
																	
																	<tr>
																		<th scope="row">Correo Electrónico: </th>
																		<td>{{ $user->email }}</td>
																	</tr>
																	
																	<tr>
																		<th scope="row">Tipo de Usuario: </th>
																		@switch($user->type)
																			@case(1)
																			<td>Administrador</td>
																			@break
																			@case(2)
																			<td>Monitoreo y difusión</td>
																			@break
                                    @case(3)
																			<td>Vinculación estratégica</td>
																			@break
                                    @case(4)
																			<td>Atención específica</td>
																			@break
                                    @case(5)
																			<td>Atención general</td>
																			@break
																			@endswitch
																	</tr>
                                  
                                  	<tr>
                                      <th scope="row">Oficina: </th>
                                      <td>{{ $user->office }}</td>
                                    </tr>

																</tbody>
															</table>
														</div>
													</div>
													<!-- end of table col-lg-6 -->
												</div>
												<!-- end of row -->
											</div>
											<!-- end of general info -->
										</div>
										<!-- end of col-lg-12 -->
									</div>
									<!-- end of row -->
								</div>
								<!-- end of view-info -->
							</div>
							<!-- end of card-block -->
						</div>
					</div>
					<!-- tab pane personal end -->
				</div>
				<!-- tab content end -->
			</div>
		</div>
	</div>
	<!-- Page-body end -->

	@endsection
