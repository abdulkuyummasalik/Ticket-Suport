<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ticket Support</title>
</head>

<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>
</body>

</html>
