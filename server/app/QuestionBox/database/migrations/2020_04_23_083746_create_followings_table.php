<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followings', function (Blueprint $table) {
            $table->integer("followee_user_id")->unsigned();
            $table->integer("follower_user_id")->unsigned();
            $table->timestamps();
            $table->primary(["followee_user_id", "follower_user_id"]);
            $table->foreign("followee_user_id")->references("id")->on("users");
            $table->foreign("follower_user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followings');
    }
}
