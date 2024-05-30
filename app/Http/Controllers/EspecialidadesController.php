<?php

namespace App\Http\Controllers;

use App\Models\tbEspecialidadPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal=DB::select("SELECT * FROM tb_personal where Estado = 'Activo'");
        $trabajos=DB::select("SELECT * FROM tb_trabajos where Estado = 'Activo'");
        $especialidades=DB::select("SELECT tep.IdEspecialidadPersonal, tep.IdPersonal, tp.NombrePersona, tep.IdTrabajo, tt.NombreTrabajo, tt.TiempoEstimado, tep.Estado FROM tb_especialidad_personal tep INNER JOIN tb_personal tp on tep.IdPersonal = tp.IdPersonal INNER JOIN tb_trabajos tt ON tep.IdTrabajo = tt.IdTrabajo WHERE tep.Estado = 'Activo'");
       return view('Especialidades.index', compact('personal','especialidades','trabajos'));
    }

    public function buscar()
    {
        $busqueda = $_GET['NombrePersona'];
        $personal=DB::select("SELECT * FROM tb_personal where Estado = 'Activo'");     
        $trabajos=DB::select("SELECT * FROM tb_trabajos where Estado = 'Activo'");  
        $especialidades = DB::select("SELECT tep.IdEspecialidadPersonal, tep.IdPersonal, tp.NombrePersona, tep.IdTrabajo, tt.NombreTrabajo, tt.TiempoEstimado, tep.Estado FROM tb_especialidad_personal tep INNER JOIN tb_personal tp on tep.IdPersonal = tp.IdPersonal INNER JOIN tb_trabajos tt ON tep.IdTrabajo = tt.IdTrabajo WHERE tep.Estado = 'Activo' AND tp.NombrePersona LIKE '%$busqueda%'");        
        return view('Especialidades.index', compact('especialidades', 'personal','trabajos'));
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
            'IdPersonal' => 'required|integer|min:1|max:10000',
            'IdTrabajo' => 'required|string|min:1|max:100',
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        tbEspecialidadPersonal::create($request->all()); 

        return redirect()->route('Especialidades.index');
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
            'IdPersonal' => 'required|integer|min:1|max:10000',
            'IdTrabajo' => 'required|string|min:1|max:100',
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        $especialidad = tbEspecialidadPersonal::findOrFail($id);
        $especialidad->update($request->all());        

        return redirect()->route('Especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $especialidad = tbEspecialidadPersonal::findOrFail($id);
        $especialidad->update([
            'Estado' => "Inactivo",
            ]);
        return redirect()->route('Especialidades.index');
    }
}
