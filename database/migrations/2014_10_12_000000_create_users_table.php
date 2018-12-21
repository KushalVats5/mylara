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
            $table->string('user_type')->default('subscriber');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->bigInteger('work_number')->nullable();
            $table->bigInteger('mobile_number')->nullable();
            $table->bigInteger('fax_number')->nullable();
            $table->string('avatar')->nullable();
            $table->date('dob')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('addressline1')->nullable();
            $table->string('addressline2')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->enum('is_active', array('0', '1'))->default('1');
            $table->rememberToken();
            $table->timestamps();
            $table->unique([DB::raw('email(191)')]);
        });


        Schema::Create('profiles', function(Blueprint $table) {
            $table->increments('id'); //you save this id in other tables
            $table->integer('user_id')->unsigned();
            $table->string('filename');
            $table->string('mime_type')->nullable();
            $table->string('title')->nullable();
            $table->string('alt')->nullable();
            $table->text('description')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}