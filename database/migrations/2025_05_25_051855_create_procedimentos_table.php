<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('procedimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->string('tipo');
            $table->string('aplicacao');
            $table->string('nome');
            $table->text('observacoes')->nullable();
            $table->date('data');
            $table->timestamps();

            $table->foreign('animal_id')->references('id')->on('animais')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('procedimentos');
    }
};
