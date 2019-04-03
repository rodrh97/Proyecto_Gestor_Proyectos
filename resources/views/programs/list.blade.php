@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Programas")

@section('body')
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fas fa-th-list bg-success" ></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Lista de Programas</h4>
						<span style="text-transform: none;">Lista de todos los programas registrados en el sistema.</span>
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
						<li class="breadcrumb-item">Programas
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
								@if ($programs->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" scope="col">ID</th>
										<th scope="col">Nombre</th>
                    <th scope="col">Población objetivo</th>
                    <th scope="col">Unidad responsable</th>
                    <th scope="col">Unidad ejecutora</th>
                    <th scope="col">Reglas de operación</th>
										<th class="all" style="width:25%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($programs as $program)
									<tr>
										
											<th scope="row">{{ $program->id }}</th>
											<td>{{ $program->name }}</td>
                    <td>{{$program->target_population}}</td>
                    <td>{{$program->responsable_unit}}</td>
                    <td>{{$program->executing_unit}}</td>
                    
                    @if($program->operation_rules == 0)
                      <td>No</td>
                    @else
                      <td>Si</td>
                    @endif
										
										<td>
										
												<form id="form" name="form" action="{{ route('programs.destroy', ['id' => $program->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
												<center>
													<a href="{{ route('programs.show', ['id' => $program->id]) }}" class="btn btn-warning" title="Ver detalles del programa con el id {{ $program->id }}" style="margin: 3px;"><span class="icofont icofont-eye-alt"></span></a>
													<a href="{{ route('programs.edit', ['id' => $program->id]) }}" class="btn btn-primary" title="Editar programa con el id {{ $program->id }}" style="margin: 3px;"><span class="icofont icofont-ui-edit"></span></a>

										
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar programa con el id {{ $program->id }}"><span class="icofont icofont-ui-delete"></span></button>
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
                    <th style="padding-right: 2.8%" scope="col">Población objetivo</th>
                    <th style="padding-right: 2.8%" scope="col">Unidad responsable</th>
                    <th style="padding-right: 2.8%" scope="col">Unidad ejecutora</th>
                     <th style="padding-right: 2.8%" scope="col">Reglas de operación</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No hay ningún programa registrado.</p>
										</div>
										<a href="{{ route('programs.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Programa</button></a>
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
	var button = '<a href="{{ route('programs.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Programa</button></a>';
	applyStyleToDatatable(button, 'Buscar en programas');
</script>
@endsection
