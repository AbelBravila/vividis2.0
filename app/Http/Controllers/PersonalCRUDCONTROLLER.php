<?php

namespace App\Http\Controllers;
use App\Models\tbPersonal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PersonalCRUDCONTROLLER extends Controller
{
    public function registrar(Request $request)
    {
        
        $personal = new tbPersonal();
            $personal->IdPersonal= $request->id;
            $personal->NombrePersona = $request->name;
            $personal->IdHorario = $request->Idhorario;        
            $personal->Horario = $request->Horario;   
        $personal->save();

    }

}
