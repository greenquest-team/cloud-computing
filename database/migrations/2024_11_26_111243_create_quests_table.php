<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestsTable extends Migration
{
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('waste_types_id')->constrained('waste_types')->onDelete('cascade');
            $table->string('description_quest');
            $table->enum('quest_type', ['reminder', 'scan', 'material', 'quiz']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quests');
    }
}
