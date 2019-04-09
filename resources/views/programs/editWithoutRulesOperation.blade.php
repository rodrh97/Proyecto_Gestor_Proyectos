@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Editar Programa")

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
					<i class="icofont icofont-ui-edit" style="background:#ac7c64;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Editar el programa sin reglas de operación: {{$program->id}}</h4>
						<span style="text-transform: none;">Formulario para la modificación de programas.</span>
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
						<li class="breadcrumb-item">Modificar Programa
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
						<form id="form" method="POST" action="{{ url("programs/{$program->id}") }}" enctype="multipart/form-data">
							{{ method_field('PUT') }}
							{!! csrf_field() !!}

							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="name">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" placeholder=" Programa" value="{{ old('name',$program->name) }}" title="Nombre de programa" required>
									@if ($errors->has('name'))
										<div class="col-form-label" style="color:red;">{{$errors->first('name')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="description">Descripción:</label>
								<div class="col-sm-10">
                  <textarea class="form-control" name="description" placeholder=" Descripción del programa" cols="30" rows="8" title="Descripción del programa" required>{{ old('description',$program->description) }}</textarea>	
									@if ($errors->has('description'))
										<div class="col-form-label" style="color:red;">{{$errors->first('description')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="poblacion">Población Objetivo:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="poblacion" placeholder="Población objetivo" value="{{ old('poblacion',$program->target_population) }}" title="Población objetivo de programa" required>
									@if ($errors->has('poblacion'))
										<div class="col-form-label" style="color:red;">{{$errors->first('poblacion')}}</div>
									@endif
								</div>
							</div>
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="unit_responsable">Unidad Responsable:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="unit_responsable" placeholder="Unidad Responsable" value="{{ old('unit_responsable',$program->responsable_unit) }}" title="Unidad Responsable de programa" required>
									@if ($errors->has('unit_responsable'))
										<div class="col-form-label" style="color:red;">{{$errors->first('unit_responsable')}}</div>
									@endif
								</div>
                
                <label class="col-sm-2 col-form-label" for="unit_ejecutora">Unidad Ejecutora:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="unit_ejecutora" placeholder="Unidad Ejecutora" value="{{ old('unit_ejecutora',$program->executing_unit) }}" title="Unidad Ejecutora de programa" required>
									@if ($errors->has('unit_ejecutora'))
										<div class="col-form-label" style="color:red;">{{$errors->first('unit_ejecutora')}}</div>
									@endif
								</div>
							</div>
              
              
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="start_date">Fecha de Inicio:</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="start_date" placeholder="Fecha de Inicio" value="{{ old('start_date',$program->start_date) }}" title="Fecha de Inicio de programa" required>
									@if ($errors->has('start_date'))
										<div class="col-form-label" style="color:red;">{{$errors->first('start_date')}}</div>
									@endif
								</div>
                
                <label class="col-sm-2 col-form-label" for="finish_date">Fecha de Cierre:</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="finish_date" placeholder="Fecha de Cierre" value="{{ old('finish_date',$program->finish_date) }}" title="Fecha de Cierre de programa" required>
									@if ($errors->has('finish_date'))
										<div class="col-form-label" style="color:red;">{{$errors->first('finish_date')}}</div>
									@endif
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="p_amount_max">Cantidad Máxima por Persona Física:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="8" cols="50" class="form-control" name="p_amount_max"   placeholder="Ej. El monto máximo de apoyo federal por persona física será de hasta $500,000.00 (Quinientos mil pesos 00/100 M.N.)." title="Cantidad Máxima por Persona Física" required>{{ old('p_amount_max',$program->p_amount_max) }}</textarea>
									@if ($errors->has('p_amount_max'))
										<div class="col-form-label" style="color:red;">{{$errors->first('p_amount_max')}}</div>
									@endif
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="m_amount_max">Cantidad Máxima por Persona Moral:</label>
								<div class="col-sm-10">
                  <textarea type="text" rows="8" cols="50" class="form-control" name="m_amount_max"   placeholder="Ej. El monto máximo de apoyo federal por persona moral será de hasta $5,000,000.00 (Cinco millones de pesos 00/100 M.N.)." title="Cantidad Máxima por Persona Moral" required>{{ old('m_amount_max',$program->m_amount_max) }}</textarea>
									@if ($errors->has('m_amount_max'))
										<div class="col-form-label" style="color:red;">{{$errors->first('m_amount_max')}}</div>
									@endif
								</div>
							</div>
              
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Requerimientos Generales:</label>
								<div class="col-sm-10">
									<div class="file-upload">
										<div id="image-upload-wrap3" class="image-upload-wrap">
											<input id="image_input_3" class="file-upload-input" type='file' name="file3" onchange="readURLForComponents3(this);" accept="image/*" />
											<div style="padding-top:40px" onclick="$('.file-upload-input').trigger('click' )">
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
                  <div class="col-form-label" style="align:justify;"> * Si desea cambiarlo, agregue un nuevo archivo.</div>
								</div>
							</div>
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Requerimientos Específicos:</label>
								<div class="col-sm-10">
									<div class="file-upload">
										<div id="image-upload-wrap1" class="image-upload-wrap">
											<input id="image_input_1" class="file-upload-input" type='file' name="file" onchange="readURLForComponents1(this);" accept="image/*" />
											<div style="padding-top:40px" onclick="$('.file-upload-input').trigger('click' )">
												<center>
													<i style="font-size: 60px;" class="fas fa-cloud-upload-alt drag-icon"></i>
												</center>
											</div>
											<div class="drag-text">
												<span>Arrastre y suelte el archivo <span style="font-weight: bold; font-size:16px;"> aquí</span> o haga clic <span style="font-weight: bold; font-size:16px;"> aquí</span> para buscarlo en su equipo.</span>
											</div>
										</div>
										<div id="file-upload-content1" class="file-upload-content">
											<img class="file-upload-image"  id="file-upload-image1" src="#" alt="your image" />
											<div class="image-title-wrap">
												<button type="button" onclick="removeUpload1()" class="remove-image">Remover Archivo</button>
											</div>
										</div>
									</div>
                  @if ($errors->has('file'))
										<div class="col-form-label" style="color:red;">{{$errors->first('file')}}</div>
									@endif
                  <div class="col-form-label" style="align:justify;"> * Si desea cambiarlo, agregue un nuevo archivo.</div>
								</div>
							</div>
              
              
              <div class="form-group row">
								<label class="col-sm-2 col-form-label">Archivo de Convocatoria:</label>
								<div class="col-sm-10">
									<div class="file-upload">
										<div id="image-upload-wrap2" class="image-upload-wrap">
											<input id="image_input_2" class="file-upload-input" type='file' name="file2" onchange="readURLForComponents2(this);" accept="image/*" />
											<div style="padding-top:40px" onclick="$('.file-upload-input').trigger('click' )">
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
                  <div class="col-form-label" style="align:justify;"> * Si desea cambiarlo, agregue un nuevo archivo.</div>
								</div>
							</div>
              
               <div class="form-group row">
								<label class="col-sm-2 col-form-label" for="vinculo">URL de la convocatoria:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="vinculo" placeholder="Link" value="{{ old('vinculo',$program->vinculo) }}" title="Link" required>
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
          file.required = "true";
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
    /*
    families_table=$('#families_datatable').DataTable({
			responsive: true,
			dom: 't'
		});
      
     families = [];
    
    contador = 0;
		var old_families_str="";
		@if(old('families_input')!="")
			old_families_str='@php echo(old('families_input')) @endphp';
		@endif
    
    if(old_families_str.length>0){
			var json=JSON.parse(old_families_str);
			var max=0;
			for(var i=0;i<json.length;i++){
				if(json[i][0]>max)
					max=json[i][0];
				families.push([json[i][0],json[i][1],json[i][2],json[i][3],json[i][4]]);
			}

			redraw_family_table();
		}
    
    $("#add_material_family_btn").click(function(){
			add_family();
		});
    
    archivos_data = [];
    function add_family(){
      exists=false;
      if( $("#nombre_anexo").val() == "" || $("#archivo_anexo").val() == ""){
        swal({
                icon: 'error',
                title: 'Datos Faltantes',
                text: 'Favor de no dejar un campo en blanco.',
                buttons: 'Aceptar',
            });
      }else{
          for(var i=0;i<families.length;i++)
            if($("#nombre_anexo").val()==families[i][1])
              exists=true;

          if(!exists){
            //families.push(["1", "hola", "hola"]);
            //input = document.getElementById('archivo_anexo');
            //file = input.files[0];
            //fr = new FileReader();
            //fr.readAsDataURL(files[0]);
            //archivos_data.push(fr.result);
            
            //console.log(archivos_data);
            
            families.push([contador, $("#nombre_anexo").val(),$("#archivo_anexo").val()]);
            contador++;
            document.getElementById("nombre_anexo").value = "";
            document.getElementById("archivo_anexo").value = "";
            redraw_family_table();
            $("#families_input").val(JSON.stringify(families));
            //$("#archivos_data").val(JSON.stringify(archivos_data));
          }else{
            swal({
                    icon: 'error',
                    title: 'Anexo repetido',
                    text: 'Favor de verificar el nombre del anexo.',
                    buttons: 'Aceptar',
                });
          }

      }
      
      

    }

	function redraw_family_table(){
		families_table.clear();
		for(var i=0;i<families.length;i++){
			families_table.row.add([
				families[i][1],
				families[i][2],
				'<center><button type="button" onclick="delete_family('+families[i][0]+')" style="height:29px; width: 29px; padding:0px; margin:0px" id="family_delete_btn" title="Remover anexo" class="btn btn-danger">&nbsp;<i class="fas fa-trash-alt"></i></button></center>'
			]);
		}

		families_table.draw();
	}

	function delete_family(id){
		for(var i=0;i<families.length;i++){
			if(families[i][0]==id){
				if(families[i][4]==true)
					families[0][4]=true;
				families.splice(i, 1);
			}
		}
		redraw_family_table();
		if(families.length==0){
			$("#families_input").val('');
		}else{
			$("#families_input").val(JSON.stringify(families));
		}
	}  
    
    
    
    
    
    
    
    
    
    
   */
    
    error_divs = [
			$('#error_id'),
		];
		
    
    $('.image-title').html('Ningún archivo cargado');
    
    function readURLForComponents1(input) {
    
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
                    $('#image-upload-wrap1').hide();

                    if(extension=="pdf" || extension=="PDF"){
                        $('#file-upload-image1').height(100);
                        $('#file-upload-image1').width(75);
                        $('#file-upload-image1').attr('src', window.location.href.split('/').slice(0, 3).join('/')+"/img/pdf_icon.png");
                    }else{
                        $('#file-upload-image1').css('height', 'auto');
                        $('#file-upload-image1').css('width', 'auto');
                        $('#file-upload-image1').attr('src', e.target.result);
                    }
                    $('#file-upload-content1').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);
            }else{
                $("#image_input_1").val("");
                removeUpload1();
                swal({
                    icon: 'error',
                    title: 'Archivo demasiado grande',
                    text: 'El archivo supera los 4 MB de tamaño, por favor seleccione un archivo que no sobrepase los 4 MB de tamaño.',
                    buttons: 'Aceptar',
                });
            }
        } else {
            removeUpload1();
        }
    }else{
        $("#image_input_1").val("");
        swal({
            icon: 'error',
            title: 'Formato de archivo no valido',
            text: 'Por favor solo agregue archivos con los siguientes formatos validos: pdf, jpg, png, jpeg, bmp.',
            buttons: 'Aceptar',
        })

    }
     
}
    
function removeUpload1() {
    $('#image_input_1').replaceWith($('#image_input_1').clone());
    $("#image_input_1").val("");
    $('#file-upload-content1').hide();
    $('#image-upload-wrap1').show();
    $('.image-title').html('Ningún archivo cargado');
}
$('#image-upload-wrap1').bind('dragover', function() {
    $('#image-upload-wrap1').addClass('image-dropping');
});
$('#image-upload-wrap1').bind('dragleave', function() {
    $('#image-upload-wrap1').removeClass('image-dropping');
});
    
    
    
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
