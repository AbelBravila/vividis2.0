<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbCita extends Model
{
    use HasFactory;

    protected $table = 'tb_citas';
    protected $primaryKey = 'IdCita';
    protected $fillable = [
        'IdPersonal', 
        'IdTrabajo', 
        'FechaCita',
        'Tmanana',
        'Ttarde',
        'IdCliente',
        'Cliente',
        'Estado',
    ];
}
