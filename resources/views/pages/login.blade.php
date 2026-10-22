@extends('layouts.app')

@section('content')
    <h2>Iniciar sesión</h2>
    <form action="{{ route('user.login') }}" method="POST">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <label>Contraseña</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
@endsection
