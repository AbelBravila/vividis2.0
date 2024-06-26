<?php

namespace App\Http\Controllers;

use App\Models\tbTrabajos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabajos = DB::select("Select * from tb_trabajos where Estado = 'Activo'");        
        return view('Trabajos.index', compact('trabajos'));
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
            'NombreTrabajo' => 'required|string|min:1|max:100',
            'TiempoEstimado' => 'required|integer|min:1|max:10000',            
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        tbTrabajos::create($request->all()); 

        return redirect()->route('Trabajos.index');
    }

    public function buscar()
    {
        $busqueda = $_GET['NombreTrabajo'];
        $trabajos = DB::select("Select * from tb_trabajos where Estado = 'Activo' AND NombreTrabajo LIKE '%$busqueda%'");        
        return view('Trabajos.index', compact('trabajos'));
    }
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
            'NombreTrabajo' => 'required|string|min:1|max:100',
            'TiempoEstimado' => 'required|integer|min:1|max:10000', 
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        $trabajo = tbTrabajos::findOrFail($id);
        $trabajo->update($request->all());        

        return redirect()->route('Trabajos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trabajo = tbTrabajos::findOrFail($id);
        $trabajo->update([
            'Estado' => "Inactivo",
            ]);      
      
        // $user = User::findOrFail($id);
        // $user->delete();
        return redirect()->route('Trabajos.index');
    }
}
