<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('height',255);
            $table->string('mass',255);
            $table->string('hair_color',255);
            $table->string('skin_color',255);
            $table->string('eye_color',255);
            $table->string('birth_year',255);
            $table->string('gender',255);
            $table->foreignId('planet_id')
            ->nullable()
            ->references('id')->on('planets')
            ->onUpdate('cascade')
            ->onDelete('set null');
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
        Schema::dropIfExists('people');
    }
}
