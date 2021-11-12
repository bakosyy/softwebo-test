<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Language;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $polish = Language::factory(['name' => 'polish'])->create();
        $english = Language::factory(['name' => 'english'])->create();
        $german = Language::factory(['name' => 'german'])->create();
        $spanish = Language::factory(['name' => 'spanish'])->create();
        $french = Language::factory(['name' => 'french'])->create();
        $kazakh = Language::factory(['name' => 'kazakh'])->create();
        $russian = Language::factory(['name' => 'russian'])->create();
        $luxembourgish = Language::factory(['name' => 'luxembourgish'])->create();
        $dutch = Language::factory(['name' => 'dutch'])->create();

        $germany = Country::factory([
            'name' => 'Germany',
            'flag' => 'https://cdn.pixabay.com/photo/2015/11/24/16/23/flag-germany-1060305_960_720.jpg'
        ])->create();
        $germany->languages()->sync([$english->id, $german->id]);

        $spain = Country::factory([
            'name' => 'Spain',
            'flag' => 'https://cdn.pixabay.com/photo/2016/04/29/17/09/flag-1361373_960_720.jpg'
        ])->create();
        $spain->languages()->sync($spanish);

        $kazakhstan = Country::factory([
            'name' => 'Kazakhstan',
            'flag' => 'https://cdn.pixabay.com/photo/2016/02/07/04/40/kazakhstan-1184097_960_720.jpg'
        ])->create();
        $kazakhstan->languages()->sync([$kazakh->id, $russian->id]);

        $luxembourg = Country::factory([
            'name' => 'Luxembourg',
            'flag' => 'https://cdn.pixabay.com/photo/2019/11/08/09/59/luxembourg-4610905_960_720.jpg'
        ])->create();
        $luxembourg->languages()->sync([$french->id, $german->id, $luxembourgish->id]);

        $russia = Country::factory([
            'name' => 'Russia',
            'flag' => 'https://cdn.pixabay.com/photo/2016/01/29/23/59/russian-flag-1168905_960_720.jpg'
        ])->create();
        $russia->languages()->sync($russian);

        $canada = Country::factory([
            'name' => 'Canada',
            'flag' => 'https://cdn.pixabay.com/photo/2016/01/23/14/55/canada-1157521_960_720.jpg'
        ])->create();
        $canada->languages()->sync([$english->id, $french->id]);

        $england = Country::factory([
            'name' => 'England',
            'flag' => 'https://cdn.pixabay.com/photo/2012/04/11/15/30/flag-28514_960_720.png'
        ])->create();
        $england->languages()->sync($english);

        $netherlands = Country::factory([
            'name' => 'Netherlands',
            'flag' => 'https://cdn.pixabay.com/photo/2016/02/19/07/39/flag-1208862_960_720.jpg'
        ])->create();
        $netherlands->languages()->sync($dutch);

        $belgium = Country::factory([
            'name' => 'Belgium',
            'flag' => 'https://cdn.pixabay.com/photo/2016/02/10/21/56/flag-1192656_960_720.jpg'
        ])->create();
        $belgium->languages()->sync([$dutch->id, $german->id, $french->id]);

        $poland = Country::factory([
            'name' => 'Poland',
            'flag' => 'https://cdn.pixabay.com/photo/2016/06/29/23/18/flag-1488032_960_720.jpg'
        ])->create();
        $poland->languages()->sync($polish);

        $this->call([
            UserSeeder::class
        ]);
    }
}
