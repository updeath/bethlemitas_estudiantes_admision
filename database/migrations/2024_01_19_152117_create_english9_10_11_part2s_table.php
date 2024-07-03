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
        Schema::create('english9_10_11_part2s', function (Blueprint $table) {
            $table->id();
            $table->integer('english2NDO1');
            $table->integer('english2NDO2');
            $table->integer('english2NDO3');
            $table->integer('english2NDO4');
            $table->integer('english2NDO5');
            $table->integer('english2NDO6');
            $table->integer('english2NDO7');
            $table->integer('english2NDO8');
            $table->integer('english2NDO9');
            $table->integer('english2NDO10');
            $table->integer('english2NDO11');
            $table->integer('english2NDO12');
            $table->integer('english2NDO13');
            $table->integer('english2NDO14');
            $table->integer('english2NDO15');
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
        Schema::dropIfExists('english9_10_11_part2s');
    }
};
