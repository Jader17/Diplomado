@extends('admin.template')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title')
    Estudiante
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header align-items-end">
                    <a href="{{ route('student.create') }}" class="btn btn-primary float-right">
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
                                        <th>Información personal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($students)
                                        @foreach ($students as $student)
                                            <tr>
                                                <td> <img src="{{ $student->photo }}" width="100"
                                                        alt="{{ $student->id }}" />
                                                </td>
                                                <td>
                                                    <strong>Identificación:</strong>&nbsp;{{ $student->identification }} <br>
                                                    <strong>Nombre:</strong>&nbsp;{{ $student->name }} <br>
                                                    <strong>Género:</strong>&nbsp;{{ $student->gender }} <br>
                                                    <strong>Dirección:</strong>&nbsp;{{ $student->dirección }} <br>
                                                    <strong>Teléfono:</strong>&nbsp;{{ $student->phone }} <br>
                                                    <strong>Email:</strong>&nbsp;{{ $student->email }} <br>
                                                    <strong>Fecha nacimiento:</strong>&nbsp;{{ $student->birth_date }} <br>
                                                    <strong>Código estudiantil:</strong>&nbsp;{{ $student->student_code }} <br>
                                                    <strong>Semestre:</strong>&nbsp;{{ $student->semester }} <br>
                                                    <strong>Estado civil:</strong>&nbsp;{{ $student->civil_status }} <br>
                                                    <strong>Fecha de Ingreso:</strong>&nbsp;{{ $student->join_date }} <br>
                                                    <strong>Fecha_salida:</strong>&nbsp;{{ $student->egress_date }} <br>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center ">
                                                        <a href="{{ route('student.edit', $student) }}" class="btn btn-info">
                                                            <i class="fas fa-edit nav-icon"></i>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <form action="{{ route('student.destroy', $student) }}" method="POST">
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
