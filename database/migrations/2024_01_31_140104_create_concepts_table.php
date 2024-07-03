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
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();
            $table->text('ObservationDocenteSpanish')->default('Sin Observacion');
            $table->text('ObservationDocenteMath')->default('Sin Observacion');
            $table->text('ObservationDocenteEnglish')->default('Sin Observacion');
            $table->text('ObservationPsicoorientador')->default('Sin Observacion');
            $table->text('ObservationAcademico')->default('Sin Observacion');
            $table->text('ObservationConvivencia')->default('Sin Observacion');
            $table->text('ObservationRector')->default('Sin Observacion');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concepts');
    }
};
