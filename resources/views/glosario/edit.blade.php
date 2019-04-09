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
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont icofont-ui-edit" style="background:#39ADB5;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Editar la Palabra: {{$word->word}}</h4>
						<span style="text-transform: none;">Formulario para la modificación de palabras.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('glosario.list') }}">Glosario</a>
						</li>
						<li class="breadcrumb-item">Modificar Palabra
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
						
						<form id="form" method="POST" action="{{ url("glosario/{$word->id}") }}">
							{{ method_field('PUT') }}
							{!! csrf_field() !!}
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Palabra</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" name="name" placeholder="Ej. Comunicación" value="{{ old('name', $word->word) }}" title="Nombre de la Palabra">
									@if ($errors->has('name'))
										<div id="error_name" class="col-form-label" style="color:red;">{{$errors->first('name')}}</div>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="definicion">Definición:</label>
								<div class="col-sm-10">
                  <textarea class="form-control" name="definicion" cols="30" rows="10" placeholder="Ej. Acción consciente de intercambiar información entre dos o más participantes ">{{ old('definicion',$word->definition) }}</textarea>
									@if ($errors->has('definicion'))
										<div class="col-form-label" style="color:red;">{{$errors->first('definicion')}}</div>
									@endif
								</div>
							</div>
							<br>
							<center>
								<a style="color:white" onclick="confirmationOnReturn('{{ url()->previous() }}')" class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-refresh"></i>Actualizar Palabra</button>
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
			$('#id'),
		];

		original_values = [
			['id', $('#id').val()],
		];

		unique_elements = [
			[$('#id'), 'id', 'glosaries', original_values, $('#error_id'),
				'* El id que esta intentando ingresar no esta disponible.'],
		];

		error_divs = [
			$('#error_id'),
		]

		checkIfChangesHaveBeenMadeIn(elements_id, unique_elements);
	});
</script>
@endsection
