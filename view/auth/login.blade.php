@extends ('template.adminPrincipal')
@section ('contenido')
<div class="alert alert-warning" role="alert" id="invalido">
    <div style="background-color: transparent;">
        <div style="text-align: right;">
        	OPERACI&Oacute;N NO PERMITIDA
    	</div>       
    </div>
</div>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style_admin.css') }}">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				@if (session()->has('flash'))
						<div id="log" class="alert alert-warning">{{ session('flash')}}</div>
				@endif
				<div class="panel-heading">
					<h1 class="panel-title">Acceso</h1>
				</div>
				<div class="panel-body">
					<form method="POST" action="{{ route('login')}}">
						{{ csrf_field()}}
						<div class=" form-group {{ $errors->has('NB_LOGIN_USUARIO') ? 'has-error' : ''}} ">
							<label for="NB_LOGIN_USUARIO">Usuario</label>
							<input class="form-control" 
							id="user" 
							type="text" 
							name="NB_LOGIN_USUARIO"
							value="{{old('NB_LOGIN_USUARIO')}}" 
							placeholder="Ingresa tu usuario"
							onfocus="esconder();"
							required>
							{!! $errors->first('NB_LOGIN_USUARIO','<span class="help-block">:message</span>')!!}
						</div>
						<div class=" form-group " >
							<label for="NB_PASSWORD_USUARIO">Contraseña</label>
							<input class="form-control"
							id="pass" 
							type="password" 
							name="NB_PASSWORD_USUARIO" 
							placeholder="Ingresa tu Contraseña"
							onfocus="esconder();"
							required>
							{!! $errors->first('NB_PASSWORD_USUARIO','<span class="help-block">:message</span>')!!}<br>
							
			                  </a>
						</div>
						<button class="btn btn-success btn-block">Acceder</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
@endsection