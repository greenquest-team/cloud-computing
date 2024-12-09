<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuestsTable extends Migration
{
    public function up()
    {
        Schema::create('user_quests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('quest_id')->constrained('quests')->onDelete('cascade');
            $table->integer('progress');
            $table->boolean('is_completed');
            $table->date('completed_at')->nullable();
            $table->integer('points_awarded');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quests');
    }
}
