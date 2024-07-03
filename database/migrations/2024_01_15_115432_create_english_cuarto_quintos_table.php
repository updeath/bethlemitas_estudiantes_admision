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
        Schema::create('english_cuarto_quintos', function (Blueprint $table) {
            $table->id();
            // part1
            $table->integer('EnglishCQ1')->default(1);
            $table->integer('EnglishCQ2')->default(1);
            $table->integer('EnglishCQ3')->default(1);
            $table->integer('EnglishCQ4')->default(1);
            // part2
            $table->integer('EnglishCQpart2P1')->default(1);
            $table->integer('EnglishCQpart2P2')->default(1);
            $table->integer('EnglishCQpart2P3')->default(1);
            $table->integer('EnglishCQpart2P4')->default(1);
            //part3
            $table->integer('EnglishCQpart3P1')->default(1);
            $table->integer('EnglishCQpart3P2')->default(1);
            $table->integer('EnglishCQpart3P3')->default(1);
            $table->integer('EnglishCQpart3P4')->default(1);
            $table->integer('EnglishCQpart3P5')->default(1);
            // part4
            $table->integer('EnglishCQpart4P1')->default(1);
            $table->integer('EnglishCQpart4P2')->default(1);
            $table->integer('EnglishCQpart4P3')->default(1);
            $table->string('commentEnglishpart4P1');
            $table->string('commentEnglishpart4P2');
            $table->string('commentEnglishpart4P3');

            //part5
            $table->integer('EnglishCQpart5P1')->default(1);
            $table->integer('EnglishCQpart5P2')->default(1);
            $table->integer('EnglishCQpart5P3')->default(1);
            $table->integer('EnglishCQpart5P4')->default(1);
            $table->integer('EnglishCQpart5P5')->default(1);
            $table->integer('EnglishCQpart5P6')->default(1);
            $table->integer('EnglishCQpart5P7')->default(1);
            $table->integer('EnglishCQpart5P8')->default(1);
            $table->integer('EnglishCQpart5P9')->default(1);

            $table->string('commentEnglishpart5P1');
            $table->string('commentEnglishpart5P2');
            $table->string('commentEnglishpart5P3');
            $table->string('commentEnglishpart5P4');
            $table->string('commentEnglishpart5P5');
            $table->string('commentEnglishpart5P6');
            $table->string('commentEnglishpart5P7');
            $table->string('commentEnglishpart5P8');
            $table->string('commentEnglishpart5P9');

            //part 6
            $table->integer('EnglishCQpart6P1')->default(1);
            $table->integer('EnglishCQpart6P2')->default(1);
            $table->integer('EnglishCQpart6P3')->default(1);
            $table->integer('EnglishCQpart6P4')->default(1);
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
        Schema::dropIfExists('english_cuarto_quintos');
    }
};
