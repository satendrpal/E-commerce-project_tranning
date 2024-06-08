<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WalletsAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->NULL();
            $table->integer('walllet_amounts')->NULL();
            $table->string('Date')->NULL();
            $table->string('status')->NULL();
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
        //
    }
}
