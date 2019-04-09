@extends('errors.notfound')

@section('title',"Pagina No Encontrada")

@section('content')
    <h1>Pagina no encontrada</h1>
    <br />
    <center>
        <a href="{{ URL::previous() }}" style="height:60px;width:200px;font-size:3rem;" class="btn btn-warning btn-lg">
            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            Regresar
        </a>
    </center>
@endsection

@section('back')
    {{--
    @switch(Auth::user()->type)
        @case(0)
         
            @break
        @case(1)
         
            @break
        @case(2)
            <span> Usuario </span>
            @break
    @endswitch
    --}}

@endsection
