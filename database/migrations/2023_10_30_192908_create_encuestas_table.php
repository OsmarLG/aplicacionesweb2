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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->enum('edad', ['-18', '18-24', '25-34', '35-44', '45-54', '55-64', '65+']);
            $table->enum('sexo', ['Masculino', 'Femenino', 'No binario', 'Prefiero No Decirlo']);
            $table->enum('frecuencia', ['Diariamente', 'Semanalmente', 'Mensualmente', 'Raramente', 'Primera']);
            $table->enum('acercamiento', ['WEB', 'Red Social', 'Amigo', 'Ads', 'Otro']);
            $table->enum('satisfaccion', [1, 2, 3, 4, 5]);
            $table->string('mejorar');
            $table->string('comentario');
            $table->enum('futuro', ['SI', 'NO']);
            $table->string('correo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
