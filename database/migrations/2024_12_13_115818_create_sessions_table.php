<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Executa as alterações no banco de dados.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID único da sessão
            $table->foreignId('user_id')->nullable(); // ID do usuário (opcional)
            $table->string('ip_address', 45)->nullable(); // Endereço IP do usuário
            $table->text('user_agent')->nullable(); // User Agent do navegador
            $table->text('payload'); // Dados da sessão
            $table->integer('last_activity'); // Timestamp da última atividade
        });
    }

    /**
     * Reverte as alterações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
