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
            $table->string('total_amount');
            $table->string('current_amount')->default(0);
            $table->string('number_of_donors')->default(0);
            $table->bigInteger('section_id')->nullable();
            $table->bigInteger('campaign_id')->nullable();
            $table->text('title');
            $table->text('description');
            $table->text('image_url');
            $table->text('vedio_url')->nullable();
            $table->boolean('finish_state')->default(0);
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
