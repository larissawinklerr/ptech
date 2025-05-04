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
            $table->foreignId('animal_id')->constrained('animais')->onDelete('cascade');
            $table->string('tipo', 50);
            $table->text('observacao')->nullable();
            $table->date('data');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('procedimentos');
    }
};
