<!DOCTYPE html>
<html>

<head>
    <title>Sesiones</title>
</head>

<body>
    @include('partials.header')

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    @yield('content')
</body>

</html>