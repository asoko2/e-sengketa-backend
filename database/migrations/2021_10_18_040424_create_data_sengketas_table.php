<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSengketasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sengketas', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->unsignedBigInteger('user_id');
            $table->string('file_penerima_kuasa_path');
            $table->string('file_surat_kuasa_path');
            $table->string('file_form_pendaftaran_path');
            $table->string('foto_lahan_path');
            $table->string('keterangan');
            $table->integer('status');
            $table->timestamps();

        });

        Schema::table('data_sengketas', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_sengketas');
    }
}