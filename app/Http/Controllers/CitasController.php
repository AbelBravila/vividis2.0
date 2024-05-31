<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  Auth::user()->id
    public function index()
    {
        $IdCliente = Auth::user()->id;
        $Citas = DB::select("SELECT 
        tc.IdCita, 
        tp.NombrePersona, 
        tt.NombreTrabajo, 
        (tc.Tmanana + tc.Ttarde) AS TiempoEstimado, 
        tc.FechaCita, 
        tc.Estado,
        CASE 
            WHEN tc.Tmanana > 0 THEN 'Mañana'
            WHEN tc.Ttarde > 0 THEN 'Tarde'
            ELSE 'Indefinido' 
        END AS Horario
    FROM 
        tb_citas tc 
    INNER JOIN 
        tb_personal tp ON tc.IdPersonal = tp.IdPersonal 
    INNER JOIN 
        tb_trabajos tt ON tc.IdTrabajo = tt.IdTrabajo 
        WHERE tc.IdCliente = $IdCliente ORDER BY tc.FechaCita DESC;");
        return view('Citas.CitasAgendadas', compact('Citas'));
    }

    public function indexGeneral()
    {
        $IdCliente = Auth::user()->id;
        $Citas = DB::select("SELECT 
        tc.IdCita, 
        tp.NombrePersona, 
        tt.NombreTrabajo,
        us.name,
        us.Telefono,        
        (tc.Tmanana + tc.Ttarde) AS TiempoEstimado, 
        tc.FechaCita, 
        tc.Estado,
        CASE 
            WHEN tc.Tmanana > 0 THEN 'Mañana'
            WHEN tc.Ttarde > 0 THEN 'Tarde'
            ELSE 'Indefinido' 
        END AS Horario
    FROM 
        tb_citas tc 
    INNER JOIN 
        tb_personal tp ON tc.IdPersonal = tp.IdPersonal 
    INNER JOIN 
        tb_trabajos tt ON tc.IdTrabajo = tt.IdTrabajo 
    INNER JOIN
		users us ON us.id = tc.IdCliente ORDER BY tc.FechaCita DESC;");
        return view('Citas.CitasAgendadasGeneral', compact('Citas'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
