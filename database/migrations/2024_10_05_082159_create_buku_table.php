<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul');
            $table->decimal('harga', 10, 2);
            $table->string('isbn')->unique();
            $table->string('penulis');
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable(); // Tambahkan kolom gambar
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
        Schema::dropIfExists('buku');
    }
}