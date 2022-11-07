<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index){

            DB::table('users')->insert([
                'username'=>fake()->userName(),
                'firstname'=>fake()->firstName(),
                'lastname'=>fake()->lastName(),
                'phone_number'=>fake()->phoneNumber(),
                'email' => fake()->unique()->safeEmail(),
                'gender'=>'male',
                'active'=>1,
                'deleted_at'=>null,
                'deleted_by'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'created_at'=>fake()->date(),
                'updated_at'=>fake()->date(),
                'password'=>fake()->password()

            ]);
        };
    }
}
