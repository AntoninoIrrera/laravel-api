<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $Michelangelo = new User();
        $Michelangelo->name = 'Michelangelo';
        $Michelangelo->email = 'michelangelo007@gmail.com';
        $Michelangelo->password = Hash::make('michelangelo123');
        $Michelangelo->role_id = 1;
        $Michelangelo->save();


        for ($i=0; $i < 10 ; $i++) { 
            $newUSer = new User();

            $newUSer->name = $faker->name();
            $newUSer->email = $faker->email();
            $newUSer->password = Hash::make($faker->password());
            $newUSer->role_id = $faker->numberBetween(2,3);
            $newUSer->save();

        }
    }
}
