<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->foreignId('instituicao_id')->after('id')->nullable()->constrained('instituicoes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->dropForeign(['instituicao_id']);
            $table->dropColumn('instituicao_id');
        });
    }
};