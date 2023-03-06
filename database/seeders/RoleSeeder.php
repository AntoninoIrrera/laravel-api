<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'amministratore',
                'color' => 'blue',
            ],
            [
                'name' => 'menager',
                'color' => 'green',
            ],
            [
                'name' => 'user',
                'color' => 'red',
            ]
        ];


        foreach ($roles as $role) {

            $newRole = new Role();

            $newRole->name = $role['name'];
            $newRole->color = $role['color'];
            $newRole->save();
        }

    }
}
