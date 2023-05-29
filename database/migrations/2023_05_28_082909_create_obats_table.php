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
        Schema::create('obats', function (Blueprint $table) {
            $table->integer('id_obat');
            $table->string('code',50);
            $table->string('name',50);
            $table->string('satuan',50);
            $table->string('category',50);
            $table->string('brand',50);
            $table->text('description');
        });
        DB::statement("ALTER TABLE obats AUTO_INCREMENT = 14000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obats');
    }
};
