<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbPersonal extends Model
{
    use HasFactory;
    protected $table = 'tb_personal';
    protected $primaryKey = 'IdPersonal';
    protected $fillable = [
        'NombrePersona', 
        'IdHorario', 
        'Horario',
        'Telefono',
        'Estado',
    ];
}
