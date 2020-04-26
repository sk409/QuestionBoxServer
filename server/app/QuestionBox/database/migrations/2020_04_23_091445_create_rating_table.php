<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->integer("user_id")->unsigned();
            $table->integer("answer_id")->unsigned();
            $table->timestamps();
            $table->primary(["user_id", "answer_id"]);
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("answer_id")->references("id")->on("answers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
}
