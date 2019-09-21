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
@endswitch
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fa fa-edit" style="background-color:#FFB64D;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Editar el proyecto: {{$project->id}}</h4>
						<span style="text-transform: none;">Formulario para la modificación de proyectos.</span>
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
						<li class="breadcrumb-item">Modificar Proyectos
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

						<form id="form" method="POST" enctype="multipart/form-data" action="{{ url("projects/{$project->id}") }}" >
							{{ method_field('PUT') }}
							{!! csrf_field() !!}
             <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="requested_concept">Concepto de Solicitud:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="requested_concept"   placeholder="Ej. El monto máximo de apoyo federal por persona física será de hasta $500,000.00 (Quinientos mil pesos 00/100 M.N.)." title="Concepto de Solicitud ">{{ old('requested_concept',$project->requested_concept) }}</textarea>
									@if ($errors->has('requested_concept'))
										<div class="col-form-label" style="color:red;">{{$errors->first('requested_concept')}}</div>
									@endif
								</div>
							</div>
              <br>
               <hr>
              <div class="row"><h5 class="col-sm-3"><strong>Documentación</strong> </h5></div><br>
            
             <div class="form-group row">
								<label class="col-sm-4 col-form-label" >Cantidad de documentos que desea cargar:</label>
                
								<div class="col-sm-3">
                  <select name="num_anexos" id="num_anexos" onchange="cargarAnexos(this.value)" class="select2_basic form-control">
                    <option value="0">Seleccionar cantidad</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                  </select>
                  @if ($errors->has('num_anexos'))
										<div class="col-form-label" style="color:red;">{{$errors->first('num_anexos')}}</div>
									@endif
								</div>
							</div>
               @if($documents_count==0)
               <label><b>* No tienes registrado ningún documento</b></label>
               @else
               <label>Documentos registrados {{$documents_count}}</label>
               <br>
               @foreach($documents as $document)
                <label><b>* {{$document->name}}</b></label><br>
               @endforeach
               @endif
              <div id="archivos">
               </div>
              <br><hr>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="status_project">Selecciona un estado para el proyecto:</label>
								<div class="col-sm-10">
									<select type="select" class="select2_basic form-control" name="status_project"  value="{{ old('status_project') }}" title="Nombre de los estados del proyecto">
									<option value="1">Seleccionar estado</option>
                    @foreach( $status_projects as $status_project)
                    <option value="{{$status_project->id}}">{{$status_project->name}}
                    </option>@endforeach</select>
                  @if ($errors->has('status_project'))
										<div class="col-form-label" style="color:red;">{{$errors->first('status_project')}}</div>
									@endif
								</div>
							</div>	
              <br>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="comments">Comentarios:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="comments"   placeholder="Ej. Documentación entregada" title="Concepto de Solicitud ">{{ old('comments') }}</textarea>
									@if ($errors->has('comments'))
										<div class="col-form-label" style="color:red;">{{$errors->first('comments')}}</div>
									@endif
								</div>
							</div>
              
              
              
              <br><br>
							<center>
								<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"  class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								
							  <button type="submit"  class="btn btn-success"><i class="icofont icofont-refresh"></i>Actualizar Proyecto</button>
              </center>
						</form>
           
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascriptcode')
	<script>
		//* Termina verificacion de columnas unicas
    function cargarAnexos(cantidad){
      if(cantidad != 0){
        //document.getElementById("guardar").style.display="inline";
        var i;
        var div = document.getElementById("archivos");
        /*while (div.hasChildNodes()){
          div.removeChild(div.firstChild);
          
        }*/
        

        for(i = 0;i < cantidad; i++){
          var div_group = document.createElement("div");
          div_group.className = "form-group row";       

          var label = document.createElement("label");
          label.className = "col-sm-2 col-form-label";
          label.append("Nombre del Documento:");

          var div_name = document.createElement("div");
          div_name.className = "col-sm-4"

          var input = document.createElement("input");
          input.type = "text";
          input.name = "nombre[]";
          input.className = "form-control";

          var label_file = document.createElement("label");
          label_file.className = "col-sm-1 col-form-label";
          label_file.append("Archivo:");

          var div_file = document.createElement("div");
          div_file.className = "col-sm-5"

          var file = document.createElement("input");
          file.type = "file";
          file.name = "anexos[]";
          file.accept = ".pdf,image/*";
          file.className = "form-control";
          div_name.appendChild(input);
          div_file.appendChild(file);
          div_group.appendChild(label);
          div_group.appendChild(div_name);
          div_group.appendChild(label_file);
          div_group.appendChild(div_file);
          div.appendChild(div_group);
          
        }
        $('#num_anexos').val('0').trigger('change.select2');
      }else{
        //document.getElementById("guardar").style.display="none";
         var div = document.getElementById("archivos");
          /*while (div.hasChildNodes()){
            div.removeChild(div.firstChild);
          }*/
        
      }
      
    }
	</script>
@endsection	