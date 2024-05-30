<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Empleado;
use App\Models\tbPersonal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        $usuarios = DB::select("Select * from users where Estado = 'Activo' And Rol != 'Cliente'");
        //$usuarios = DB::select("Select * from users where Estado = 'Activo'");
        $empleados = DB::select("Select * from tb_personal");
        return view('usuarios.index', compact('usuarios', 'empleados'));
    }
    public function registrar(Request $request)
    {
        $user = new User();

        if ($request->rol == "Empleado") {
            $user->name = $request->name;
            $user->password = $request->password;
            $user->rol = $request->rol;
            $user->Telefono = "0";
            $user->Estado = "Activo";
            $user->IdEmpleado = $request->IdEmpleado;
        } else {
            $user->name = $request->name;
            $user->password = $request->password;
            $user->rol = $request->rol;
            $user->Telefono = "0";
            $user->Estado = "Activo";
            $user->IdEmpleado = 0;
        }

        $user->save();
        return redirect('usuarios');
    }

    public function registrarPrueba()
    {
        $user = new User();

        $user->name = "Carlos Estrada";
        $user->password = "Cliente";
        $user->rol = "Cliente";
        $user->Telefono = "0";
        $user->Estado = "Activo";
        $user->IdEmpleado = 0;

        $user->save();
        // return redirect('usuarios');
    }

    public function MandarLogin()
    {
        Auth::logout();
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenctials = [
            "name" => $request->name,
            "password" => $request->password,
        ];

        if (Auth::attempt($credenctials)) {
            if (Auth::user()->rol == 'Cliente') {
                $request->session()->regenerate();
                return redirect()->intended(route('inicio'));
            } else {
                $request->session()->regenerate();
                return redirect()->intended(route('inicioL'));
            }

        } else {
            return redirect('login')->with('status', 'Usuario o contraseña incorrectos');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('inicio');

        } catch (\Throwable $th) {
            return redirect('inicio');
        }

    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:100',
            'password' => 'required|string|min:1|max:500',
            'rol' => 'required|string|min:1|max:500',

        ]);

        $usuario = User::findOrFail($id);

        if ($request->rol == "Empleado") {
            $usuario->update(
                [
                    'name' => $request->name,
                    'password' => $request->password,
                    'rol' => $request->rol,
                    'IdEmpleado' => $request->IdEmpleado,
                ]
            );
        } elseif ($request->rol == "Cliente") {
            $usuario->update(
                [
                    'name' => $request->name,
                    'password' => $request->password,
                    'IdEmpleado' => 0,
                ]
            );
        } else {
            $usuario->update(
                [
                    'name' => $request->name,
                    'password' => $request->password,
                    'rol' => $request->rol,
                    'IdEmpleado' => 0,
                ]
            );
        }

        return redirect()->route('usuarios');
    }

    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update([
            'Estado' => "Inactivo",
        ]);

        // $user = User::findOrFail($id);
        // $user->delete();
        return redirect()->route('usuarios');
    }
}
