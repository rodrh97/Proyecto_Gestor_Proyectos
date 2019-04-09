<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->string('requested_concept',500);
            $table->string('folio',500)->nullable();
          
            $table->foreign('applicant_id')->references('id')
                ->on('applicants')->onDelete('cascade')->onUpdate('cascade');
          
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
        Schema::dropIfExists('projects');
    }
}
