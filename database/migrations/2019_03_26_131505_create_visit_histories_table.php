<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status_project_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->string('comments',500);
            $table->date('date');
            $table->integer('user_id')->unsigned();
          
            $table->foreign('status_project_id')->references('id')
                ->on('status_projects')->onDelete('cascade')->onUpdate('cascade');
          
            $table->foreign('project_id')->references('id')
                ->on('projects')->onDelete('cascade')->onUpdate('cascade');
          
          $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('visit_histories');
    }
}
