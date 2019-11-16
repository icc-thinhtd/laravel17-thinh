<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('screen');
            $table->string('vga')->nullable();
            $table->string('storage');
            $table->string('extent_memory')->nullable();
            $table->string('cam1')->nullable();
            $table->string('cam2')->nullable();
            $table->string('sim')->nullable();
            $table->string('connect');
            $table->string('pin');
            $table->string('os');
            $table->text('note')->nullable();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');;
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
        Schema::dropIfExists('product_details');
    }
}
