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
        Schema::create('spanish_septimos', function (Blueprint $table) {
            $table->id();
            $table->integer('spanishPS1')->default(1);
            $table->integer('spanishPS2')->default(1);
            $table->integer('spanishPS3')->default(1);
            $table->integer('spanishPS4')->default(1);
            $table->integer('spanishPS5')->default(1);
            $table->integer('spanishPS6')->default(1);
            $table->integer('spanishPS7')->default(1);
            $table->integer('spanishPS8');
            $table->integer('spanishPS9');
            $table->integer('spanishPS10');
            $table->text('commentPS1');
            $table->text('commentPS2');
            $table->text('commentPS3');
            $table->text('commentPS4');
            $table->text('commentPS5');
            $table->text('commentPS6');
            $table->text('commentPS7');
            $table->text('ObservationspanishPS')->default('Sin Observacion');
            $table->text('ObservationspanishPS2')->default('Sin Observacion');
            $table->text('ObservationspanishPS3')->default('Sin Observacion');
            $table->text('ObservationspanishPS4')->default('Sin Observacion');
            $table->decimal('averageSpanishPS')->default(0);
            $table->integer('attemptsSpanishPS')->default(0);
            $table->integer('correctSpanishPS')->default(0);
            $table->integer('regularSpanishPS')->default(0);
            $table->integer('incorrectSpanishPS')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spanish_septimos');
    }
};
