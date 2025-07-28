<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet">
    <title>Todo List App</title>

</head>

<body class="d-flex flex-column h-100 b "
    style="background-image: url('{{ asset('img/blur.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    {{ $navbar ?? '' }}

    <main class="flex-grow-1">
        {{ $slot }}
    </main>

    {{ $footer ?? '' }}

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
