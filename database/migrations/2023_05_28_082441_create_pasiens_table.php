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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->integer('id_pasien');
            $table->string('code',50);
            $table->string('name',50);
            $table->string('alamat',50);
            $table->string('tempatlahir',50);
            $table->date('tgllahir');
            $table->string('no_ktp',50);
            $table->string('kota',50);
            $table->text('description');
        });
        DB::statement("ALTER TABLE pasiens AUTO_INCREMENT = 14000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
};
