@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos - Gráficas")

@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
	@case(2)
		@section('bodyMonitoreo')
		@break
@endswitch
<style>
  th{
    text-align: center;
  }
</style>
<!-- Main-body start -->
<div class="main-body">
	<!-- Page-header start -->
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="fa fa-download" style="background-color:gray;"></i>
					<div class="d-inline">
						<h4 style="text-transform: none;">Gráficas de Información</h4>
						<span style="text-transform: none;">Ver mediante gráficas la cantidad de proyectos correspondientes a cada programa con su respectivo estatus.</span>
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
						<li class="breadcrumb-item">Gráficas
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
            <div class="form-group row" style="margin-left:5px; margin-right:5px;">
              <label class="col-sm-3 col-form-label">Nombre del programa:</label>
              <div class="col-sm-9">
                <select id="programa" name="programa" class="select2_basic">
                  <option value="0">Todos</option>
                    @foreach($programas as $programa)
                  <option value="{{$programa->id}}">{{$programa->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row" style="margin-left:5px; margin-right:5px;">
              <label class="col-sm-3 col-form-label">Estatus de proyectos:</label>
              <div class="col-sm-9">
                <select id="estatus" name="estatus" class="select2_basic">
                  <option value="0">Todos</option>
                    @foreach($estatus as $t)
                  <option value="{{$t->id}}">{{$t->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-group row" style="margin-left:5px; margin-right:5px;">
              <label class="col-sm-3 col-form-label" for="tutor_user_id">Rango de Fecha:</label>
              <div class=" input-group col-sm-6">
									<span class="input-group-addon" id="del_btn" style="background-color:gray">Del</span>
									<input type="date" autocomplete="off" style="font-size:12px; height: 46px;" class="input-sm form-control" id="start" name="start" />
									<span class="input-group-addon" id="al_btn" style="background-color:gray">al</span>
									<input type="date" autocomplete="off" style="font-size:12px; height: 46px;" class="input-sm form-control" id="end" name="end" />
									<span class="input-group-addon" id="reset_btn" title="Borrar fechas seleccionadas" style="background-color:#c34242">x</span>
								</div>
              <div class="col-sm-3">
                <button type="button" onclick="generarGrafica();" class="btn btn-warning col-sm-12"><strong>Generar gráfica</strong></button>
              </div>
            </div>
            
            <hr>					
            
            <div class="row">
            <div class="col-md-12">
                    
                
                    <div class="card-header">
                      <br>
                        <h5 id="titulo"></h5>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="card-block">
                        <div id="chart3"></div>
                      <br><br>
                      <div>
                        <table class="table table-sm" style="text-align:center;">
                            <tbody id="data_grafica">
                            </tbody>
                          </table>
                      </div>
                    </div>
                
            </div>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascriptcode')
<script src="{{ asset('bower_components/d3/js/d3.min.js')}}"></script>
    <script src="{{ asset('bower_components/c3/js/c3.js')}}"></script>
<script>
 
  
  
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

  function generarPDF_grafica(){
    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});

      $.ajax({
        url: '{{ route('reports.generarPDF_grafica') }}',
        method: 'POST',
        data: {
          program_id: $("#programa").val(),
          status_id: $("#estatus").val(),

          start: $("#start").val(),
          end: $("#end").val(),
        },

        success: function(result) {
          console.log("reporte generado");
        }
      });
    
  }
  
  function generarGrafica(){
    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});
    if($("#start").val()!="" && $("#end").val()!="" &&$("#start").val() > $("#end").val()){
//      document.getElementById("boton_pdf").style.display = "none";
      swal({
						  title: "¡Atención!",
						  text: "La fecha inicial no puede pasar a la fecha final",
						  icon: "error",
							button: false,
							timer: 3000,
						});
    }else{

      $.ajax({
        url: '{{ route('reports.graficar') }}',
        method: 'POST',
        data: {
          program_id: $("#programa").val(),
          status_id: $("#estatus").val(),

          start: $("#start").val(),
          end: $("#end").val(),
        },

        success: function(result) {
          var proyectos = result['response'];
          
          if(proyectos.length == 0){
            ///  document.getElementById("boton_pdf").style.display = "none";           
                swal({
                  title: "¡Atención!",
                  text: "No se encontraron registros con los filtros seleccionados",
                  icon: "error",
                  button: false,
                  timer: 3000,
                });
              
          }else{
            
           // document.getElementById("boton_pdf").style.display = "inline";           
            
            var todos = 0;
            var incompleto = 0;
            var completo_sin_proyecto = 0;
            var completo_con__proyecto = 0;
            var revisado = 0;
            var en_vinculacion = 0;
            var en_ventanilla = 0;
            var aprobado = 0;
            var rechazado = 0;
            
            
            var titulo = document.getElementById("titulo");
            while (titulo.firstChild) {
              titulo.removeChild(titulo.firstChild);
            }

              $.ajax({
                url: '{{ route('reports.obtener_programas_estatus') }}',
                method: 'POST',
                data: {
                  program_id: $("#programa").val(),
                  status_id: $("#estatus").val(),
                },

                success: function(result) {
                  var programas = result['programas'];
                  var estados_proyectos = result['estados_proyectos'];
                
                  var id_programa = $("#programa").val();
                  var id_estatus = $("#estatus").val();
                
                  if(id_programa == 0){
                    titulo.append("Cantidad de proyectos en todos los programas");
                  }else{
                    programas.forEach(function(element) {
                      if(id_programa ==  element.id){
                         titulo.append("Cantidad de proyectos en el programa "+element.name+".");
                      }
                    });
                  }
                if(id_estatus == 0){
                    titulo.append(" con cualquier estatus.");
                  }else{
                    estados_proyectos.forEach(function(element) {
                      if(id_estatus ==  element.id){
                         titulo.append(" con el estatus "+element.name);
                      }
                    });
                  }
                }
              });
        
        
              for(var j = 0; j < proyectos.length; j++){
                  todos++;
                  switch(proyectos[j]['status_project']){
                      case 1:
                          incompleto++;
                          break;
                      case 2:
                          completo_sin_proyecto++;
                          break;
                      case 3:
                          completo_con__proyecto++;
                          break;
                      case 4:
                          revisado++;
                          break;
                      case 5:
                          en_vinculacion++;
                          break;
                      case 6:
                          en_ventanilla++;
                          break;
                      case 7:
                          aprobado++;
                          break;
                      case 8:
                          rechazado++;
                          break;
                    }
                
                  
              }
        
              var tabla_data_grafica = document.getElementById("data_grafica");
              while (tabla_data_grafica.firstChild) {
                tabla_data_grafica.removeChild(tabla_data_grafica.firstChild);
              }
              
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("th"); 
              var td2 = document.createElement("th"); 
              var td3 = document.createElement("th"); 
              td1.append("Estatus"); 
              td2.append("Cantidad");
              td3.append("Porcentaje");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
              
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Incompleto"); 
              td2.append(incompleto+" proyectos");
              td3.append(Math.round(((incompleto * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
        
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Información completa sin proyecto"); 
              td2.append(completo_sin_proyecto+" proyectos");
              td3.append(Math.round(((completo_sin_proyecto * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
        
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Información completa con proyecto"); 
              td2.append(completo_con__proyecto+" proyectos");
              td3.append(Math.round(((completo_con__proyecto * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
        
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Expediente revisado"); 
              td2.append(revisado+" proyectos");
              td3.append(Math.round(((revisado * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
              
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Expediente en vinculación"); 
              td2.append(en_vinculacion+" proyectos");
              td3.append(Math.round(((en_vinculacion * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
        
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Expediente en ventanilla"); 
              td2.append(en_ventanilla+" proyectos");
              td3.append(Math.round(((en_ventanilla * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
        
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Aprobado"); 
              td2.append(aprobado+" proyectos");
              td3.append(Math.round(((aprobado * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
        
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("Rechazado"); 
              td2.append(rechazado+" proyectos");
              td3.append(Math.round(((rechazado * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
              
              var tr = document.createElement("tr"); 
              var td1 = document.createElement("td"); 
              var td2 = document.createElement("td"); 
              var td3 = document.createElement("td"); 
              td1.append("TOTAL"); 
              td2.append(todos+" proyectos");
              td3.append(Math.round(((todos * 100)/ todos)*10)/10+" %");
              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tabla_data_grafica.appendChild(tr);
        
            var chart = c3.generate({
                    bindto: '#chart3',
                    data: {
                        columns: [
                            ['Incompleto', incompleto],
                            ['Información completa sin proyecto', completo_sin_proyecto],
                            ['Información completa con proyecto', completo_con__proyecto],
                            ['Expediente revisado', revisado],
                            ['Expediente en vinculación', en_vinculacion],
                            ['Expediente en ventanilla', en_ventanilla],
                            ['Aprobado', aprobado],
                            ['Rechazado', rechazado],
                        ],
                        type: 'pie',
                        onclick: function(d, i) { console.log("onclick", d, i); },
                        onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                        onmouseout: function(d, i) { console.log("onmouseout", d, i); }
                    },
                    color: {
                        pattern: ['#FE2E2E','#FE9A2E','#F7FE2E','#9AFE2E','#2ECCFA','#2E64FE','#9A2EFE','#424242']
                    },
                });

                setTimeout(function() {
                    chart.unload({
                        ids: 'Incompleto'
                    });
                    chart.unload({
                        ids: 'Información completa sin proyecto'
                    });
                  chart.unload({
                        ids: 'Información completa con proyecto'
                    });
                  chart.unload({
                        ids: 'Expediente revisado'
                    });
                  chart.unload({
                        ids: 'Expediente en vinculación'
                    });
                    chart.unload({
                        ids: 'Expediente en ventanilla'
                    });
                  chart.unload({
                        ids: 'Aprobado'
                    });
                  chart.unload({
                        ids: 'Rechazado'
                    });
                }, 9999999);
          }

        }
      });
    }
  }
  
</script>
@endsection