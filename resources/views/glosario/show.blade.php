@extends('layouts.app')

@section('title',"Sistema de Gestion de Proyectos")

@section('body')
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont icofont-eye-alt" style="background:#39ADB5;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;"> Definición de: {{$word->word}}</h4>
						<span style="text-transform: none;">Ver definición de palabras.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('glosario.list') }}">Glosario</a>
						</li>
						<li class="breadcrumb-item">Definición
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Page-header end -->

	<div class="page-body">
		<div class="row">
			<div class="col-sm-12">
				<!-- Basic Form Inputs card start -->
				<div class="card">
					<div class="card-block">
						<h4 class="sub-title">Definición</h4>

						<div class="row">
							<div class="col-md-12 col-xl-12 ">
								<div class="card-block user-detail-card">
									

									<div class="row">
										<div class="col-sm-12 user-detail">
											<div class="row">
												<div class="col-sm-4">
													<h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-v-card"></i>ID :</h6>
												</div>
												<div class="col-sm-8">
													<h6 class="m-b-30"><strong>{{ $word->id }}</strong></h6>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<h6 class="f-w-400 m-b-30"><i class="icofont icofont-cube"></i>Nombre :</h6>
												</div>
												<div class="col-sm-8">
													<h6 class="m-b-30">{{ $word->word }}</h6>
												</div>
											</div>
                      <div class="row">
												<div class="col-sm-4">
													<h6 class="f-w-400 m-b-30"><i class="icofont icofont-cube"></i>Definición :</h6>
												</div>
												<div class="col-sm-8">
													<h6 class="m-b-30">{{ $word->definition }}</h6>
												</div>
											</div>
										</div>
									</div>
                  
                  
								</div>
							</div>
						</div>
						<center>
								<form id="form" name="form" action="{{ route('glosario.destroy', ['id' => $word->id])}}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<a style="color:white" onclick="returnURL('{{ url()->previous() }}')" class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>

									<a href="{{ route('glosario.edit', ['id' => $word->id]) }}"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="icofont icofont-edit m-0"></i></button></a>
									<button onclick="archiveFunction()" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" type="submit" title="Eliminar"><span class="icofont icofont-ui-delete"></span></button>
								</form>
							
							<br /><br />
						</center>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
