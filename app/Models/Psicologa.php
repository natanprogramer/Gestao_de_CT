<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Paciente;
class Psicologa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function user(){
        return $this->belongsTo(User::class);

    }
}
