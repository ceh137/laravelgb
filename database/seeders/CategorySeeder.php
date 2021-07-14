<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->GetData());
    }

    public function GetData() {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'name' => $faker->sentence(mt_rand(4, 6)),
                'desc' => $faker->sentence(mt_rand(10, 12)),
                'created_at' => now(),
                'updated_at' => now()

            ];
        }
        return $data;
    }
}
