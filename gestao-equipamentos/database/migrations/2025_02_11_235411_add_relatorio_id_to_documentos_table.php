<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->foreignId('relatorio_id')->nullable()->constrained('relatorios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropForeign(['relatorio_id']);
            $table->dropColumn('relatorio_id');
        });
    }
};
