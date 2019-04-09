@extends('errors.notfound')

@section('title',"Pagina No Encontrada")

@section('content')
    <h1>El usuario con el id [{{ $id }}] no pudo ser encontrado.</h1>
    <br />

    <center>
        <a href="{{ URL::previous() }}" style="height:60px;width:200px;font-size:3rem;" class="btn btn-warning btn-lg">
            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            Regresar
        </a>
    </center>
@endsection

@section('navbar_back')
   
@endsection
