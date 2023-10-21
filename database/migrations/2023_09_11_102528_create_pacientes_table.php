<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('pacientes', function (Blueprint $table) {


            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('status');
            $table->string('avatar_paciente')->nullable();
            $table->string("primeiro_nome");
            $table->string("sobrenome");
            $table->string('data_do_acolhimento');
            $table->string("numero_de_telefone");
            $table->string("data_de_nascimento");
            $table->string("genero");
            $table->string("endereco");
            $table->string("cidade");
            $table->string("pais");
            $table->string("estado");
            $table->string("cpf");
            $table->string("estado_civil");
            $table->string("conjuge");
            $table->string("nome_da_mae");
            $table->string("nome_do_pai");
            $table->string("responsavel_pelo_acolhimento");
            $table->string("telefone_do_responsavel");
            $table->string("encaminhado_por");
            $table->string("motivacao");
            $table->text("porque_motivacao");
            $table->text("observacao_extras");
            //Saúde
            $table->string("saude");
            $table->string("diagnosticado");
            $table->string("desconforto_fisico");
            $table->text("qual_desconforto");
            $table->string("restricao_alimentar");
            $table->text("qual_restricao_alimentar");
            $table->string("necessidade_especial");
            $table->text("qual_acompanhamento_de_saude");
            $table->string("hospitalizado");
            $table->string("quant_hospitalizacao");
             $table->string("algum_medicamento");
            $table->text('qual_motivo_medicamento');
            $table->text("avaliacao_do_caso");

            $table->timestamps();

             $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('pacientes');
    }
};
