<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicins', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('barcode');
            $table->string('producing_company')->nullable();
            $table->string('description')->nullable();
            $table->string('conversion_rate')->nullable();
            $table->string('tags')->nullable();
            $table->integer('medicin_type_id')->unsigned()->nullable();
            $table->foreign('medicin_type_id')->references('id')->on('medicin_types')->onDelete('cascade');
            $table->integer('medicin_shape_id')->unsigned()->nullable();
            $table->foreign('medicin_shape_id')->references('id')->on('medicin_shapes')->onDelete('cascade');
            $table->integer('effective_material_id')->unsigned()->nullable();
            $table->foreign('effective_material_id')->references('id')->on('effective_materials')->onDelete('cascade');
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->float('expected_discount')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('medicins');
    }
}
