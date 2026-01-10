<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->unsignedBigInteger('codeMat')->primary();
            $table->unsignedBigInteger('codeSp');
            $table->unsignedInteger('niveau');
            $table->float('coef');
            $table->unsignedInteger('credit');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};
