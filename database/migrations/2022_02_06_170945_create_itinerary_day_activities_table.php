<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItineraryDayActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_day_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dayactivity_id');
            $table->unsignedBigInteger('itinerary_id');
            $table->foreign('itinerary_id')->references('id')->on('lead_itinaries');
            $table->foreign('dayactivity_id')->references('id')->on('day_activities');
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
        Schema::dropIfExists('itinerary_day_activities');
    }
}
