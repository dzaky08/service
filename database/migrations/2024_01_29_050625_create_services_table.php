<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
            $table->integer('qty');
            $table->integer('harga');
            $table->string('foto');
            $table->enum('status', ['ada', 'habis']);
            $table->integer('harga_jasa');
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
        Schema::dropIfExists('services');
    }

    
}
