<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_kode',50)->unique();
            $table->foreignId('outlet_id')->references('id')->on('outlets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('qty');
            $table->integer('total_harga');
            $table->string('keterangan')->default('belum_dibayar');
            $table->string('status')->default('baru');
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
        Schema::dropIfExists('transaksis');
    }
}
