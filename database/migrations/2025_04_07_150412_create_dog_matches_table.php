<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('dog_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_one_id');
            $table->unsignedBigInteger('dog_two_id');
            $table->timestamps();

            $table->foreign('dog_one_id')->references('id')->on('dogs')->onDelete('cascade');
            $table->foreign('dog_two_id')->references('id')->on('dogs')->onDelete('cascade');

            $table->unique(['dog_one_id', 'dog_two_id']); // Evita duplicidade de match
        });
    }

    public function down()
    {
        Schema::dropIfExists('dog_matches');
    }
}
