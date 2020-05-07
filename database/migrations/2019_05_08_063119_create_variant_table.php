<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant', function (Blueprint $table) {
            $table->increments('variant_id');
            //đơn bị tiền tệ 18 là số có thể tính toán, 0 là không láy phần thập phân
            $table->decimal('variant_price', 18, 0)->default(0);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
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
        Schema::dropIfExists('variant');
    }
}
