@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Crear Usuario")

@section('body')

<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fas fa-user-plus  bg-danger"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Crear Usuario</h4>
						<span style="text-transform: none;">Llene los campos solicitados en la parte inferior para agregar un nuevo usuario.</span>
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
						<li class="breadcrumb-item">Crear Usuario
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
						<form id="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
							{!! csrf_field() !!}
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="type">Tipo de Usuario</label>
								<div class="col-sm-10">
									<select id="type" name="type" class="form-control">
                    
										<option value="1" {{ (old("type") == 1 ? "selected":"") }}>Administrador</option>
										<option value="2" {{ (old("type") == 2 ? "selected":"") }}>Monitoreo y difusión</option>
                    <option value="3" {{ (old("type") == 3 ? "selected":"") }}>Vinculación estratégica</option>
                    <option value="4" {{ (old("type") == 4 ? "selected":"") }}>Atención específica</option>
                    <option value="5" {{ (old("type") == 5 ? "selected":"") }}>Atención general</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="oficina">Oficina:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="oficina" placeholder="Oficina" title="Oficina" value="{{ old('oficina') }}">
									@if ($errors->has('oficina'))
										<div class="col-form-label" style="color:red;">{{$errors->first('oficina')}}</div>
									@endif
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="first_name" placeholder="Nombre(s)" title="Nombre o Nombres del Usuario" value="{{ old('name') }}">
									@if ($errors->has('first_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('first_name')}}</div>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="last_name">Apellido Paterno:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="last_name" placeholder="Apellido Paterno" title="Apellido Paterno del Usuario" value="{{ old('last_name') }}">
									@if ($errors->has('last_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('last_name')}}</div>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="second_last_name">Apellido Materno:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="second_last_name" placeholder="Apellido Materno" title="Apellido Materno del Usuario" value="{{ old('second_last_name') }}">
									<div class="col-form-label"> * En caso, de solo tener un apellido, solo llene el campo de Apellido Paterno</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="email">E-mail:</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="email" placeholder="Email" title="Email del Nuevo Usuario" value="{{ old('email') }}">
									@if ($errors->has('email'))
										<div class="col-form-label" style="color:red;">{{$errors->first('email')}}</div>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="password">Contraseña:</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="password" placeholder="Contraseña" title="Contraseña del Nuevo Usuario" value="{{ old('password') }}">
									@if ($errors->has('password'))
										<div class="col-form-label" style="color:red;">{{$errors->first('password')}}</div>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Imagen:</label>
								<div class="col-sm-10">
									<div class="file-upload">
										<div class="image-upload-wrap">
											<input id="image_input" class="file-upload-input" type='file' name="image" onchange="readURL(this);" accept="image/*" />
											<div style="padding-top:40px" onclick="$('.file-upload-input').trigger('click' )">
												<center>
													<i style="font-size: 60px;" class="fas fa-cloud-upload-alt drag-icon"></i>
												</center>
											</div>
											<div class="drag-text">
												<span>Arrastre y suelte la imagen del usuario <span style="font-weight: bold; font-size:16px;"> aquí</span> o haga clic <span style="font-weight: bold; font-size:16px;"> aquí</span> para buscarla en su equipo.</span>
											</div>
										</div>
										<div class="file-upload-content">
											<img class="file-upload-image" src="#" alt="your image" />
											<div class="image-title-wrap">
												<button type="button" onclick="removeUpload()" class="remove-image">Remover Imagen</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br>
							<center>
								<a style="color:white" onclick="returnURL('{{ url()->previous() }}')" class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-check-circled"></i>Guardar Usuario</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('javascriptcode')
<script>
	<script>
		error_divs = [
			$('#error_id'),
		];
		verify_column($('#id'), 'id', 'users', null, $('#error_id'),
			'* El id que esta intentando ingresar no esta disponible.');

		//* Se verifica que no se ingrese un registro repedito para columnas unicas
		$('#id').keyup(function(e) {
			verify_column($('#id'), 'id', 'users', null, $('#error_id'),
				'* El id que esta intentando ingresar no esta disponible.');
		});
		//* Termina verificacion de columnas unicas
	
</script>

@endsection
