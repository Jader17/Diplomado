@extends('admin.template')

@section('title')
    Registrar Cohorte
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cohort.store') }}" method="POST">
                        @csrf
                        <!-- code -->
                        <div class="form-group">
                            <label class="form-label" for="code">Código:</label>
                            <input class="form-control" type="text" id="code" name="code"
                                placeholder="Código de la cohorte" value="{{ old('code') }}">
                            @error('code')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- name -->
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre:</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nombre de la cohorte" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- start_date -->
                        <div class="form-group">
                            <label class="form-label" for="start_date">Fecha de Inicio:</label>
                            <input class="form-control" type="date" id="start_date" name="start_date" min="2000-01-01"
                                max="{{ date('Y-m-d') }}" value="{{ old('start_date') }}">
                            @error('start_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- end_date -->
                        <div class="form-group">
                            <label class="form-label" for="end_date">Fecha de Finalización:</label>
                            <input class="form-control" type="date" id="end_date" name="end_date" min="2000-01-01"
                                max="{{ date('Y-m-d') }}" value="{{ old('end_date') }}">
                            @error('end_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- total_students -->
                        <div class="form-group">
                            <label class="form-label" for="total_students">Total de estudiantes:</label>
                            <input class="form-control" type="number" id="total_students" name="total_students"
                                placeholder="Código de la cohorte" value="{{ old('total_students') }}">
                            @error('total_students')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- program_id -->
                        <div class="form-group">
                            <label class="form-label" for="race">Programa:</label>
                            <select id="program_id" name="program_id" class="form-control">
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}" @selected(old('program_id') == $program->id)>{{ $program->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program_id')
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
