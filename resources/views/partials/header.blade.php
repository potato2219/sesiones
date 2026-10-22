<nav>
    <a href="{{ route('home') }}">Inicio</a>
    @if(session('token'))
        <span>Hola, {{ session('name') }}</span>
        <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    @else
        <a href="{{ route('view.login') }}">Iniciar sesión</a>
        <a href="{{ route('view.create') }}">Crear cuenta</a>
    @endif
</nav>