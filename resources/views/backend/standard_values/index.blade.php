@extends('layouts.backend.app')

@section('title', 'Standard Values')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-window-maximize">
                    </i>
                </div>
                <div>Data Ketentuan Nilai</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    @can('standard.create')
                        <a href="{{ route('standard_values.create') }}" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-plus-circle fa-w-20"></i>
                            </span>
                            Tambah
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="table-responsive">

                    <table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Type</th>
                                <th>Nilai</th>
                                <th>Range</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($values as $index => $value)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $value->type }}</td>
                                    <td>{{ $value->range }}</td>
                                    <td>
                                        @if ($value->conversion == 5)
                                            {{ $value->conversion }} Sangat Memenuhi
                                        @elseif ($value->conversion == 4)
                                            {{ $value->conversion }} Memenuhi
                                        @elseif ($value->conversion == 3)
                                            {{ $value->conversion }} Cukup
                                        @elseif ($value->conversion == 2)
                                            {{ $value->conversion }} Kurang
                                        @elseif ($value->conversion == 1)
                                            {{ $value->conversion }} Sangat Kurang
                                        @endif
                                    </td>
                                    <td>
                                        @can('standard.edit')
                                            <a href="{{ route('standard_values.edit', $value->id) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i></a>
                                        @endcan

                                        @can('standard.destroy')
                                            <form action="{{ route('standard_values.destroy', $value->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus?')"> <i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            let buttons = [{
                    "extend": 'copy',
                    "text": 'Salin',
                    "className": 'btn btn-light btn-xs btn-copy'
                },
                {
                    "extend": 'excel',
                    "text": 'Excel',
                    "className": 'btn btn-light btn-xs btn-excel'
                },
                {
                    "extend": 'pdf',
                    "text": 'PDF',
                    "className": 'btn btn-light btn-xs btn-pdf'
                },
                {
                    "extend": 'print',
                    "text": 'Print',
                    "className": 'btn btn-light btn-xs btn-print'
                }
            ];

            let table = $('#datatable').DataTable({
                dom: 'Bfrtip',
                lengthChange: false,
                buttons: buttons,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
                }
            });

            table.buttons().container().appendTo('#datatable_wrapper .col-sm-6:eq(0)');

            let tooltip = $('.tooltip');
            if (tooltip.length) tooltip.tooltip();
        });
    </script>
@endpush
