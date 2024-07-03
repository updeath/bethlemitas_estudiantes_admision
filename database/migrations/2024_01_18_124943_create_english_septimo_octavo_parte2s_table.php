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
        Schema::create('english_septimo_octavo_parte2s', function (Blueprint $table) {
            $table->id();
            $table->integer('english2SO1');
            $table->integer('english2SO2');
            $table->integer('english2SO3');
            $table->integer('english2SO4');
            //part2
            $table->integer('english2Part2SO1');
            $table->integer('english2Part2SO2');
            $table->integer('english2Part2SO3');
            $table->integer('english2Part2SO4');
            //part3
            $table->integer('english2Part3SO1');
            $table->integer('english2Part3SO2');
            $table->integer('english2Part3SO3');
            $table->integer('english2Part3SO4');
            $table->string('commentPart3SO1');
            $table->string('commentPart3SO2');
            $table->string('commentPart3SO3');
            $table->string('commentPart3SO4');
            $table->integer('english2Part3SO1Answer');
            $table->integer('english2Part3SO2Answer');
            $table->integer('english2Part3SO3Answer');
            $table->integer('english2Part3SO4Answer');
            //part4
            $table->integer('english2Part4SO1');
            $table->integer('english2Part4SO2');
            $table->integer('english2Part4SO3');
            $table->integer('english2Part4SO4');
            $table->integer('english2Part4SO5');
            $table->string('commentPart4SO1');
            $table->string('commentPart4SO2');
            $table->string('commentPart4SO3');
            $table->string('commentPart4SO4');
            $table->string('commentPart4SO5');
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
        Schema::dropIfExists('english_septimo_octavo_parte2s');
    }
};
