<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('english_c_qpart2s', function (Blueprint $table) {
            $table->id();
            //part1
            $table->integer('englishQSX1')->default(1);
            $table->integer('englishQSX2')->default(1);
            $table->integer('englishQSX3')->default(1);
            $table->integer('englishQSX4')->default(1);
            $table->integer('englishQSX5')->default(1);
            //part2
            $table->integer('englishpart2QSX1')->default(1);
            $table->integer('englishpart2QSX2')->default(1);
            $table->integer('englishpart2QSX3')->default(1);
            $table->integer('englishpart2QSX4')->default(1);
            $table->integer('englishpart2QSX5')->default(1);
            //PART3
            $table->integer('englishpart3QSX1')->default(1);
            $table->integer('englishpart3QSX2')->default(1);
            $table->integer('englishpart3QSX3')->default(1);
            $table->integer('englishpart3QSX4')->default(1);
            $table->integer('englishpart3QSX5')->default(1);
            //part4
            $table->integer('englishpart4QSX1')->default(1);
            $table->integer('englishpart4QSX2')->default(1);
            $table->integer('englishpart4QSX3')->default(1);
            $table->integer('englishpart4QSX4')->default(1);
            $table->integer('englishpart4QSX5')->default(1);
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
        Schema::dropIfExists('english_c_qpart2s');
    }
};
