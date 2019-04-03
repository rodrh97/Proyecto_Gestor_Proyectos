@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")

@section('body')
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fas fa-users" style="background-color:#FFB64D;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Listado de Solicitantes</h4>
						<span style="text-transform: none;">Lista de todas los solicitantes registradas en el sistema.</span>
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
						<li class="breadcrumb-item">Solicitantes
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
								@if ($applicants->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" scope="col">ID</th>
										<th scope="col">Nombre Completo</th>
                    <th scope="col">Tipo de solicitante</th>
										<th class="all" style="width:40%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($applicants as $applicant)
									<tr>
											<th scope="row">{{ $applicant->id }}</th>
											<td>{{ $applicant->first_name }} {{ $applicant->last_name }} {{ $applicant->second_last_name }}</td>
	                   <td>{{ $applicant->type}}</td>
										<td>
											
												<form id="form" name="form" action="{{ route('applicants.destroy', ['id' => $applicant->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}

												<center>
													
													<a href="{{ route('applicants.show', ['id' => $applicant->id]) }}" class="btn btn-success" title="Ver el solicitante con el id {{ $applicant->id }}" style="margin: 3px;"><span class="fas fa-eye"></span></a>
                          <a href="{{ route('applicants.edit', ['id' => $applicant->id]) }}" class="btn btn-primary" title="Editar solicitante con el id {{ $applicant->id }}" style="margin: 3px;"><span class="icofont icofont-ui-edit"></span></a>

													
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar solicitante con el id {{ $applicant->id }}"><span class="icofont icofont-ui-delete"></span></button>
                          <a href="{{route('applicants.createProject',['id'=>$applicant->id])}}" class="btn btn-warning col-lg-4">Crear proyecto</a>
													
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
                    <th style="padding-right: 2.8%" scope="col">Tipo de solicitante</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No hay ninguna solicitante registrada.</p>
										</div>
										<a href="{{ route('applicants.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Solicitantes</button></a>
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
	var button = '<a href="{{ route('applicants.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Solicitantes</button></a>';
	applyStyleToDatatable(button, 'Buscar en solicitantes...');
</script>
@endsection
