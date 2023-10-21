<?php

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('farmacias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Paciente::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('nome_da_medicacao');
            $table->text('posologia');
            $table->string('paciente_possui_alergia');
            $table->text('qual_alergia')->nullable();
            $table->string('upload_receita_medica')->nullable();
            $table->string('vacina_covid_19');
            $table->string('quantas_doses');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmacias');
    }
};
