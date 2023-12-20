@extends('admin.template')

@section('title')
    Modificar Información de la Cohorte
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cohort.update', ['cohort' => $cohort->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- code -->
                        <div class="form-group">
                            <label class="form-label" for="code">Código:</label>
                            <input class="form-control" type="text" id="code" name="code"
                                placeholder="Código de la cohorte" value="{{ $cohort->code }}">
                            @error('code')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- name -->
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre:</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nombre de la cohorte" value="{{ $cohort->name }}">
                            @error('name')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- start_date -->
                        <div class="form-group">
                            <label class="form-label" for="start_date">Fecha de nacimiento:</label>
                            <input class="form-control" type="date" id="start_date" name="start_date" min="1990-01-01"
                                max="{{ date('Y-m-d') }}" placeholder="Fecha de nacimiento"
                                value="{{ $cohort->start_date->format('Y-m-d') }}">
                            @error('start_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- end_date -->
                        <div class="form-group">
                            <label class="form-label" for="end_date">Fecha de nacimiento:</label>
                            <input class="form-control" type="date" id="end_date" name="end_date" min="1990-01-01"
                                max="{{ date('Y-m-d') }}" placeholder="Fecha de nacimiento"
                                value="{{ $cohort->end_date->format('Y-m-d') }}">
                            @error('end_date')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- total_students -->
                        <div class="form-group">
                            <label class="form-label" for="total_students">Total de estudiantes:</label>
                            <input class="form-control" type="number" id="total_students" name="total_students"
                                placeholder="Código de la cohorte" value="{{ $cohort->total_students }}">
                            @error('total_students')
                                <div class="text-xs text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- program_id -->
                        <div class="form-group">
                            <label class="form-label" for="race">Programa:</label>
                            <select id="program_id" name="program_id" class="form-control">
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}" @selected($cohort->program_id == $program->id)>{{ $program->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program_id')
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
