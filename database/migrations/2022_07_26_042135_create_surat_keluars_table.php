<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();

            $table->string('kodesuratKeluar');
            $table->date('tglpembuatanSurat');
            $table->date('tglpengirimanSurat');
            $table->string('namaPenerima')->nullable();
            $table->date('tglSuratDiterima')->nullable();
            $table->string('tujuanSurat');
            $table->string('perihal');
            $table->string('pembuat');
            $table->string('fileSurat');
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
        Schema::dropIfExists('surat_keluars');
    }
}
