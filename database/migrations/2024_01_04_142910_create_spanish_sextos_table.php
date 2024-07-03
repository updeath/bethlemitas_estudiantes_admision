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
        Schema::create('spanish_sextos', function (Blueprint $table) {
            $table->id();
            $table->integer('spanishPSX1')->default(1);
            $table->integer('spanishPSX2')->default(1);
            $table->integer('spanishPSX3')->default(1);
            $table->integer('spanishPSX4')->default(1);
            $table->integer('spanishPSX5')->default(1);
            $table->integer('spanishPSX6')->default(1);
            $table->integer('spanishPSX7');
            $table->integer('spanishPSX8');
            $table->integer('spanishPSX9');
            $table->integer('spanishPSX10');
            $table->text('commentPSX1');
            $table->text('commentPSX2');
            $table->text('commentPSX3');
            $table->text('commentPSX4');
            $table->text('commentPSX5');
            $table->text('commentPSX6');
            $table->text('ObservationspanishPSX')->default('Sin Observacion');
            $table->text('ObservationspanishPSX2')->default('Sin Observacion');
            $table->text('ObservationspanishPSX3')->default('Sin Observacion');
            $table->text('ObservationspanishPSX4')->default('Sin Observacion');
            $table->decimal('averageSpanishPSX')->default(0);
            $table->integer('attemptsSpanishPSX')->default(0);
            $table->integer('correctSpanishPSX')->default(0);
            $table->integer('regularSpanishPSX')->default(0);
            $table->integer('incorrectSpanishPSX')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spanish_sextos');
    }
};
