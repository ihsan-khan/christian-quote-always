<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('assets/icon/font-awesome/css/all.min.css')}}">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('dashboard_asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/helper.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">  
        <link rel="stylesheet" href="{{ asset('dashboard_asset/css/sb-admin-2.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_asset/css/sb-admin-2.css') }}">
        
    </head>
    <body>
        <div id="app"></div>

        <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
        <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        {{-- dashboard js --}}
        <script src="{{ asset('dashboard_asset/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard_asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashboard_asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/sb-admin-2.min.js') }}"></script>
        @vite('resources/js/app.js')
    </body>
</html>
