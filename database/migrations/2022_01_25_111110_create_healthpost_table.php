<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthpost', function (Blueprint $table) {

            $table->id();
            $table->BigInteger('owner_id')->unsigned();
            $table->BigInteger('healthpost_id')->unsigned();
            $table->string('healthpost_name');
            $table->string('phone');
            $table->string('address');
            $table->string('tin_number');
            $table->timestamps();


                $table->foreign('healthpost_id')->references('id')->on('healths')
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
