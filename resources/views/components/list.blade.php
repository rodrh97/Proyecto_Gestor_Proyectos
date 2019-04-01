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
					<i class="fas fa-cube bg-success"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Listado de Componentes</h4>
						<span style="text-transform: none;">Lista de todos los componentes registrados en el sistema.</span>
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
						<li class="breadcrumb-item">Componentes
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
								@if ($components->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" scope="col">ID</th>
										<th scope="col">Nombre</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de cierre</th>
										<th class="all" style="width:30%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($components as $component)
									<tr>
											<th scope="row">{{ $component->id }}</th>
											<td>{{ $component->name }}</td>
                    
                    @if($component->start_date == null)
                      <td>Indefinido</td>
                    @else
                      <td>{{ $component->start_date}}</td>
                    @endif
                    
                    @if($component->start_date == null)
                      <td>Indefinido</td>
                    @else
                      <td>{{ $component->finish_date}}</td>
                    @endif
										<td>
											
												<form id="form" name="form" action="{{ route('components.destroy', ['id' => $component->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}

												<center>
                          <a target="_blank" href="{{asset($component->path)}}" class="btn btn-inverse" title="Visualizar requerimientos especificos" ><span class="fas fa-eye"></span></a> 
                          <a href="{{url('/component/download',['id'=>$component->id])}}" class="btn btn-warning" title="Descargar requerimientos especificos"><span class="fas fa-download"></span></a>
													<a href="{{ route('components.edit', ['id' => $component->id]) }}" class="btn btn-primary" title="Editar componente con el id {{ $component->id }}" style="margin: 3px;"><span class="icofont icofont-ui-edit"></span></a>

													
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar componente con el id {{ $component->id }}"><span class="icofont icofont-ui-delete"></span></button>
													
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
                    <th style="padding-right: 2.8%" scope="col">Fecha de Inicio</th>
                    <th style="padding-right: 2.8%" scope="col">Fecha de Cierre</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No existe ningún componente registrado en el sistema.</p>
										</div>
										<a href="{{ route('components.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Componentes</button></a>
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
	var button = '<a href="{{ route('components.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Componente</button></a>';
	applyStyleToDatatable(button, 'Buscar en componentes');
</script>
@endsection
