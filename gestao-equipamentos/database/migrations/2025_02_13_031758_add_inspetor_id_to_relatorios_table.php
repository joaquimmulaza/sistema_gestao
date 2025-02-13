<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInspetorIdToRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios', function (Blueprint $table) {
            $table->unsignedBigInteger('inspetor_id')->nullable();
            $table->foreign('inspetor_id')->references('id')->on('inspetores')->onDelete('set null'); // Adicionando onDelete
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relatorios', function (Blueprint $table) {
            $table->dropForeign(['inspetor_id']); // Removendo a chave estrangeira
            $table->dropColumn('inspetor_id'); // Removendo a coluna
        });
    }
}
