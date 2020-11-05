<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('external_id')->unique();
            $table->integer('parent_id')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('user_id');
            $table->integer('subtotal');
            $table->integer('cost');
            $table->char('status')->default('0')->comment('0: new, 1: confirm, 2: process, 3: shipping, 4: done');
            
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
        Schema::dropIfExists('orders');
    }
}
