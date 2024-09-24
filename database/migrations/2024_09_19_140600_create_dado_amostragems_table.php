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
            $table->dateTime('data_amostragem');
            $table->integer('n_filtro');
            // $table->double('volume_total');
            // $table->double('concetracao_pts');
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();

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
