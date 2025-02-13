@extends('layouts.backend.app')

@section('title','Beranda')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
@endpush

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                <i class="fas fa-warehouse"></i>
                </div>
                <div>Beranda</div>
            </div>
        </div>
       <marquee behavior="" direction=""> <h3 style="color: green;">Selamat Datang, Di Sistem Pendukung Keputusan Perpanjang Kontrak Karyawan Metode Profile Matching</h3"></marquee>
    </div>

    {{-- Tampilan admin --}}
    @role('director')
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Kriteria</div>
                            <i class="fas fa-window-maximize fa-5x"></i>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger">{{ $criteriaCount }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                    
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Sub Kriteria</div>
                            <i class="fas fa-window-restore fa-5x"> </i> 
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success">{{ $subcriteriaCount }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Karyawan</div>
                            <i class="fas fa-user-tag fa-5x"> </i> 
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info">{{ $usersCount }}</div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tampilan non-admin --}}
    @else
    
    @endrole
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
