<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    @stack('styles')

    <title>{{ config('app.name') }}{{ isset($title) ? ' - ' . $title : '' }}</title>

</head>
<body>
    <div class="page">
        <div class="page__main">
            @include('sidebar.navigation')
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
