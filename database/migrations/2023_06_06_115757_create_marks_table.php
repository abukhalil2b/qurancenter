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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');

            $table->foreign('student_id')->references('id')->on('users');

            $table->unsignedBigInteger('task_id');

            $table->foreign('task_id')->references('id')->on('tasks');

            $table->tinyInteger('memorize')->default(0);

            $table->tinyInteger('recite')->default(0);

            $table->tinyInteger('behave')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
