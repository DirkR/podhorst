<?php

use App\Models\Episode;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEpisodeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'episodes',
            function (Blueprint $table) {
                $table->integer('status')->default(Episode::PENDING)->after('label');
            }
        );

        Episode::all()->each(
            function ($episode) {
                $episode->status = Episode::RECORDED;
                $episode->save();
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
        Schema::table(
            'episodes',
            function (Blueprint $table) {
                $table->dropColumn('status');
            }
        );
    }
}
