
@extends ('template.adminPrincipal')
@section('contenido')
@include('flash::message')
<div class="container">
     <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="panel panel-default">
          <div class="panel-heading">Reestablecimiento de Contraseña</div>
          @if (Session::has('message'))
            <div class="text-danger">
                {{Session::get('message')}}
            </div>
          @endif
            <div class="panel-body">
                <div class="card-body">
                    {!! Form::open(['route'=>['password.update'],'method'=>'POST'])  !!}

                    
                        @csrf

                        
                        
                        <div class="form-group row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label for="NB_PASSWORD_USUARIO" 
                            class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Actual') }}</label>
                            <div class="col-md-6">
                            <input class="form-control"
							id="pass" 
							type="password" 
							name="NB_PASSWORD_USUARIO" 
							placeholder="Ingresa tu Contraseña"
							onfocus="esconder();"
							required>
                            </div>
                        </div>

                        <div class="form-group row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="password" 
                                type="password" 
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" 
                                required>
 
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="password-confirm" 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Reestablecer Contraseña') }}
                                </button>
                            </div>
                        
                            {{ Form::hidden('USUARIO_ID', $usuarioid, array('id' => 'USUARIO_ID')) }}
                        </div>
                        {!! Form::close() !!}
                </div>
             </div>   
            </div>
        </div>
    </div>
</div>
@endsection
