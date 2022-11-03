<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_bill_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_bill_id')->unsigned();
            $table->foreign('sale_bill_id')->references('id')->on('sale_bills')->onDelete('cascade');
            $table->integer('medicin_id')->unsigned();
            $table->foreign('medicin_id')->references('id')->on('medicins')->onDelete('cascade');
            $table->float('price');
            $table->float('qty');
            $table->float('total_cost');
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
        Schema::dropIfExists('sale_bill_products');
    }
}
