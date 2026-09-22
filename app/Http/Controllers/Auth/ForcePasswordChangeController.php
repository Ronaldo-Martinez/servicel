<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ForcePasswordChangeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the forced password change form.
     */
    public function show()
    {
        $user = Auth::user();

        // Si el usuario no tiene la bandera activa, redirigir a home
        if (!$user->must_change_password) {
            return redirect()->route('home');
        }

        return view('auth.force-change-password', compact('user'));
    }

    /**
     * Update the user password and remove forced change flag.
     */
    public function update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.required' => 'La nueva contraseña es requerida.',
            'password.min' => 'La contraseña debe contener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->must_change_password = false;
        $user->save();

        return redirect()->route('home')->with('success', '¡Tu contraseña ha sido actualizada con éxito! Ya puedes utilizar la plataforma.');
    }
}
