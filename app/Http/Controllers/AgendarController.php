<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $Trabajos=DB::select("SELECT * FROM tb_trabajos");
       return view('Agendar.index', compact('Trabajos'));
    }

    public function buscar(string $id)
    {
        $PersonalDisponible=DB::select("SELECT ep.IdPersonal, p.NombrePersona, t.NombreTrabajo, t.TiempoEstimado FROM tb_especialidad_personal ep JOIN tb_personal p ON ep.IdPersonal = p.IdPersonal JOIN tb_trabajos t ON ep.IdTrabajo = t.IdTrabajo where ep.IdTrabajo = $id");       
        $Trabajos=DB::select("SELECT TiempoEstimado FROM tb_trabajos where IdTrabajo = $id");
        return view('Agendar.personalAgenda', compact('PersonalDisponible', 'Trabajos'));
    }

    public function fechasDisponible(string $id){
        $fechasDisponibles=DB::select("WITH RECURSIVE DateRange AS (
            SELECT DATE_ADD(CURDATE(), INTERVAL 1 DAY) AS FechaCita, 0 AS DayCount
            UNION ALL
            SELECT 
                DATE_ADD(FechaCita, INTERVAL 1 DAY) AS FechaCita,
                DayCount + CASE WHEN WEEKDAY(DATE_ADD(FechaCita, INTERVAL 1 DAY)) < 5 THEN 1 ELSE 0 END AS DayCount
            FROM DateRange
            WHERE DayCount < 8 OR WEEKDAY(FechaCita) >= 5
        )
        SELECT 
            dr.FechaCita,
            COALESCE(SUM(c.Tmanana), 0) AS TiempoManana,
            COALESCE(SUM(c.Ttarde), 0) AS TiempoTarde,
            COALESCE(th.Tmanana, 0) AS TmananaRestante, COALESCE(th.Ttarde, 0) AS TtardeRestante
        FROM 
           DateRange dr
        LEFT JOIN 
            tb_citas c 
        ON 
            dr.FechaCita = c.FechaCita AND c.IdPersonal = $id
        LEFT JOIN tb_personal tp
        ON tp.IdPersonal = c.IdPersonal
        LEFT JOIN tb_horarios th
        ON th.IdHorario = tp.IdHorario
        WHERE WEEKDAY(dr.FechaCita) < 5
        GROUP BY 
            dr.FechaCita
        ORDER BY 
            dr.FechaCita;");

        return response()->json($fechasDisponibles);
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
