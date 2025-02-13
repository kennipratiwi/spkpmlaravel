@extends('layouts.backend.app')

@section('title', 'Penilaian')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-clipboard-check">
                    </i>
                </div>
                <div>{{ __('Daftar Penilaian') }}</div>
            </div>
        </div>
    </div>

    <!-- ========== Nilai ========== -->
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex mb-2">
                <div class="h6">
                    Nilai
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Karyawan</th>
                                <th>Terdaftar</th>
                                @can('evaluation.edit') <th>Aksi</th> @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $user->registration_code }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    @can('evaluation.edit')
                                        <td>
                                            @if (count($user->performance_assesment) > 0)
                                                <a class="btn btn-info btn-sm" data-toggle="tooltip" title="Lihat nilai" href="{{ url('evaluation/detail', $user->id) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus data penilaian" onclick="deleteData({{ $user->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @else
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Belum ada data">
                                                <button class="btn btn-info btn-sm" style="pointer-events: none;" disabled>
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Belum ada data">
                                                <button type="button" class="btn btn-danger btn-sm" style="pointer-events: none;" disabled>
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            <span>
                                            @endif
                                            <form id="delete-form-{{ $user->id }}" action="{{ url('evaluation/detail/delete', $user->id) }}" method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
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
        $(document).ready(function () {
            let buttons = [
                { "extend": 'copy', "text":'Salin',"className": 'btn btn-light btn-xs btn-copy' },
                { "extend": 'excel', "text":'Excel',"className": 'btn btn-light btn-xs btn-excel' },
                { "extend": 'pdf', "text":'PDF',"className": 'btn btn-light btn-xs btn-pdf' },
                { "extend": 'print', "text":'Print',"className": 'btn btn-light btn-xs btn-print' }
            ];

            let table = $('#datatable').DataTable({
                dom: 'Bfrtip',
                lengthChange: false,
                buttons: buttons,
                language: {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"}
            });

            table.buttons().container().appendTo('#datatable_wrapper .col-sm-6:eq(0)');

            let tooltip = $('.tooltip');
            if (tooltip.length) tooltip.tooltip();
        });
    </script>
@endpush
