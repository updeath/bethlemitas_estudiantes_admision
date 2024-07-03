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
        Schema::create('english_septimo_octavos', function (Blueprint $table) {
            $table->id();
            $table->integer('englishSO1');
            $table->integer('englishSO2');
            $table->integer('englishSO3');
            $table->integer('englishSO4');
            $table->integer('englishSO5');
            //part2
            $table->integer('englishPart2SO1');
            $table->integer('englishPart2SO2');
            $table->integer('englishPart2SO3');
            //part3
            $table->integer('englishPart3SO1');
            $table->integer('englishPart3SO2');
            $table->integer('englishPart3SO3');
            $table->integer('englishPart3SO4');
            $table->integer('englishPart3SO5');
            //part4
            $table->integer('englishPart4SO1');
            $table->integer('englishPart4SO2');
            $table->integer('englishPart4SO3');
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
        Schema::dropIfExists('english_septimo_octavos');
    }
};
