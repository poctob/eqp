<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipment_id')->unsigned();
            $table->integer('ticket_id')->unsigned();

            $table->foreign('equipment_id')->references('id')->on('equipments');

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
        Schema::drop('equipment_tickets');
    }
}
