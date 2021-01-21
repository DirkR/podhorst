<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('station_id')->unsigned();
            $table->string('label', 60);
            $table->string('description')->nullable();
            $table->string('slug');
            $table->boolean('active')->default(1);
            $table->unsignedInteger('duration')->default(55);
            $table->unsignedInteger('day')->default(7);
            $table->unsignedInteger('hour')->default(0);
            $table->unsignedInteger('minute')->default(5);
            $table->string('homepage_url')->nullable();
            $table->string('icon_url')->nullable();
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
        Schema::dropIfExists('shows');
    }
}
