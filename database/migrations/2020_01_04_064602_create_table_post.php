<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_id');
            $table->string('title');
            $table->string('content');
            $table->dateTime('end_date')->nullable();
            $table->string('image')->nullable();
            $table->integer('total_coment')->default(0);
            $table->integer('total_like')->default(0);
            $table->integer('total_share')->default(0);
            $table->unsignedBigInteger('create_by');
            $table->foreign('type_id')->references('id')->on('type_post');
            $table->foreign('create_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
