@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Detalles del Proyecto")

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
					<i class="icofont icofont-eye-alt" style="background-color:#ab7967"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Detalles del Proyecto:  {{$project->folio_interno}} </h4>
						<span style="text-transform: none;">Mostrando todos los detalles del proyecto seleccionado.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('projects.list') }}">Proyectos</a>
						</li>
						<li class="breadcrumb-item">Detalles del Proyecto
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Page-header end -->

	<!-- Page body start -->
	<div class="page-body">
		<div class="row">
			<div class="col-sm-12">
				<!-- Basic Form Inputs card start -->
				<div class="card">
					<div class="card-block">
						<h4 class="sub-title">Información General del Proyecto</h4>
						<div class="page-body">
							<div class="row">
								<div class="col-md-12 col-xl-12 ">
									<div class="card-block user-detail-card">
										<div class="row">
                      
											<div class="col-sm-12 user-detail">
                        
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-hashtag"></i>Folio Interno:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->folio_interno}}</h6>
													</div>
												</div>
												
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-hashtag"></i>Folio Externo:</h6>
													</div>
													<div class="col-sm-8">
                            @if($project->folio_externo==null)
                            <label>Folio exterior no ingresado</label>
                            @else
                            <h6 class="m-b-30">{{$project->folio_externo}}</h6>
                            @endif
														
													</div>
												</div>
                       
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-user"></i>Nombre del solicitante:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->first_name}} {{$project->last_name}} {{$project->second_last_name}}</h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-retweet"></i>Estado del proyecto:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->status}}</h6>
													</div>
												</div>
                        
                        @if($operation_rules->operation_rules==0)
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-th-list"></i>Nombre del programa:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->program_name}}</h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Monto máximo por persona física:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->p_amount_max}}</h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Monto máximo por persona moral:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->m_amount_max}}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Concepto solicitado:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->requested_concept}}</h6>
													</div>
												</div>
                        @else
                           <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-th-list"></i>Nombre del programa:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->program_name}}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-th-list"></i>Nombre del componente:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$componente->name}}</h6>
													</div>
												</div>
                        @if($subcomponente!=null)
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-th-list"></i>Nombre del subcomponente:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$subcomponente->name}}</h6>
													</div>
												</div>
                        @else
                          <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-th-list"></i>Nombre del subcomponente:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">Ninguno</h6>
													</div>
												</div>
                        @endif

                        
                        @foreach($conceptos as $concepto)
                        <div class="row">
													<div class="col-sm-4">
                            <h6 class="f-w-400 m-b-30"><i class="fas fa-th-list"></i>Nombre del concepto:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$concepto->concepto}}</h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Monto máximo por persona física:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$concepto->p_amount_max}}</h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Monto máximo por persona moral:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$concepto->m_amount_max}}</h6>
													</div>
												</div>
                        @endforeach
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-dollar-sign"></i>Concepto solicitado:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{$project->requested_concept}}</h6>
													</div>
												</div>
                        @endif
                        
                        
                          
                        
											</div>
                      <div class="col-sm-12">
                      <center>
                          <br>
													<hr>
													<div class="contact-icon">
														
															<form id="form" name="form" action="{{ route('projects.destroy', ['id' => $project->folio_interno])}}" method="POST">
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Regresar"><i class="icofont icofont-arrow-left m-0"></i></button></a>
																@if(Auth::user()->type == 1 || Auth::user()->type == 4 || Auth::user()->type == 3 )
                                <a href="{{ route('projects.edit', ['id' => $project->folio_interno]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="icofont icofont-edit m-0"></i></button></a>
																@endif
                                @if(Auth::user()->type == 1 || Auth::user()->type == 4)
                                <button  onclick="archiveFunction()" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" type="submit" title="Eliminar"><span class="icofont icofont-ui-delete"></span></button>
                                @endif
															</form>
														
													</div>
                           
												</center> 
                        </div> 
                       
                      <br>
                      <br>
                      
                      <div class="col-sm-12">
          <hr>
          <br>
          <h4 class="sub-title">Anexo de Documentos</h4>
				<div class="card">
					<div class="card-block">
						<div class="dt-responsive table-responsive">
							<table style="width:100%;" class="table table-striped table-bordered">
								@if ($documents->isNotEmpty())
								<thead >
									<tr>
										
										<th scope="col">Nombre</th>
                    <th scope="col">Ver</th>
                    <th scope="col">Descargar</th>
                    <th class="all" style="width:20%;" scope="col">Borrar</th>
									</tr>
								</thead>
								<tbody>
									@foreach($documents as $document)
									<tr>
											
                      <td>{{ $document->documento}}</td>
                      <td><center><a target="_blank" href="{{asset($document->path)}}" class="btn btn-inverse col-lg-5" title="Visualizar documento" data-toggle="tooltip" data-placement="top"><span class="fas fa-eye"></span></a> </center></td>
                      <td><center><a href="{{url('/documents/download',['id'=>$document->id])}}" class="btn btn-warning col-lg-5" title="Descargar documento" data-toggle="tooltip" data-placement="top"><span class="fas fa-download"></span></a></center></td>
											
                    
                    
										<td>	
											<center><a href="{{ route('projects.deleteDocumento',['id' => $document->id])}}" class="btn btn-inverse col-lg-5" title="Borrar documento" data-toggle="tooltip" data-placement="top"><span class="icofont icofont-ui-delete"></span></a> </center>
										</td>
                    
									</tr>
									@endforeach
								</tbody>
								
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>Aún no tienes registrado documentos.</p>
										</div>
									</center>
								@endif

							</table>
						</div>
					</div>
				</div>
			</div>
                      
                     
       
        <div class="col-sm-12">
          <hr>
          <br>
          <h4 class="sub-title">Historial de visitas del proyecto</h4>
				<div class="card">
					<div class="card-block">
						<div class="dt-responsive table-responsive">
							<table style="width:100%;" id="custom_datatable" class="table table-striped table-bordered">
								@if ($visitas->isNotEmpty())
								<thead id="table_header">
									<tr>
										
										<th scope="col">Estado del Proyecto</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Fecha de la visita</th>
                    <th class="all" style="width:20%;" scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($visitas as $visit_history)
									<tr>
											
                      <td>{{ $visit_history->estatus }}</td>
                      <td>{{ $visit_history->comentario }}</td>
                      <td>{{ $visit_history->fecha}}</td>
											
                    
                    
										<td>	
												

												<center>
                          
												
                         
                          
													<!--<a href="{{ route('projects.edit', ['id' => $project->folio_interno]) }}" class="btn btn-primary" title="Editar proyecto con el id {{ $project->folio_interno }}" style="margin: 3px;"><span class="icofont icofont-ui-edit"></span></a>-->
                         @if(Auth::user()->type == 1 || Auth::user()->type == 4 || Auth::user()->type == 3 )
                          <a href="{{ route('reports.generarVisit',['id'=>$visit_history->id])}}" class="btn btn-warning " title="Generar PDF de la visita" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="far fa-file-pdf"></span></a>
													@endif
												@if(Auth::user()->type == 5 )
                          <a href="{{ route('reports.generarVisit',['id'=>$visit_history->id])}}" class="btn btn-disabled disabled " title="Generar PDF de la visita" style="margin: 3px;" data-toggle="tooltip" data-placement="top"><span class="far fa-file-pdf"></span></a>
													@endif
													
												</center>
											
										</td>
                    
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr id="table_footer">
										
										<th style="padding-right: 2.8%" scope="col">Estado del Proyecto</th>
                    <th style="padding-right: 2.8%" scope="col">Comentarios</th>
                    <th style="padding-right: 2.8%" scope="col">Fecha de la visita</th>
										<th style="padding-left: 1.2%" scope="col" style="width:0%;"></th>
									</tr>
								</tfoot>
								@else
									<center>
										<div class="alert alert-warning icons-alert">
											<strong>Atención</strong>
											<p>No existe historial del proyecto registrado en el sistema.</p>
										</div>
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
								</div>
							</div>
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
	
	applyStyleToDatatable();
</script>
@endsection


		@break
	@case(3)
		@section('javascriptcode')
<script>
	
	applyStyleToDatatable();
</script>
@endsection

		@break
	
	@case(4)
	@section('javascriptcode')
<script>
	
	applyStyleToDatatable();
</script>
@endsection


		@break
	@case(5)
		@section('javascriptcode')
<script>
	
	applyStyleToDatatable();
</script>
@endsection

		@break
@endswitch



