<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuizAnswerTable extends Migration
{
    public function up()
    {
        Schema::create('user_quiz_answer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->enum('selected_answer', ['A', 'B', 'C', 'D']); // Contoh jawaban pilihan
            $table->boolean('is_correct');
            $table->integer('points_awarded');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quiz_answer');
    }
}
