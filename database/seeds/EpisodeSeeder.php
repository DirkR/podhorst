<?php

use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
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
                "show_id" => 1,
                "label" => "Klimawandel",
                "description" => "Waldbrand-Risiko steigt mit jedem Grad Celsius",
                "slug" => "dlf/forschung/Klimawandel",
            ],
            [
                "show_id" => 1,
                "label" => "Missionen der ESA 2020",
                "description" => "Sonne, Mars und Erde im Visier",
                "slug" => "dlf/forschung/Mission",
            ],
            [
                "show_id" => 1,
                "label" => "Erforscht, entdeckt, entwickelt",
                "description" => "Meldungen aus der Wissenschaft",
                "slug" => "dlf/forschung/erforscht",
            ],
        ];

        DB::table('episodes')->insert($data);
    }
}
