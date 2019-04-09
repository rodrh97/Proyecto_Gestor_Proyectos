@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Detalles del Programa")

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
					<i class="icofont icofont-eye-alt bg-success" ></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Detalles del Programa: {{ $program->name }}</h4>
						<span style="text-transform: none;">Mostrando todos los detalles del programa seleccionado.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('programs.list') }}">Programas</a>
						</li>
						<li class="breadcrumb-item">Detalles del Programa
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
						<h4 class="sub-title">Información General del Programa</h4>
						<div class="page-body">
							<div class="row">
								<div class="col-md-12 col-xl-12 ">
									<div class="card-block user-detail-card">
										<div class="row">
											<div class="col-sm-12 user-detail">
												
                        <div class="row">
                          <div class="col-sm-6">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i><strong> Programa sujeto a reglas de operación</strong></h6>
													</div>
                        </div>
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Nombre:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30"> {{ $program->name }}</h6>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Descripción:</h6>
													</div>
													<div class="col-sm-8">
                            <textarea style="border:none;" readonly class="m-b-30" cols="80" rows="10">{{ $program->description }}</textarea>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Población objetivo:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $program->target_population }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Unidad responsable:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $program->responsable_unit }}</h6>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Unidad ejecutora:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $program->executing_unit }}</h6>
													</div>
												</div>
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Requerimientos Generales:</h6>
													</div>
													<div class="col-sm-8">
														<a target="_blank" href="{{asset($program->general_requirements)}}" class="btn btn-inverse col-lg-2" title="Visualizar requerimientos generales" ><span class="fas fa-eye"></span></a> 
                            <a href="{{url('/programs/downloadGeneral',['id'=>$program->id])}}" class="btn btn-warning col-lg-2" title="Descargar requerimientos generales"><span class="fas fa-download"></span></a>
													</div>
												</div>
                        
                        <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>Convocatoria:</h6>
													</div>
													<div class="col-sm-8">
														<a target="_blank" href="{{asset($program->announcement_pdf)}}" class="btn btn-inverse col-lg-2" title="Visualizar convocatoria" ><span class="fas fa-eye"></span></a> 
                            <a href="{{url('/programs/downloadConvocatoria',['id'=>$program->id])}}" class="btn btn-warning col-lg-2" title="Descargar convocatoria"><span class="fas fa-download"></span></a>
													</div>
												</div>
                        
                         <div class="row">
													<div class="col-sm-4">
														<h6 class="f-w-400 m-b-30"><i class="fas fa-cube"></i>URL de la convocatoria:</h6>
													</div>
													<div class="col-sm-8">
														<h6 class="m-b-30">{{ $program->vinculo }}</h6>
													</div>
												</div>
                        
                        <br><br>
                        <h6><strong> Anexos</strong></h6><br>
                        
                        @if($anexos->isNotEmpty())
                        <div class="card-block table-border-style">
                          <div class="table-responsive">
                              <table style="width:100%;" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                          <th>Nombre</th>
                                          <th>Ver</th>
                                          <th>Descargar</th>
                                          <th>Borrar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      
                                          @foreach($anexos as $anexo)
                                    <tr>
                                        <td>{{$anexo->name}}</td>
                                        
                                          <td><center><a target="_blank" href="{{asset($anexo->path)}}" class="btn btn-inverse col-lg-5" title="Visualizar anexo" ><span class="fas fa-eye"></span></a> </center></td>
                                          <td><center><a href="{{url('/programs/downloadAnexo',['id'=>$anexo->id])}}" class="btn btn-warning col-lg-5" title="Descargar anexo"><span class="fas fa-download"></span></a></center></td>
                                          <td><center><a href="{{ route('programs.deleteAnexo',['id' => $anexo->id])}}" class="btn btn-inverse col-lg-5" title="Borrar anexo" ><span class="icofont icofont-ui-delete"></span></a> </center></td>
                                        
                                      </tr>
                                         @endforeach
                                      
                                      
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        @else
                        <center>
                          <div class="alert alert-warning icons-alert">
                            <strong>Sin anexos</strong>
                            <p>Este programa no posee anexos.</p>
                          </div>
                        </center>
                        @endif
    
                        <br><hr><br>
                        <h6><strong> Reglas de Operación</strong></h6><br>
                        <div>
                        
                         <div class="card-block tree-view">
                            <div id="basicTree">
                                <ul>
                                    <li data-jstree='{"icon":"fas fa-cube"}'>{{$program->name}}
                                        <ul>
                                          @foreach($components as $component)
                                            <li data-jstree='{"icon":"fas fa-cube"}'>Componente: {{$component->name}}
                                                <ul>
                                                  @foreach($subcomponents as $subcomponent)
                                                    @if($subcomponent->component_id == $component->id)
                                                      <li data-jstree='{"icon":"fas fa-cube"}'>Subcomponente: {{$subcomponent->name}}
                                                          <ul>
                                                            @foreach($concepts as $concept)
                                                              @if($concept->sub_component_id == $subcomponent->id)
                                                                <li data-jstree='{"icon":"fas fa-cube"}'>Concepto: {{$concept->name}}</li>
                                                              @endif
                                                            @endforeach
                                                          </ul>
                                                      </li>
                                                    @endif
                                                  @endforeach
                                                  @foreach($concepts as $concept)
                                                    @if($concept->component_id == $component->id)
                                                      <li data-jstree='{"icon":"fas fa-cube"}'>Concepto: {{$concept->name}}</li>
                                                    @endif
                                                  @endforeach
                                                </ul>
                                            </li>
                                          @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>                          
												<br><br>
                          <br><h6><strong>Requerimientos específicos</strong></h6><br>
                           <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table style="width:100%;" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Regla de operación</th>
                                            <th>Ver</th>
                                            <th>Descargar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($components as $component)
                                        <tr>
                                          <td>Componente: {{$component->name}}</td>
                                          <td><center><a target="_blank" href="{{asset($component->path)}}" class="btn btn-inverse col-lg-10" title="Visualizar requerimientos específicos" ><span class="fas fa-eye"></span></a> </center></td>
                                          <td><center><a href="{{url('/component/download',['id'=>$component->id])}}" class="btn btn-warning col-lg-10" title="Descargar requerimientos específicos"><span class="fas fa-download"></span></a></center></td>
                                        </tr>
                                      @endforeach
                                      @foreach($subcomponents as $subcomponent)
                                        <tr>
                                          <td>Subcomponente: {{$subcomponent->name}}</td>
                                          <td><center><a target="_blank" href="{{asset($subcomponent->specific_requirements)}}" class="btn btn-inverse col-lg-10" title="Visualizar requerimientos específicos" ><span class="fas fa-eye"></span></a> </center></td>
                                          <td><center><a href="{{url('/subcomponent/download',['id'=>$subcomponent->id])}}" class="btn btn-warning col-lg-10" title="Descargar requerimientos específicos"><span class="fas fa-download"></span></a></center></td>
                                        </tr>
                                      @endforeach
                                      @foreach($concepts as $concept)
                                        <tr>
                                          <td>Concepto: {{$concept->name}}</td>
                                          <td><center><a target="_blank" href="{{asset($concept->specific_requirements)}}" class="btn btn-inverse col-lg-10" title="Visualizar requerimientos específicos" ><span class="fas fa-eye"></span></a> </center></td>
                                          <td><center><a href="{{url('/concept/download',['id'=>$concept->id])}}" class="btn btn-warning col-lg-10" title="Descargar requerimientos específicos"><span class="fas fa-download"></span></a></center></td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                          </div>
                       
                        
                          
                          
                          
                          
                          
                          
                          
                          
											</div>
                      
                      <div class="col-sm-12"><br><br>
												<center>
													
													<div class="contact-icon">
														
															<form id="form" name="form" action="{{ route('programs.destroy', ['id' => $program->id])}}" method="POST">
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Regresar"><i class="icofont icofont-arrow-left m-0"></i></button></a>
																@if(Auth::user()->type == 1 || Auth::user()->type == 2 )
                                <a href="{{ route('programs.edit', ['id' => $program->id]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="icofont icofont-edit m-0"></i></button></a>
																@endif
                                @if(Auth::user()->type == 1 )
                                <button  onclick="archiveFunction()" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" type="submit" title="Eliminar"><span class="icofont icofont-ui-delete"></span></button>
														    @endif	
                            </form>
														
													</div>
												</center>
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