<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class CheckList extends Model {

    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'calcas',
        'bermudas_shorts',
        'cuecas',
        'pares_de_meia',
        'bones',
        'conjuntos_de_moleton',
        'camisas_camisetas',
        'pares_de_tenis',
        'toalhas',
        'lencois',
        'cobertores',
        'travesseiros',
        'fronhas',
        'cadernos',
        'canetas',
        'caixas_de_sabao_em_po',
        'pacote_de_sabao_em_barra',
        'amaciantes',
        'escova_de_roupa',
        'sabonetes',
        'desodorantes',
        'cremes_dental',
        'cremes_de_pele',
        'prestobarbas',
        'shampoo',
        'condicionadores',
        'observacao_extras',
    ];

    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
}
