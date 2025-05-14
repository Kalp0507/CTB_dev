<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteryTyreLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battery_tyre_leads', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->string('fuel');
            $table->string('leadType');
            $table->string('mobile');
            $table->string('query');
            $table->string('battery_or_tyre');
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
        Schema::dropIfExists('battery_tyre_leads');
    }
}
