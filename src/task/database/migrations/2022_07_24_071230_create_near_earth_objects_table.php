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
        Schema::create('NearEarthObject', function (Blueprint $table) {
            $table->unsignedBigInteger('referenced');
            $table->string('name');
            $table->unsignedDouble('speed');
            $table->boolean('is_hazardous');
            $table->date('Date');
            $table->timestamps();

            $table->primary('referenced');
            $table->index('referenced');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NearEarthObject');
    }
};
