<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan'); // Sesuai dengan format asli Anda
            $table->unsignedBigInteger('id_buku');
            $table->integer('jumlah');
            $table->date('tanggal_pesanan');
            $table->string('status_pesanan')->default('pending');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_buku')
                  ->references('id_buku')  // Sesuaikan dengan nama kolom primary key di tabel buku
                  ->on('buku')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        // Hapus foreign key terlebih dahulu
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign(['id_buku']);
        });

        Schema::dropIfExists('pesanan');
    }
}
