<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instrument_id')->unsigned();
            $table->unsignedBigInteger('property_id')->unsigned();
            $table->foreign('instrument_id')->references('id')->on('instruments')
                ->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')
                ->onDelete('cascade');
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
        Schema::dropIfExists('instrument_property');
    }
};
