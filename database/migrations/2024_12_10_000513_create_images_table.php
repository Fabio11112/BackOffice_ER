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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('mime');
            $table->foreignId('utilizador_id')->constrained('utilizadors', 'user_id');
            $table->foreignId("metadado_id")->nullable()->constrained('metadados');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE images ADD file MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
