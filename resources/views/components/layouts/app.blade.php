<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navbar')
<div class="container mx-auto m-24 p-4">
    {{ $slot }}
</div>
@include('layouts.footer')
</body>
</html>
