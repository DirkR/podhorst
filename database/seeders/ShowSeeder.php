<?php

namespace Database\Seeders;

use App\Models\Show;
use App\Models\Station;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $show_data = [
            [
                "station_slug" => 'dlf',
                "label" => "Forschung aktuell",
                "description" => "Meldungen aus der Wissenschaft",
                "slug" => "forschung",
            ],
            [
                "station_slug" => 'dlf',
                "label" => "Interview der Woche",
                "description" => "Aktuelle und historische Ereignisse kommentiert",
                "slug" => "interview",
            ],
            [
                "station_slug" => 'dlf',
                "label" => "Wirtschaft und Gesellschaft",
                "description" => "Wirtschaft und Gesellschaft aktuelle Themen",
                "slug" => "wirtschaft",
            ],
        ];

        foreach ($show_data as $item) {
            $station = Station::firstWhere('slug', $item['station_slug']);
            $item['station_id'] = $station->id;
            unset($item['station_slug']);
            $show = Show::factory()->create($item);
        }
    }
}
