<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('thumbnail'); // Path ke file thumbnail
            $table->string('name'); // Nama Event
            $table->text('description'); // Deskripsi Event
            $table->string('category'); // Kategori Event
            $table->date('date'); // Tanggal Event
            $table->string('location'); // Lokasi Event
            $table->decimal('price', 10, 2); // Harga Tiket Event
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
