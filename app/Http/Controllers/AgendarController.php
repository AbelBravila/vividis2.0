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
       // $Clientes = tbCliente::all();

       $Trabajos=DB::select("SELECT * FROM tb_trabajos");
       return view('Agendar.index', compact('Trabajos'));

       // return view('Clientes.index');
    }

    public function buscar(string $id)
    {
        $PersonalDisponible=DB::select("SELECT p.NombrePersona, t.NombreTrabajo, t.TiempoEstimado FROM tb_especialidad_personal ep JOIN tb_personal p ON ep.IdPersonal = p.IdPersonal JOIN tb_trabajos t ON ep.IdTrabajo = t.IdTrabajo where ep.IdTrabajo = $id");       
        return view('Agendar.personalAgenda', compact('PersonalDisponible'));
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
