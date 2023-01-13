<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_shift_id')->unsigned();
            $table->foreign('branch_shift_id')->references('id')->on('branch_shifts')->onDelete('cascade');
            $table->text('day');
            $table->string('from');
            $table->string('to');
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
        Schema::dropIfExists('shift_days');
    }
}
