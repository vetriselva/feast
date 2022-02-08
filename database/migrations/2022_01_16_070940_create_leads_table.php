<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string("leadNumber");
            $table->string("subTitle");
            $table->string("packageName");
            $table->string("placeToVisit");
            $table->date("itDate");
            $table->date("itValidDate");
            $table->date("departureDate");
            $table->string("numOfNights");
            $table->string("roomType");
            $table->string("flight_id");
            $table->string("costingNotes");
            $table->string("routeMap")->nullable(); 
            $table->string("termsType")->nullable();  
            $table->string("vehicleType")->nullable(); 
            $table->string("pack_includs")->nullable(); 
            $table->string("pack_excluds")->nullable(); 
            $table->string("payment_poly")->nullable(); 
            $table->string("refound_poly")->nullable(); 
            $table->string("cancle_poly")->nullable(); 
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
        Schema::dropIfExists('leads');
    }
}
