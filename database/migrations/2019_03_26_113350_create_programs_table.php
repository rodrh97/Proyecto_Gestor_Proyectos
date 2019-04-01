<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',500);
            $table->string('description',500);
            $table->string('target_population',500);
            $table->string('responsable_unit',500);
            $table->string('executing_unit',500);
            $table->date('start_date');
            $table->date('finish_date');
            $table->integer('operation_rules')->default(0);
            $table->string('specific_requirements',1500);
            $table->string('announcement_pdf',1500);
            $table->string('comments',500);
            $table->string('p_amount_max',1500)->default(null);
            $table->string('m_amount_max',1500)->default(null); 
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
        Schema::dropIfExists('programs');
    }
}
