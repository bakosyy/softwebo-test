<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::factory(['name' => 'polish'])->create(); //1
        Language::factory(['name' => 'english'])->create(); //2
        Language::factory(['name' => 'german'])->create(); //3
        Language::factory(['name' => 'spanish'])->create(); //4
        Language::factory(['name' => 'french'])->create(); //5
        Language::factory(['name' => 'portuguese'])->create(); //6
        Language::factory(['name' => 'kazakh'])->create(); //7

    }
}
