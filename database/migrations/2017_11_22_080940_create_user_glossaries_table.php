<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGlossariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userglossaries', function (Blueprint $table) {
            //relation
            $table->integer("user_fk")->unsigned();
            $table->foreign('user_fk')->references('id')->on('users');
            $table->integer("description_fk")->unsigned();
            $table->foreign('description_fk')->references('id')->on('descriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_glossaries');
    }
}
