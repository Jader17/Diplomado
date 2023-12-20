@extends('admin.template')

@section('title')
    Modificar Información del Programa
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('program.update', ['program' => $program->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- code -->
                        <div class="form-group">
                            <label class="form-label" for="code">Código:</label>
                            <input class="form-control" type="text" id="code" name="code"
                                placeholder="Código del programa" value="{{ $program->code }}">
                            @error('code')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- title -->
                        <div class="form-group">
                            <label class="form-label" for="title">Título:</label>
                            <input class="form-control" type="text" id="title" name="title"
                                placeholder="Título del programa" value="{{ $program->title }}">
                            @error('title')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- description -->
                        <div class="form-group">
                            <label class="form-label" for="description">Descripción:</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Descripción del programa">{{ $program->description }}</textarea>
                            @error('description')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- logo -->
                        <div class="form-group">
                            <label class="form-label" for="logo">Logo:</label>
                            @if ($program->logo)
                                <div>
                                    <img src="{{ asset('storage/photos/' . $program->logo) }}" alt="Logo del programa"
                                        style="max-width: 200px;">
                                </div>
                                <br>
                            @endif
                            <input class="form-control" type="file" id="logo" name="logo" accept="image/*">
                            @error('logo')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <label class="form-label" for="email">Correo Electrónico:</label>
                            <input class="form-control" type="email" id="email" name="email"
                                placeholder="Correo electrónico del programa" value="{{ $program->email }}">
                            @error('email')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- phone -->
                        <div class="form-group">
                            <label class="form-label" for="phone">Teléfono:</label>
                            <input class="form-control" type="phone" id="phone" name="phone"
                                placeholder="Número de teléfono del programa" value="{{ $program->phone }}">
                            @error('phone')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- work_lines -->
                        <div class="form-group">
                            <label class="form-label" for="work_lines">Líneas de Trabajo:</label>
                            <textarea class="form-control" id="work_lines" name="work_lines" placeholder="Ingresa las líneas de trabajo">{{ $program->work_lines }}</textarea>
                            @error('work_lines')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- resolution -->
                        <div class="form-group">
                            <label class="form-label" for="resolution">Resolución:</label>
                            <input class="form-control" type="text" id="resolution" name="resolution"
                                placeholder="Número de resolución" value="{{ $program->resolution }}">
                            @error('resolution')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- register_date -->
                        <div class="form-group">
                            <label class="form-label" for="register_date">Fecha de registro:</label>
                            <input class="form-control" type="date" id="register_date" name="register_date"
                                min="1990-01-01" max="{{ date('Y-m-d') }}" placeholder="Fecha de registro"
                                value="{{ $program->register_date->format('Y-m-d') }}">
                            @error('register_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- modality -->
                        <div class="form-group">
                            <label class="form-label" for="modality">Modalidad:</label>
                            <select class="form-control" id="modality" name="modality">
                                <option value="profundizacion"
                                    {{ $program->modality === 'profundizacion' ? 'selected' : '' }}>
                                    Profundización
                                </option>
                                <option value="investigacion"
                                    {{ $program->modality === 'investigacion' ? 'selected' : '' }}>
                                    Investigación
                                </option>
                            </select>
                            @error('modality')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- coordinator -->
                        <div class="form-group">
                            <label class="form-label" for="user_id">Coordinador:</label>
                            <select id="user_id" name="user_id" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $program->user_id === $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <br />
                        <button class="btn btn-primary float-right" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
