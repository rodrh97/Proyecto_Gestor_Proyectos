<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  
</head>
<body>
    
   <img src="{{ asset('assets/images/logo-altamira.png') }}" width="120" style="margin-top:0px; margin-left:0px;">
   <img src="{{ asset('assets/images/favicon.ico') }}" width="60" style="margin-top:0px; margin-left:500px;">
    
    <h6 style="margin-top:0px; margin-left:240px;"><strong>Oficina de Gestión de Proyectos</strong></h6>
   <h6 style="margin-top:0px; margin-left:270px;"><strong><small><strong> Reporte General de Proyecto</strong></small></strong></h6><hr>
  
  <p style="margin-top:0px; margin-left:500px;"><small>@php
            $date_split = explode("-", $fecha_actual);
            
            switch($date_split[1]){
              case '01':
                  $date_split[1] = "Enero";
                  break;
              case '02':
                  $date_split[1] = "Febrero";
                  break;
              case '03':
                  $date_split[1] = "Marzo";
                  break;
              case '04':
                  $date_split[1] = "Abril";
                  break;
              case '05':
                  $date_split[1] = "Mayo";
                  break;
              case '06':
                  $date_split[1] = "Junio";
                  break;
              case '07':
                  $date_split[1] = "Julio";
                  break;
              case '08':
                  $date_split[1] = "Agosto";
                  break;
              case '09':
                  $date_split[1] = "Septiembre";
                  break;
              case '10':
                  $date_split[1] = "Octubre";
                  break;
              case '11':
                  $date_split[1] = "Noviembre";
                  break;
              case '12':
                  $date_split[1] = "Diciembre";
                  break;
            }
            echo($date_split[0].' de '.$date_split[1].' del '.$date_split[2]); @endphp</small></p>
  
  <h6><small><strong>Datos del solicitante</strong> </small></h6>
  <table class="table table-sm">
    <tbody>
      <tr>
        <th><small>Nombre:</small></th>
        <td><small>  {{$project->first_name}} {{$project->last_name}} {{$project->second_last_name}}</small></td>
      </tr>
      <tr>
        <th><small> Teléfono:</small></th>
        <td><small> {{$project->phone}}</small></td>
      </tr>
      <tr>
        <th><small> Dirección:</small></th>
        <td><small> calle {{$project->street}}, colonia {{$project->colony}}, num. {{$project->number}}, codigo postal {{$project->zip}}, localidad {{$project->ejido}}</small></td>
      </tr>
    </tbody>
  </table>
  <hr>
  <h6><small> <strong>Datos del proyecto</strong> </small></h6>
  <table class="table table-sm">
    <tbody>
      <tr>
        <th><small> Nombre:</small></th>
        <td><small>  {{$project->program_name}}</small></td>
      </tr>
      <tr>
        <th ><small> Estatus:</small></th>
        <td><small> {{$project->status}}</small></td>
      </tr>
      <tr>
        <th><small> Número externo:</small></th>
        <td><small> @if($project->folio_externo != null)
                    {{$project->folio_externo}}
                    @else
                      -
                    @endif
          </small></td>
      </tr>
      <tr>
        <th><small> Concepto solicitado:</small></th>
        <td><small> {{$project->requested_concept}}</small></td>
      </tr>
      <tr>
        <th><small> Folio interno:</small></th>
        <td><small> {{$project->folio_interno}}</small></td>
      </tr>
    </tbody>
  </table><hr>
  <h6><small> <strong>Nota:</strong> La simple presentación de la solicitud a este programa no crea derecho a obtenerlo. Para mayor información consulte las Reglas de Operación.</small></h6>
  <!--<p><strong>Nombre del solicitante:</strong> {{$project->first_name}} {{$project->last_name}} {{$project->second_last_name}}</p>
  <h6><strong> Tipo de solicitante:</strong> Persona {{$project->type}}</h6>
  <h6><strong>Dirección:</strong> calle {{$project->street}}, colonia {{$project->colony}}, num. {{$project->number}}, codigo postal {{$project->zip}}, localidad {{$project->ejido}}</h6>
  <br>-->
  <!--<h6><strong>Nombre del programa:</strong> {{$project->program_name}}</h6>
  <h6><strong> Unidad responsable:</strong> {{$project->responsable_unit}}</h6>
  <h6><strong> Unidad ejecutora:</strong> {{$project->executing_unit}}</h6>-->
  
  <!--@if($operation_rules->operation_rules == 1)
    <h6><strong>Nombre de componente:</strong> @if($componente!= null)
                                                    {{$componente->name}}
                                                @endif</h6>
    @if($subcomponente != null)
      <h6><strong>Nombre de subcomponente:</strong> {{$subcomponente->name}}</h6>
    @endif
    <h6><strong>Conceptos:</strong>
        @foreach($conceptos as $concepto)
        * {{$concepto->concepto }}
      <br>
        @endforeach
      
    </h6>
  
  @endif-->
  <!--<br>
  <h6><strong>Monto requerido:</strong> {{$project->requested_concept}}</h6>
  <br>-->
  
  <h6><small><strong>Documentación entregada:</strong></small> </h6>
   <p>
     <small>@foreach($documents as $documento)
        {{$documento->documento}} ,
      @endforeach
      </small>
  </p> 
      

  <h6><small><strong> Historial de visitas:</strong> </small></h6>
  
  <table class="table table-sm" width="100%" >
    <thead>
      <tr>
        <th scope="col"><small> Comentarios</small></th>
        <th scope="col"><small> Estatus</small></th>
        <th scope="col"><small> Fecha</small></th>
      </tr>
    </thead>
    <tbody>
      @foreach($visitas as $visita)
        <tr>
          <td><small> {{$visita->comentario}}</small></td>
          <td><small> {{$visita->estatus}}</small></td>
          <td><small>@php
            $date_split = explode("-", $visita->fecha);
            
            switch($date_split[1]){
              case '01':
                  $date_split[1] = "Enero";
                  break;
              case '02':
                  $date_split[1] = "Febrero";
                  break;
              case '03':
                  $date_split[1] = "Marzo";
                  break;
              case '04':
                  $date_split[1] = "Abril";
                  break;
              case '05':
                  $date_split[1] = "Mayo";
                  break;
              case '06':
                  $date_split[1] = "Junio";
                  break;
              case '07':
                  $date_split[1] = "Julio";
                  break;
              case '08':
                  $date_split[1] = "Agosto";
                  break;
              case '09':
                  $date_split[1] = "Septiembre";
                  break;
              case '10':
                  $date_split[1] = "Octubre";
                  break;
              case '11':
                  $date_split[1] = "Noviembre";
                  break;
              case '12':
                  $date_split[1] = "Diciembre";
                  break;
            }
            echo($date_split[2].' de '.$date_split[1].' del '.$date_split[0]); @endphp</small></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <!--<h4>Fecha:</h4><br>
  <h4>Folio interno:</h4>
  <h4>Folio externo:</h4>
  <h4>Nombre del Solicitante:</h4>
  <h4>Nombre del Programa</h4>
  <h4>Componente:</h4>
  <h4>Sucomponente:</h4>
  <h4>Conceptos:</h4>
  <h4>Monto Requerido:</h4><-->
  <br><br><br>
  <img src="{{ asset('assets/images/footer.png') }}" width="350" style="margin-top:0px; margin-left:200px;">
  
</body>
</html>