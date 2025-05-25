<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('status')->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->string('sexo')->nullable();
            $table->string('fertilidade')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animais');
    }
};
