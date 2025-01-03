<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->integer('available_tickets')->after('total_tickets')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('available_tickets');
        });
    }
};
