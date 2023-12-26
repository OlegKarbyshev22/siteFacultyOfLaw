<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ url('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ url('libary_slider/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('libary_slider/owl.theme.default.min.css') }}">
    <title>Юридический факультет</title>
</head>
<body>

@include('inc.header')

@yield('content')

@include('inc.footer')


<script src="{{ url('libary_slider/jquery.min.js') }}" defer></script>
<script src="{{ url('libary_slider/owl.carousel.min.js') }}" defer></script>
<script src="{{ url('js/scripts.js') }}" defer></script>
</body>
</html>
