<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = DB::select("Select * from users where Estado = 'Activo' AND rol = 'Cliente'");
        return view('Clientes.index', compact('clientes'));
    }


    public function buscar()
    {
        $busqueda = $_GET['name'];
        $clientes = DB::select("Select * from users where Estado = 'Activo' AND rol = 'Cliente' AND name LIKE '%$busqueda%'");
        return view('Clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->password = $request->password;
        $user->rol = "Cliente";
        $user->Telefono = $request->Telefono;
        $user->Estado = "Activo";
        $user->IdEmpleado = 0;
        
        $user->save();
        return redirect('login')->with('status', 'Usuario Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:100',
            'password' => 'required|string|min:1|max:500',
            'Telefono' => 'required|string|min:1|max:500',

        ]);

        $cliente = User::findOrFail($id);


        $cliente->update(
            [
                'name' => $request->name,
                'password' => $request->password,
                'Telefono' => $request->Telefono,
                'IdEmpleado' => 0,
            ]
        );

        return redirect()->route('Clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $cliente = User::findOrFail($id);
        $cliente->update([
            'Estado' => "Inactivo",
        ]);

        return redirect()->route('Clientes.index');
    }
}
