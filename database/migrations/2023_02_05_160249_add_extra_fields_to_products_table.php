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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('maintenance_addon')->after('productTags')->nullable();
            $table->string('features')->after('maintenance_addon')->nullable();
            $table->string('demo_link')->after('features')->nullable();
            $table->string('play_store_url')->after('demo_link')->nullable();
            $table->string('play_username')->after('play_store_url')->nullable();
            $table->string('play_password')->after('play_username')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('maintenance_addon');
            $table->dropColumn('features');
            $table->dropColumn('demo_link');
            $table->dropColumn('play_store_url');
            $table->dropColumn('play_username');
            $table->dropColumn('play_password');
        });
    }
};
