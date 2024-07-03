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
        Schema::create('math_novenos', function (Blueprint $table) {
            $table->id();
            $table->integer('mathPNO1');
            $table->integer('mathPNO2');
            $table->integer('mathPNO3');
            $table->integer('mathPNO4');
            $table->integer('mathPNO5');
            $table->integer('mathPNO6');
            $table->integer('mathPNO7');
            $table->integer('mathPNO8');
            $table->integer('mathPNO9');
            $table->integer('mathPNO10');
            $table->text('ObservationmathPNO')->default('Sin Observacion');
            $table->text('ObservationmathPNO2')->default('Sin Observacion');
            $table->text('ObservationmathPNO3')->default('Sin Observacion');
            $table->text('ObservationmathPNO4')->default('Sin Observacion');
            $table->decimal('averagePNO')->default(0);
            $table->integer('attemptsPNO')->default(0);
            $table->integer('correctPNO')->default(0);
            $table->integer('incorrectPNO')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_novenos');
    }
};
