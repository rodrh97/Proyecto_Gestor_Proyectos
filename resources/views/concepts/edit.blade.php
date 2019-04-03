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
					<i class="fa fa-plus bg-success"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Crear Concepto</h4>
						<span style="text-transform: none;">Llene los campos en la parte inferior para registrar un nuevo concepto.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('concepts.list') }}">Conceptos</a>
						</li>
						<li class="breadcrumb-item">Crear Concepto
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
						<form id="form" method="POST" action="{{ url("concepts/{$concept->id}") }}" enctype="multipart/form-data">
              {{ method_field('PUT') }}
							{!! csrf_field() !!}

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" placeholder="Ej. Concepto 1" value="{{ old('name',$concept->name) }}" title="Nombre del componente">
									@if ($errors->has('name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('name')}}</div>
									@endif
								</div>
							</div>	
							<br>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="p_amount_max">Cantidad Máxima por Persona Física:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="p_amount_max"   placeholder="Ej. El monto máximo de apoyo federal por persona física será de hasta $500,000.00 (Quinientos mil pesos 00/100 M.N.)." title="Cantidad Máxima por Persona Física">{{ old('p_amount_max',$concept->p_amount_max) }}</textarea>
									@if ($errors->has('p_amount_max'))
										<div class="col-form-label" style="color:red;">{{$errors->first('p_amount_max')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="m_amount_max">Cantidad Máxima por Persona Moral:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="m_amount_max"   placeholder="Ej. El monto máximo de apoyo federal por persona moral será de hasta $5,000,000.00 (Cinco millones de pesos 00/100 M.N.)." title="Cantidad Máxima por Persona Moral">{{ old('p_amount_max',$concept->m_amount_max) }}</textarea>
									@if ($errors->has('m_amount_max'))
										<div class="col-form-label" style="color:red;">{{$errors->first('m_amount_max')}}</div>
									@endif
								</div>
							</div>
              

              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Elija componente o subcomponente:</label>
								<div class="col-sm-10">
                  @if($flag==0)
                  <select class="form-control" name="components"  value="{{ old('components') }}" title="Nombre del componente o subcomponente">
                    @foreach($components as $component)
                    @if($concept->component_id==$component->id)
                    <option value="component {{$component->id}}" selected>Componente - {{$component->name}}</option>
                    @else
                    <option value="component {{$component->id}}">Componente - {{$component->name}}</option>
                    @endif
                    @endforeach
                    @foreach($sub_components as $sub_component)
                    <option value="sub_component {{$sub_component->id}}">Sub-Componente - {{$sub_component->name}}</option>
                    @endforeach
                  </select>
                  @else
                  <select class="form-control" name="components"  value="{{ old('components') }}" title="Nombre del componente o subcomponente">
                    @foreach($components as $component)
                    <option value="component {{$component->id}}">Componente - {{$component->name}}</option>
                    @endforeach
                    @foreach($sub_components as $sub_component)
                    @if($concept->sub_component_id==$sub_component->id)
                    <option value="sub_component {{$sub_component->id}}" selected>Sub-Componente - {{$sub_component->name}}</option>
                    @else
                    <option value="sub_component {{$sub_component->id}}">Sub-Componente - {{$sub_component->name}}</option>
                    @endif
                    @endforeach
                  </select>
                  @endif
									
									@if ($errors->has('components'))
										<div class="col-form-label" style="color:red;">{{$errors->first('components')}}</div>
									@endif
								</div>
							</div>
              
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Requerimientos Especificos:</label>
								<div class="col-sm-10">
									<div class="file-upload">
										<div class="image-upload-wrap">
											<input id="image_input" class="file-upload-input" type='file' name="file" onchange="readURLForComponents(this);" accept="image/*" />
											<div style="padding-top:40px" onclick="$('.file-upload-input').trigger('click' )">
												<center>
													<i style="font-size: 60px;" class="fas fa-cloud-upload-alt drag-icon"></i>
												</center>
											</div>
											<div class="drag-text">
												<span>Arrastre y suelte el archivo <span style="font-weight: bold; font-size:16px;"> aquí</span> o haga clic <span style="font-weight: bold; font-size:16px;"> aquí</span> para buscarlo en su equipo.</span>
											</div>
										</div>
										<div class="file-upload-content">
											<img class="file-upload-image" src="#" alt="your image" />
											<div class="image-title-wrap">
												<button type="button" onclick="removeUpload()" class="remove-image">Remover Archivo</button>
											</div>
										</div>
									</div>
                  @if ($errors->has('file'))
										<div class="col-form-label" style="color:red;">{{$errors->first('file')}}</div>
									@endif
								</div>
							</div>
              <br><br>
							<center>
								<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"  class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-refresh"></i>Actualizar Concepto</button>
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
		error_divs = [
			$('#error_id'),
		];
		verify_column($('#id'), 'id', 'components', null, $('#error_id'),
			'* El id que esta intentando ingresar no esta disponible.');

		//* Se verifica que no se ingrese un registro repedito para columnas unicas
		$('#id').keyup(function(e) {
			verify_column($('#id'), 'id', 'components', null, $('#error_id'),
				'* El id que esta intentando ingresar no esta disponible.');
		});
		//* Termina verificacion de columnas unicas
    
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
            if(input.files[0]['size']<4194304){
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
                    text: 'El archivo supera los 4 MB de tamaño, por favor seleccione un archivo que no sobrepase los 4 MB de tamaño.',
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