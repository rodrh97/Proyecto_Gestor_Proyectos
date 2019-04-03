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
						<h4 style="text-transform: none;">Añadir programa sujeto a reglas de operación</h4>
						<span style="text-transform: none;">Llene los campos en la parte inferior para registrar un nuevo programa.</span>
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
						<li class="breadcrumb-item">Añadir Programa
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
						<form id="form" method="POST" action="{{ route('programs.createWithRulesOperation') }}" enctype="multipart/form-data">
							{!! csrf_field() !!}
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" placeholder=" Programa" value="{{ old('name') }}" title="Nombre de programa" required>
									@if ($errors->has('name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('name')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="description">Descripción:</label>
								<div class="col-sm-10">
                  <textarea class="form-control" name="description" placeholder=" Descripción del programa" cols="30" rows="8" title="Descripción del programa" required>{{ old('description') }}</textarea>	
									@if ($errors->has('description'))
										<div class="col-form-label" style="color:red;">{{$errors->first('description')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="poblacion">Población Objetivo:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="poblacion" placeholder="Población objetivo" value="{{ old('poblacion') }}" title="Población objetivo de programa" required>
									@if ($errors->has('poblacion'))
										<div class="col-form-label" style="color:red;">{{$errors->first('poblacion')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="unit_responsable">Unidad Responsable:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="unit_responsable" placeholder="Unidad Responsable" value="{{ old('unit_responsable') }}" title="Unidad Responsable de programa" required>
									@if ($errors->has('unit_responsable'))
										<div class="col-form-label" style="color:red;">{{$errors->first('unit_responsable')}}</div>
									@endif
								</div>
                
                <label class="col-sm-2 col-form-label" for="unit_ejecutora">Unidad Ejecutora:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="unit_ejecutora" placeholder="Unidad Ejecutora" value="{{ old('unit_ejecutora') }}" title="Unidad Ejecutora de programa" required>
									@if ($errors->has('unit_ejecutora'))
										<div class="col-form-label" style="color:red;">{{$errors->first('unit_ejecutora')}}</div>
									@endif
								</div>
							</div>
              
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Requerimientos Generales:</label>
								<div class="col-sm-10">
									<div class="file-upload">
										<div id="image-upload-wrap3" class="image-upload-wrap">
											<input id="image_input_3" class="file-upload-input" type='file' name="file3" onchange="readURLForComponents3(this);" accept="file/*" required/>
											<div style="padding-top:40px" onclick="$('#image_input_3').trigger('click' )">
												<center>
													<i style="font-size: 60px;" class="fas fa-cloud-upload-alt drag-icon"></i>
												</center>
											</div>
											<div class="drag-text">
												<span>Arrastre y suelte el archivo <span style="font-weight: bold; font-size:16px;"> aquí</span> o haga clic <span style="font-weight: bold; font-size:16px;"> aquí</span> para buscarlo en su equipo.</span>
											</div>
										</div>
										<div id="file-upload-content3" class="file-upload-content">
											<img class="file-upload-image"  id="file-upload-image3" src="#" alt="your image" />
											<div class="image-title-wrap">
												<button type="button" onclick="removeUpload3()" class="remove-image">Remover Archivo</button>
											</div>
										</div>
									</div>
                  @if ($errors->has('file3'))
										<div class="col-form-label" style="color:red;">{{$errors->first('file3')}}</div>
									@endif
								</div>
							</div><br>
              
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Convocatoria:</label>
								<div class="col-sm-10">
									<div class="file-upload">
										<div id="image-upload-wrap2" class="image-upload-wrap">
											<input id="image_input_2" class="file-upload-input" type='file' name="file2" onchange="readURLForComponents2(this);" accept="file/*" required/>
											<div style="padding-top:40px" onclick="$('#image_input_2').trigger('click' )">
												<center>
													<i style="font-size: 60px;" class="fas fa-cloud-upload-alt drag-icon"></i>
												</center>
											</div>
											<div class="drag-text">
												<span>Arrastre y suelte el archivo <span style="font-weight: bold; font-size:16px;"> aquí</span> o haga clic <span style="font-weight: bold; font-size:16px;"> aquí</span> para buscarlo en su equipo.</span>
											</div>
										</div>
										<div id="file-upload-content2" class="file-upload-content">
											<img class="file-upload-image"  id="file-upload-image2" src="#" alt="your image" />
											<div class="image-title-wrap">
												<button type="button" onclick="removeUpload2()" class="remove-image">Remover Archivo</button>
											</div>
										</div>
									</div>
                  @if ($errors->has('file2'))
										<div class="col-form-label" style="color:red;">{{$errors->first('file2')}}</div>
									@endif
								</div>
							</div>
              
               
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="vinculo">URL de la convocatoria:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="vinculo" placeholder="Link" value="{{ old('vinculo') }}" title="Link" required>
									@if ($errors->has('vinculo'))
										<div class="col-form-label" style="color:red;">{{$errors->first('vinculo')}}</div>
									@endif
								</div>
							</div>
              <br>
              <!--<hr>
              <div class="row"><h5 class="col-sm-4"><strong>Reglas de Operación</strong> </h5></div><br>
              <br>
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Cantidad de componentes que posee el programa:</label>
                <div class="col-sm-3">
                  <select name="num_componentes" id="num_componentes" onchange="cargarComponentes(this.value)" class="form-control">
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
              <div id="componentes"></div>
              <br>
              <div id="div_subcomponentes" style="display:none;">
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Cantidad de subcomponentes que posee el programa:</label>
                <div class="col-sm-3">
                  <select name="num_subcomponentes" id="num_subcomponentes" onchange="cargarSubcomponentes(this.value)" class="form-control">
                    <option value="Seleccionar">Seleccionar cantidad</option>
                    <option value="0">0</option>
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
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                  </select>
                </div>
              </div>
              </div>
              <div id="subcomponentes"></div>
              <br>-->
              <hr>
              <div class="row"><h5 class="col-sm-2"><strong>Anexos</strong> </h5></div><br>
              
               <div class="form-group row">
								<label class="col-sm-4 col-form-label" >Cantidad de anexos que desea cargar:</label>
								<div class="col-sm-3">
                  <select name="num_anexos" id="num_anexos" onchange="cargarAnexos(this.value)" class="form-control">
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
              
              </div><hr>
							<br>
							<center>
								<a style="color:white" onclick="returnURL('{{ url()->previous() }}')"  class="btn btn-primary"><i class="icofont icofont-arrow-left"></i>Regresar</a>
								<button type="submit" class="btn btn-success"><i class="icofont icofont-check-circled"></i>Guardar Programa</button>
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
/*
    function cargarComponentes(cantidad){
        if(cantidad != 0){
          var i;
          var div = document.getElementById("componentes");
          while (div.hasChildNodes()){
            div.removeChild(div.firstChild);
          }

          for(i = 0;i < cantidad; i++){
            var div_group = document.createElement("div");
            div_group.className = "form-group row";       

            var label = document.createElement("label");
            label.className = "col-sm-2 col-form-label";
            label.append("Componente:");

            var div_name = document.createElement("div");
            div_name.className = "col-sm-3"

            var input = document.createElement("input");
            input.type = "text";
            input.name = "nombre_componente[]";
            input.className = "form-control";
            input.required = "true";

            var label_file = document.createElement("label");
            label_file.className = "col-sm-2 col-form-label";
            label_file.append("Requerimientos específicos:");

            var div_file = document.createElement("div");
            div_file.className = "col-sm-5"

            var file = document.createElement("input");
            file.type = "file";
            file.name = "especificos_componente[]";
            file.className = "form-control";
            file.required = "true";
            
            var label_fecha_inicio = document.createElement("label");
            label_fecha_inicio.className = "col-sm-2 col-form-label";
            label_fecha_inicio.append("Fecha inicio:");
             
            var div_fecha_inicio = document.createElement("div");
            div_fecha_inicio.className = "col-sm-3";
            
            var input_fecha_inicio = document.createElement("input");
            input_fecha_inicio.type = "date";
            input_fecha_inicio.name = "fecha_inicio_componente[]";
            input_fecha_inicio.className = "form-control";
            
            var label_fecha_cierre = document.createElement("label");
            label_fecha_cierre.className = "col-sm-2 col-form-label";
            label_fecha_cierre.append("Fecha cierre:");
            
            var div_fecha_cierre = document.createElement("div");
            div_fecha_cierre.className = "col-sm-3";
            
            var input_fecha_cierre = document.createElement("input");
            input_fecha_cierre.type = "date";
            input_fecha_cierre.name = "fecha_cierre_componente[]";
            input_fecha_cierre.className = "form-control";
            
            div_name.appendChild(input);
            div_file.appendChild(file);
            div_fecha_inicio.appendChild(input_fecha_inicio);
            div_fecha_cierre.appendChild(input_fecha_cierre);
            
            div_group.appendChild(label);
            div_group.appendChild(div_name);
            div_group.appendChild(label_file);
            div_group.appendChild(div_file);
            div_group.appendChild(label_fecha_inicio);
            div_group.appendChild(div_fecha_inicio);
            div_group.appendChild(label_fecha_cierre);
            div_group.appendChild(div_fecha_cierre);
            
            div.appendChild(div_group);
            
            div.appendChild(document.createElement("br"));
          }
            
          document.getElementById("div_subcomponentes").style.display = "inline";
        }else{
           var div = document.getElementById("componentes");
            while (div.hasChildNodes()){
              div.removeChild(div.firstChild);
            }
          document.getElementById("div_subcomponentes").style.display = "none";
        }

    }
    
  function cargarSubcomponentes(cantidad){
        if(cantidad != "Seleccionar"){
          var i;
          var div = document.getElementById("subcomponentes");
          while (div.hasChildNodes()){
            div.removeChild(div.firstChild);
          }

          for(i = 0;i < cantidad; i++){
            var div_group = document.createElement("div");
            div_group.className = "form-group row";       

            var label = document.createElement("label");
            label.className = "col-sm-2 col-form-label";
            label.append("Subcomponente:");

            var div_name = document.createElement("div");
            div_name.className = "col-sm-3"

            var input = document.createElement("input");
            input.type = "text";
            input.name = "nombre_subcomponente[]";
            input.className = "form-control";
            input.required = "true";

            var label_file = document.createElement("label");
            label_file.className = "col-sm-2 col-form-label";
            label_file.append("Requerimientos específicos:");

            var div_file = document.createElement("div");
            div_file.className = "col-sm-5"

            var file = document.createElement("input");
            file.type = "file";
            file.name = "especificos_subcomponente[]";
            file.className = "form-control";
            file.required = "true";
            
            var label_fecha_inicio = document.createElement("label");
            label_fecha_inicio.className = "col-sm-2 col-form-label";
            label_fecha_inicio.append("Fecha inicio:");
             
            var div_fecha_inicio = document.createElement("div");
            div_fecha_inicio.className = "col-sm-3";
            
            var input_fecha_inicio = document.createElement("input");
            input_fecha_inicio.type = "date";
            input_fecha_inicio.name = "fecha_inicio_subcomponente[]";
            input_fecha_inicio.className = "form-control";
            
            var label_fecha_cierre = document.createElement("label");
            label_fecha_cierre.className = "col-sm-2 col-form-label";
            label_fecha_cierre.append("Fecha cierre:");
            
            var div_fecha_cierre = document.createElement("div");
            div_fecha_cierre.className = "col-sm-3";
            
            var input_fecha_cierre = document.createElement("input");
            input_fecha_cierre.type = "date";
            input_fecha_cierre.name = "fecha_cierre_subcomponente[]";
            input_fecha_cierre.className = "form-control";
            
            div_name.appendChild(input);
            div_file.appendChild(file);
            div_fecha_inicio.appendChild(input_fecha_inicio);
            div_fecha_cierre.appendChild(input_fecha_cierre);
            
            div_group.appendChild(label);
            div_group.appendChild(div_name);
            div_group.appendChild(label_file);
            div_group.appendChild(div_file);
            div_group.appendChild(label_fecha_inicio);
            div_group.appendChild(div_fecha_inicio);
            div_group.appendChild(label_fecha_cierre);
            div_group.appendChild(div_fecha_cierre);
            
            div.appendChild(div_group);
            
            div.appendChild(document.createElement("br"));
          }
            
          //document.getElementById("div_conceptos").style.display = "inline";
        }else{
           var div = document.getElementById("subcomponentes");
            while (div.hasChildNodes()){
              div.removeChild(div.firstChild);
            }
          //document.getElementById("div_conceptos").style.display = "none";
        }

    }*/
  
    function cargarAnexos(cantidad){
      if(cantidad != 0){
        var i;
        var div = document.getElementById("archivos");
        while (div.hasChildNodes()){
          div.removeChild(div.firstChild);
        }

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
          input.required = "true";

          var label_file = document.createElement("label");
          label_file.className = "col-sm-1 col-form-label";
          label_file.append("Archivo:");

          var div_file = document.createElement("div");
          div_file.className = "col-sm-5"

          var file = document.createElement("input");
          file.type = "file";
          file.name = "anexos[]";
          file.className = "form-control";
          file.accept = ".pdf,image/*";
          file.required = "true";
          file.id = "file"+i;
          div_name.appendChild(input);
          div_file.appendChild(file);
          div_group.appendChild(label);
          div_group.appendChild(div_name);
          div_group.appendChild(label_file);
          div_group.appendChild(div_file);
          div.appendChild(div_group);
          
        }

      }else{
         var div = document.getElementById("archivos");
          while (div.hasChildNodes()){
            div.removeChild(div.firstChild);
          }
      }
      
    }
  
  function read(input){
    var split = input.files[0]['name'].split(".");
    var extension = split[split.length - 1];
    var accepted_extentions = ['pdf', 'PDF', 'jpeg', 'JPEG', 'png', 'PNG', 'jpg', 'JPG', 'bmp', 'BMP'];
    var accepted_file = false;
    if (accepted_extentions.includes(extension)) {
        accepted_file = true; 
    }
    console.log("Hola");
  }
  
    function readURLForComponents3(input) {
    
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
                    $('#image-upload-wrap3').hide();

                    if(extension=="pdf" || extension=="PDF"){
                        $('#file-upload-image3').height(100);
                        $('#file-upload-image3').width(75);
                        $('#file-upload-image3').attr('src', window.location.href.split('/').slice(0, 3).join('/')+"/img/pdf_icon.png");
                    }else{
                        $('#file-upload-image3').css('height', 'auto');
                        $('#file-upload-image3').css('width', 'auto');
                        $('#file-upload-image3').attr('src', e.target.result);
                    }
                    $('#file-upload-content3').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);
                console.log(reader);
            }else{
                $("#image_input_3").val("");
                removeUpload3();
                swal({
                    icon: 'error',
                    title: 'Archivo demasiado grande',
                    text: 'El archivo supera los 4 MB de tamaño, por favor seleccione un archivo que no sobrepase los 4 MB de tamaño.',
                    buttons: 'Aceptar',
                });
            }
        } else {
            removeUpload3();
        }
    }else{
        $("#image_input_3").val("");
        swal({
            icon: 'error',
            title: 'Formato de archivo no valido',
            text: 'Por favor solo agregue archivos con los siguientes formatos validos: pdf, jpg, png, jpeg, bmp.',
            buttons: 'Aceptar',
        })

    }
     
}
    
function removeUpload3() {
    $('#image_input_3').replaceWith($('#image_input_3').clone());
    $("#image_input_3").val("");
    $('#file-upload-content3').hide();
    $('#image-upload-wrap3').show();
    $('.image-title').html('Ningún archivo cargado');
}
$('#image-upload-wrap3').bind('dragover', function() {
    $('#image-upload-wrap3').addClass('image-dropping');
});
$('#image-upload-wrap3').bind('dragleave', function() {
    $('#image-upload-wrap3').removeClass('image-dropping');
});
    
    
    function readURLForComponents2(input) {
    
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
                    $('#image-upload-wrap2').hide();

                    if(extension=="pdf" || extension=="PDF"){
                        $('#file-upload-image2').height(100);
                        $('#file-upload-image2').width(75);
                        $('#file-upload-image2').attr('src', window.location.href.split('/').slice(0, 3).join('/')+"/img/pdf_icon.png");
                    }else{
                        $('#file-upload-image2').css('height', 'auto');
                        $('#file-upload-image2').css('width', 'auto');
                        $('#file-upload-image2').attr('src', e.target.result);
                    }
                    $('#file-upload-content2').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);
                console.log(reader);
            }else{
                $("#image_input_2").val("");
                removeUpload2();
                swal({
                    icon: 'error',
                    title: 'Archivo demasiado grande',
                    text: 'El archivo supera los 4 MB de tamaño, por favor seleccione un archivo que no sobrepase los 4 MB de tamaño.',
                    buttons: 'Aceptar',
                });
            }
        } else {
            removeUpload2();
        }
    }else{
        $("#image_input_2").val("");
        swal({
            icon: 'error',
            title: 'Formato de archivo no valido',
            text: 'Por favor solo agregue archivos con los siguientes formatos validos: pdf, jpg, png, jpeg, bmp.',
            buttons: 'Aceptar',
        })

    }
     
}
    
function removeUpload2() {
    $('#file-upload-input2').replaceWith($('#file-upload-input2').clone());
    $("#image_input_2").val("");
    $('#file-upload-content2').hide();
    $('#image-upload-wrap2').show();
    $('.image-title').html('Ningún archivo cargado');
}
$('#image-upload-wrap2').bind('dragover', function() {
    $('#image-upload-wrap2').addClass('image-dropping');
});
$('#image-upload-wrap2').bind('dragleave', function() {
    $('#image-upload-wrap2').removeClass('image-dropping');
});
		
</script>
@endsection