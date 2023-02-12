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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('siteName')->nullable();
            $table->string('SiteSupportNumber')->nullable();
            $table->string('siteEmail')->nullable();
            $table->string('SiteCopyRight')->nullable();
            $table->string('siteLogo')->nullable();
            $table->string('FacebookLink')->nullable();
            $table->string('TwitterLink')->nullable();
            $table->string('LinkedinLink')->nullable();
            $table->string('InstagramLink')->nullable();
            $table->decimal('affiliate_comission_1_to_10', 8,2)->nullable();
            $table->decimal('affiliate_comission_11_to_100', 8,2)->nullable();
            $table->decimal('affiliate_comission_more_100', 8,2)->nullable();
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
        Schema::dropIfExists('settings');
    }
};
