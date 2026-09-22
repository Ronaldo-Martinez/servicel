<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\TemporaryPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($search = $request->input('buscar')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->input('role'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status') == '1');
        }

        $users = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        $totalUsers = User::count();
        $activeUsers = User::where('status', true)->count();
        $adminUsers = User::where('role', 'admin')->count();
        $pendingFirstLoginUsers = User::where('must_change_password', true)->count();

        return view('usuario.index', compact(
            'users',
            'totalUsers',
            'activeUsers',
            'adminUsers',
            'pendingFirstLoginUsers'
        ));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'role' => 'required|in:admin,operador',
            'mode' => 'required|in:auto,manual',
            'password' => 'nullable|required_if:mode,manual|string|min:8',
        ], [
            'name.required' => 'El nombre completo es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.unique' => 'Ya existe un usuario registrado con este correo.',
            'role.required' => 'Selecciona un rol para el usuario.',
            'password.required_if' => 'Debes ingresar una contraseña si elegiste modo manual.',
            'password.min' => 'La contraseña manual debe contener al menos 8 caracteres.',
        ]);

        $plainPassword = '';
        $mustChange = false;

        if ($request->mode === 'auto') {
            // Generar una contraseña temporal segura y amigable (ej: Servicel#8492)
            $plainPassword = 'Servicel#' . mt_rand(1000, 9999);
            $mustChange = true;
        } else {
            $plainPassword = $request->password;
            $mustChange = $request->has('must_change_password');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => true,
            'password' => Hash::make($plainPassword),
            'must_change_password' => $mustChange,
        ]);

        $mailSent = false;
        $mailError = null;

        // Intentar enviar email con las credenciales
        if ($request->mode === 'auto' || $request->has('send_email')) {
            try {
                Mail::to($user->email)->send(new TemporaryPasswordMail($user, $plainPassword));
                $mailSent = true;
            } catch (\Throwable $e) {
                $mailError = $e->getMessage();
            }
        }

        $message = "Usuario '{$user->name}' creado exitosamente.";
        if ($request->mode === 'auto') {
            if ($mailSent) {
                $message .= " Se envió un correo con la contraseña temporal ({$plainPassword}) a {$user->email}.";
            } else {
                $message .= " ⚠️ No se pudo enviar el correo automáticamente, pero su contraseña temporal es: {$plainPassword}";
            }
        }

        return redirect()->route('usuarios.index')
            ->with('success', $message)
            ->with('created_temp_password', $plainPassword)
            ->with('created_user_email', $user->email);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'role' => 'required|in:admin,operador',
            'password' => 'nullable|string|min:8',
        ], [
            'name.required' => 'El nombre completo es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.unique' => 'Este correo ya pertenece a otro usuario.',
            'role.required' => 'El rol es obligatorio.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
        ]);

        // Evitar que el usuario actual se degrade a sí mismo o se desactive
        if (Auth::id() == $usuario->id) {
            $role = 'admin';
            $status = true;
        } else {
            $role = $request->role;
            $status = $request->has('status');
        }

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role = $role;
        $usuario->status = $status;

        if ($request->has('force_change_next_login')) {
            $usuario->must_change_password = true;
        }

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')
            ->with('success', "Usuario '{$usuario->name}' actualizado correctamente.");
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus(string $id)
    {
        $usuario = User::findOrFail($id);

        if (Auth::id() == $usuario->id) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Por seguridad no puedes desactivar tu propia cuenta activa.');
        }

        $usuario->status = !$usuario->status;
        $usuario->save();

        $estadoTxt = $usuario->status ? 'activado' : 'desactivado';
        return redirect()->route('usuarios.index')
            ->with('success', "El usuario '{$usuario->name}' ha sido {$estadoTxt} correctamente.");
    }

    /**
     * Resend/Regenerate temporary password and email it.
     */
    public function resendTempPassword(string $id)
    {
        $usuario = User::findOrFail($id);

        $tempPassword = 'Servicel#' . mt_rand(1000, 9999);
        $usuario->password = Hash::make($tempPassword);
        $usuario->must_change_password = true;
        $usuario->save();

        $mailSent = false;
        try {
            Mail::to($usuario->email)->send(new TemporaryPasswordMail($usuario, $tempPassword));
            $mailSent = true;
        } catch (\Throwable $e) {
            // Falla de envío registrada
        }

        $msg = $mailSent
            ? "Nueva contraseña temporal ({$tempPassword}) enviada exitosamente a {$usuario->email}."
            : "Contraseña temporal restablecida a '{$tempPassword}', pero no se pudo enviar el correo automáticamente.";

        return redirect()->route('usuarios.index')
            ->with('success', $msg)
            ->with('created_temp_password', $tempPassword)
            ->with('created_user_email', $usuario->email);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        if (Auth::id() == $usuario->id) {
            return redirect()->route('usuarios.index')
                ->with('error', 'No puedes eliminar tu propia cuenta de usuario.');
        }

        if ($usuario->isAdmin() && User::where('role', 'admin')->count() <= 1) {
            return redirect()->route('usuarios.index')
                ->with('error', 'No es posible eliminar al único administrador del sistema.');
        }

        $nombre = $usuario->name;
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', "El usuario '{$nombre}' fue eliminado exitosamente.");
    }
}
