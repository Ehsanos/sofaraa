<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('total_amount');
            $table->string('current_amount')->default(0);
            $table->string('number_of_donors')->default(0);

            $table->boolean('status')->default(true);

            $table->bigInteger('project_id')->nullable();
            $table->bigInteger('section_id')->nullable();
            $table->bigInteger('nation_id')->nullable();
            $table->text('title');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->text('vedio_url')->nullable();
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
        Schema::dropIfExists('campaigns');
    }
}
