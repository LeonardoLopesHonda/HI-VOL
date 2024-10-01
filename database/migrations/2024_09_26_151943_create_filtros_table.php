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
        Schema::create('filtros', function (Blueprint $table) {
            $table->id();
            $table->integer('n_filtro');
            $table->string('local');
            $table->double('calibrado_CPV')->default(729.00);
            $table->double('inclinacao')->default(1.0979);
            $table->date('ultima_calibracao');
            $table->double('intercepto')->default(-0.1575);
            $table->double('correlacao')->default(0.9978);
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filtros');
    }
};
