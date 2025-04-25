<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogsTable extends Migration
{
    public function up()
{
    Schema::create('dogs', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('breed');
        $table->integer('age');
        $table->enum('gender', ['Macho', 'Fêmea']);
        $table->text('description')->nullable();
        $table->string('photo')->nullable();
        $table->string('owner_name')->nullable();
        $table->timestamps();
    });
}
}
