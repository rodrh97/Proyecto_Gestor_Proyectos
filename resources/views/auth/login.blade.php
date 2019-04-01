@extends('layouts.login')

@section('content')
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-card card-block auth-body mr-auto ml-auto">
                    <form class="md-float-material" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <img src="assets/images/favicon.ico"  width="250px" height="250px">
                                   
                                </div><br>
                            </div>
                            <hr/>
                          <div class="input-group">
                            <h6 style="color:gray;">Ingresar correo y contraseña para acceder al sistema:</h6>
                          </div>
                            <div class="input-group">
                                <input id="email" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo Electrónico" required autofocus>
                                @if  ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong >{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                              									<div id="error_email" class="col-form-label" style="color:red display:none;"></div>

                            </div>
                            <div class="input-group">
                                <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" required>
                                @if  ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                            </div>
                            
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" id="login" class="btn btn-primary btn-md btn-block text-center m-b-20">Iniciar Sesión</button>
                                </div>
                            </div>
                            

                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

@endsection


