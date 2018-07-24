<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('judul');
            $table->text('isi');
            $table->integer('id_kategori')->unsigned();

            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('CASCADE');
                    //tipe   id_relasi dari table ini  > referensi dari id_apa  > dari table apa
            $table->integer('id_pembuat')->unsigned();
            $table->foreign('id_pembuat')->references('id')->on('users')->onDelete('CASCADE');

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
        Schema::dropIfExists('beritas');
    }
}
