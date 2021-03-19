<!DOCTYPE html>
<!-- serve per tradurre in italiano;questa stringa l'abbiamo 
presa dal file welcome.blade.php-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- serve per tradurre in italiano -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.header')

    <main>@yield('content')</main>

    @include('partials.footer')

    <script src="{{ asset('js/app.js')}}"></script>
    
</body>
</html>