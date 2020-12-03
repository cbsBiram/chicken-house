<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliments', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->enum('type', ['start', 'growth', 'finish'])->default('start');
            $table->integer('quantity');
            $table->float('weight')->nullable();
            $table->float('price', '8', '2')->default('0');
            $table->float('quantity_consumed', '8', '2')->default('0');
            $table->integer('band_id');
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
        Schema::dropIfExists('aliments');
    }
}
