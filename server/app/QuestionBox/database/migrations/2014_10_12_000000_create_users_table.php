<?php

use App\Domain\UserName;
use App\Domain\UserPassword;
use App\Domain\UserUserId;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string("user_id", UserUserId::MAX_LENGTH)->unique();
            $table->string('name', UserName::MAX_LENGTH);
            $table->string('email')->unique()->nullable();
            $table->string('password', UserPassword::MAX_LENGTH);
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
        Schema::dropIfExists('users');
    }
}
