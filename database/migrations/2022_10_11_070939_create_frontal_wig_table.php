<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontalWigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontal_wig', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wighair_id')->unsigned();
            $table->bigInteger('frontal_id')->unsigned();
            $table->bigInteger('wefted_id')->unsigned();
        

            $table->timestamps();
           
            $table->foreign('wighair_id')->references('id')->on('wig_hair')->onDelete('cascade');
            $table->foreign('frontal_id')->references('id')->on('frontal_hair')->onDelete('cascade');
            $table->foreign('wefted_id')->references('id')->on('wefted_hair')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontal_wig');
    }
}
