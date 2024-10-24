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
            $table->double('hora_1')->default(.0)->nullable();
            $table->double('hora_2')->default(.0)->nullable();
            $table->double('hora_3')->default(.0)->nullable();
            $table->double('hora_4')->default(.0)->nullable();
            $table->double('hora_5')->default(.0)->nullable();
            $table->double('hora_6')->default(.0)->nullable();
            $table->double('hora_7')->default(.0)->nullable();
            $table->double('hora_8')->default(.0)->nullable();
            $table->double('hora_9')->default(.0)->nullable();
            $table->double('hora_10')->default(.0)->nullable();
            $table->double('hora_11')->default(.0)->nullable();
            $table->double('hora_12')->default(.0)->nullable();
            $table->double('hora_13')->default(.0)->nullable();
            $table->double('hora_14')->default(.0)->nullable();
            $table->double('hora_15')->default(.0)->nullable();
            $table->double('hora_16')->default(.0)->nullable();
            $table->double('hora_17')->default(.0)->nullable();
            $table->double('hora_18')->default(.0)->nullable();
            $table->double('hora_19')->default(.0)->nullable();
            $table->double('hora_20')->default(.0)->nullable();
            $table->double('hora_21')->default(.0)->nullable();
            $table->double('hora_22')->default(.0)->nullable();
            $table->double('hora_23')->default(.0)->nullable();
            $table->double('hora_24')->default(.0)->nullable();
            $table->double('peso_inicial_filtro')->default(.0)->nullable();
            $table->double('peso_final_filtro')->default(.0)->nullable();
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

