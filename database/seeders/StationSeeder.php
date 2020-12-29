<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "label" => "Deutschlandfunk",
                "description" => "Deutschlandfunk Politik Kultur uso.",
                "slug" => "dlf",
                "homepage_url" => "https://www.deutschlandfunk.de",
            ],
            [
                "label" => "NOVA",
                "description" => "Deutschlandfunk für junge Leute",
                "slug" => "nova",
                "homepage_url" => "https://www.deutschlandfunknova.de",
            ],
            [
                "label" => "WDR 2",
                "description" => "Westdeutscher Rundfunk",
                "slug" => "wdr2",
                "homepage_url" => "https://www1.wdr.de/radio/wdr2",
            ],
        ];

        foreach ($data as $stationData) {
            Station::factory()->create($stationData);
        }
    }
}
