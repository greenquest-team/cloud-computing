<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasteTypesTable extends Migration
{
    public function up()
    {
        Schema::create('waste_types', function (Blueprint $table) {
            $table->id();
            $table->enum('type_name', ['plastic', 'glass', 'metal', 'paper', 'organic']); // Sesuaikan dengan jenis enum
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waste_types');
    }
}
