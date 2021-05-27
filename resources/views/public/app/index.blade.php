<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/69ad24a5ce.js" crossorigin="anonymous"></script>

    @stack('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/public.css') }}">
    <title>{{ config('app.name') }}{{ isset($title) ? ' - ' . $title : '' }}</title>

</head>
<body>
    <div class="page">
        <div class="page__main">
            @yield('content')
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset('/js/tabs.js') }}"></script>
    <script src="{{ asset('/js/public.js') }}"></script>
    @stack('scripts')
</body>
</html>
