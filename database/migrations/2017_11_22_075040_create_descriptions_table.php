<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("english");
            $table->string("estonian");
            $table->string("russian");
            $table->string("image")->nullable();
            //relation
            $table->integer("word_fk")->unsigned();
            $table->foreign('word_fk')->references('id')->on('words');
            $table->integer("category_fk")->unsigned();
            $table->foreign('category_fk')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descriptions');
    }
}
