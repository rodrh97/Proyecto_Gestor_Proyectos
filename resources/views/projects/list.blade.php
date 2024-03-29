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
					<i class="fas fa-project-diagram" style="background-color:#ab7967;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Listado de Proyectos</h4>
						<span style="text-transform: none;">Lista de todos los proyectos registrados en el sistema.</span>
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
						<li class="breadcrumb-item">Proyectos
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
								@if ($projects->isNotEmpty())
								<thead id="table_header">
									<tr>
										<th class="all" scope="col">Folio interno</th>
										<th scope="col">Folio externo</th>
                    <th scope="col">Nombre del solicitante</th>
                    <th scope="col">Nombre del programa</th>
                    <th scope="col">Reglas de operación</th>
                    <th class="all" style="width:38%;" scope="col"><center>Acciones</center></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($projects as $project)
									<tr>
											<th scope="row">{{ $project->id }}</th>
                      @if($project->folio==null)
                      <td><label>Folio externo no ingresado</label></td>
                      @else
                      <td>{{ $project->folio }}</td>
                      @endif
											<td>{{ $project->first_name }} {{ $project->last_name }} {{ $project->second_last_name }}</td>
                      <td>{{ $project->program_name }}</td>
                    
                    @if($project->operation_rules==0)
                      <td><label>No</label></td>
                      @else
                      <td><label>Si</label></td>
                      @endif
										<td>	
												<form id="form" name="form" action="{{ route('projects.destroy', ['id' => $project->id])}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}

												<center>
                          @if($project->folio==null)
                          @if(Auth::user()->type == 1 || Auth::user()->type == 4 || Auth::user()->type == 3 )
                          <a href="{{ route('projects.create_folio', ['id' => $project->id]) }}" class="btn btn-inverse" title="Agregar folio externo" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-plus"></span></a>
                          @endif
													@else
                          @if(Auth::user()->type == 1 || Auth::user()->type == 4 || Auth::user()->type == 3 )
                          <a href="{{ route('projects.create_folio', ['id' => $project->id]) }}" class="btn btn-inverse" title="Editar folio externo" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-refresh"></span></a>
                          @endif
                          @endif
                          
                          
                          <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="btn btn-success" title="Detalles del proyecto" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="fas fa-eye"></span></a>
                          
                          @if(Auth::user()->type == 1 || Auth::user()->type == 4 || Auth::user()->type == 3 )
													<a href="{{ route('projects.edit', ['id' => $project->id]) }}" class="btn btn-primary" title="Editar proyecto" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-edit"></span></a>
                            @endif
													  @if(Auth::user()->type == 1 || Auth::user()->type == 4 )
														<button type="submit" class="btn btn-danger" style="margin: 3px;" id="eliminar" name="eliminar" onclick="archiveFunction()" title="Eliminar proyecto" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-delete"></span></button>
                          @endif
                          @if(Auth::user()->type == 1 || Auth::user()->type == 4 || Auth::user()->type == 3 )
													<a href="{{ route('reports.generarProject',['id'=>$project->id])}}" class="btn btn-warning" title="Generar PDF" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="far fa-file-pdf"></span></a>
                          @endif
												</center>
											</form>
										</td>
                    
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr id="table_footer">
										<th style="padding-right: 2.8%" scope="col">Folio interno</th>
										<th style="padding-right: 2.8%" scope="col">Folio Externo</th>
                    <th style="padding-right: 2.8%" scope="col">Nombre del solicitante</th>
                    <th style="padding-right: 2.8%" scope="col">Nombre del programa</th>
                    <th style="padding-right: 2.8%" scope="col">Reglas de operación</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No existe ningún proyecto registrado en el sistema.</p>
										</div>
                    @if($count_programs==0 && $count_applicants==0 )
                    @if(Auth::user()->type == 1 || Auth::user()->type == 4 )
                    <label>No existen solicitantes <a href="{{ route('applicants.create') }}" style="color:blue"> Dar click aquí </a>para crear solicitantes</label>
                    @endif
                    <br>
                    @if(Auth::user()->type == 1 )
                    <label>No existen programas <a href="{{ route('programs.create') }}" style="color:blue"> Dar click aquí </a>para crear programas</label>
                    @endif
                    @elseif($count_programs>0 && $count_applicants==0 )
                    
                    @if(Auth::user()->type == 1 || Auth::user()->type == 4 )
                    <label>No existen solicitantes <a href="{{ route('applicants.create') }}" style="color:blue"> Dar click aquí </a>para crear solicitantes</label>
                    @endif
                    
                    @elseif($count_programs==0 && $count_applicants>0 )
                    
                    @if(Auth::user()->type == 1 )
                    <label>No existen programas <a href="{{ route('programs.create') }}" style="color:blue"> Dar click aquí </a>para crear programas</label>
                    @endif
                    @else
                    
                    @if(Auth::user()->type == 1 || Auth::user()->type == 4 )
                    <a href="{{ route('projects.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Proyectos</button></a>
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
	var button = '<a href="{{ route('projects.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Proyecto</button></a>';
	applyStyleToDatatable(button, 'Buscar en proyectos');
</script>
@endsection


		@break
	@case(3)
		@section('javascriptcode')
<script>
	var button = '';
	applyStyleToDatatable(button, 'Buscar en proyectos');
</script>
@endsection


		@break
	
	@case(4)
		@section('javascriptcode')
<script>
	var button = '<a href="{{ route('projects.create') }}"><button class="btn btn-success" style="float:right;width:100%; min-width:150px"><i class="fa fa-plus"></i>Agregar Proyecto</button></a>';
	applyStyleToDatatable(button, 'Buscar en proyectos');
</script>
@endsection


		@break
	@case(5)
		@section('javascriptcode')
<script>
	var button = '';
	applyStyleToDatatable(button, 'Buscar en proyectos');
</script>
@endsection

		@break
@endswitch


