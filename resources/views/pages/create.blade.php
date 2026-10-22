@extends('layouts.app')

@section('content')
    <h2>Crear cuenta</h2>
    <form action="{{ route('user.create') }}" method="POST">
        @csrf
        <label>Nombre</label>
        <input type="text" name="name" required>
        <br>
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <label>Contraseña</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Crear cuenta</button>
    </form>
@endsection
