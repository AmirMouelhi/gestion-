<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nce');
            $table->unsignedBigInteger('codeSp');
            $table->date('dateInscription');
            $table->unsignedInteger('niveauInscription');
            $table->float('resultatFinale');
            $table->string('mention');

            $table->foreign('nce')->references('nce')->on('etudiants')->cascadeOnDelete();
            $table->foreign('codeSp')->references('codeSp')->on('specialites')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
