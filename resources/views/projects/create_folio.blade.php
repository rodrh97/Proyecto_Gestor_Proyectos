@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")


@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
@case(3)
		@section('bodyVinculacion')
		@break
	@case(4)
		@section('bodyAtencionE')
		@break
	
@endswitch
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fa fa-plus" style="background-color:#FFB64D;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Crear Folio para el Proyecto {{$project->id}}</h4>
						<span style="text-transform: none;">Llene el campo en la parte inferior para registrar un nuevo folio para el proyecto.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('projects.list') }}">Proyectos</a>
						</li>
						<li class="breadcrumb-item">Crear Folio
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

						<form id="form" method="POST" action="{{ url("projects/{$project->id}/new_folio") }}" >
							{{ method_field('PUT') }}
							{!! csrf_field() !!}
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="folio">Folio:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="folio" name="folio" placeholder="Ej. 10" value="{{ old('folio',$project->folio) }}" title="Folio del Proyecto">
									@if ($errors->has('folio'))
										<div class="col-form-label" style="color:red;">{{$errors->first('folio')}}</div>
									@endif
									<div id="error_folio" class="col-form-label" style="color:red; display:none;"></div>
								</div>
              </div>
              <input type="hidden" name="status_project" value="{{$status_project->id}}">
              <input type="hidden" name="project_id" value="{{$project->id}}">
              <input type="hidden" name="comments" value="Se agrego folio exterior">
              <br><br>
							<center>
								<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"  class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button id="guardar" type="submit" class="btn btn-success" style="display:inline;"><i class="icofont icofont-plus"></i>Guardar Folio</button>
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
		
</script>
@endsection