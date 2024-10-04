<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('dado_amostragems', function (Blueprint $table) {
            $table->id();
            $table->date('data_amostragem');
            $table->integer('duracao')->default(24);
            $table->string('tipo_filtro')->default('Fibra de Vidro');
            $table->integer('n_filtro');
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();

            // $table->foreign('filtro_id')->references('id')->on('filtros')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('dado_amostragems');
    }
};
