<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shows', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->unsignedInteger('duration')->default(55);
            $table->unsignedInteger('day')->default(7);
            $table->unsignedInteger('hour')->default(0);
            $table->unsignedInteger('minute')->default(5);
            $table->string('homepage_url')->nullable();
            $table->string('icon_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shows', function (Blueprint $table) {
            $table->dropColumn(['active', 'duration', 'day', 'hour', 'minute', 'homepage_url', 'icon_url']);
        });
    }
}
