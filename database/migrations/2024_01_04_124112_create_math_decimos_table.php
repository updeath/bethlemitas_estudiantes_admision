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
        Schema::create('math_decimos', function (Blueprint $table) {
            $table->id();
            $table->integer('mathPD1');
            $table->integer('mathPD2');
            $table->integer('mathPD3');
            $table->integer('mathPD4');
            $table->integer('mathPD5');
            $table->integer('mathPD6');
            $table->integer('mathPD7');
            $table->integer('mathPD8');
            $table->integer('mathPD9');
            $table->integer('mathPD10');
            $table->text('ObservationmathPD')->default('Sin Observacion');
            $table->text('ObservationmathPD2')->default('Sin Observacion');
            $table->text('ObservationmathPD3')->default('Sin Observacion');
            $table->text('ObservationmathPD4')->default('Sin Observacion');
            $table->decimal('averagePD')->default(0);
            $table->integer('attemptsPD')->default(0);
            $table->integer('correctPD')->default(0);
            $table->integer('incorrectPD')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_decimos');
    }
};
