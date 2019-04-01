<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubComponents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_components', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',500);
            $table->string('path',1500);
            $table->date('start_date');
            $table->date('finish_date');
            $table->integer('program_id')->unsigned();
            
            $table->foreign('program_id')->references('id')
                ->on('programs')->onDelete('cascade')->onUpdate('cascade');
            
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
       Schema::dropIfExists('sub_components');
    }
}
