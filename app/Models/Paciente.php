<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pia;
use App\Models\CheckList;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $casts =[
        'saude' => 'array',
        'diagnosticado' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'status',
        'data_do_acolhimento',
        'avatar_paciente',
        'primeiro_nome',
        'sobrenome',
        'numero_de_telefone',
        'endereco_de_email',
        'data_de_nascimento',
        'genero',
        'endereco',
        'cidade',
        'pais',
        'estado',
        'cpf',
        'estado_civil',
        'conjuge',
        'nome_da_mae',
        'nome_do_pai',
        'responsavel_pelo_acolhimento',
        'telefone_do_responsavel',
        'encaminhado_por',
        'motivacao',
        'porque_motivacao',
        'observacao_extras',

        'saude',
        'diagnosticado',
        'desconforto_fisico',
        'qual_desconforto',
        'restricao_alimentar',
        'qual_restricao_alimentar',
        'necessidade_especial',
        'qual_acompanhamento_de_saude',
        'hospitalizado',
        'quant_hospitalizacao',
        'algum_medicamento',
        'qual_motivo_medicamento',
        'avaliacao_do_caso',

    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function checklist(){
        return $this->hasOne(CheckList::class);

    }
}
