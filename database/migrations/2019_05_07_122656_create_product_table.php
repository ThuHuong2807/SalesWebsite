<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_code',50)->unique();
            $table->string('product_name');
            $table->string('product_slug');
            $table->decimal('product_price', 18, 0)->default(0);
            $table->tinyInteger('product_state')->unsigned();
            $table->tinyInteger('product_featured')->unsigned();
            $table->text('product_info')->nullable();
            $table->text('product_describe')->nullable();
            $table->string('product_img');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}
