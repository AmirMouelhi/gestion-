<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->string('nce')->primary();
            $table->string('nci');
            $table->string('nom');
            $table->string('prenom');
            $table->date('datenaissance');
            $table->unsignedBigInteger('cpLieuNaissance');
            $table->string('adresse');
            $table->unsignedBigInteger('cpadresse');
            $table->timestamps(); // This will add created_at and updated_at columns
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};