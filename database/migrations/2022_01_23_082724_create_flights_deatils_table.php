<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsDeatilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights_deatils', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id');
            $table->string('from');
            $table->string('to');
            $table->string('flight');
            $table->string('date');
            $table->string('dep');
            $table->string('arr');
            $table->string('bag');
            $table->string('refound');
            $table->string('meals');
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
        Schema::dropIfExists('flights_deatils');
    }
}
