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
					<i class="fas fa-book" style="background-color:#39ADB5;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Glosario</h4>
						<span style="text-transform: none;">Listado de palabras y su definición.</span>
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
						<li class="breadcrumb-item">Glosario
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
						<div class="dt-responsive table-responsive">
							<table style="width:100%;" id="custom_datatable" class="table table-striped table-bordered">
								@if ($glosary->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" style="width:3%;" scope="col">ID</th>
										<th scope="col" style="width:10%;">Nombre</th>
                    <th scope="col">Definición </th>
										<th class="all" style="width:25%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($glosary as $word)
									<tr>
                    <th scope="row">{{ $word->id }}</th>
                    <td>{{ $word->word }}</td>
                    <td>{{ $word->definition}}</td>
										<td>
												<form id="form" name="form" action="{{ route('glosario.destroy', ['id' => $word->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
											
												<center>
													<a href="{{ route('glosario.show', ['id' => $word->id]) }}" class="btn btn-warning" title="Detalle de la palabra" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-eye-alt"></span></a>
													<a href="{{ route('glosario.edit', ['id' => $word->id]) }}" class="btn btn-primary" title="Editar palabra" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-edit"></span></a>

														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar palabra" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-delete"></span></button>
													
												</center>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr id="table_footer">
										<th style="padding-right: 2.8%" scope="col">ID</th>
										<th style="padding-right: 2.8%" scope="col">Nombre</th>
                    <th style="padding-right: 2.8%" scope="col">Definición</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-primary icons-alert">
											<strong>Sin definiciones</strong>
											<p>No hay ninguna palabra en el glosario.</p>
										</div>
										<a href="{{ route('glosario.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Palabra</button></a>
									</center>
								@endif

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascriptcode')
<script>
	var button = '<a href="{{ route('glosario.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Palabra</button></a>';
	applyStyleToDatatable(button, 'Buscar en el glosario');
</script>
@endsection
