@extends('admin.template')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title')
    Programas
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header align-items-end">
                    <a href="{{ route('program.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus nav-icon"></i>
                    </a>
                </div>
                <div class="card-body overflow-auto" style="max-height: 29rem;">
                    <div class="row">
                        <div class="col">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Información programas</th>>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($programs)
                                        @foreach ($programs as $program)
                                            <tr>
                                                <td> <img src="{{ $program->logo }}" width="200" alt="{{ $program->id }}" />
                                                </td>
                                                <td>
                                                    <strong>Codigo:</strong>&nbsp;{{ $program->code }} <br>
                                                    <strong>Título:</strong>&nbsp;{{ $program->title }} <br>
                                                    <strong>Descripción:</strong>&nbsp;{{ $program->description }} <br>
                                                    <strong>Email:</strong>&nbsp;{{ $program->email }} <br>
                                                    <strong>Telefono:</strong>&nbsp;{{ $program->phone }} <br>
                                                    <strong>Modalidad:</strong>&nbsp;{{ $program->modality }} <br>
                                                    <strong>Fecha de registro:</strong>&nbsp;{{ $program->register_date }} <br>
                                                    <strong>Coordinador:</strong>&nbsp;{{ $program->user->name }} <br>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center ">
                                                        <a href="{{ route('program.edit', $program) }}" class="btn btn-info">
                                                            <i class="fas fa-edit nav-icon"></i>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <form action="{{ route('program.destroy', $program) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger"
                                                                onclick="return confirm('¿Está seguro de eliminar los datos del profesor?')">
                                                                <i class="fas fa-minus-circle nav-icon"></i>
                                                            </button>
                                                        </form>
                                                    </div>
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
