<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
    <title>SIPMA | Admin</title>
</head>

<body class="overflow-x-hidden">
    @yield('content')
    @stack('scripts')
    <script src="{{ asset('js/features.js') }}"></script>
    <script>
        @if(session('loginSuccess'))
        notif();
        @endif
        @if(session('success'))
        flash();
        @endif
    </script>
</body>

</html>