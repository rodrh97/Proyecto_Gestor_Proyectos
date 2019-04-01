<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Concepts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',500);
            $table->string('path',1500);
            $table->string('p_amount_max',1500)->default(null);
            $table->string('m_amount_max',1500)->default(null); 
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
        Schema::dropIfExists('concepts');
    }
}
