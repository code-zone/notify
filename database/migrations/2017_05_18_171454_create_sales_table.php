<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id', false, true)->nullable();
            $table->double('amount');
            $table->string('order_number');
            $table->timestamps();
        });
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->timestamps();
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('sales');
    }
}
