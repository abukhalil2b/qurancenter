<?php

use App\Models\User;
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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->unsignedBigInteger('teacher_id');

            $table->foreign('teacher_id')->references('id')->on('users');
            
            $table->timestamps();
        });

        Schema::create('student_subject', function (Blueprint $table) {
            $table->id();
      
            $table->unsignedBigInteger('student_id');

            $table->foreign('student_id')->references('id')->on('users');

            $table->unsignedBigInteger('subject_id');

            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('student_subject');
    }
};
