@extends('admin.template')

@section('title')
    Registrar Programa
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('program.store') }}" method="POST">
                        @csrf
                        <!-- code -->
                        <div class="form-group">
                            <label class="form-label" for="code">Código:</label>
                            <input class="form-control" type="text" id="code" name="code"
                                placeholder="Código del profesor" value="{{ old('code') }}">
                            @error('code')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- title -->
                        <div class="form-group">
                            <label class="form-label" for="title">Título:</label>
                            <input class="form-control" type="text" id="title" name="title"
                                placeholder="Título del programa" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- description -->
                        <div class="form-group">
                            <label class="form-label" for="description">Descripción:</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Descripción del programa">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- logo -->
                        <div class="form-group">
                            <label class="form-label" for="logo">Logo:</label>
                            <input class="form-control" type="file" id="logo" name="logo" accept="image/*">
                            @error('logo')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <label class="form-label" for="email">Correo Electrónico:</label>
                            <input class="form-control" type="email" id="email" name="email"
                                placeholder="Correo electrónico del profesor" value="{{ old('email') }}">
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

                        <!-- work_lines -->
                        <div class="form-group">
                            <label class="form-label" for="work_lines">Líneas de Trabajo:</label>
                            <textarea class="form-control" id="work_lines" name="work_lines" placeholder="Ingresa las líneas de trabajo">{{ old('work_lines') }}</textarea>
                            @error('work_lines')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- resolution -->
                        <div class="form-group">
                            <label class="form-label" for="resolution">Resolución:</label>
                            <input class="form-control" type="text" id="resolution" name="resolution"
                                placeholder="Número de resolución" value="{{ old('resolution') }}">
                            @error('resolution')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- register_date -->
                        <div class="form-group">
                            <label class="form-label" for="register_date">Fecha de Registro:</label>
                            <input class="form-control" type="date" id="register_date" name="register_date"
                                min="2000-01-01" max="{{ date('Y-m-d') }}" value="{{ old('register_date') }}">
                            @error('register_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- modality -->
                        <div class="form-group">
                            <label class="form-label" for="modality">Modalidad:</label>
                            <select class="form-control" id="modality" name="modality">
                                <option value="profundizacion" {{ old('modality') == 'profundizacion' ? 'selected' : '' }}>
                                    Profundización</option>
                                <option value="investigacion" {{ old('modality') == 'investigacion' ? 'selected' : '' }}>
                                    Investigación</option>
                            </select>
                            @error('modality')
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
