<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }    
    public function registrar(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->password = $request->password;        

        $user->save();
        return redirect('usuarios');
    }

    public function MandarLogin(){
        Auth::logout();
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenctials = [
            "name" => $request->name,
            "password" => $request->password
        ];        

        if(Auth::attempt($credenctials)){
            
            $request->session()->regenerate();
            return redirect()->intended(route('inicio'));
        }
        else
        {            
            return redirect('login')->with('status', 'Usuario o contraseña incorrectos');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');            

        } catch (\Throwable $th) {
            return redirect('/');
        }

    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|min:1|max:100',
            'password' => 'required|string|min:1|max:500'
        ]);

        $usuario = User::findOrFail($id);
        $usuario->update(
            [
                'name' => $request->name,
                'password' => $request->password
            ]
        );
        return redirect()->route('usuarios');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios');
    }
}
