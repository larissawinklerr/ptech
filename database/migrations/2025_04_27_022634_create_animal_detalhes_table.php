<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animal_detalhes', function (Blueprint $table) {
            //colunas
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->string('nome', 50);
            $table->date('data_nascimento');
            $table->string('raca', 50);
            $table->float('peso_nascimento');
            $table->float('peso_atual')->nullable();
            $table->string('brinco_chip', 20)->unique();
            $table->foreignId('rebanho_id')->constrained('rebanhos')->onDelete('cascade');
            $table->timestamps();

            //constraint
            $table->foreign('animal_id')->references('id')->on('animais');
            $table->unique('animal_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_detalhes');
    }
};
