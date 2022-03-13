<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthposts', function (Blueprint $table) {

            $table->id();
            $table->BigInteger('owner_id')->unsigned();
            $table->BigInteger('healthcenter_id')->unsigned();
            $table->string('healthpost_name');
            $table->string('phone');
            $table->string('address');
            $table->string('tin_number');
            $table->timestamps();


                $table->foreign('healthcenter_id')->references('id')->on('healths')
                ->onDelete('cascade');
                $table->foreign('owner_id')->references('id')->on('members')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healthpost');
    }



}
