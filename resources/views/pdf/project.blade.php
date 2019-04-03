<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  
</head>
<body>
    
   <img src="{{ asset('assets/images/logo-altamira.png') }}" width="200" style="margin-top:0px; margin-left:0px;">
   <img src="{{ asset('assets/images/favicon.ico') }}" width="100" style="margin-top:0px; margin-left:400px;">
    
    <h6 style="margin-top:0px; margin-left:240px;"><strong>Oficina de Gestión de Proyectos</strong></h6><hr>
   <h6 style="margin-top:0px; margin-left:240px;"><strong>Reporte de Proyecto</strong></h6><hr>
  
  <table width="100%">
      <tr>
          <td><strong> Reporte de Proyecto </strong></td><td></td><td></td>
          <td>@php
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
            echo($date_split[0].' de '.$date_split[1].' del '.$date_split[2]); @endphp</td>
          <td></td>
          <td></td>
      </tr>
     
  </table><br>
  <h6>Datos del solicitante</h6>
  <table class="table table-sm">
    <tbody>
      <tr>
        <th>Nombre:</th>
        <td>{{$project->first_name}} {{$project->last_name}} {{$project->second_last_name}}</td>
      </tr>
      <tr>
        <th>Teléfono:</th>
        <td>{{$project->phone}}</td>
      </tr>
      <tr>
        <th>Dirección:</th>
        <td>calle {{$project->street}}, colonia {{$project->colony}}, num. {{$project->number}}, codigo postal {{$project->zip}}, localidad {{$project->ejido}}</td>
      </tr>
    </tbody>
  </table>
  <br>
  <h6>Datos del proyecto</h6>
  <table class="table table-sm">
    <tbody>
      <tr>
        <th>Nombre:</th>
        <td> {{$project->program_name}}</td>
      </tr>
      <tr>
        <th>Status:</th>
        <td>{{$project->status}}</td>
      </tr>
      <tr>
        <th>Número externo:</th>
        <td>{{$project->status}}</td>
      </tr>
      <tr>
        <th>Concepto solicitando:</th>
        <td>{{$project->requested_concept}}</td>
      </tr>
      <tr>
        <th>Folio interno:</th>
        <td>{{$project->folio_interno}}</td>
      </tr>
    </tbody>
  </table>
  <h6><strong>Nota:</strong> La simple presentación de la solicitud a este programa no crea derecho a obtenerlo. Para mayor información consulte las Reglas de Operación.</h6>
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
  <br>
  <h6><strong>Documentación entregada:</strong> </h6>
  <table width="100%" >
      @foreach($documents as $documento)
        <tr>
            <td> * {{$documento->documento}}</td>
            <td> </td>
        </tr>
      @endforeach
  </table>
<br><br>
  <h6><strong>Historial de visitas:</strong></h6>
  <br>
  <table class="table table-sm" width="100%" >
    <thead>
      <tr>
        <th scope="col">Comentarios</th>
        <th scope="col">Estatus</th>
        <th scope="col">Fecha</th>
      </tr>
    </thead>
    <tbody>
      @foreach($visitas as $visita)
        <tr>
          <td>{{$visita->comentario}}</td>
          <td>{{$visita->estatus}}</td>
          <td>@php
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
            echo($date_split[2].' de '.$date_split[1].' del '.$date_split[0]); @endphp</td>
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
  <br><br><br><br>
  <img src="{{ asset('assets/images/footer.png') }}" width="400" style="margin-top:0px; margin-left:150px;">
  
</body>
</html>