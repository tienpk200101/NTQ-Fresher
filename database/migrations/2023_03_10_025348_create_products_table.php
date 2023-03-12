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
            $table->unsignedBigInteger('category_id');
            $table->text('description')->nullable();
            $table->string('short_description', 255)->nullable();
            $table->string('tag', 255)->nullable();
            $table->integer('price')->nullable();
            $table->string('image', 255)->nullable();
//            $table->json('gallery')->nullable();
//            $table->json('color')->nullable();
            $table->integer('order')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('discount')->nullable();
            $table->unsignedBigInteger('manufacture_id')->nullable();
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
