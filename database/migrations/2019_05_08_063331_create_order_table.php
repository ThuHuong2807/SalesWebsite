<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_name');
            $table->decimal('order_price', 18, 0);
            $table->tinyInteger('order_quantity')->unsigned();
            $table->string('order_img');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
