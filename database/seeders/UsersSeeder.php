<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert($this->GetData());
    }

    public function GetData() {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'login' => $faker->userName,
                'pass' => md5($faker->sentence(1)),
                'status_id' => mt_rand(1,3),
                'mail' => $faker->email,
                'created_at' => now(),
                'updated_at' => now()

            ];
        }
        return $data;
    }
}
