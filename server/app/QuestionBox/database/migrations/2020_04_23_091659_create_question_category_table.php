<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_category', function (Blueprint $table) {
            $table->integer("question_id")->unsigned();
            $table->integer("category_id")->unsigned();
            $table->timestamps();
            $table->primary(["question_id", "category_id"]);
            $table->foreign("question_id")->references("id")->on("questions");
            $table->foreign("category_id")->references("id")->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_category');
    }
}
