<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->GetData());
    }

    public function GetData() {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(4, 6)),
                'article' => $faker->Realtext(1000),
                'status_id' => mt_rand(1,4),
                'category_id' => mt_rand(1,15),
                'created_at' => now(),
                'updated_at' => now()

            ];
        }
        return $data;
    }
}
