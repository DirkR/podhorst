<?php

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
        $data = [
            [
                "station_id"=>1,
                "label" => "Forschung aktuell",
                "description" => "Meldungen aus der Wissenschaft",
                "slug" => "dlf/forschung",
            ],
            [
                "station_id"=>1,
                "label" => "Interview der Woche",
                "description" => "Aktuelle und historische Ereignisse kommentiert",
                "slug" => "dlf/Interview",
            ],
            [
                "station_id"=>1,
                "label" => "Wirtschaft und Gesellschaft",
                "description" => "Wirtschaft und Gesellschaft aktuelle Themen",
                "slug" => "dlf/wirtschaft",
            ],
        ];

        DB::table('shows')->insert($data);
    }
}
