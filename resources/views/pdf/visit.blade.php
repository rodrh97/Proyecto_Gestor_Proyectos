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
   <h6 style="margin-top:0px; margin-left:290px;"><strong><small><strong> Reporte de Visita</strong></small></strong></h6><hr>
  
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
 
  <br>
  <h6><small><strong> Información de visita</strong> </small></h6>
  
  <table class="table table-sm" width="100%" >
    
    <tbody>
        <tr>
          <th><small>Fecha:</small> </th>
          <td><small>@php
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
            echo($date_split[2].' de '.$date_split[1].' del '.$date_split[0]); @endphp</small></td>
        </tr>
      <tr>
        <th><small>Estatus:</small></th>
          <td><small> {{$visita->name}}</small></td>
      </tr>
      <tr>
        <th><small>Comentarios u observaciones realizadas:</small> </th>
        <td><small> {{$visita->comments}}</small></td>
      </tr>
    </tbody>
  </table><br><br>
  <center><h6><strong>¡Gracias por tu visita!</strong> </h6></center>
  
  <br><br>
  <img src="{{ asset('assets/images/footer.png') }}" width="350" style="margin-top:0px; margin-left:200px;">
  
</body>
</html>