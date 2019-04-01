@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Detalles del Usuario")

@section('body')
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont icofont-eye-alt  bg-danger"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Detalles del Usuario: {{ $user->first_name }} {{ $user->last_name }} {{ $user->second_last_name }}</h4>
						<span style="text-transform: none;">Mostrando todos los detalles del usuario seleccionado.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('users.list') }}">Usuarios</a>
						</li>
						<li class="breadcrumb-item">Detalles de Usuario
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
						<h4 class="sub-title">Información General</h4>
						<div class="page-body">
							<div class="row">
								<div class="col-md-12 col-xl-12 ">
									<div class="card-block user-detail-card">
										<div class="row">
											<div class="col-sm-4">
												<center>
													<img id="modal_img" src='{{ asset($user->image_url)}}' alt="{{ $user->first_name }} {{ $user->last_name }} {{ $user->second_last_name }}" class="img-fluid p-b-10 rounded" style="width:100%;max-width:300px">
													<div id="modal_show_img" class="modal">
														<span class="close">&times;</span>
														<img class="modal-content" id="img_content">
														<div id="caption"></div>
													</div>
													<div class="contact-icon">
														
															<form id="form" name="form" action="{{ route('users.destroy', ['id' => $user->id])}}" method="POST">
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Regresar"><i class="icofont icofont-arrow-left m-0"></i></button></a>
																<a href="{{ route('users.edit', ['id' => $user->id]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="icofont icofont-edit m-0"></i></button></a>
																<button  onclick="archiveFunction()" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" type="submit" title="Eliminar"><span class="icofont icofont-ui-delete"></span></button>
															</form>
														
													</div>
												</center>
											</div>
											<div class="col-sm-8 user-detail">
												
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-user"></i>Nombre Completo:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30"> {{ $user->first_name }} {{ $user->last_name }} {{ $user->second_last_name }}</h6>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Oficina:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $user->office }}</h6>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Email:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $user->email }}</h6>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-users-alt-5"></i>Tipo de Usuario :</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">
															@switch($user->type)
																@case(1)
																	Administrador
																	@break
																@case(2)
																	Empleado
																	@break
																@endswitch
														</h6>
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
	</div>
</div>
@endsection
