<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStationUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stations', function (Blueprint $table) {
                $table->string('stream_url')->after('url');
                $table->string('icon_url')->after('url')->nullable();
                $table->renameColumn('url', 'homepage_url');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stations', function (Blueprint $table) {
                $table->renameColumn('homepage_url', 'url');
                $table->dropColumn('stream_url');
                $table->dropColumn('icon_url');
            }
        );
    }
}
