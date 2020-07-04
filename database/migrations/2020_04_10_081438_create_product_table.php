<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('describe');//mô tả
            $table->string('unit_price');//giá gốc
            $table->string('promotion_price');//giá khuyến mãi
            $table->integer('new_product');
            $table->string('link_img');
            $table->integer('id_restaurant');
            $table->integer('id_product_type');
            $table->integer('active');
            $table->timestamps();

            //$table->integer('id_chu_nha_hang')->unsigned();
            //$table->foreign('id_chu_nha_hang')->references('id')->on('chunhahang');
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
