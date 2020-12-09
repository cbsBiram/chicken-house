<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPriceToExtraChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->float('total_price', '8', '2')->default(0);
            $table->integer('quantity')->default(0)->change();
            $table->float('price', '8', '2')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            $table->string('type');
        });
    }
}
