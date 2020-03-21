<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/toastr/build/toastr.min.css')}}">
    <script src="{{asset('asset/css/toastr/build/toastr.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
</head>
<body>
        <main class="py-4">
            @yield('content')
        </main>

<script>
    $(document).ready(function(){
        $(".alert-error").show(function(){
            toastr.error("Username Atau Password Salah !");
            
        })
    });
</script>
</body>
</html>
