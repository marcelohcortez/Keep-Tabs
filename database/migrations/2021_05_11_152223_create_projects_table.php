<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('client_id');
            $table->string('project_name');
            $table->mediumText('project_description');
            $table->decimal('total_value', 8, 2);
            $table->decimal('paid_value', 8, 2);
            $table->dateTime('starting_date');
            $table->dateTime('estimated_finishing_date');
            $table->dateTime('effective_finishing_date');
            $table->mediumText('extra_info');
            $table->string('status');
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
