<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        City::count() > 0 ? City::truncate() : null;

        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'state_id' => fake()->numberBetween(1, 100),
                'name' => fake()->city,
                'description' => fake()->paragraph(1),
            ];
        }
        City::insert($data);
    }
}
