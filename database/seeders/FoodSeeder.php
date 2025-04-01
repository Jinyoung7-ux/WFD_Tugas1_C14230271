<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FoodSeeder extends Seeder
{
     public function run(): void{
        for ($i = 0; $i<5; $i++) {
            DB::table('foods')->insert([
                'title' => fake()->text(20),
                'description' => fake()->text(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
     }
}
