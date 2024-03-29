@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Editar Componente")

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
					<i class="icofont icofont-ui-edit bg-success"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Editar el componente: {{$component->id}}</h4>
						<span style="text-transform: none;">Formulario para la modificación de componentes.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('components.list') }}">Componentes</a>
						</li>
						<li class="breadcrumb-item">Modificar Componente
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
						<form id="form" method="POST" action="{{ url("components/{$component->id}") }}" enctype="multipart/form-data">
							{{ method_field('PUT') }}
							{!! csrf_field() !!}

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Pertenece al programa:</label>
								<div class="col-sm-10">
									<select name="program" id="program_id" class="select2_basic form-control">
                    @foreach($programs as $program)
                      <option value="{{$program->id}}">{{$program->name}}</option>
                    @endforeach
                  </select>
								</div>
							</div>	
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Nombre del componente:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" placeholder="Ej. Componente 1" value="{{ old('name',$component->name) }}" title="Nombre del componente">
									@if ($errors->has('name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('name')}}</div>
									@endif
								</div>
							</div>	
							<br>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Fecha de inicio:</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="start_date" value="{{ old('start_date',$component->start_date) }}" title="Fecha de Inicio">
									@if ($errors->has('start_date'))
										<div class="col-form-label" style="color:red;">{{$errors->first('start_date')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Fecha de cierre:</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="finish_date" value="{{ old('finish_date',$component->finish_date) }}" title="Fecha de Cierre">
									@if ($errors->has('finish_date'))
										<div class="col-form-label" style="color:red;">{{$errors->first('finish_date')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Requerimientos Específicos:</label>
								
								<div style="margin-top:10px" class="col-sm-10">
                  @if($component->path != null)
                  <a href="{{asset($component->path)}}" target="_blank"><i class="fas fa-mouse-pointer"></i> Click aquí para ver el actual archivo de requerimientos específicos</a><br><br>
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
									<input type="text" class="form-control" name="vinculo" placeholder="Link" value="{{ old('vinculo',$component->vinculo) }}" title="Link" required>
									@if ($errors->has('vinculo'))
										<div class="col-form-label" style="color:red;">{{$errors->first('vinculo')}}</div>
									@endif
								</div>
							</div>
							<br>
							<center>
								<a style="color:white" onclick="confirmationOnReturn('{{ url()->previous() }}')" class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-refresh"></i>Actualizar Componente</button>
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
  
     document.ready = document.getElementById("program_id").value = "{{$component->program_id}}";
      $('#program_id').val('{{$component->program_id}}').trigger('change.select2');
		//checkIfChangesHaveBeenMadeIn(elements_id, unique_elements);
	});
  
  
  
  
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