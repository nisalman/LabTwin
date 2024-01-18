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
        Schema::create('instrument_relates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instrument_id')->unsigned();
            $table->unsignedBigInteger('relate_id')->unsigned();
            $table->foreign('instrument_id')
                ->references('id')->on('instruments')->onDelete('cascade');
            $table->foreign('relate_id')->references('id')->on('relates')->onDelete('cascade');
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
        Schema::dropIfExists('instrument_relatedto');
    }
};
