@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")

@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
@case(2)
		@section('bodyMonitoreo')
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
					<i class="fas fa-cubes bg-success" ></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Listado de Subcomponentes</h4>
						<span style="text-transform: none;">Lista de todos los subcomponentes registrados en el sistema.</span>
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
						<li class="breadcrumb-item">Subcomponentes
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
								@if ($subcomponents->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" scope="col">ID</th>
										<th scope="col">Nombre</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de cierre</th>
                    <th scope="col">Pertenece al Componente</th>
										<th class="all" style="width:30%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($subcomponents as $subcomponent)
									<tr>
											<th scope="row">{{ $subcomponent->id }}</th>
											<td>{{ $subcomponent->name }}</td>
                    
                    @if($subcomponent->start_date == null)
                      <td>Indefinido</td>
                    @else
                      <td>{{ $subcomponent->start_date}}</td>
                    @endif
                    
                    @if($subcomponent->start_date == null)
                      <td>Indefinido</td>
                    @else
                      <td>{{ $subcomponent->finish_date}}</td>
                    @endif
                    <td>{{ $subcomponent->component }}</td>
										<td>
											
												<form id="form" name="form" action="{{ route('subcomponents.destroy', ['id' => $subcomponent->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}

												<center>
                          <a href="{{ route('subcomponents.show', ['id' => $subcomponent->id]) }}" class="btn btn-warning" title="Detalles del subcomponente " style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-eye-alt"></span></a>
                          <!--<a target="_blank" href="{{asset($subcomponent->specific_requirements)}}" class="btn btn-inverse" title="Visualizar requerimientos especificos" ><span class="fas fa-eye"></span></a> 
                          <a href="{{url('/subcomponent/download',['id'=>$subcomponent->id])}}" class="btn btn-warning" title="Descargar requerimientos especificos"><span class="fas fa-download"></span></a>-->
													@if(Auth::user()->type == 1 || Auth::user()->type == 2 )
                          <a href="{{ route('subcomponents.edit', ['id' => $subcomponent->id]) }}" class="btn btn-primary" title="Editar subcomponente" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-edit"></span></a>
                          @endif
													@if(Auth::user()->type == 1 )
													
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar subcomponente" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-delete"></span></button>
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
										<th style="padding-right: 2.8%" scope="col">Nombre</th>
                    <th style="padding-right: 2.8%" scope="col">Fecha de Inicio</th>
                    <th style="padding-right: 2.8%" scope="col">Fecha de Cierre</th>
                    <th style="padding-right: 2.8%" scope="col">Pertenece al Componente</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No existe ningún subcomponente registrado en el sistema.</p>
										</div>
                    @if(Auth::user()->type == 1 || Auth::user()->type == 2 )
										<a href="{{ route('subcomponents.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Subcomponentes</button></a>
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



@switch(Auth::user()->type)
	@case(1)
	@section('javascriptcode')
<script>
	var button = '<a href="{{ route('subcomponents.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Subcomponente</button></a>';
	applyStyleToDatatable(button, 'Buscar en subcomponentes');
</script>
@endsection


		@break
	@case(2)
		@section('javascriptcode')
<script>
	var button = '<a href="{{ route('subcomponents.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Subcomponente</button></a>';
	applyStyleToDatatable(button, 'Buscar en subcomponentes');
</script>
@endsection

		@break
	
	@case(4)
		@section('javascriptcode')
<script>
	var button = '';
	applyStyleToDatatable(button, 'Buscar en subcomponentes');
</script>
@endsection

		@break
	@case(5)
		@section('javascriptcode')
<script>
	var button = '';
	applyStyleToDatatable(button, 'Buscar en subcomponentes');
</script>
@endsection

		@break
@endswitch


