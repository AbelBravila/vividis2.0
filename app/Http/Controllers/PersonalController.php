<?php

namespace App\Http\Controllers;

use App\Models\tbCita;
use App\Models\tbPersonal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = DB::select("Select tp.IdPersonal, tp.NombrePersona, tp.IdHorario, th.Horario, tp.Telefono, tp.Estado from tb_personal tp inner join tb_horarios th on tp.IdHorario = th.IdHorario  where tp.Estado = 'Activo'");
        $horarios = DB::select("Select * from tb_horarios where Estado = 'Activo'");
        return view('Personal.index', compact('personal', 'horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function indexEmpleado()
    {

        $IdPersonal = Auth::user()->IdEmpleado;
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
            WHERE tp.IdPersonal = $IdPersonal ORDER BY tc.FechaCita DESC;");
        return view('Citas.CitasAgendadasEmpleado', compact('Citas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombrePersona' => 'required|string|min:1|max:100',
            'IdHorario' => 'required|integer|min:1|max:10000',
            'Telefono' => 'required|string|min:1|max:100',
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        tbPersonal::create($request->all());

        $IdPersonal = DB::select("SELECT MAX(IdPersonal) as IdPersonal FROM tb_personal");

        $user = new User();
        $user->name = $request->NombrePersona;
        $user->password = str_replace(' ', '', $request->NombrePersona);
        $user->rol = "Empleado";
        $user->Estado = "Activo";
        $user->IdEmpleado = $IdPersonal[0]->IdPersonal;
        $user->save();

        return redirect()->route('Personal.index');
    }

    public function buscar()
    {
        $busqueda = $_GET['NombrePersona'];
        $personal = DB::select("Select tp.IdPersonal, tp.NombrePersona, tp.IdHorario, th.Horario, tp.Telefono, tp.Estado from tb_personal tp inner join tb_horarios th on tp.IdHorario = th.IdHorario  where tp.Estado = 'Activo' AND tp.NombrePersona LIKE '%$busqueda%'");
        $horarios = DB::select("Select * from tb_horarios where Estado = 'Activo'");
        return view('Personal.index', compact('personal', 'horarios'));
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
            'NombrePersona' => 'required|string|min:1|max:100',
            'IdHorario' => 'required|integer|min:1|max:10000',
            'Telefono' => 'required|string|min:1|max:100',
            'Estado' => 'required|string|min:1|max:10000'
        ]);

        $personal = tbPersonal::findOrFail($id);
        $personal->update($request->all());

        return redirect()->route('Personal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personal = tbPersonal::findOrFail($id);
        $personal->update([
            'Estado' => "Inactivo",
        ]);
        return redirect()->route('Personal.index');
    }

    public function ConfirmarCita(string $id)
    {

        $tbCita = tbCita::findOrFail($id);
        $tbCita->update([
            'Estado' => "Realizado",
        ]);
        return redirect()->route('CitasEmpleado');
    
    }
}
