<!DOCTYPE html>
<html lang="jp">
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}?{{config('versions.css')}}">
</head>
<body>
<div id="app"></div>
<script src="{{ asset('js/app.js') }}?{{config('versions.js')}}"></script>
</body>
</html>
