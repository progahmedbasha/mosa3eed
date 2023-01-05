<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('days');
            $table->string('from');
            $table->string('to');
            // $table->integer('organization_id')->unsigned();
            // $table->foreign('organization_id')->references('id')->on('organizations');
            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');
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
        Schema::dropIfExists('organization_shifts');
    }
}
