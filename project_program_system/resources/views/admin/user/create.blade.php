@extends('admin.template')

@section('title')
    Registrar Usuario
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- identification -->
                        <div class="form-group">
                            <label class="form-label" for="identification">Identificación:</label>
                            <input class="form-control" type="text" id="identification" name="identification"
                                placeholder="Identificación del usuario" value="{{ old('identification') }}">
                            @error('identification')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- name -->
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre:</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nombre completo del usuario" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- gender -->
                        <div class="form-group gender-field">
                            <label class="form-label" for="gender">Género:</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="femenino" {{ old('gender') == 'femenino' ? 'selected' : '' }}>Femenino
                                </option>
                                <option value="otro" {{ old('gender') == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('gender')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- address -->
                        <div class="form-group">
                            <label class="form-label" for="address">Dirección:</label>
                            <input class="form-control" type="text" id="address" name="address"
                                placeholder="Dirección del usuario" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- phone -->
                        <div class="form-group">
                            <label class="form-label" for="phone">Teléfono:</label>
                            <input class="form-control" type="phone" id="phone" name="phone"
                                placeholder="Número de teléfono del usuario" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <label class="form-label" for="email">Correo Electrónico:</label>
                            <input class="form-control" type="email" id="email" name="email"
                                placeholder="Correo electrónico del usuario" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- birth_date -->
                        <div class="form-group">
                            <label class="form-label" for="birth_date">Fecha de nacimiento:</label>
                            <input class="form-control" type="date" id="birth_date" name="birth_date" min="2003-01-01"
                                max="{{ date('Y-m-d') }}" placeholder="Fecha de nacimiento"
                                value="{{ old('birth_date') }}">
                            @error('bith_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- link_date -->
                        <div class="form-group">
                            <label class="form-label" for="link_date">Fecha de enlace:</label>
                            <input class="form-control" type="date" id="link_date" name="link_date" min="2003-01-01"
                                max="{{ date('Y-m-d') }}" placeholder="Fecha de enlace" value="{{ old('link_date') }}">
                            @error('link_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- agreement -->
                        <div class="form-group agreement-field">
                            <label class="form-label" for="agreement">Adjuntar Acuerdo:</label>
                            <input type="file" class="form-control" id="agreement" name="agreement">
                            @error('agreement')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- password -->
                        <div class="form-group">
                            <label class="form-label" for="password">Contraseña:</label>
                            <input class="form-control" type="password" id="password" name="password"
                                placeholder="Ingrese su contraseña">
                            @error('password')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- password_confirmation -->
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirmar Contraseña:</label>
                            <input class="form-control" type="password" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirme su contraseña">
                            @error('password_confirmation')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- role -->
                        <div class="form-group role-field">
                            <label class="form-label" for="role">Rol:</label>
                            <select class="form-control" id="role" name="role">
                                <option value="coordinador" {{ old('role') == 'coordinador' ? 'selected' : '' }}>
                                    Coordinador
                                </option>
                                <option value="administrador" {{ old('role') == 'administrador' ? 'selected' : '' }}>
                                    Administrador</option>
                            </select>
                            @error('role')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- job -->
                        <div class="form-group job-field">
                            <label class="form-label" for="job">Trabajo:</label>
                            <select class="form-control" id="job" name="job">
                                <option value="presidente" {{ old('job') == 'presidente' ? 'selected' : '' }}>Presidente
                                    del
                                    Comité</option>
                                <option value="coordinador" {{ old('job') == 'coordinador' ? 'selected' : '' }}>
                                    Coordinador
                                    del Programa</option>
                                <option value="asistente" {{ old('job') == 'asistente' ? 'selected' : '' }}>Asistente del
                                    Programa</option>
                            </select>
                            @error('job')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- photo -->
                        <div class="form-group">
                            <label class="form-label" for="photo">Foto:</label>
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                            @error('photo')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Errores generales -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br />
                        <button class="btn btn-primary float-right" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
