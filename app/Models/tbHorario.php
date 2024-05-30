<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbHorario extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdHorario';
    protected $fillable = [
        'Horario', 
        'Tmanana', 
        'Ttarde',
        'Estado'
    ];
}
