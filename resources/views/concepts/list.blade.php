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
					<i class="fas fa-cube " style="background-color:#ac7c64;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Listado de Conceptos</h4>
						<span style="text-transform: none;">Lista de todos los conceptos registrados en el sistema.</span>
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
						<li class="breadcrumb-item">Conceptos
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
								@if ($concepts->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" scope="col">ID</th>
										<th scope="col">Nombre</th>
                    <th class="all" style="width:35%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($concepts as $concept)
									<tr>
											<th scope="row">{{ $concept->id }}</th>
											<td>{{ $concept->name }}</td>
                    
                    
										<td>	
												<form id="form" name="form" action="{{ route('concepts.destroy', ['id' => $concept->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}

												<center>
                          <a target="_blank" href="{{asset($concept->specific_requirements)}}" class="btn btn-inverse" title="Visualizar archivo" ><span class="fas fa-eye"></span></a> 
                          <a href="{{url('/concept/download',['id'=>$concept->id])}}" class="btn btn-warning" title="Descargar archivo de requerimientos especificos"><span class="fas fa-download"></span></a>
													<a href="{{ route('concepts.show', ['id' => $concept->id]) }}" class="btn btn-success" title="Ver el concepto con el id {{ $concept->id }}" style="margin: 3px;"><span class="fas fa-eye"></span></a>
                          
													<a href="{{ route('concepts.edit', ['id' => $concept->id]) }}" class="btn btn-primary" title="Editar concepto con el id {{ $concept->id }}" style="margin: 3px;"><span class="icofont icofont-ui-edit"></span></a>

													
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar concepto con el id {{$concept->id}}"><span class="icofont icofont-ui-delete"></span></button>
													
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
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No existe ningún concepto registrado en el sistema.</p>
										</div>
                    @if($count_sub_components==0 && $count_components==0 )
                    <label>No existen componentes y subcomponentes <a href="{{ route('components.create') }}" style="color:blue"> Dar click aquí </a>para crear componentes</label>
                    @else
                      <a href="{{ route('concepts.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Conceptos</button></a>
                    @endif
										
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
	var button = '<a href="{{ route('concepts.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Concepto</button></a>';
	applyStyleToDatatable(button, 'Buscar en conceptos');
</script>
@endsection
