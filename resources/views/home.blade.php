@extends('layouts.app')

@section('title',"Sistema de Gestión de Proyectos")

@switch(Auth::user()->type)
	@case(1)
		@section('body')
		@break
	@case(2)
		@section('bodyMonitoreo')
		@break
	@case(3)
		@section('bodyVinculacion')
		@break
	@case(4)
		@section('bodyAtencionE')
		@break
	@case(5)
		@section('bodyAtencionG')
		@break
@endswitch

<div class="page-body">
  <div class="row">
     <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#087bb6;">
            <div class="card-block-small text-center">
              <h4>Solicitantes</h4>
                <h1>{{$solicitantes}}</h1>
                
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#18abbc;">
            <div class="card-block-small text-center">
              <h4>Proyectos</h4>
                <h1>{{$proyectos}}</h1>
                
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>
    </div>
    
    </div>
  <div class="row">
  <div class="col-sm-12">
        <div class="card text-white widget-visitor-card" style="background-color:#084d90;">
            <div class="card-block-small text-center">
              <h4>Programas registrados en el sistema</h4>
                <h1>{{$programas}}</h1>
                
                <i class="fas fa-th-list"></i>
            </div>
        </div>
    </div>
  </div>
  
<div class="row">
    <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#7d8a92;">
            <div class="card-block-small text-center">
              <h4>Programas con reglas de operación</h4>
                <h1>{{$programasCRO}}</h1>
                
                <i class="fa fa-lock"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-white widget-visitor-card" style="background-color:#c6c5c5;">
            <div class="card-block-small text-center">
              <h4>Programas sin reglas de operación</h4>
                <h1>{{$programasSRO}}</h1>
                
                <i class="fa fa-unlock-alt"></i>
            </div>
        </div>
    </div>
    
    
    </div>

  
  @if(Auth::user()->type == 1 || Auth::user()->type == 2 || Auth::user()->type == 4 || Auth::user()->type == 5)
  <div class="row">
			<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
        <h5>Vencimiento</h5>
        <span>Vencimiento de programas, componentes y subcomponentes registrados en el sistema.</span>
    </div>
  <div class="card-block">
  <div class="dt-responsive table-responsive">
    @if($fechas_programas->isNotEmpty() || $fechas_componentes->isNotEmpty() || $fechas_subcomponentes->isNotEmpty())
    <table style="width:100%" id="compact" class="table compact table-striped table-bordered " >
      <thead>
        <tr>
          <th scope="col" style="width:60%">Tipo</th>
          <th scope="col" style="width:20%">Tiempo restante</th>
          <th scope="col" style="width:20%">Estatus</th>
        </tr>
      </thead>
      <tbody>
        
          @foreach($fechas_programas as $prog)
            <tr>
                <td><a href="{{ route('programs.show',['id'=>$prog->id])}}"><strong>Programa: </strong>{{$prog->name}}</a></td>
              <td><center>@php  
                $time = strtotime($prog->finish_date) - strtotime(date('Y-m-d'));
                $dias_restantes = round($time / (3600 * 24));
                echo $dias_restantes;
                
                @endphp días</center></td>
              @if($dias_restantes < 30)
                <td style="background-color:#F4FA58;"><center><strong>Por cerrar</strong></center></td>
              @else
               <td style="background-color:#58FA58;"><center><strong>Activo</strong></center></td>
               @endif
            </tr>
          @endforeach
          @foreach($fechas_componentes as $comp)
            <tr>
                <td><a href="{{ route('components.show',['id'=>$comp->id])}}"><strong>Componente: </strong>{{$comp->name}}</a></td>
              <td><center>@php  
                $time = strtotime($comp->finish_date) - strtotime(date('Y-m-d'));
                $dias_restantes = round($time / (3600 * 24));
                echo $dias_restantes;
                
                @endphp días</center></td>
               @if($dias_restantes < 30)
                <td style="background-color:#F4FA58;"><center><strong>Por cerrar</strong></center></td>
              @else
               <td style="background-color:#58FA58;"><center><strong>Activo</strong></center></td>
               @endif
            </tr>
          @endforeach
          @foreach($fechas_subcomponentes as $subcomp)
            <tr>
              <td><a href="{{ route('subcomponents.show',['id'=>$comp->id])}}"><strong>Subcomponente: </strong>{{$subcomp->name}}</a></td>
              <td> <center>@php  
                $time = strtotime($subcomp->finish_date) - strtotime(date('Y-m-d'));
                $dias_restantes = round($time / (3600 * 24));
                echo $dias_restantes;
                
                @endphp días</center></td>
               @if($dias_restantes < 30)
                <td style="background-color:#F4FA58;"><center><strong>Por cerrar</strong></center></td>
              @else
               <td style="background-color:#58FA58;"><center><strong>Activo</strong></center></td>
               @endif
            </tr>
          @endforeach
        
      </tbody>
    </table>  
    @else
      <center>
        <div class="alert alert-success icons-alert">
          <strong>Atención</strong>
          <p>No existe un programa, componente o subcomponente activo.</p>
        </div>
      </center>
    @endif
  </div>
  </div>
  </div>
    </div>
  </div>
  @endif
</div>


@endsection

@section('javascriptcode')
<script>
  $('#compact').DataTable({
        "order": [
            [1, "asc"]
        ]
    });
	//var button = '';
	//applyStyleToDatatable(button, 'Buscar');
</script>
@endsection