<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentalLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accidental_leads', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->string('fuel');
            $table->string('leadType');
            $table->string('image');
            $table->string('car_type');
            $table->string('query');
            $table->string('mobile');
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
        Schema::dropIfExists('accidental_leads');
    }
}
