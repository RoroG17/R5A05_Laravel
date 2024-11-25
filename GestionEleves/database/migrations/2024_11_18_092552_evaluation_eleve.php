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
        Schema::create('evaluation_eleves', function (Blueprint $table) {
            $table->id();
            $table->integer("eleve");
            $table->integer('evaluation');
            $table->float('note');
            $table->timestamps();

            $table->foreign('eleve')->references('id')->on('eleves')->onDelete('cascade');
            $table->foreign('evaluation')->references('id')->on('evaluations')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_eleve');
    }
};
