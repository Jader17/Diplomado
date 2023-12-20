@extends('admin.template')

@section('title')
    Modificar Información del Profesor
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <!-- Modificar el action y el método del formulario -->
                    <form action="{{ route('teacher.update', ['teacher' => $teacher->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Agregar el método PUT -->
                        <!-- name -->
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre:</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nombre completo del profesor" value="{{ $teacher->name }}">
                            @error('name')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- identification -->
                        <div class="form-group">
                            <label class="form-label" for="identification">Identificación:</label>
                            <input class="form-control" type="text" id="identification" name="identification"
                                placeholder="Identificación del profesor" value="{{ $teacher->identification }}">
                            @error('identification')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <label class="form-label" for="email">Correo Electrónico:</label>
                            <input class="form-control" type="email" id="email" name="email"
                                placeholder="Correo electrónico del profesor" value="{{ $teacher->email }}">
                            @error('email')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- phone -->
                        <div class="form-group">
                            <label class="form-label" for="phone">Teléfono:</label>
                            <input class="form-control" type="phone" id="phone" name="phone"
                                placeholder="Número de teléfono del profesor" value="{{ $teacher->phone }}">
                            @error('phone')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- address -->
                        <div class="form-group">
                            <label class="form-label" for="address">Dirección:</label>
                            <input class="form-control" type="text" id="address" name="address"
                                placeholder="Dirección del profesor" value="{{ $teacher->address }}">
                            @error('address')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- birth_date -->
                        <div class="form-group">
                            <label class="form-label" for="birth_date">Fecha de nacimiento:</label>
                            <input class="form-control" type="date" id="birth_date" name="birth_date" min="1990-01-01"
                                max="{{ date('Y-m-d') }}" placeholder="Fecha de nacimiento"
                                value="{{ $teacher->birth_date->format('Y-m-d') }}">
                            @error('birth_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- gender -->
                        <div class="form-group">
                            <label class="form-label" for="gender">Género:</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="masculino" {{ $teacher->gender == 'masculino' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="femenino" {{ $teacher->gender == 'femenino' ? 'selected' : '' }}>Femenino
                                </option>
                                <option value="otro" {{ $teacher->gender == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('gender')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- academic_formation -->
                        <div class="form-group">
                            <label class="form-label" for="academic_formation">Formación Académica:</label>
                            <textarea class="form-control" id="academic_formation" name="academic_formation"
                                placeholder="Descripción de la formación académica">{{ $teacher->academic_formation }}</textarea>
                            @error('academic_formation')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- knowledge_areas -->
                        <div class="form-group">
                            <label class="form-label" for="knowledge_areas">Áreas de conocimiento:</label>
                            <textarea class="form-control" id="knowledge_areas" name="knowledge_areas"
                                placeholder="Descripción de las áreas de conocimiento">{{ $teacher->knowledge_areas }}</textarea>
                            @error('knowledge_areas')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- photo -->
                        <div class="form-group">
                            <label class="form-label" for="photo">Foto:</label>
                            @if ($teacher->photo)
                                <div>
                                    <img src="{{ asset('storage/photos/' . $teacher->photo) }}" alt="Foto del profesor"
                                        style="max-width: 200px;">
                                </div>
                                <br>
                            @endif
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                            @error('photo')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- program -->
                        <div class="form-group">
                            <label class="form-label" for="program_id">Programa:</label>
                            @foreach ($programs as $program)
                                <label for="program_id" style="font-weight: normal;">
                                    <input type="checkbox" name="programs[]" value="{{ $program->id }}"
                                        id="program_id"
                                        {{ in_array($program->id, $teacher->programs->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    {{ $program->title }}
                                </label>
                            @endforeach
                            @error('programs')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
