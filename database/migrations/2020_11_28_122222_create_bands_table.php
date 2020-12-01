<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('quantity');
            $table->float('unit_price', '8', '2');
            $table->enum('status', ['incomplete', 'complete', 'elapsed'])->default('incomplete');
            $table->integer('loss')->default('0');
            $table->float('purchase_price', '8', '2')->default('0');
            $table->float('benefits', '8', '2')->default('0');
            $table->string('provider')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('bands');
    }
}
