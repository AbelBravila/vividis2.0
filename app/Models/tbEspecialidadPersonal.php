<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbEspecialidadPersonal extends Model
{
    use HasFactory;
    protected $table = 'tb_especialidad_personal';
    protected $primaryKey = 'IdEspecialidadPersonal';
    protected $fillable = [
        'IdPersonal', 
        'IdTrabajo', 
        'Estado'
    ];
    
}
