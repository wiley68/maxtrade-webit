<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? env('APP_NAME', 'Maxtrade Webit') }}</title>
    <meta name="description" content="{{ $description ?? 'Simple web wysiwyg editor' }} | {{ env('APP_NAME') }}">
    <meta name="keywords" content="{{ $keywords ?? 'web, wysiwyg, editor, html5' }}">

    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i,500,500i,600,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</body>

</html>
