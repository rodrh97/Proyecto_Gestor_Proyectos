@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Editar el Solicitante")

@section('body')

<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont icofont-ui-edit" style="background:#FFB64D;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Editar el solicitante: {{$id->id}}</h4>
						<span style="text-transform: none;">Formulario para la modificación de solicitantes.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('components.list') }}">Solicitantes</a>
						</li>
						<li class="breadcrumb-item">Modificar Solicitante
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
						<form id="form" method="POST" action="{{ url("applicants/{$id->id}") }}"  enctype="multipart/form-data">
							{{ method_field('PUT') }}
							{!! csrf_field() !!}

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="first_name">Nombre(s):</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="first_name" placeholder="Ej. Juan" value="{{ old('first_name',$id->first_name) }}" title="Nombre(s) del solicitante">
									@if ($errors->has('first_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('first_name')}}</div>
									@endif
								</div>
							</div>	
							
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="last_name">Apellido Paterno:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="last_name" placeholder="Ej. Lopez" value="{{ old('last_name',$id->last_name) }}" title="Apellido Paterno del solicitante">
									@if ($errors->has('last_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('last_name')}}</div>
									@endif
								</div>
							</div>	
							
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="second_last_name">Apellido Materno:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="second_last_name" placeholder="Ej. Perez" value="{{ old('second_last_name',$id->second_last_name) }}" title="Apellido Materno del solicitante">
									@if ($errors->has('second_last_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('second_last_name')}}</div>
									@endif
								</div>
							</div>	
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="type">Tipo de Solicitante:</label>
								<div class="col-sm-10">
                  <select class="form-control" name="type"  value="{{ old('type',$id->type) }}" title="Tipo de solicitante">
                    @if($id->type=="Fisico")
                    <option value="Fisico" selected>Persona Físico</option>
                      <option value="Moral">Persona Moral</option>
       
                    @else
                      <option value="Fisico">Físico</option>
                      <option value="Moral" selected>Moral</option>
                    @endif
                    
                  </select>
									@if ($errors->has('type'))
										<div class="col-form-label" style="color:red;">{{$errors->first('type')}}</div>
									@endif
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="phone">Teléfono:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="phone" placeholder="Ej. (834) 1234567" value="{{ old('phone',$id->phone) }}" title="Telefono del solicitante">
									@if ($errors->has('phone'))
										<div class="col-form-label" style="color:red;">{{$errors->first('phone')}}</div>
									@endif
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="city">Ciudad:</label>
								<div class="col-sm-4">
									{!! Form::select('city',$cities,null,['id'=>'city','class'=>'form-control']) !!}
									@if ($errors->has('city'))
										<div class="col-form-label" style="color:red;">{{$errors->first('city')}}</div>
									@endif
								</div>
                <label class="col-sm-2 col-form-label" for="ejido">Localidad:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="ejido" placeholder="Ej. Colonia Chapultepec" value="{{ old('colony',$id->ejido) }}" title="Ejido donde vive el solicitante">
									@if ($errors->has('ejido'))
										<div class="col-form-label" style="color:red;">{{$errors->first('ejido')}}</div>
									@endif
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="colony">Colonia:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="colony" placeholder="Ej. Colonia Chapultepec" value="{{ old('colony',$id->colony) }}" title="Colonia donde vive el solicitante">
									@if ($errors->has('colony'))
										<div class="col-form-label" style="color:red;">{{$errors->first('colony')}}</div>
									@endif
								</div>
                <label class="col-sm-2 col-form-label" for="street">Calle:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="street" placeholder="Ej. Calle Juan Escutia" value="{{ old('street',$id->street) }}" title="Calle donde vive el solicitante">
									@if ($errors->has('street'))
										<div class="col-form-label" style="color:red;">{{$errors->first('street')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="number">Número de casa:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="number" placeholder="Ej. #412 o s/n" value="{{ old('number',$id->number) }}" title="Numero de casa del solicitante">
									@if ($errors->has('number'))
										<div class="col-form-label" style="color:red;">{{$errors->first('number')}}</div>
									@endif
								</div>
                <label class="col-sm-2 col-form-label" for="zip">Código Postal:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="zip" placeholder="Ej. 87100" value="{{ old('zip',$id->zip) }}" title="Codigo postal del solicitante">
									@if ($errors->has('zip'))
										<div class="col-form-label" style="color:red;">{{$errors->first('zip')}}</div>
									@endif
								</div>
							</div>
              <br>
              
							<br>
							<center>
								<a style="color:white" onclick="confirmationOnReturn('{{ url()->previous() }}')" class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-refresh"></i>Actualizar Solicitante</button>
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
	$(document).ready(function() {
		//Elementos a verificar sus modificaciones en la vista
		elements_id = [
			$('#name'),
			$('#component_id'),
			$('#abbreviation'),
		];

		original_values = [
			['id', $('#component_id').val()],
		];

		unique_elements = [
			[$('#component_id'), 'id', 'components', original_values, $('#error_component_id'),
				'* El id que esta intentando ingresar no esta disponible.'],
		];

		error_divs = [
			$('#error_component_id'),
		]

		checkIfChangesHaveBeenMadeIn(elements_id, unique_elements);
	});
  
  
  document.ready = document.getElementById("city").value = "{{$id->city}}";
 
</script>
@endsection