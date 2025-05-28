<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('procedimentos', function (Blueprint $table) {
        $table->id();
        $table->string('tipo');
        $table->string('aplicacao');
        $table->string('nome_procedimento');
        $table->text('observacoes')->nullable();
        $table->date('data');
        $table->unsignedBigInteger('animal_id')->nullable();
        $table->unsignedBigInteger('rebanho_id')->nullable();
        $table->timestamps();

        $table->foreign('animal_id')->references('id')->on('animais')->onDelete('set null');
        $table->foreign('rebanho_id')->references('id')->on('rebanhos')->onDelete('set null');
    });
}


    public function down(): void
    {
        Schema::dropIfExists('procedimentos');
    }
};
