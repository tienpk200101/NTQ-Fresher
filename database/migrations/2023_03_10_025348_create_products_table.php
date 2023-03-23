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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('short_description', 1000)->nullable();
            $table->longText('images')->nullable();
            $table->integer('regular_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('order')->default(0);
            $table->integer('stock')->nullable();
            $table->integer('discount')->nullable();
            $table->string('author', 100)->nullable();
            //prodcut_type
            //referProductId
            $table->string('tax', 100)->nullable();
            $table->string('ship', 100)->nullable();
            $table->tinyInteger('is_attr')->default(0);
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
        Schema::dropIfExists('products');
    }
};
