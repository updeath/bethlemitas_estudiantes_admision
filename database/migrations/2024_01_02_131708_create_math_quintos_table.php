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
        Schema::create('math_quintos', function (Blueprint $table) {
            $table->id();
            $table->integer('mathPQ1');
            $table->integer('mathPQ2');
            $table->integer('mathPQ3');
            $table->integer('mathPQ4');
            $table->integer('mathPQ5');
            $table->integer('mathPQ6');
            $table->integer('mathPQ7');
            $table->integer('mathPQ8');
            $table->integer('mathPQ9');
            $table->integer('mathPQ10');
            $table->text('ObservationmathPQ')->default('Sin Observacion');
            $table->text('ObservationmathPQ2')->default('Sin Observacion');
            $table->text('ObservationmathPQ3')->default('Sin Observacion');
            $table->text('ObservationmathPQ4')->default('Sin Observacion');
            $table->decimal('averagePQ')->default(0);
            $table->integer('attemptsPQ')->default(0);
            $table->integer('correctPQ')->default(0);
            $table->integer('incorrectPQ')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_quintos');
    }
};
