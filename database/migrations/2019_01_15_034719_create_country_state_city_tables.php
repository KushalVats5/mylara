<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryStateCityTables extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('sortname')->unique()->nullable();
            $table->enum('status', array('0', '1'))->default('1');
            $table->timestamps();
        });
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id')->unsigned()->nullable();            
            $table->enum('status', array('0', '1'))->default('1');
            $table->foreign('country_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('state_id')->unsigned()->nullable();            
            $table->integer('country_id')->unsigned()->nullable();
            $table->enum('status', array('0', '1'))->default('1');
            $table->foreign('state_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }
   public function down()
    {
       Schema::drop('countries');
       Schema::drop('states');
       Schema::drop('cities');
    }
}
