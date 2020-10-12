<?php

use Illuminate\Support\Facades\Schema;
use App\Database\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel');
            $table->text('message');
            $table->string('level');
            $table->string('level_name');
            $table->text('context');
            $table->string('file')->nullable();
            $table->integer('line')->nullable();
            $table->dateTime('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log');
    }
}
