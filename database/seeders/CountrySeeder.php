<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Country::count() > 0 ? Country::truncate() : null;

        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'name' => fake()->unique()->country,
                'description' => fake()->paragraph,
            ];
        }
        // foreach(array_chunk($data, 8000) as $chunk) {
        //     Country::insert($chunk);
        // }

        Country::insert($data);
    }
}
