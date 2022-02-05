<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostDeatilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_deatils', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id');
            $table->string('optionNumber')->nullable();
            $table->string('costingFor')->nullable();
            $table->string('members')->nullable();
            $table->string('costTotals')->nullable();
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
        Schema::dropIfExists('cost_deatils');
    }
}
