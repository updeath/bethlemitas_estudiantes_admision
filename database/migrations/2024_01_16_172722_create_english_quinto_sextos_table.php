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
        Schema::create('english_quinto_sextos', function (Blueprint $table) {
            $table->id();
            $table->integer('english5_6P1');
            $table->integer('english5_6P2');
            $table->integer('english5_6P3');
            $table->integer('english5_6P4');
            //part2
            $table->integer('english5_6_part2_P1');
            $table->integer('english5_6_part2_P2');
            $table->integer('english5_6_part2_P3');
            $table->integer('english5_6_part2_P4');
            // part3
            $table->integer('english5_6_part3_P1');
            $table->integer('english5_6_part3_P2');
            $table->integer('english5_6_part3_P3');
            $table->integer('english5_6_part3_P4');
            //part4
            $table->integer('english5_6_part4_P1');
            $table->integer('english5_6_part4_P2');
            $table->integer('english5_6_part4_P3');
            $table->integer('english5_6_part4_P4');
            //comment part4
            $table->string('comment5_6_part4_p1');
            $table->string('comment5_6_part4_p2');
            $table->string('comment5_6_part4_p3');
            $table->string('comment5_6_part4_p4');
            
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
        Schema::dropIfExists('english_quinto_sextos');
    }
};
