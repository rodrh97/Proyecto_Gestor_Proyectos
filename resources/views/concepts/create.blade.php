@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")

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
						<form id="form" method="POST" action="{{ route('concepts.list') }}" enctype="multipart/form-data">
							{!! csrf_field() !!}

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" placeholder="Ej. Concepto 1" value="{{ old('name') }}" title="Nombre del componente">
									@if ($errors->has('name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('name')}}</div>
									@endif
								</div>
							</div>	
							<br>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="description">Descripción:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="description"   placeholder="Ej. Descripción del concepto." title="Descripción del concepto">{{ old('description') }}</textarea>
									@if ($errors->has('description'))
										<div class="col-form-label" style="color:red;">{{$errors->first('description')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="p_amount_max">Cantidad Máxima por Persona Física:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="p_amount_max"   placeholder="Ej. El monto máximo de apoyo federal por persona física será de hasta $500,000.00 (Quinientos mil pesos 00/100 M.N.)." title="Cantidad Máxima por Persona Física">{{ old('p_amount_max') }}</textarea>
									@if ($errors->has('p_amount_max'))
										<div class="col-form-label" style="color:red;">{{$errors->first('p_amount_max')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="m_amount_max">Cantidad Máxima por Persona Moral:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="10" cols="50" class="form-control" name="m_amount_max"   placeholder="Ej. El monto máximo de apoyo federal por persona moral será de hasta $5,000,000.00 (Cinco millones de pesos 00/100 M.N.)." title="Cantidad Máxima por Persona Moral">{{ old('m_amount_max') }}</textarea>
									@if ($errors->has('m_amount_max'))
										<div class="col-form-label" style="color:red;">{{$errors->first('m_amount_max')}}</div>
									@endif
								</div>
							</div>
              

              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Elija componente o subcomponente:</label>
								<div class="col-sm-10">
									<select class="select2_basic form-control" name="components"  value="{{ old('components') }}" title="Nombre del componente o subcomponente">
                    @foreach($components as $component)
                    <option value="component {{$component->id}}">Componente - {{$component->name}}</option>
                    @endforeach
                    @foreach($sub_components as $sub_component)
                    <option value="sub_component {{$sub_component->id}}">Sub-Componente - {{$sub_component->name}}</option>
                    @endforeach
                  </select>
									@if ($errors->has('components'))
										<div class="col-form-label" style="color:red;">{{$errors->first('components')}}</div>
									@endif
								</div>
							</div>
              
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Requerimientos Específicos:</label>
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
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="vinculo">URL:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="vinculo" placeholder="Link" value="{{ old('vinculo') }}" title="Link" required>
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

              <br><br>
							<center>
								<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"  class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-check-circled"></i>Guardar Concepto</button>
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
         var div = document.getElementById("archivos");
          /*while (div.hasChildNodes()){
            div.removeChild(div.firstChild);
          }*/
      }
      
    }
    
   
    
    
    
    
    
    
    
    
    
    
    
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