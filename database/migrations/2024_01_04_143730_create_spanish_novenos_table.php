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
        Schema::create('spanish_novenos', function (Blueprint $table) {
            $table->id();
            $table->integer('spanishPNO1');
            $table->integer('spanishPNO2');
            $table->integer('spanishPNO3');
            $table->integer('spanishPNO4');
            $table->integer('spanishPNO5');
            $table->integer('spanishPNO6');
            $table->integer('spanishPNO7');
            $table->integer('spanishPNO8');
            $table->integer('spanishPNO9');
            $table->integer('spanishPNO10');
            $table->text('ObservationspanishPNO')->default('Sin Observacion');
            $table->text('ObservationspanishPNO2')->default('Sin Observacion');
            $table->text('ObservationspanishPNO3')->default('Sin Observacion');
            $table->text('ObservationspanishPNO4')->default('Sin Observacion');
            $table->decimal('averageSpanishPNO')->default(0);
            $table->integer('attemptsSpanishPNO')->default(0);
            $table->integer('correctSpanishPNO')->default(0);
            $table->integer('regularSpanishPNO')->default(0);
            $table->integer('incorrectSpanishPNO')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spanish_novenos');
    }
};
