<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ setting('site_title', 'Spk Perpanjang Kontrak Karyawan') }}</title>

    <link rel="icon"  href="{{ setting('site_favicon') != null ? Storage::disk('public')->url(setting('site_favicon')) : '' }}"/>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/buttons.bootstrap4.min.css') }}">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
    @livewireStyles
</head>
<body>
<div id="app" class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('layouts.backend.partials.header')
    <div class="app-main">
        @include('layouts.backend.partials.sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')
            </div>
            @include('layouts.backend.partials.footer')
        </div>
    </div>
    @include('backend.modal.evaluation')
</div>
<!-- Scripts -->
@livewireScripts
<script src="{{ asset('js/backend.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    $(document).on('click', '#editEvaluate', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            success: function(result) {
                $('#evaluateModal').show().on('shown', function() {
                    $('#evaluateModal').modal('hide')  
                });
                $('#evaluateBody').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
            },
            timeout: 8000
        })
    });
</script>
@stack('js')
@include('vendor.lara-izitoast.toast')
</body>
</html>
