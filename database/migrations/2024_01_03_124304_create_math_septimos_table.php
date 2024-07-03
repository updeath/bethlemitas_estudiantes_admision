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
        Schema::create('math_septimos', function (Blueprint $table) {
            $table->id();
            $table->integer('mathPS1');
            $table->integer('mathPS2');
            $table->integer('mathPS3');
            $table->integer('mathPS4');
            $table->integer('mathPS5');
            $table->integer('mathPS6');
            $table->integer('mathPS7');
            $table->integer('mathPS8');
            $table->integer('mathPS9');
            $table->integer('mathPS10');
            $table->text('ObservationmathPS')->default('Sin Observacion');
            $table->text('ObservationmathPS2')->default('Sin Observacion');
            $table->text('ObservationmathPS3')->default('Sin Observacion');
            $table->text('ObservationmathPS4')->default('Sin Observacion');
            $table->decimal('averagePS')->default(0);
            $table->integer('attemptsPS')->default(0);
            $table->integer('correctPS')->default(0);
            $table->integer('incorrectPS')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_septimos');
    }
};
