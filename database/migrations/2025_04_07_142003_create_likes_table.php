<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_id');
            $table->unsignedBigInteger('liked_dog_id');
            $table->timestamps();

            $table->foreign('dog_id')->references('id')->on('dogs')->onDelete('cascade');
            $table->foreign('liked_dog_id')->references('id')->on('dogs')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
}
