<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Paciente;

class Farmacia extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'quantidade_entregue_pela_farmacia' =>  'array',
        'paciente_possui_alergia'           =>  'array',
        'vacina_covid_19'                   =>  'array',
        'quantas_doses'                     =>  'array',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function paciente(){
        return $this->belongsTo(Paciente::class);

    }

}
