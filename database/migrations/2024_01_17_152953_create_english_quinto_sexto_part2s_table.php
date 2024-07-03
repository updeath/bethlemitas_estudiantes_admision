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
        Schema::create('english_quinto_sexto_part2s', function (Blueprint $table) {
            $table->id();
            $table->integer('english2QSX1');
            $table->integer('english2QSX2');
            $table->integer('english2QSX3');
            $table->integer('english2QSX4');
            $table->integer('english2QSX5');
            $table->string('commentQSX1');
            $table->string('commentQSX2');
            $table->string('commentQSX3');
            $table->string('commentQSX4');
            $table->string('commentQSX5');
            //PART2
            $table->integer('english2part2QSX1');
            $table->integer('english2part2QSX2');
            $table->integer('english2part2QSX3');
            //part3
            $table->integer('english2part3QSX1');
            $table->integer('english2part3QSX2');
            $table->integer('english2part3QSX3');
            $table->string('commentpart3QSX1');
            $table->string('commentpart3QSX2');
            $table->string('commentpart3QSX3');
            //part4
            $table->integer('english2part4QSX1');
            $table->integer('english2part4QSX2');
            $table->integer('english2part4QSX3');
            $table->integer('english2part4QSX4');
            $table->integer('english2part4QSX5');
            $table->integer('english2part4QSX6');
            $table->string('commentpart4QSX1');
            $table->string('commentpart4QSX2');
            $table->string('commentpart4QSX3');
            $table->string('commentpart4QSX4');
            $table->string('commentpart4QSX5');
            $table->string('commentpart4QSX6');
            //part5
            $table->integer('english2part5QSX1');
            $table->integer('english2part5QSX2');
            $table->integer('english2part5QSX3');
            $table->integer('english2part5QSX4');
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
        Schema::dropIfExists('english_quinto_sexto_part2s');
    }
};
