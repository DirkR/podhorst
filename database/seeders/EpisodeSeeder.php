<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Show;
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
                "label" => "Klimawandel",
                "description" => "Waldbrand-Risiko steigt mit jedem Grad Celsius",
                "slug" => "dlf/forschung/Klimawandel",
                "show_slug" => "dlf/forschung",
            ],
            [
                "label" => "Missionen der ESA 2020",
                "description" => "Sonne, Mars und Erde im Visier",
                "slug" => "dlf/forschung/Mission",
                "show_slug" => "dlf/forschung",
            ],
            [
                "label" => "Erforscht, entdeckt, entwickelt",
                "description" => "Meldungen aus der Wissenschaft",
                "slug" => "dlf/forschung/erforscht",
                "show_slug" => "dlf/forschung",
            ],
        ];

        foreach ($data as $item) {
            $show = Show::firstWhere('slug', $item['show_slug']);
            $item['show_id'] = $show->id;
            unset($item['show_slug']);
            Episode::factory()->create($item);
        }
    }
}
