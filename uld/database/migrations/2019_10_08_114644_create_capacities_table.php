<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacitiesTable extends Migration
{
    public $timestamps = true;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('capacities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aircraft_id')->unsigned()->unique();
            $table->foreign('aircraft_id')
                ->references('id')
                ->on('aircrafts')
                ->onDelete('cascade');
            $table->float('weight_min');
            $table->float('weight_max');
            $table->float('height_min');
            $table->float('height_max');
            $table->float('width_min');
            $table->float('width_max');
            $table->float('length_min');
            $table->float('length_max');
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
        Schema::dropIfExists('capacities');
    }
}
