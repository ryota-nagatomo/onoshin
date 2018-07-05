<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('goal_id')->unsigned()->index();
            $table->timestamps();

            // Foreign key setting
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('goal_id')->references('id')->on('users')->onDelete('cascade');

            // Do not allow duplication of combination of user_id and follow_id
            $table->unique(['user_id', 'goal_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('good_user');
    }
}