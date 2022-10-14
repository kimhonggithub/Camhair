<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFulllaceWigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fulllace_wig', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wighair_id')->unsigned();
            $table->bigInteger('wigcap_id')->unsigned();
            
        

            $table->timestamps();
           
            $table->foreign('wighair_id')->references('id')->on('wig_hair')->onDelete('cascade');
            $table->foreign('wigcap_id')->references('id')->on('wigcaps')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fulllace_wig');
    }
}
