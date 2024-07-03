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
        Schema::create('spanish_decimos', function (Blueprint $table) {
            $table->id();
            $table->integer('spanishPD1');
            $table->integer('spanishPD2');
            $table->integer('spanishPD3');
            $table->integer('spanishPD4')->default(1);
            $table->integer('spanishPD5')->default(1);
            $table->integer('spanishPD6')->default(1);
            $table->integer('spanishPD7')->default(1);
            $table->integer('spanishPD8');
            $table->integer('spanishPD9');
            $table->integer('spanishPD10');
            $table->text('comment_fragmentPD4_1');
            $table->text('comment_fragmentPD4_2');
            $table->text('comment_fragmentPD4_3');
            $table->text('comment_fragmentPD4_4');
            $table->decimal('fragment_numberPD1')->default(0.1);
            $table->decimal('fragment_numberPD2')->default(0.1);
            $table->decimal('fragment_numberPD3')->default(0.1);
            $table->decimal('fragment_numberPD4')->default(0.1);
            $table->text('commentPD5');
            $table->text('commentPD6');
            $table->text('commentPD7');
            $table->text('ObservationspanishPD')->default('Sin Observacion');
            $table->text('ObservationspanishPD2')->default('Sin Observacion');
            $table->text('ObservationspanishPD3')->default('Sin Observacion');
            $table->text('ObservationspanishPD4')->default('Sin Observacion');
            $table->decimal('averageSpanishPD')->default(0);
            $table->integer('attemptsSpanishPD')->default(0);
            $table->integer('correctSpanishPD')->default(0);
            $table->integer('regularSpanishPD')->default(0);
            $table->integer('incorrectSpanishPD')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spanish_decimos');
    }
};
