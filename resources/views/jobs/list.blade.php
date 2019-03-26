@extends('layouts.app')

@section('title',"Bolsa de Trabajo - Vacantes")

@section('body')
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fa fa-briefcase" style="background-color:tomato;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Listado de Vacantes</h4>
						<span style="text-transform: none;">Lista de todas las vacantes registradas en el sistema.</span>
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
						<li class="breadcrumb-item">Vacantes
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
								@if ($jobs->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" scope="col">ID</th>
										<th scope="col">Puesto</th>
										<th scope="col">Empresa</th>
										<th class="all" style="width:25%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($jobs as $job)
									<tr>
										@if($job->deleted=='0')
											<th scope="row">{{ $job->id }}</th>
											<td>{{ $job->name }}</td>
                      @foreach($companies as $company)
                          @if($company->id == $job->id_company)
                              <td>{{ $company->name }}</td>
                          @endif
                      @endforeach
										@else
											<th style="color:red" scope="row">{{ $job->id }}</th>
											<td style="color:red">{{ $job->name }}</td>
											@foreach($companies as $company)
                          @if($company->id == $job->id_company)
                              <td>{{ $company->name }}</td>
                          @endif
                      @endforeach
										@endif
										<td>
											@if($job->deleted=='0')
												<form id="form" name="form" action="{{ route('jobs.destroy', ['id' => $job->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
											@else
												<form id="form" name="form" action="{{ route('jobs.restore', ['id' => $job->id]) }}" method="POST">
													{{ csrf_field() }}
											@endif
												<center>
													<a href="{{ route('jobs.show', ['id' => $job->id]) }}" class="btn btn-warning" title="Ver detalles de la vacante con el id {{ $job->id }}" style="margin: 3px;"><span class="icofont icofont-eye-alt"></span></a>
													<a href="{{ route('jobs.edit', ['id' => $job->id]) }}" class="btn btn-primary" title="Editar vacante con el id {{ $job->id }}" style="margin: 3px;"><span class="icofont icofont-ui-edit"></span></a>

													@if($job->deleted=='0')
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar vacante con el id {{ $job->id }}"><span class="icofont icofont-ui-delete"></span></button>
													@else
														<button type="submit" class="btn btn-success" style="margin: 3px;" id="restaurar" name="restaurar" onclick="restoreFunction()" title="Restaurar vacante con el id {{ $job->id }}"><span class="fas fa-reply"></span></a>
													@endif
												</center>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr id="table_footer">
										<th style="padding-right: 2.8%" scope="col">ID</th>
										<th style="padding-right: 2.8%" scope="col">Puesto</th>
										<th style="padding-right: 2.8%" scope="col">Empresa</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No hay ninguna vacante registrada.</p>
										</div>
										<a href="{{ route('jobs.select_company') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Vacante</button></a>
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
	var button = '<a href="{{ route('jobs.select_company') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Vacante</button></a>';
	applyStyleToDatatable(button, 'Buscar en vacantes...');
</script>
@endsection
