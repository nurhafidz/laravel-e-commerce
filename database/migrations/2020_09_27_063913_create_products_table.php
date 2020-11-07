<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('harga');
            $table->integer('stock');
            $table->longText('description');
            $table->longText('image');

            $table->char('status')->default('1')->comment('1: aktif, 0: tidak aktif');
            $table->char('status_product')->default('1')->comment('1: baru, 2: bekas');
            $table->integer('store_id');
            $table->integer('category_id');
            $table->integer('weight');
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
        Schema::dropIfExists('products');
    }
}
