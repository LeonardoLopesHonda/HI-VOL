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
        Schema::create('dados_campos', function (Blueprint $table) {
            $table->id();
            $table->double('temperatura_media_ambiente')->default(302);
            $table->double('temperatura_media_sazonal')->default(298);
            $table->double('pressao_barometrica_media')->default(761);
            $table->double('pressao_barometrica_sazonal')->default(760);
            $table->integer('leitura_inicial')->default(0);
            $table->integer('leitura_final')->default(0);
            $table->integer('diferenca_horametro')->default(0);
            $table->unsignedBigInteger('id_amostragem');
            $table->timestamps();

            $table->foreign('id_amostragem')->references('id')->on('dado_amostragems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_campos');
    }
};
