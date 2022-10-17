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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('nama_film');
            $table->string('studio');
            $table->string('cover');
            $table->integer('harga');
            $table->date('tahun_rilis');
            $table->text('aktor');
            $table->text('sinopsis');
            $table->string('trailer');
            $table->string('full_movie');
            $table->foreignId('genre_id');
            $table->foreign('genre_id')->references('id')->on('genres');
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
        Schema::dropIfExists('films');
    }
};
