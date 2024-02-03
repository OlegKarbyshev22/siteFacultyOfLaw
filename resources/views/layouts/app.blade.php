<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_url('css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_url('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ secure_url('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ secure_url('libary_slider/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ secure_url('libary_slider/owl.theme.default.min.css') }}">
    <title>Юридический факультет</title>
</head>
<body>

@include('inc.header')

@yield('content')

@include('inc.footer')


<script src="{{ secure_url('libary_slider/jquery.min.js') }}" defer></script>
<script src="{{ secure_url('libary_slider/owl.carousel.min.js') }}" defer></script>
<script src="{{ secure_url('js/scripts.js') }}" defer></script>
<script defer>console.log("{{ secure_url('js/scripts.js') }}");</script>

</body>
</html>
