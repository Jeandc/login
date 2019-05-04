
@extends ('template.adminPrincipal')
@section('contenido')
<div class="container">
     <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="panel panel-default">
                <div class="card-header">{{ __('Reestablecer Contraseña') }}</div>
                <div class="panel-body">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <br>
                            <label for="email" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12t">{{ __('Direccion de Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Aceptar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                   </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
