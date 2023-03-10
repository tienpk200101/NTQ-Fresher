<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->json('customer_info')->nullable();
            $table->json('product_details')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('shipping_charge')->nullable();
            $table->integer('estimate_tax')->nullable();
            $table->integer('total')->nullable();
            $table->integer('payment_detail')->nullable();
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
        Schema::dropIfExists('order_details');
    }
};
