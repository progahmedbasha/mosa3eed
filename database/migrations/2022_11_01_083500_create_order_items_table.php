<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_number');
            $table->integer('medicin_id')->unsigned();
            $table->foreign('medicin_id')->references('id')->on('medicins')->onDelete('cascade');
            $table->float('price');
            $table->float('qty');
            $table->float('discnum');
            $table->float('discpersent')->nullable();
            $table->float('total_cost')->nullable();
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
        Schema::dropIfExists('order_items');
    }
}
