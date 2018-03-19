<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('statusChange_id')->nullable(); //added nullable for testing reasons
            $table->integer('apartment_id')->unsigned();    //->nullable();    //added nullable for testing reasons
            $table->string('firstname');
            $table->string('lastname');
            $table->date('dob');
            $table->text('address');
            $table->string('passportNumber');
            $table->string('visaNumber')->nullable();
            $table->date('checkInDate');
            $table->date('checkOutDate');
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
        Schema::dropIfExists('forms');
    }
}
