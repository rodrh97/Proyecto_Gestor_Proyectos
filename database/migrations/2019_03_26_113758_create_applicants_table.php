<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',60);
            $table->string('last_name',60);
            $table->string('second_last_name',60)->nullable();
            $table->string('type',60);
            $table->string('phone',60);
            
            $table->integer('city')->unsigned();
            $table->string('ejido',100);
            $table->string('colony',128);
            $table->string('street',128);
            $table->string('number',100);
            $table->string('zip',60);
            
            
            
          
            $table->foreign('city')->references('id')
                ->on('cities')->onDelete('cascade')->onUpdate('cascade');
          
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
        Schema::dropIfExists('applicants');
    }
}
