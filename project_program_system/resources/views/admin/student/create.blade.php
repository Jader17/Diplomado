@extends('admin.template')

@section('title')
    Registrar Estudiante
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf
                        <!-- identification -->
                        <div class="form-group">
                            <label class="form-label" for="identification">Identificación:</label>
                            <input class="form-control" type="text" id="identification" name="identification"
                                placeholder="Identificación del estudiante" value="{{ old('identification') }}">
                            @error('identification')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- name -->
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre:</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nombre completo del estudiante" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- gender -->
                        <div class="form-group">
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
                                placeholder="Dirección del estudiante" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- email -->
                        <div class="form-group">
                            <label class="form-label" for="email">Correo Electrónico:</label>
                            <input class="form-control" type="email" id="email" name="email"
                                placeholder="Correo electrónico del estudiante" value="{{ old('email') }}">
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

                        <!-- student_code -->
                        <div class="form-group">
                            <label class="form-label" for="student_code">Código Estudiantil:</label>
                            <input class="form-control" type="text" id="student_code" name="student_code"
                                placeholder="Ingresa el código estudiantil" value="{{ old('student_code') }}">
                            @error('student_code')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- civil_status -->
                        <div class="form-group">
                            <label class="form-label" for="civil_status">Estado Civil:</label>
                            <select class="form-control" id="civil_status" name="civil_status">
                                <option value="soltero" {{ old('civil_status') == 'soltero' ? 'selected' : '' }}>Soltero
                                </option>
                                <option value="casado" {{ old('civil_status') == 'casado' ? 'selected' : '' }}>Casado
                                </option>
                                <option value="union_libre" {{ old('civil_status') == 'union_libre' ? 'selected' : '' }}>
                                    Unión Libre</option>
                            </select>
                            @error('civil_status')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- semester -->
                        <div class="form-group">
                            <label class="form-label" for="semester">Semestre:</label>
                            <input class="form-control" type="text" id="semester" name="semester"
                                placeholder="Ej. Primer Semestre" value="{{ old('semester') }}">
                            @error('semester')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- admission_date -->
                        <div class="form-group">
                            <label class="form-label" for="admission_date">Fecha de Ingreso:</label>
                            <input class="form-control" type="date" id="admission_date" name="admission_date"
                                min="2000-01-01" max="{{ date('Y-m-d') }}" value="{{ old('admission_date') }}">
                            @error('admission_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- egress_date -->
                        <div class="form-group">
                            <label class="form-label" for="egress_date">Fecha de Salida:</label>
                            <input class="form-control" type="date" id="egress_date" name="egress_date"
                                min="2000-01-01" max="{{ date('Y-m-d') }}" value="{{ old('egress_date') }}">
                            @error('egress_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <br />
                        <button class="btn btn-primary float-right" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
