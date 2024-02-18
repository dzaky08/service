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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama')->nullable();
            $table->string('kode')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_kendaraan')->nullable();
            $table->enum('status', ['keranjang','dipesan', 'lunas']);
            $table->integer('total_harga')->nullable();
            $table->integer('uang_bayar')->nullable();
            $table->integer('uang_kembali')->nullable();
            $table->integer('qty');
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
