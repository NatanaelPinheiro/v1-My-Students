<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolData;

class SchoolDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolData::factory()->times(1)->create();
    }
}
