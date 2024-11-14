<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        State::count() > 0 ? State::truncate() : null;
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'country_id' => fake()->numberBetween(1, 100),
                'name' => fake()->state,
                'description' => fake()->paragraph(1),
            ];
        }
        State::insert($data);
    }
}
