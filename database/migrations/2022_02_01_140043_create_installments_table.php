<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('membership_id')->unsigned();
            $table->BigInteger('healthpost_id')->unsigned();
            $table->string('amount');
            $table->string('pay_date');
            $table->string('status')->default(0);
            $table->timestamps();
            $table->foreign('membership_id')->references('id')->on('memberships')
            ->onDelete('cascade');
            $table->foreign('healthpost_id')->references('id')->on('healthposts')
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
        Schema::dropIfExists('installments');
    }
}
