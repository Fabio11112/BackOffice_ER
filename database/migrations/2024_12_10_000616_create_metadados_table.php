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
        Schema::create('metadados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilizador_id')->constrained('utilizadors', 'user_id');
            $table->integer('qnt_avistamentos')->nullable(); 
            $table->integer('num_crias')->nullable(); 
            $table->decimal('latitude', 11, 8)->nullable(); 
            $table->decimal('longitude', 11, 8)->nullable(); 
            $table->string('data_hora_avistamento');
            $table->string('empresa_barcos')->nullable(); 
            $table->string('comportamento_especies')->nullable(); 
            $table->integer('beaufourt_scale')->nullable(); 
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metadados');
    }
};
