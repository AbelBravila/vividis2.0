<?php

namespace App\Http\Controllers;

use App\Models\tbHorario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = DB::select("Select * from tb_horarios where Estado = 'Activo'");        
        return view('Horarios.index', compact('horarios'));
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
        $request->validate([
            'Horario' => 'required|string|min:1|max:100',
            'Tmanana' => 'required|integer|min:1|max:10000',
            'Ttarde' => 'required|string|min:1|max:100',
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        tbHorario::create($request->all()); 

        return redirect()->route('Horarios.index');
    }

    public function buscar()
    {
        $busqueda = $_GET['Horario'];
        $horarios = DB::select("Select * from tb_horarios where Estado = 'Activo' AND Horario LIKE '%$busqueda%'");        
        return view('Horarios.index', compact('horarios'));
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
            'Horario' => 'required|string|min:1|max:100',
            'Tmanana' => 'required|integer|min:1|max:10000',
            'Ttarde' => 'required|string|min:1|max:100',
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        $horario = tbHorario::findOrFail($id);
        $horario->update($request->all());        

        return redirect()->route('Horarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $horario = tbHorario::findOrFail($id);
        $horario->update([
            'Estado' => "Inactivo",
            ]);      
      
        // $user = User::findOrFail($id);
        // $user->delete();
        return redirect()->route('Horarios.index');
    }
}
