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
            $table->foreignId('utilizador_id')->constrained('utilizadors');
            $table->integer('qnt_avistamentos');
            $table->integer('num_crias');
            $table->decimal('latitude', 11, 8); 
            $table->decimal('longitude', 11, 8); 
            $table->dateTime('data_hora_avistamento');
            $table->string('empresa_barcos');
            $table->text('comportamento_especies');
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
