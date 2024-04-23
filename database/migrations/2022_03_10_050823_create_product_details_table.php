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
            $table->id();
            $table->biginteger('catid')->unsigned();
            $table->biginteger('sub_cat_id')->unsigned();
            $table->biginteger('productid')->unsigned();
            $table->biginteger('brandid')->unsigned();
            $table->string('pattern');
            $table->string('sleeve');
            $table->string('neck');
            $table->string('fabric');
            $table->string('length');
            $table->string('style');
            $table->string('occasion');
            $table->string('package_contain');
            $table->string('product_description');
            $table->string('size');
            $table->integer('quantity');
            $table->string('bottomtype');
            $table->text('mulimages');
            $table->foreign('catid')->on('category')->references('id');
            $table->foreign('sub_cat_id')->on('subcategories')->references('id');
            $table->foreign('productid')->on('products')->references('id');
            $table->foreign('brandid')->on('brands')->references('id');
            $table->integer('flag')->default(1);
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
