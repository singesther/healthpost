<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('healthpost_id')->unsigned();
            $table->string('no_of_installment');
            $table->string('tatal_price');
            $table->string('start_date');
            $table->string('end_date');

            $table->timestamps();

            $table->foreign('healthpost_id')->references('id')->on('healthpost')
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
        Schema::dropIfExists('membership');
    }
}
