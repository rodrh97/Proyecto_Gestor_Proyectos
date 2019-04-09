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
					<i class="fa fa-download" style="background-color:gray;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Reportes</h4>
						<span style="text-transform: none;">Realizar reportes.</span>
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
						<li class="breadcrumb-item">Reportes
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
						<h4 class="sub-title"><i class="icofont icofont-filter"></i> Filtros</h4>
						<form id="form" method="POST" action="{{ route('reports.ObtenerDatosCon') }}">
							{!! csrf_field() !!}

							<div class="row">
								<div class="col-sm-12 col-xl-6">
									<p>Programas: </p>
									<select id="program_id" name="program_id" class="select2_basic" title="Seleccione un programa" data-toggle="tooltip" data-placement="top">
										<option value="">Todos</option>
										@foreach ($programs as $program)
											<option value="{{ $program->id }}" {{ (old("program_id") == $program->id ? "selected":"") }}>{{ $program->name }} </option>
										@endforeach
									</select>
								</div>
                <div class="col-sm-12 col-xl-6">
										<p>Solicitantes: </p>
										<select id="solicitante_id" name="solicitante_id" class="select2_basic" title="Seleccione un solicitante"data-toggle="tooltip" data-placement="top">
											<option value="">Todos</option>
											@foreach ($solicitantes as $solicitante)
												<option value="{{ $solicitante->id }}" {{ (old("solicitante_id") == $solicitante->id ? "selected":"") }}>{{ $solicitante->first_name }} {{ $solicitante->last_name }} {{ $solicitante->second_last_name }}</option>
											@endforeach
										</select>
									</div>
							</div>
              <br>
								<div class="row">
									<div class="col-sm-12 col-xl-6">
										<p>Proyectos: </p>
										<select id="project_id" name="project_id" class="select2_basic" title="Seleccione un proyecto" data-toggle="tooltip" data-placement="top">
											<option value="">Todos</option>
											@foreach ($projects as $project)
												<option value="{{ $project->id }}" {{ (old("project_id") == $project->id ? "selected":"") }}>{{ $project->id }}</option>
											@endforeach
										</select>
									</div>
                  <div class="col-sm-12 col-xl-6">
									<p>Estado de proyecto: </p>
									<select id="status_id" name="status_id" class="select2_basic" title="Seleccione el estado del proyecto" data-toggle="tooltip" data-placement="top">
										<option value="" selected>Todos</option>
										<option value="1" {{ (old("status_id") == 1 ? "selected":"") }}>Incompleto</option>
										<option value="2" {{ (old("status_id") == 2 ? "selected":"") }}>Información completa sin proyecto</option>
                    <option value="3" {{ (old("status_id") == 3 ? "selected":"") }}>Información completa con proyecto</option>
                    <option value="4" {{ (old("status_id") == 4 ? "selected":"") }}>Expediente revisado</option>
                    <option value="5" {{ (old("status_id") == 5 ? "selected":"") }}>Expediente en vinculación</option>
                    <option value="6" {{ (old("status_id") == 6 ? "selected":"") }}>Expediente en ventanilla</option>
                    <option value="7" {{ (old("status_id") == 7 ? "selected":"") }}>Aprobado</option>
                    <option value="8" {{ (old("status_id") == 8 ? "selected":"") }}>Rechazado</option>
									</select>
								</div>
								</div>


							<br />
							<div class="row">
								<div class="col-sm-12 col-xl-6">
									<p>Rango de Fecha: </p>
									<div class=" input-group" >
										<span class="input-group-addon" id="del_btn" style="background-color:gray">Del</span>
										<input type="date" autocomplete="off" style="height: 46px;" class="input-sm form-control" id="start" name="start" />
										<span class="input-group-addon" id="al_btn" style="background-color:gray">al</span>
										<input type="date" autocomplete="off" style="height: 46px;" class="input-sm form-control" id="end" name="end" />
										<span class="input-group-addon" id="reset_btn" title="Borrar fechas seleccionadas" style="background-color:#c34242" data-toggle="tooltip" data-placement="top">x</span>

									</div>
								</div>
								<div class="col-sm-12 col-xl-6">
									<br /><br />
									<center>
										<button type="button" id="search_report" style="height: 46px; width: 100%;" class="btn btn-success"><i class="icofont icofont-filter"></i>Filtrar</button>
									</center>
								</div>
								</div>
								<br>
						</form>
					</div>
				</div>
			</div>

			<div id="results_section" class="col-sm-12">
				<div class="card">
					<div class="card-block">
						<!--<div class="row">
							<div class="col-sm-4">
								<div class="form-group row">
									<label class="col-sm-9 col-form-label" for="username">Num. de Asesorias Individuales:</label>
									<div class="col-sm-3">
										<strong>
											<p id="cant_a_individuales" style="font-size:30px; padding-top:3px">
												0
											</p>
										</strong>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group row">
									<label class="col-sm-9 col-form-label" for="username">Num. de Asesorias Grupales:</label>
									<div class="col-sm-3">
										<strong>
											<p id="cant_a_grupales" style="font-size:30px; padding-top:3px">
												0
											</p>
										</strong>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group row">
									<label class="col-sm-9 col-form-label" for="username">Total de Asesorias:</label>
									<div class="col-sm-3">
										<strong>
											<p id="cant_asesorias" style="font-size:30px; padding-top:3px">
												0
											</p>
										</strong>
									</div>
								</div>
							</div>
						</div>-->
						<h4 class="sub-title"><i class="icofont icofont-search"></i> Resultados</h4>
						<div class="dt-responsive table-responsive">
							<table style="width:100%;" id="datatable_reports" class="table table-striped table-bordered">
								@if ((!empty($asesorias)))
									<thead id="table_header">
										<tr>
                      <th scope="col" style="width: 10%">Folio interno de proyecto</th>
                      <th scope="col" style="width: 20%">Folio externo de proyecto</th>
                      <th scope="col" style="width: 20%">Solicitante</th>
											<th scope="col" style="width: 20%">Programa</th>
                      <th scope="col" style="width: 20%">Concepto solicitado</th>
											<th scope="col" style="width: 10%">Estatus del proyecto</th>
											<th scope="col" style="width: 20%">Fecha</th>
                      
										</tr>
									</thead>
									<tbody></tbody>
								@endif
								<tfoot>
									<tr id="table_footer">
										<th style="padding-right: 2.8%" scope="col">Folio interno de proyecto</th>
                    <th style="padding-right: 2.8%" scope="col">Folio externo de proyecto</th>
										<th style="padding-right: 2.8%" scope="col">Solicitante</th>
                    <th style="padding-right: 2.8%" scope="col">Programa</th>
                    <th style="padding-right: 2.8%" scope="col">Concepto solicitado</th>
                    <th style="padding-right: 2.8%" scope="col">Estatus del proyecto</th>
                    <th style="padding-right: 2.8%" scope="col">Fecha</th>
                    
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascriptcode')
<script>
	var dt_reports;
	var message = "";
	var subheader = "";
	var margin1;
	var margin2;
	var cant_asesorias_individuales = 0;
	var cant_asesorias_grupales = 0;
	var actual_text = "";
	var message2 = "";
	$(document).ready(function() {
		$("#program_id").val('').change();

		var date = new Date();
		var month = "";
		switch ((date.getMonth()+1)) {
			case 1:
				month = "Enero";
				break;
			case 2:
				month = "Febrero";
				break;
			case 3:
				month = "Marzo";
				break;
			case 4:
				month = "Abril";
				break;
			case 5:
				month = "Mayo";
				break;
			case 6:
				month = "Junio";
				break;
			case 7:
				month = "Julio";
				break;
			case 8:
				month = "Agosto";
				break;
			case 9:
				month = "Septiembre";
				break;
			case 10:
				month = "Octubre";
				break;
			case 11:
				month = "Noviembre";
				break;
			case 12:
				month = "Diciembre";
				break;
			default:

		}
		var jsFileNameDate = 'Reporte_'+date.getDate()+'_'+month+'_'+date.getFullYear();
		jsFileNameDate.toString()

		dt_reports = $('#datatable_reports').DataTable({
			columns: [
				{title: "Folio interno del proyecto"},
        {title: "Folio externo del proyecto"},
        {title: "Solicitante"},
        {title: "Programa"},
        {title: "Concepto solicitado"},
        {title: "Estatus del proyecto"},
        {title: "Fecha"},
			],
			responsive: true,
			dom: 'Bfrtip',
			"buttons": [
							{
								text: 'Exportar PDF',
								extend: 'pdfHtml5',
								filename: jsFileNameDate,
								orientation: 'landscape',
								pageSize: 'A4',
								exportOptions: {
									search: 'applied',
									order: 'applied'
								},
								customize: function (doc) {

									doc.content.splice(0,1);

									var now = new Date();
									var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

									var tam_logo = 'data:image/png;base64,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';

                        var logo = 'data:image/jpeg;base64,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';

									doc.pageMargins = [40,100,20,30];

									doc.defaultStyle.fontSize = 11;

									doc.styles.tableHeader.fontSize = 12;

									doc['header']=(function() {

										if ((now.getMonth()+1) == 1 || (now.getMonth()+1) == 2 || (now.getMonth()+1) == 3 || (now.getMonth()+1) == 4) {
											periodo = "Periodo: Enero - Abril " + now.getFullYear();
											periodo = periodo.toString();
										} else if((now.getMonth()+1) == 5 || (now.getMonth()+1) == 6 || (now.getMonth()+1) == 7 || (now.getMonth()+1) == 8){
											periodo = "Periodo: Mayo - Agosto " + now.getFullYear();
											periodo = periodo.toString();
										} else if((now.getMonth()+1) == 9 || (now.getMonth()+1) == 10 || (now.getMonth()+1) == 11 || (now.getMonth()+1) == 12){
											periodo = "Periodo: Septiembre - Diciembre " + now.getFullYear();
											periodo = periodo.toString();
										}

										if ($("#start").val()!= '' && $("#end").val()!= '') {
											if (actual_text == "Todos") {
												message2 = "";
											} else {
												message2 = " " ;
											}
											message = "Del " + $("#start").val() + " al " + $("#end").val();
											message = message.toString();
											subheader = " ";
											margin1 = 5;
											margin2 = 10;
										} else if ($("#start").val()== '' || $("#end").val()== ''){
											if (actual_text == "Todos") {
												message = "Sistema de Gestión de Proyectos";
												message2 = "";
											} else {
												message = "Sistema de Gestión de Proyectos";
												message2 = " " ;
											}
											//message = "Universidad Politécnica de Victoria";
											subheader = "";
											margin1 = 5;
											margin2 = 10;
										}
										return {
											columns: [
												{
			                                        image: tam_logo,
			                                        width: 75,
			                                        height: 29
			                                    },
												{
													alignment: 'left',
													italics: false,
													stack: ['Reporte'+subheader,
														{text: message2, style: 'subheader',bold: true, fontSize: 11}
													],
													style: 'header',
													fontSize: 10,
													width: 400,
													margin: [margin1,margin2]
												},
												{
													alignment: 'right',
													fontSize: 10,
													margin: [5,10],
													stack: [{text: " ", style: 'subheader'},
														{text: message, bold: true, fontSize: 11}
													],
													style: 'header',
												},{
													image: logo,
													width: 50,
													height: 50
												}
											],
											margin: 20
										}
									});
									// Create a footer object with 2 columns
									// Left side: report creation date
									// Right side: current page and total pages
									doc['footer']=(function(page, pages) {
										return {
											columns: [
												{
													alignment: 'left',
													text: ['Generado el: ', { text: jsDate.toString() }],
													margin: [30,20]
												},
												{
													alignment: 'right',
													text: ['Página ', { text: page.toString() },	' de ',	{ text: pages.toString() }],
													margin: [30,20]
												}
											],
											margin: -20
										}
									});
									// Change dataTable layout (Table styling)
									// To use predefined layouts uncomment the line below and comment the custom lines below
									// doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
									var objLayout = {};
									objLayout['hLineWidth'] = function(i) { return .5; };
									objLayout['vLineWidth'] = function(i) { return .5; };
									objLayout['hLineColor'] = function(i) { return '#000'; };
									objLayout['vLineColor'] = function(i) { return '#000'; };
									objLayout['paddingLeft'] = function(i) { return 4; };
									objLayout['paddingRight'] = function(i) { return 4; };
									doc.content[0].layout = objLayout;
                  //doc.content[0].layout = 'lightHorizontalLines';
							}
							}]
		});

	});
	var start_date = null;
	var end_date = null;

  
	$("#del_btn").click(function(){
		$("#start").focus();
	});

	$("#al_btn").click(function(){
		$("#end").focus();
	});

	$("#reset_btn").click(function(){
		$("#start").val("");
		$("#end").val("");
		start_date=null;
		end_date=null;
	});

	$("#start").change(function(){
		date=getDateA($("#start").val());
		start_date=new Date(date[0],date[1],date[2]);
		if(start_date>end_date && end_date!=null){
			$("#start").val("");
			start_date=null;
		}
	});

	$("#end").change(function(){
		date=getDateA($("#end").val());
		end_date=new Date(date[0],date[1],date[2]);
		if(end_date<start_date && start_date!=null){
			$("#end").val("");
			end_date=null;
		}
	});
  
	function getDateA(date_string){
		date_string=date_string.split(" ");

		var day=date_string[0];
		var month=date_string[1];
		var year=date_string[2];

		switch(month){
			case "Enero":
				month="1";
				break;
			case "Febrero":
				month="2";
				break;
			case "Marzo":
				month="3";
				break;
			case "Abril":
				month="4";
				break;
			case "Mayo":
				month="5";
				break;
			case "Junio":
				month="6";
				break;
			case "Julio":
				month="7";
				break;
			case "Agosto":
				month="8";
				break;
			case "Septiembre":
				month="9";
				break;
			case "Octubre":
				month="10";
				break;
			case "Noviembre":
				month="11";
				break;
			case "Diciembre":
				month="12";
				break;
		}
		var date=[];
		date[0]=Number(year);
		date[1]=Number(month);
		date[2]=Number(day);

		return date;
	}

	$("#search_report").click(function() {
		$('html, body').animate({
		  	scrollTop: $("#results_section").offset().top-100
	  	}, 1500);
		fillDataTable(1);
	});

	$("#program_id").change(function() {
		fillDataTable();
	});
  
  $("#project_id").change(function() {
		fillDataTable();
	});
 
  $("#solicitante_id").change(function() {
		fillDataTable();
	});
  
  $("#status_id").change(function() {
		fillDataTable();
	});
  
  /*
	$("#start").change(function() {
		fillDataTable();
	});
  
	$("#end").change(function() {
		fillDataTable();
	});*/
  

	function fillDataTable(is_click=0){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});
		//Se realiza la peticion y se manda en data, los valores requeridos
		//por la funcion
    
    if($("#start").val()!="" && $("#end").val()!="" &&$("#start").val() > $("#end").val()){
      swal({
						  title: "¡Atención!",
						  text: "La fecha inicial no puede pasar a la fecha final",
						  icon: "error",
							button: false,
							timer: 3000,
						});
    }else{
      
    
		$.ajax({
			url: '{{ route('reports.ObtenerDatosCon') }}',
			method: 'POST',
			data: {
				program_id: $("#program_id").val(),
        project_id: $("#project_id").val(),
        solicitante_id: $("#solicitante_id").val(),
      status_id: $("#status_id").val(),
      
      start: $("#start").val(),
				end: $("#end").val(),
			},

			success: function(result) {
				var asesoria = result['response'];
      
				if(asesoria.length==0){
					if(is_click==1){
						swal({
						  title: "¡Atención!",
						  text: "No se encontraron registros con los filtros seleccionados",
						  icon: "error",
							button: false,
							timer: 3000,
						});
					}
					dt_reports.clear().draw();
				}else{
					dt_reports.clear().draw();
					for (var i = 0; i < asesoria.length; i++) {
						if(asesoria[i]["operation_rules"]==1){
              reglas_operacion = "Si";
            }else{
              reglas_operacion = "No";
            }
            
            var date_split = asesoria[i]["status_date"].split('-');

            switch(date_split[1]){
              case '01':
                  date_split[1] = "Enero";
                  break;
              case '02':
                  date_split[1] = "Febrero";
                  break;
              case '03':
                  date_split[1] = "Marzo";
                  break;
              case '04':
                  date_split[1] = "Abril";
                  break;
              case '05':
                  date_split[1] = "Mayo";
                  break;
              case '06':
                  date_split[1] = "Junio";
                  break;
              case '07':
                  date_split[1] = "Julio";
                  break;
              case '08':
                  date_split[1] = "Agosto";
                  break;
              case '09':
                  date_split[1] = "Septiembre";
                  break;
              case '10':
                  date_split[1] = "Octubre";
                  break;
              case '11':
                  date_split[1] = "Noviembre";
                  break;
              case '12':
                  date_split[1] = "Diciembre";
                  break;
            }
            
            if(asesoria[i]["folio"] == null){
                folio_externo = "No ingresado";
              }else{
                folio_externo = asesoria[i]["folio"];
                }
						dt_reports.row.add([
              
              asesoria[i]["project_id"],
              folio_externo,
              asesoria[i]["first_name"]+" "+asesoria[i]["last_name"]+" "+asesoria[i]["second_last_name"],
								asesoria[i]["name"],
              asesoria[i]["requested_concept"],
              asesoria[i]["status_name"],
              date_split[2]+" de "+date_split[1]+" del "+date_split[0]
              //asesoria[i]["status_date"]
								
						]).draw();
					}
					
				}
			}
		});
  }
	}
</script>
@endsection
