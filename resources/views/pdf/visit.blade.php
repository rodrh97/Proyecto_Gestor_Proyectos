<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
  
<body>
    
   <img src="{{ asset('assets/images/tam_logo.jpg') }}" width="200" style="margin-top:0px; margin-left:0px;">
   <img src="{{ asset('assets/images/favicon.ico') }}" width="100" style="margin-top:0px; margin-left:400px;">
    
    
   <br>
  <center><h5><strong> Reporte de Visita </strong></h5></center><br>
  <table width="100%" >
      <tr>
          <td><strong>Fecha:</strong></td>
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
            echo($date_split[0].' de '.$date_split[1].' del '.$date_split[2]); @endphp </td>
          <td></td>
          <td></td>
      </tr>
      <tr>
        <td><strong>Folio interno:</strong></td>
          <td>{{$project->folio_interno}}</td>
          <td><strong>Folio externo:</strong></td>
          <td>@if($project->folio_externo != null)
                {{$project->folio_externo}}
              @else
                Indefinido
              @endif
        </td>
      </tr>
  </table><br>
  
  <h6><strong>Nombre del solicitante:</strong> {{$project->first_name}} {{$project->last_name}} {{$project->second_last_name}}</h6>
  <h6><strong> Tipo de solicitante:</strong> {{$project->type}}</h6>
  <h6><strong>Dirección:</strong> calle {{$project->street}}, colonia {{$project->colony}}, num. {{$project->number}}, codigo postal {{$project->zip}}, localidad {{$project->ejido}}</h6>
  <br>
  <h6><strong>Nombre del programa:</strong> {{$project->program_name}}</h6>
  <h6><strong> Unidad responsable:</strong> {{$project->responsable_unit}}</h6>
  <h6><strong> Unidad ejecutora:</strong> {{$project->executing_unit}}</h6>
  
  @if($operation_rules->operation_rules == 1)
    <h6><strong>Nombre de componente:</strong> @if($componente!= null)
                                                    {{$componente->name}}
                                                @endif</h6>
    @if($subcomponente != null)
      <h6><strong>Nombre de subcomponente:</strong> {{$subcomponente->name}}</h6>
    @endif
    <h6><strong>Conceptos:</strong>
        @foreach($conceptos as $concepto)
         * {{$concepto->concepto}}
        <br>
        @endforeach
      .
    </h6>
  
  @endif
  <br>
  <h6><strong>Monto requerido:</strong> {{$project->requested_concept}}</h6>
  <br><hr><br>
  <h6><strong>Fecha de la visita:</strong> @php
            $date_split = explode("-", $visita->date);
            
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
            echo($date_split[2].' de '.$date_split[1].' del '.$date_split[0]); @endphp</h6>
  
  <h6><strong>Estado del proyecto:</strong> {{$visita->name}}</h6>
  
  <h6><strong>Comentarios u observaciones realizadas en la visita:</strong></h6><br>
  <h6>{{$visita->comments}}</h6>
  
  
</body>
</html>