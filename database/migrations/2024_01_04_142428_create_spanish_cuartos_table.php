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
        Schema::create('spanish_cuartos', function (Blueprint $table) {
            $table->id();
            $table->integer('spanishPC1');
            $table->integer('spanishPC2');
            $table->integer('spanishPC3');
            $table->integer('spanishPC4');
            $table->integer('spanishPC5');
            $table->integer('spanishPC6');
            $table->integer('spanishPC7');
            $table->integer('spanishPC8')->default(1);
            $table->integer('spanishPC9');
            $table->integer('spanishPC10');
            $table->text('commentPC8');
            $table->text('ObservationspanishPC')->default('Sin Observacion');
            $table->text('ObservationspanishPC2')->default('Sin Observacion');
            $table->text('ObservationspanishPC3')->default('Sin Observacion');
            $table->text('ObservationspanishPC4')->default('Sin Observacion');
            $table->decimal('averageSpanishPC')->default(0);
            $table->integer('attemptsSpanishPC')->default(0);
            $table->integer('correctSpanishPC')->default(0);
            $table->integer('regularSpanishPC')->default(0);
            $table->integer('incorrectSpanishPC')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spanish_cuartos');
    }
};
