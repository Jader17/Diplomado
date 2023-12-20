@extends('auth.base')

@section('content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicia sesión para administrar</p>

            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                @error('email')
                    <span class="text-xs text-red">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="text-xs text-red">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input name="remember" type="checkbox" id="remember">
                            <label for="remember">
                                Recuerdame
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{ route('index') }}">Olvide mi contraseña</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('auth.register') }}" class="text-center">Registrate como miembro</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
