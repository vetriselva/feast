<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadItinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_itinaries', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id');
            $table->string('days')->nullable();
            $table->string('activity_id')->nullable();
            // $table->string('DayActivity')->nullable();
            $table->string('PlacesName')->nullable();
            $table->string('Transfers')->nullable();
            $table->string('breack')->nullable();
            $table->string('lunch')->nullable();
            $table->string('dinner')->nullable();
            $table->string('Tickets')->nullable();
            $table->string('others')->nullable();
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
        Schema::dropIfExists('lead_itinaries');
    }
}
