<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string("content", 2056);
            $table->integer("answer_id")->unsigned();
            $table->integer("parent_id")->unsigned();
            $table->timestamps();
            $table->foreign("answer_id")->references("id")->on("answers");
            $table->foreign("parent_id")->references("id")->on("comments");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
