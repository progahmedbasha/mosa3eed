<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('contact_name');
            $table->string('phone');
            $table->string('email');
            $table->string('bio')->nullable();
            $table->string('photo')->nullable();
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->string('address');
            $table->string('type');
            $table->string('status');
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
        Schema::dropIfExists('organizations');
    }
}
