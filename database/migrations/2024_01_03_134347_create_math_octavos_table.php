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
        Schema::create('math_octavos', function (Blueprint $table) {
            $table->id();
            $table->integer('mathPO1');
            $table->integer('mathPO2');
            $table->integer('mathPO3');
            $table->integer('mathPO4');
            $table->integer('mathPO5');
            $table->integer('mathPO6');
            $table->integer('mathPO7');
            $table->integer('mathPO8');
            $table->integer('mathPO9');
            $table->integer('mathPO10');
            $table->text('ObservationmathPO')->default('Sin Observacion');
            $table->text('ObservationmathPO2')->default('Sin Observacion');
            $table->text('ObservationmathPO3')->default('Sin Observacion');
            $table->text('ObservationmathPO4')->default('Sin Observacion');
            $table->decimal('averagePO')->default(0);
            $table->integer('attemptsPO')->default(0);
            $table->integer('correctPO')->default(0);
            $table->integer('incorrectPO')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_octavos');
    }
};
