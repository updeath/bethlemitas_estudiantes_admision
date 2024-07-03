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
        Schema::create('english9_10_11__part3s', function (Blueprint $table) {
            $table->id();
            $table->integer('english3NDO1');
            $table->integer('english3NDO2');
            $table->integer('english3NDO3');
            $table->integer('english3NDO4');
            $table->integer('english3NDO5');
            $table->integer('english3NDO6');
            $table->integer('english3NDO7');
            $table->integer('english3NDO8');
            $table->integer('english3NDO9');
            $table->integer('english3NDO10');
            $table->integer('english3NDO11');
            $table->integer('english3NDO12');
            $table->integer('english3NDO13');
            $table->integer('english3NDO14');
            $table->integer('english3NDO15');
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
        Schema::dropIfExists('english9_10_11__part3s');
    }
};
