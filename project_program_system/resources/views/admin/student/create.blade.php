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
                        <!-- program -->
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-form-label" for="race">Programa:</label>
                            <div class="col-sm-8">
                                <select id="program_id" name="program_id" class="form-control">
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}"
                                            @isset($code)
                                                @selected($code == $program->id)
                                            @else
                                                @selected(old('program_id') == $program->id)
                                            @endisset>
                                            {{ $program->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-info" id="btnBuscar">
                                    Buscar
                                </a>
                            </div>
                            @error('program_id')
                                <div class="col-sm-10 offset-sm-2 text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- cohort -->
                        <div class="form-group">
                            <label class="form-label" for="race">Cohorte:</label>
                            <select id="cohort_id" name="cohort_id" class="form-control">
                                @foreach ($cohorts as $cohort)
                                    <option value="{{ $cohort->id }}" @selected(old('cohort_id') == $cohort->id)>
                                        {{ $cohort->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cohort_id')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

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

                        <!-- phone -->
                        <div class="form-group">
                            <label class="form-label" for="phone">Teléfono:</label>
                            <input class="form-control" type="phone" id="phone" name="phone"
                                placeholder="Número de teléfono del profesor" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- birth_date -->
                        <div class="form-group">
                            <label class="form-label" for="birth_date">Fecha de nacimiento:</label>
                            <input class="form-control" type="date" id="birth_date" name="birth_date" min="2003-01-01"
                                max="{{ date('Y-m-d') }}" placeholder="Fecha de nacimiento"
                                value="{{ old('birth_date') }}">
                            @error('birth_date')
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
                            <label class="form-label" for="join_date">Fecha de Ingreso:</label>
                            <input class="form-control" type="date" id="join_date" name="join_date" min="2000-01-01"
                                max="{{ date('Y-m-d') }}" value="{{ old('join_date') }}">
                            @error('join_date')
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

                        <!-- photo -->
                        <div class="form-group">
                            <label class="form-label" for="photo">Foto:</label>
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                            @error('photo')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <br />

                        <br />
                        <button class="btn btn-primary float-right" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('btnBuscar').addEventListener('click', function() {

            var programId = document.getElementById('program_id').value;
            var url = "{{ route('getCohorts') }}" + "?program_id=" + programId;
            window.location.href = url;
        });
    </script>
@endsection
