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
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id_schedule');
            $table->string('transactionnumber',50);
            $table->string('transactiondate',50);
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->text('description');
        });
        DB::statement("ALTER TABLE schedules AUTO_INCREMENT = 14000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
