<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('namaPenerima');
            $table->string('kodesuratMasuk');
            $table->date('tglSuratDiterima');
            $table->date('tglsuratMasuk');
            $table->string('asalSurat');
            $table->string('perihal');
            $table->string('fileSurat');
            $table->unsignedBigInteger('disposisi_id')->nullable();
            $table->foreign('disposisi_id')->references('id')->on('disposisis')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('surat_masuks');
    }
}
