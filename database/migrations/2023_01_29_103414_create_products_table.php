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
            $table->string('ProductName')->unique()->nullable();
            $table->string('ProductSlug')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
            $table->decimal('product_price', 8,2)->nullable();
            $table->decimal('product_sale_price', 8,2)->nullable();
            $table->unsignedBigInteger('productCategory')->nullable();
            $table->longText('description')->nullable();
            $table->string('productImage')->nullable();
            $table->longText('productTags')->nullable();
            $table->string('productStatus')->nullable();
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
