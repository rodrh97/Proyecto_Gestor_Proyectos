@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Usuarios")

@section('body')
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont icofont-table bg-danger" ></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Listado de Usuarios</h4>
						<span style="text-transform: none;">Lista de todos los usuarios registrados en el sistema.</span>
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
						<li class="breadcrumb-item">Usuarios
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
				<!-- Zero config.table start -->
				<div class="card">
					<div class="card-block">
						<div class="dt-responsive table-responsive">
							<table style="width:100%" id="custom_datatable" class="table table-striped table-bordered">
								@if ($users->isNotEmpty())

								<thead id="table_header">
									<tr>
										<th class="all" scope="col" style="width:10%;">ID</th>
										<th scope="col" style="width:20%;">Nombre Completo</th>
										<th scope="col" style="width:20%;">Email</th>
										<th scope="col" style="width:10%;">Tipo</th>
										<th class="all" scope="col" style="width:30%;">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $user)
									<tr>
										
										<th scope="row">{{ $user->id }}</th>
										
										<td> {{ $user->first_name }} {{ $user->last_name }} {{ $user->second_last_name }}</td>
										<td>{{ $user->email }}</td>
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
										
											<td>
												<form id="form" name="form" action="{{ route('users.destroy', ['id' => $user->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
													<center>
														@if ($user->id == Auth::user()->id)
															<a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-warning" title="Detalles de usuario " style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-eye-alt"></span></a>
															<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary" title="Editar usuario " style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-edit"></span></a>
														@else
															<a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-warning" title="Detalles de usuario " style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-eye-alt"></span></a>
															<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary" title="Editar usuario" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-edit"></span></a>
																<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar usuario" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-delete"></span></button>
															
														@endif
													</center>
												</form>
											</td>
									</tr>
									@endforeach
								</tbody>
								@else
								<center>
										<p>Actualmente no hay usuarios registrados.</p>
								</center>
								@endif
								<tfoot>
									<tr id="table_footer">
										<th style="padding-right: 2.8%" scope="col">ID</th>
										<th style="padding-right: 2.8%" scope="col">Nombre Completo</th>
										<th style="padding-right: 2.8%" scope="col">Email</th>
										<th style="padding-right: 2.8%" scope="col">Tipo</th>
										<th style="padding-left: 3.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
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
	var button='<a href="{{ route('users.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-user-plus"></i>Agregar Usuario</button></a>';
	applyStyleToDatatable(button, 'Buscar en usuarios');
</script>
@endsection
