<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('store_id');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('weight');
            $table->string('shipping')->nullable();
            $table->string('shipping_detail')->nullable();
            $table->integer('cost')->nullable();
            $table->char('status')->default('1')->comment('1: confirm, 2: process, 3: shipping, 4: done');
            $table->string('tracking_number')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
