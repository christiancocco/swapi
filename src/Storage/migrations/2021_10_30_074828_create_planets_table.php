<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('rotation_period',255);
            $table->string('orbital_period',255);
            $table->string('diameter',255);
            $table->string('climate',255);
            $table->string('gravity',255);
            $table->string('terrain',255);
            $table->string('surface_water',255);
            $table->string('population',255);
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
        Schema::dropIfExists('planets');
    }
}
