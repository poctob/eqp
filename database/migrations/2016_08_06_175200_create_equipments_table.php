<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->boolean('is_published');
            $table->boolean('is_active');
            $table->string('user_assigned_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('equipment_categories');
            $table->foreign('status_id')->references('id')->on('equipment_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipments');
    }
}
