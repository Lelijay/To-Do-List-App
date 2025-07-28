<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$heading}}</title>
    {{ $styles}}
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet" >
    
</head>
{{-- {{$header}} --}}
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    {{$slot}}
    <script src="assets\js\bootstrap.min.js" ></script>
  </body>
</html>