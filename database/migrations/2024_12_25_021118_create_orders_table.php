<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Relasi ke tabel events
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->integer('quantity'); // Jumlah tiket
            $table->double('total_price'); // Total harga
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
        Schema::dropIfExists('orders');
    }
}
