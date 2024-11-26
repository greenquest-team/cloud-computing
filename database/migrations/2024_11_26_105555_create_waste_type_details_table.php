<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasteTypeDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('waste_type_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('waste_types_id')->constrained('waste_types')->onDelete('cascade');
            $table->string('description');
            $table->string('craft');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waste_type_details');
    }
}
