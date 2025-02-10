<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestaoTables extends Migration
{
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->boolean('activa')->default(true);
            $table->date('data_registo');
            $table->timestamps();
        });

        Schema::create('proprietarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->string('n_bilhete');
            $table->date('validade_bilhete');
            $table->timestamps();
        });

        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('municipio');
            $table->string('comuna');
            $table->string('distrito');
            $table->timestamps();
        });

        Schema::create('vistorias', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->text('observacoes')->nullable();
            $table->foreignId('instituicao_id')->constrained('instituicoes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('data');
            $table->text('descricao');
            $table->foreignId('vistoria_id')->constrained('vistorias')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->date('data_validade');
            $table->string('nome');
            $table->string('url');
            $table->foreignId('instituicao_id')->nullable()->constrained('instituicoes')->onDelete('cascade');
            $table->foreignId('vistoria_id')->nullable()->constrained('vistorias')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('utilizadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('senha');
            $table->json('permissoes')->nullable();
            $table->timestamps();
        });

        Schema::create('log_entries', function (Blueprint $table) {
            $table->id();
            $table->string('nome_usuario');
            $table->string('acao');
            $table->dateTime('horario');
            $table->text('permissoes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_entries');
        Schema::dropIfExists('utilizadores');
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('relatorios');
        Schema::dropIfExists('vistorias');
        Schema::dropIfExists('enderecos');
        Schema::dropIfExists('proprietarios');
        Schema::dropIfExists('instituicoes');
    }
}
