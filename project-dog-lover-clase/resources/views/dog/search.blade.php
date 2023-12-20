@extends('base')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('men-dog')
    active
@endsection

@section('ite-dog-search')
    active
@endsection

@section('title')
    Administrar mis perritos
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Responsable</th>
                                <th>Sexo</th>
                                <th>Raza</th>
                                <th>Fecha nacimiento</th>
                                <th>Peso(kg)</th>
                                <th>Altura(cm)</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($dogs)
                                @foreach ($dogs as $dog)
                                    <tr>
                                        <td> {{ $dog->name }} </td>
                                        <td> {{ $dog->user->name }} </td>
                                        <td> {{ $dog->sex }} </td>
                                        <td> {{ $dog->race }} </td>
                                        <td> {{ $dog->birth_date }} </td>
                                        <td> {{ $dog->weight }} </td>
                                        <td> {{ $dog->height }} </td>
                                        <td class="text-center"> <a href="{{ route('dog.edit', $dog) }}" class="btn btn-info">
                                                <i class="fas fa-edit nav-icon"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('dog.destroy', $dog) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Está seguro de eliminar los datos del perrito?')">
                                                    <i class="fas fa-minus-circle nav-icon"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @endisset

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
