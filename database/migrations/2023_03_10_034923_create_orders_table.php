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
            $table->char('customer_name', 100)->nullable();
            $table->string('product', 255)->nullable();
            $table->integer('total')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
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
