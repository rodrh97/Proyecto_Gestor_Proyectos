@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Editar Subcomponente")

@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
@case(2)
		@section('bodyMonitoreo')
		@break
@endswitch

<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="icofont icofont-ui-edit bg-success" ></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Editar el subcomponente: {{$subcomponent->id}}</h4>
						<span style="text-transform: none;">Formulario para la modificación de subcomponentes.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('subcomponents.list') }}">Subcomponentes</a>
						</li>
						<li class="breadcrumb-item">Modificar Subcomponente
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
						<form id="form" method="POST" action="{{ url("subcomponents/{$subcomponent->id}") }}" enctype="multipart/form-data">
							{{ method_field('PUT') }}
							{!! csrf_field() !!}

							 <div class="form-group row">
								<label class="col-sm-2 col-form-label" >Pertenece al componente:</label>
								<div class="col-sm-10">
                  <select name="component" id="component" class="select2_basic form-control" title="Componente">
                    @foreach($components as $component)
                      <option value="{{$component->id}}">{{$component->name}}</option>
                    @endforeach
                  </select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Nombre del subcomponente:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" placeholder="Ej. Subcomponente 1" value="{{ old('name',$subcomponent->name) }}" title="Nombre del subcomponente">
									@if ($errors->has('name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('name')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="description">Descripción:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="description"   placeholder="Ej. Descripción del concepto." title="Descripción del concepto">{{ old('description',$subcomponent->description) }}</textarea>
									@if ($errors->has('description'))
										<div class="col-form-label" style="color:red;">{{$errors->first('description')}}</div>
									@endif
								</div>
							</div>
             	<br>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Fecha de inicio:</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="start_date" value="{{ old('start_date',$subcomponent->start_date) }}" title="Fecha de Inicio">
									@if ($errors->has('start_date'))
										<div class="col-form-label" style="color:red;">{{$errors->first('start_date')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Fecha de cierre:</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="finish_date" value="{{ old('finish_date',$subcomponent->finish_date) }}" title="Fecha de Cierre">
									@if ($errors->has('finish_date'))
										<div class="col-form-label" style="color:red;">{{$errors->first('finish_date')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Requerimientos Específicos:</label>
								
								<div style="margin-top:10px" class="col-sm-10">
                  @if($subcomponent->specific_requirements != null)
                  <a href="{{asset($subcomponent->specific_requirements)}}" target="_blank"><i class="fas fa-mouse-pointer"></i> Click aquí para ver el actual archivo de requerimientos específicos</a><br><br>
                  @endif
									<div class="file-upload">
										<div class="image-upload-wrap">
											<input id="image_input" class="file-upload-input" type='file' name="image" onchange="readURLForComponents(this);" accept="image/*" />
											<div style="padding-top:40px" onclick="$('.file-upload-input').trigger('click' )">
												<center>
													<i style="font-size: 60px;" class="fas fa-cloud-upload-alt drag-icon"></i>
												</center>
											</div>
											<div class="drag-text">
												<span>Arrastre y suelte el archivo<span style="font-weight: bold; font-size:16px;"> aquí</span> o haga clic <span style="font-weight: bold; font-size:16px;"> aquí</span> para buscarlo en su equipo.</span>
											</div>
										</div>
										<div class="file-upload-content">
											<img class="file-upload-image" src="#" alt="your image" />
											<div class="image-title-wrap">
												<button type="button" onclick="removeUpload()" class="remove-image">Remover Archivo</button>
											</div>
										</div>
									</div>
									<div class="col-form-label" style="align:justify;"> * Si desea cambiarlo, agregue un nuevo archivo.</div>
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="vinculo">URL:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="vinculo" placeholder="Link" value="{{ old('vinculo',$subcomponent->vinculo) }}" title="Link" required>
									@if ($errors->has('vinculo'))
										<div class="col-form-label" style="color:red;">{{$errors->first('vinculo')}}</div>
									@endif
								</div>
							</div>
              
              <br><hr>
              
              <div class="row"><h5 class="col-sm-2"><strong>Anexos</strong> </h5></div><br>
             
             <div class="form-group row">
								<label class="col-sm-4 col-form-label" >Cantidad de anexos que desea cargar:</label>
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
								</div>
							</div>
              <div id="archivos">
              
              </div>
							<br>
							<center>
								<a style="color:white" onclick="confirmationOnReturn('{{ url()->previous() }}')" class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-refresh"></i>Actualizar Subcomponente</button>
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
	$(document).ready(function() {
		//Elementos a verificar sus modificaciones en la vista
		elements_id = [
			$('#name'),
		];

    document.ready = document.getElementById("component").value = "{{$subcomponent->component_id}}";
          $('#component').val('{{$subcomponent->component_id}}').trigger('change.select2');

		//checkIfChangesHaveBeenMadeIn(elements_id, unique_elements);
	});
  
  
  
    function cargarAnexos(cantidad){
      if(cantidad != 0){
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
          label.append("Nombre de Anexo:");

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
          div_file.className = "col-sm-4"

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
         var div = document.getElementById("archivos");
          /*while (div.hasChildNodes()){
            div.removeChild(div.firstChild);
          }*/
      }
      
    }
    
  
    
    
    
  
  
  
  
    $('.image-title').html('Ningún archivo cargado');
    
    function readURLForComponents(input) {
    
    var split = input.files[0]['name'].split(".");

    var extension = split[split.length - 1];

    var accepted_extentions = ['pdf', 'PDF', 'jpeg', 'JPEG', 'png', 'PNG', 'jpg', 'JPG', 'bmp', 'BMP'];

    var accepted_file = false;

    if (accepted_extentions.includes(extension)) {
        accepted_file = true;
    }

    if (accepted_file) {
        if (input.files && input.files[0]) {
            if(input.files[0]['size']<5242880){
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();

                    if(extension=="pdf" || extension=="PDF"){
                        $('.file-upload-image').height(100);
                        $('.file-upload-image').width(75);
                        $('.file-upload-image').attr('src', window.location.href.split('/').slice(0, 3).join('/')+"/img/pdf_icon.png");
                    }else{
                        $('.file-upload-image').css('height', 'auto');
                        $('.file-upload-image').css('width', 'auto');
                        $('.file-upload-image').attr('src', e.target.result);
                    }
                    $('.file-upload-content').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);
                console.log(reader);
            }else{
                $("#image_input").val("");
                removeUpload();
                swal({
                    icon: 'error',
                    title: 'Archivo demasiado grande',
                    text: 'El archivo supera los 5 MB de tamaño, por favor seleccione un archivo que no sobrepase los 4 MB de tamaño.',
                    buttons: 'Aceptar',
                });
            }
        } else {
            removeUpload();
        }
    }else{
        $("#image_input").val("");
        swal({
            icon: 'error',
            title: 'Formato de archivo no valido',
            text: 'Por favor solo agregue archivos con los siguientes formatos validos: pdf, jpg, png, jpeg, bmp.',
            buttons: 'Aceptar',
        })

    }
     
}
    
function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $("#image_input").val("");
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    $('.image-title').html('Ningún archivo cargado');
}
$('.image-upload-wrap').bind('dragover', function() {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function() {
    $('.image-upload-wrap').removeClass('image-dropping');
});
  
</script>
@endsection