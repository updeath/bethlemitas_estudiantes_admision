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
        Schema::create('spanish_octavos', function (Blueprint $table) {
            $table->id();
            $table->integer('spanishPO1')->default(1);
            $table->integer('spanishPO2')->default(1);
            $table->integer('spanishPO3')->default(1);
            $table->integer('spanishPO4')->default(1);
            $table->integer('spanishPO5')->default(1);
            $table->integer('spanishPO6');
            $table->integer('spanishPO7');
            $table->integer('spanishPO8')->default(1);
            $table->integer('spanishPO9');
            $table->integer('spanishPO10');
            $table->text('commentPO1');
            $table->text('commentPO2');
            $table->text('commentPO3');
            $table->text('commentPO4');
            $table->text('commentPO5');
            $table->text('commentPO8');
            $table->text('ObservationspanishPO')->default('Sin Observacion');
            $table->text('ObservationspanishPO2')->default('Sin Observacion');
            $table->text('ObservationspanishPO3')->default('Sin Observacion');
            $table->text('ObservationspanishPO4')->default('Sin Observacion');
            $table->decimal('averageSpanishPO')->default(0);
            $table->integer('attemptsSpanishPO')->default(0);
            $table->integer('correctSpanishPO')->default(0);
            $table->integer('regularSpanishPO')->default(0);
            $table->integer('incorrectSpanishPO')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spanish_octavos');
    }
};
