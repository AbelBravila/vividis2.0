<?php

namespace App\Http\Controllers;

use App\Models\tbCita;
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
        $PersonalDisponible=DB::select("SELECT ep.IdPersonal, p.NombrePersona, t.NombreTrabajo, t.TiempoEstimado FROM tb_especialidad_personal ep JOIN tb_personal p ON ep.IdPersonal = p.IdPersonal JOIN tb_trabajos t ON ep.IdTrabajo = t.IdTrabajo where ep.IdTrabajo = $id GROUP BY p.NombrePersona");       
        $Trabajos=DB::select("SELECT IdTrabajo, TiempoEstimado FROM tb_trabajos where IdTrabajo = $id");
        return view('Agendar.personalAgenda', compact('PersonalDisponible', 'Trabajos'));
    }

    public function Agendar(string $id, string $idTrabajo)
    {
        $Trabajos=DB::select("SELECT IdTrabajo, NombreTrabajo, TiempoEstimado FROM tb_trabajos where IdTrabajo = $idTrabajo");
        $fechasDisponibles=DB::select("WITH RECURSIVE DateRange AS (
            SELECT DATE_ADD(CURDATE(), INTERVAL 1 DAY) AS FechaCita, 0 AS DayCount
            UNION ALL
            SELECT 
                DATE_ADD(FechaCita, INTERVAL 1 DAY) AS FechaCita,
                DayCount + CASE WHEN WEEKDAY(DATE_ADD(FechaCita, INTERVAL 1 DAY)) < 5 THEN 1 ELSE 0 END AS DayCount
            FROM DateRange
            WHERE DayCount < 9 OR WEEKDAY(DATE_ADD(FechaCita, INTERVAL 1 DAY)) >= 5
        ),
        Prueba AS (
            SELECT 
                dr.FechaCita,
                COALESCE(SUM(c.Tmanana), 0) AS TiempoManana,
                COALESCE(SUM(c.Ttarde), 0) AS TiempoTarde,
                COALESCE(th.Tmanana, 0) AS TmananaRestante, 
                COALESCE(th.Ttarde, 0) AS TtardeRestante
            FROM 
                DateRange dr
            LEFT JOIN 
                tb_citas c 
            ON 
                dr.FechaCita = c.FechaCita AND c.IdPersonal = $id
            LEFT JOIN 
                tb_personal tp
            ON 
                tp.IdPersonal = $id
            LEFT JOIN 
                tb_horarios th
            ON 
                th.IdHorario = tp.IdHorario
            WHERE 
                WEEKDAY(dr.FechaCita) < 5 
            GROUP BY 
                dr.FechaCita, th.Tmanana, th.Ttarde
            ORDER BY 
                dr.FechaCita
        )
        
        SELECT * FROM Prueba;");
        $PersonalDisponible=DB::select("SELECT ep.IdPersonal, p.NombrePersona, t.NombreTrabajo, t.TiempoEstimado FROM tb_especialidad_personal ep JOIN tb_personal p ON ep.IdPersonal = p.IdPersonal JOIN tb_trabajos t ON ep.IdTrabajo = t.IdTrabajo where ep.IdPersonal = $id");       
        return view('Agendar.Agendar', compact('PersonalDisponible', 'fechasDisponibles', 'Trabajos'));
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
        $request->validate([
            'IdPersonal' => 'required|string|min:1|max:10000',
            'IdTrabajo' => 'required|string|min:1|max:10000',
            'FechaCita' => 'required|string|min:1|max:100',
            'Tmanana' => 'required|string|min:1|max:100',
            'Ttarde' => 'required|string|min:1|max:100',
            'IdCliente' => 'required|string|min:1|max:100',
            'Cliente' => 'required|string|min:1|max:100',
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        tbCita::create($request->all()); 

        return redirect()->route('Citas.index');
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
