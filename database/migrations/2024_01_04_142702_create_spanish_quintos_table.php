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
        Schema::create('spanish_quintos', function (Blueprint $table) {
            $table->id();
            $table->integer('spanishPQ1');
            $table->integer('spanishPQ2');
            $table->integer('spanishPQ3');
            $table->integer('spanishPQ4');
            $table->integer('spanishPQ5');
            $table->integer('spanishPQ6')->default(1);
            $table->integer('spanishPQ7')->default(1);
            $table->integer('spanishPQ8');
            $table->integer('spanishPQ9');
            $table->integer('spanishPQ10')->default(1);
            $table->text('commentPQ6');
            $table->text('commentPQ7');
            $table->text('commentPQ10');
            $table->text('ObservationspanishPQ')->default('Sin Observacion');
            $table->text('ObservationspanishPQ2')->default('Sin Observacion');
            $table->text('ObservationspanishPQ3')->default('Sin Observacion');
            $table->text('ObservationspanishPQ4')->default('Sin Observacion');
            $table->decimal('averageSpanishPQ')->default(0);
            $table->integer('attemptsSpanishPQ')->default(0);
            $table->integer('correctSpanishPQ')->default(0);
            $table->integer('regularSpanishPQ')->default(0);
            $table->integer('incorrectSpanishPQ')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spanish_quintos');
    }
};
