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
        Schema::create('math_sextos', function (Blueprint $table) {
            $table->id();
            $table->integer('mathPSX1');
            $table->integer('mathPSX2');
            $table->integer('mathPSX3');
            $table->integer('mathPSX4');
            $table->integer('mathPSX5');
            $table->integer('mathPSX6');
            $table->integer('mathPSX7');
            $table->integer('mathPSX8');
            $table->integer('mathPSX9');
            $table->integer('mathPSX10');
            $table->text('ObservationmathPSX')->default('Sin Observacion');
            $table->text('ObservationmathPSX2')->default('Sin Observacion');
            $table->text('ObservationmathPSX3')->default('Sin Observacion');
            $table->text('ObservationmathPSX4')->default('Sin Observacion');
            $table->decimal('averagePSX')->default(0);
            $table->integer('attemptsPSX')->default(0);
            $table->integer('correctPSX')->default(0);
            $table->integer('incorrectPSX')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_sextos');
    }
};
