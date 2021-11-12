<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory([
            'name' => 'Poland',
            'flag' => 'https://cdn.pixabay.com/photo/2016/06/29/23/18/flag-1488032_960_720.jpg'
        ])->create();

        Country::factory([
            'name' => 'Germany',
            'flag' => 'https://cdn.pixabay.com/photo/2015/11/24/16/23/flag-germany-1060305_960_720.jpg'
        ])->create();

        Country::factory([
            'name' => 'Spain',
            'flag' => 'https://cdn.pixabay.com/photo/2016/04/29/17/09/flag-1361373_960_720.jpg'
        ])->create();

        Country::factory([
            'name' => 'Kazakhstan',
            'flag' => 'https://cdn.pixabay.com/photo/2016/02/07/04/40/kazakhstan-1184097_960_720.jpg'
        ])->create();

        Country::factory([
            'name' => 'Luxembourg',
            'flag' => 'https://cdn.pixabay.com/photo/2019/11/08/09/59/luxembourg-4610905_960_720.jpg'
        ])->create();

    }
}
