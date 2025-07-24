<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deputados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_externo')->unique(); // ID da API da câmara
            $table->string('nome');
            $table->string('sigla_partido')->nullable();
            $table->string('sigla_uf')->nullable();
            $table->string('url_foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deputados');
    }
};