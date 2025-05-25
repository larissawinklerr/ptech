<?php

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
    Schema::create('procedimentos', function (Blueprint $table) {
        $table->id();
        $table->string('tipo');
        $table->enum('aplicacao', ['animal', 'lote']);
        $table->string('nome_procedimento');
        $table->text('observacoes')->nullable();
        $table->date('data');
        $table->unsignedBigInteger('animal_id');
        $table->timestamps();

        // chave estrangeira (relaciona com a tabela animais)
        $table->foreign('animal_id')->references('id')->on('animais')->onDelete('cascade');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('procedimentos');
    }
};
