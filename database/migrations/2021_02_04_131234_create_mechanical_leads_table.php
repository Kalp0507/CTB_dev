<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicalLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanical_leads', function (Blueprint $table) {
            $table->id();
            $table->string('mobile');
            $table->string('make_name');
            $table->string('model_name');
            $table->string('fuel_name');
            $table->string('make_id');
            $table->string('model_id');
            $table->string('fuel_id');
            $table->string('remark');
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
        Schema::dropIfExists('mechanical_leads');
    }
}
