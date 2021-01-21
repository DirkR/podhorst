<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShowRecordingDateField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'shows',
            function (Blueprint $table) {
                $table->dateTime('next_recording_at')->nullable()->after('updated_at');
            }
        );
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'shows',
            function (Blueprint $table) {
                $table->dropColumn('next_recording_at');
            }
        );
    }
}
