<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('nce');
            $table->unsignedInteger('codeMat');
            $table->date('dateResultat');
            $table->float('noteControle');
            $table->float('noteExamen');
            $table->float('resultat');
            
            
            $table->primary(['nce', 'codeMat', 'dateResultat']);
            
            
            $table->foreign('nce')->references('nce')->on('etudiants')->onDelete('cascade');
            $table->foreign('codeMat')->references('codeMat')->on('matieres')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
