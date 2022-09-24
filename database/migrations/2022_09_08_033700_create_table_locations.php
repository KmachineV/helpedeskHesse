<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table){
            $table->id();
            $table->string('region', 64);
            $table->string('abreviatura', 4);
            $table->string('capital', 64);
        });

        Schema::create('provinces', function (Blueprint $table){
            $table->id();
            $table->string('province', 64);
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');
        });

        Schema::create('communes', function (Blueprint $table){
            $table->id();
            $table->string('commune', 64);
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_locations');
    }
}
