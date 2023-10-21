<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('check_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->string('calcas');
            $table->string('bermudas_shorts');
            $table->string('cuecas');
            $table->string('pares_de_meia');
            $table->string('bones');
            $table->string('conjuntos_de_moleton');
            $table->string('camisas_camisetas');
            $table->string('pares_de_tenis');
            $table->string('toalhas');
            $table->string('lencois');
            $table->string('cobertores');
            $table->string('travesseiros');
            $table->string('fronhas');
            $table->string('cadernos');
            $table->string('canetas');
            $table->string('caixas_de_sabao_em_po');
            $table->string('pacote_de_sabao_em_barra');
            $table->string('amaciantes');
            $table->string('escova_de_roupa');
            $table->string('sabonetes');
            $table->string('desodorantes');
            $table->string('cremes_dental');
            $table->string('cremes_de_pele');
            $table->string('prestobarbas');
            $table->string('shampoo');
            $table->string('condicionadores');
            $table->text('observacao_extras');
            $table->timestamps();

            $table->foreign('paciente_id')
                    ->references('id')
                    ->on('pacientes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('check_lists');
    }
};
