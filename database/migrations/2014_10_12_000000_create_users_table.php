<?php

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('originSchool');
            $table->integer('graduateAt')->unsigned();
            $table->date('birthday');
            $table->text('address');
            $table->integer('score')->default(0);
            $table->enum('gender',['male','female']);
            $table->string('photo')->default('avatar/applicant/default.png');
            $table->string('status')->default('applicant');
            $table->rememberToken();
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
