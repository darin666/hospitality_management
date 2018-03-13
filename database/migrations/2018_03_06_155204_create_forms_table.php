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
            $table->integer('statusChange_id');
            $table->integer('apartment_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('dob');
            $table->text('address');
            $table->string('passportNumber');
            $table->string('visaNumber');
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
