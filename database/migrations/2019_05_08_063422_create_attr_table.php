<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr', function (Blueprint $table) {
            $table->increments('attr_id');
            $table->string('attr_name');
            $table->string('attr_value');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('order_id')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attr');
    }
}
