<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class UserController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8'
            ]);

            $data['password'] = Hash::make($data['password']);

            User::create($data);

            return redirect()->route('home')->with('success', 'Tu cuenta ha sido creada.');
        }
        catch(Exception $exception)
        {
            return back()->with('error', 'Error al crear cuenta: ' . $exception->getMessage());
        }
    }

    public function login(Request $request)
    {
        try
        {
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ]);

            $user = User::where('email', $data['email'])->first();

            if (!$user || !Hash::check($data['password'], $user->password)) {
                return back()->with('error', 'Credenciales incorrectas.');
            }

            $token = Str::random(60);

            Token::create([
                'user_id' => $user->id,
                'token' => $token
            ]);

            session(['token' => $token, 'name' => $user->name]);

            return redirect()->route('home')->with('success', 'Has iniciado sesión con éxito.');
        }
        catch(Exception $exception)
        {
            return back()->with('error', 'Error al iniciar sesión: ' . $exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login')->with('success', 'Sesión cerrada con éxito.');
    }
}
