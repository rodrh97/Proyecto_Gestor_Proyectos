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
					<i class="fas fa-cube bg-success"></i>
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
										<th scope="col">Nombre del concepto</th>
                    <th scope="col">Pertenece al subcomponente</th>
                    <th scope="col">Pertenece al componente</th>
                    <th class="all" style="width:35%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($concepts as $concept)
									<tr>
											<th scope="row">{{ $concept->id }}</th>
											<td>{{ $concept->name }}</td>
                      @if($concept->component_id == null)
                          @foreach($subcomponents as $subcomponent)
                              @if($concept->sub_component_id == $subcomponent->id)
                                <td>{{$subcomponent->name}}</td>
                                @foreach($components as $component)
                                  @if($subcomponent->component_id == $component->id)
                                    <td>{{$component->name}}</td>
                                  @endif
                                @endforeach
                              @endif
                          @endforeach
                      @else
                          <td> ------- </td>
                          @foreach($components as $component)
                              @if($concept->component_id == $component->id)
                                <td>{{$component->name}}</td>
                              @endif
                          @endforeach
                      @endif
                         
										<td>	
												<form id="form" name="form" action="{{ route('concepts.destroy', ['id' => $concept->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}

												<center>
                          <!--<a target="_blank" href="{{asset($concept->specific_requirements)}}" class="btn btn-inverse" title="Visualizar archivo" ><span class="fas fa-eye"></span></a> 
                          <a href="{{url('/concept/download',['id'=>$concept->id])}}" class="btn btn-warning" title="Descargar archivo de requerimientos especificos"><span class="fas fa-download"></span></a>-->
													<a href="{{ route('concepts.show', ['id' => $concept->id]) }}" class="btn btn-warning" title="Detalles del concepto" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="fas fa-eye"></span></a>
                          @if(Auth::user()->type == 1 || Auth::user()->type == 2 )
													<a href="{{ route('concepts.edit', ['id' => $concept->id]) }}" class="btn btn-primary" title="Editar concepto" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-edit"></span></a>

													 @endif
													@if(Auth::user()->type == 1 )
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar concepto" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-delete"></span></button>
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
										<th style="padding-right: 2.8%" scope="col">Nombre del concepto</th>
                    <th style="padding-right: 2.8%" scope="col">Pertenece al subcomponente</th>
                    <th style="padding-right: 2.8%" scope="col">Pertenece al componente</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;">Acciones</th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No existe ningún concepto registrado en el sistema.</p>
										</div>
                     @if(Auth::user()->type == 1 || Auth::user()->type == 2 )
                        @if($count_sub_components==0 && $count_components==0 )
                        <label>No existen componentes y subcomponentes <a href="{{ route('components.create') }}" style="color:blue"> Dar click aquí </a>para crear componentes</label>
                        @else
                          <a href="{{ route('concepts.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Conceptos</button></a>
                        @endif
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
	var button = '<a href="{{ route('concepts.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Concepto</button></a>';
	applyStyleToDatatable(button, 'Buscar en conceptos');
</script>
@endsection


		@break
	@case(2)
		@section('javascriptcode')
<script>
	var button = '<a href="{{ route('concepts.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Concepto</button></a>';
	applyStyleToDatatable(button, 'Buscar en conceptos');
</script>
@endsection

		@break
	
	@case(4)
		@section('javascriptcode')
<script>
	var button = '';
	applyStyleToDatatable(button, 'Buscar en componentes');
</script>
@endsection

		@break
	@case(5)
		@section('javascriptcode')
<script>
	var button = '';
	applyStyleToDatatable(button, 'Buscar en componentes');
</script>
@endsection

		@break
@endswitch


