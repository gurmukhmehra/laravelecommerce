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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique()->nullable();
            $table->string('postSlug')->nullable();
            $table->unsignedBigInteger('categories')->nullable();
            $table->longText('description')->nullable();
            $table->string('postImage')->nullable();
            $table->longText('postTags')->nullable();
            $table->string('postStatus')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
