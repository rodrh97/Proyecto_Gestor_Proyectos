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
					<i class="fa fa-plus bg-warning"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Crear Solicitante</h4>
						<span style="text-transform: none;">Llene los campos en la parte inferior para registrar una nuevo solicitante.</span>
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
						<li class="breadcrumb-item"><a href="{{ route('applicants.list') }}">Solicitantes</a>
						</li>
						<li class="breadcrumb-item">Crear Solicitante
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
						<form id="form" method="POST" action="{{ route('applicants.list') }}" >
							{!! csrf_field() !!}

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="first_name">Nombre(s):</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="first_name" placeholder="Ej. Juan" value="{{ old('first_name') }}" title="Nombre(s) del solicitante">
									@if ($errors->has('first_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('first_name')}}</div>
									@endif
								</div>
							</div>	
							
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="last_name">Apellido Paterno:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="last_name" placeholder="Ej. Lopez" value="{{ old('last_name') }}" title="Apellido Paterno del solicitante">
									@if ($errors->has('last_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('last_name')}}</div>
									@endif
								</div>
							</div>	
							
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="second_last_name">Apellido Materno:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="second_last_name" placeholder="Ej. Perez" value="{{ old('second_last_name') }}" title="Apellido Materno del solicitante">
									@if ($errors->has('second_last_name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('second_last_name')}}</div>
									@endif
								</div>
							</div>	
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="type">Tipo de Solicitante:</label>
								<div class="col-sm-10">
                  <select class="form-control" name="type"  value="{{ old('type') }}" title="Tipo de solicitante">
                    <option value="Fisico">Persona Física</option>
                    <option value="Moral">Persona Moral</option>
                  </select>
									@if ($errors->has('type'))
										<div class="col-form-label" style="color:red;">{{$errors->first('type')}}</div>
									@endif
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="phone">Teléfono:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="phone" placeholder="Ej. (834) 1234567" value="{{ old('phone') }}" title="Telefono del solicitante">
									@if ($errors->has('phone'))
										<div class="col-form-label" style="color:red;">{{$errors->first('phone')}}</div>
									@endif
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="city">Ciudad:</label>
								<div class="col-sm-4">
									{!! Form::select('city',$cities,null,['id'=>'city','class'=>'form-control']) !!}
									@if ($errors->has('city'))
										<div class="col-form-label" style="color:red;">{{$errors->first('city')}}</div>
									@endif
								</div>
                <label class="col-sm-2 col-form-label" for="ejido">Localidad:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="ejido" placeholder="Ej. Libertad" value="{{ old('ejido') }}" title="Ejido donde vive el solicitante">
									@if ($errors->has('ejido'))
										<div class="col-form-label" style="color:red;">{{$errors->first('ejido')}}</div>
									@endif
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="colony">Colonia:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="colony" placeholder="Ej. Colonia Chapultepec" value="{{ old('colony') }}" title="Colonia donde vive el solicitante">
									@if ($errors->has('colony'))
										<div class="col-form-label" style="color:red;">{{$errors->first('colony')}}</div>
									@endif
								</div>
                <label class="col-sm-2 col-form-label" for="street">Calle:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="street" placeholder="Ej. Calle Juan Escutia" value="{{ old('street') }}" title="Calle donde vive el solicitante">
									@if ($errors->has('street'))
										<div class="col-form-label" style="color:red;">{{$errors->first('street')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="number">Número de casa:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="number" placeholder="Ej. #412 o s/n" value="{{ old('number') }}" title="Numero de casa del solicitante">
									@if ($errors->has('number'))
										<div class="col-form-label" style="color:red;">{{$errors->first('number')}}</div>
									@endif
								</div>
                <label class="col-sm-2 col-form-label" for="zip">Código Postal:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="zip" placeholder="Ej. 87100" value="{{ old('zip') }}" title="Codigo postal del solicitante">
									@if ($errors->has('zip'))
										<div class="col-form-label" style="color:red;">{{$errors->first('zip')}}</div>
									@endif
								</div>
							</div>
              <br>
              
              <br><br>
							<center>
								<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"  class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-check-circled"></i>Guardar Solicitante</button>
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
    console.log(input.files);
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