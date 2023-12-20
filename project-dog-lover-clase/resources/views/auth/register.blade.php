@extends('auth.base')

@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Registrate como miembro</p>

            <form action="{{ @route('auth.register') }}" method="post">
                @csrf
                @error('name')
                    <span class="text-xs text-red">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <input class="form-control" autofocus="autofocus" name="name" type="text"
                        placeholder="Nombre completo" value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                </div>

                @error('email')
                    <span class="text-xs text-red">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <input class="form-control" name="email" type="email" placeholder="Correo electrónico"
                        value="{{ old('email') }}">
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
                    <input class="form-control" name="password" type="password" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                @error('password_confirmation')
                    <span class="text-xs text-red">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <input class="form-control" name="password_confirmation" type="password"
                        placeholder="Repetir la contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                Acepta los <a href="#">términos</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="{{ route('auth.login') }}" class="text-center">Ya soy miembro</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
@endsection
