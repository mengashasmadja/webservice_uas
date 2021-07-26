<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtlitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlit', function (Blueprint $table) {
            $table->bigIncrements('id_atlit');
            $table->integer('id_olahraga');
            $table->string('nama_atlit');
            $table->date('ttl');
            $table->string('jnis_klamin');
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
        Schema::dropIfExists('atlit');
    }
}
