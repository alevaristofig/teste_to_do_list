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
        Schema::create('lista_tarefa', function (Blueprint $table) {
           $table->unsignedBigInteger('lista_id');
           $table->unsignedBigInteger('tarefa_id');

           $table->foreign('lista_id')->references('id')->on('listas');
           $table->foreign('tarefa_id')->references('id')->on('tarefas');

           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
