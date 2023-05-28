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
        Schema::create('schedule_details', function (Blueprint $table) {
            $table->increments('id_schedule_details');
            $table->string('transactionnumber',50);
            $table->foreign('id_obat')->references('id_obat')->on('obats');
            $table->integer('Qty_hari');
            $table->dateTime('stardate');
            $table->dateTime('enddate');
            $table->text('aturanpakai');
        });
        DB::statement("ALTER TABLE schedule_details AUTO_INCREMENT = 14000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_details');
    }
};
