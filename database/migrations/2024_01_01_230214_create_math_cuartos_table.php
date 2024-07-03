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
        Schema::create('math_cuartos', function (Blueprint $table) {
            $table->id();
            $table->integer('mathPC1');
            $table->integer('mathPC2');
            $table->integer('mathPC3');
            $table->integer('mathPC4');
            $table->integer('mathPC5');
            $table->integer('mathPC6');
            $table->integer('mathPC7');
            $table->integer('mathPC8');
            $table->integer('mathPC9');
            $table->integer('mathPC10');
            $table->text('ObservationmathPC')->default('Sin Observacion');
            $table->text('ObservationmathPC2')->default('Sin Observacion');
            $table->text('ObservationmathPC3')->default('Sin Observacion');
            $table->text('ObservationmathPC4')->default('Sin Observacion');
            $table->decimal('average')->default(0);
            $table->integer('attempts')->default(0);
            $table->integer('correct')->default(0);
            $table->integer('incorrect')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_cuartos');
    }
};
