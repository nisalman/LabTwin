<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png/')}}">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css/')}}">
    <link rel="stylesheet" href="{{asset('admin/fonts/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.css')}}">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{asset('admin/plugins/treeview/bootstrap-treeview.min.css')}}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->


    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- ======= END MAIN STYLES ======= -->
    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

    @stack('css')
</head>
<body>
<div id="app">

    <!-- Offcanval Overlay -->
    <div class="offcanvas-overlay"></div>
    <!-- Offcanval Overlay -->


    <div class="main-wrapper">
        @auth
            @include('layouts.partial.topbar')
            <!-- Main Wrapper -->
            <div class="main-wrapper">
                @include('layouts.partial.sidebar')
            </div>
            <!-- Main Content -->
            @include('layouts.partial.error')

        @endauth

        @yield('content')
            <!-- End Main Content -->
        @auth
    </div>
    @include('layouts.partial.footer')
    @endauth

</div>
<!-- End wrapper -->

<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/js/script.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-repeater/repeater.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-repeater/custom-repeater.js')}}"></script>
<script src="{{asset('admin/plugins/treeview/bootstrap-treeview.min.js')}}"></script>
<script src="{{asset('admin/plugins/treeview/custom-treeview.js')}}"></script>
{{-- <script src="{{asset('admin/plugins/datepicker/datepicker.min.js')}}"></script>
 <script src="{{asset('admin/plugins/datepicker/i18n/datepicker.en.js')}}"></script>
 <script src="{{asset('admin/plugins/timepicker/jquery.timepicker.min.js')}}"></script>
 <script src="{{asset('admin/plugins/datepicker/custom-form-datepicker.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


<!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

<!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
<script src="{{asset('assets/plugins/elevatezoom/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('#inputName5').typeahead({
        source: function (query, process) {
            return $.get(path, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });

</script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('#inputName6').typeahead({
        source: function (query, process) {
            return $.get(path, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });

</script>

@stack('body-scripts')
</body>
</html>
