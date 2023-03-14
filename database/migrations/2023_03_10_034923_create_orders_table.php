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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('tracking_id')->nullable();
            $table->integer('carrier')->nullable();
            $table->string('voucher', 100)->nullable();
            $table->float('sub_total', 8, 2)->nullable();
            $table->float('total', 8, 2)->nullable();
            $table->unsignedBigInteger('payment_method')->nullable();
            $table->float('tax', 8, 2)->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->enum('status', [0,1,2,3,4,5])->nullable(); // 0-pending, 1-inprogress, 2-delivered, 3-pickups, 4-returns, 5-cancelled
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
        Schema::dropIfExists('orders');
    }
};
