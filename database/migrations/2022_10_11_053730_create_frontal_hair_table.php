<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontalHairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontal_hair', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->string('size'); 
            $table->bigInteger('wigcap_id')->unsigned();
            $table->bigInteger('prod_id')->unsigned();
            $table->bigInteger('blend_id')->unsigned();
            $table->bigInteger('attr_id')->unsigned();

            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('wigcap_id')->references('id')->on('wigcaps')->onDelete('cascade');
            $table->foreign('prod_id')->references('id')->on('producings')->onDelete('cascade');
            $table->foreign('attr_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('blend_id')->references('id')->on('blend_hair')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontal_hair');
    }
}
