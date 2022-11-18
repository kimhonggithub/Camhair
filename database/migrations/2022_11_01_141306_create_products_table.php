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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->string('description');
            $table->decimal('reguler_price');
            $table->decimal('discount')->default(0);
            $table->decimal('sale_price')->nullable();
            $table->string('SKU');
            $table->unsignedInteger('quantity')->default(10);
            $table->bigInteger('sizevalue_id')->unsigned()->nullable();
            $table->bigInteger('wigcaps_id')->unsigned()->nullable();
            $table->bigInteger('lenghts_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('color_id')->unsigned();
            $table->bigInteger('pattern_id')->unsigned();
            $table->enum('stock_status',['instock','outstock'])->default('instock');
            $table->enum('Luster',['Low','Medium','High']);
            $table->timestamps();
            $table->foreign('lenghts_id')->references('id')->on('lenghts')->onDelete('cascade');
            $table->foreign('wigcaps_id')->references('id')->on('wigcaps')->onDelete('cascade');
            $table->foreign('sizevalue_id')->references('id')->on('sizevalue')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('pattern_id')->references('id')->on('patterns')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
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
