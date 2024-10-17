<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('deflexaos', function (Blueprint $table) {
            $table->id();
            $table->integer('hora_1')->nullable();
            $table->integer('hora_2')->nullable();
            $table->integer('hora_3')->nullable();
            $table->integer('hora_4')->nullable();
            $table->integer('hora_5')->nullable();
            $table->integer('hora_6')->nullable();
            $table->integer('hora_7')->nullable();
            $table->integer('hora_8')->nullable();
            $table->integer('hora_9')->nullable();
            $table->integer('hora_10')->nullable();
            $table->integer('hora_11')->nullable();
            $table->integer('hora_12')->nullable();
            $table->integer('hora_13')->nullable();
            $table->integer('hora_14')->nullable();
            $table->integer('hora_15')->nullable();
            $table->integer('hora_16')->nullable();
            $table->integer('hora_17')->nullable();
            $table->integer('hora_18')->nullable();
            $table->integer('hora_19')->nullable();
            $table->integer('hora_20')->nullable();
            $table->integer('hora_21')->nullable();
            $table->integer('hora_22')->nullable();
            $table->integer('hora_23')->nullable();
            $table->integer('hora_24')->nullable();
            $table->double('peso_inicial_filtro')->nullable();
            $table->double('peso_final_filtro')->nullable();
            $table->unsignedBigInteger('id_amostragem')->unsigned();
            $table->foreign('id_amostragem')->references('id')->on('dado_amostragems')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('deflexaos');
    }
};

