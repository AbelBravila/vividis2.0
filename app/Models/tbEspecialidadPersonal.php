<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbEspecialidadPersonal extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdEspecialidadPersonal';
    protected $fillable = [
        'IdPersonal', 
        'IdTrabajo', 
    ];
    
}
