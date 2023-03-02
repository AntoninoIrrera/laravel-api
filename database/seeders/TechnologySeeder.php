<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            [
                'name' => 'html',
                'color' => 'blue',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpngGRjYX1ca7qAADU3K6eGLj7ShQE3L2otdzfryl_Y9Ht2QRoQKYQbsXd36XIxMbYOw0&usqp=CAU',
                'versione' => '5'
            ],
            [
                'name' => 'css',
                'color' => 'red',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/1200px-CSS3_logo_and_wordmark.svg.png',
                'versione' => '3'
            ],
            [
                'name' => 'javascript',
                'color' => 'yellow',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/800px-Unofficial_JavaScript_logo_2.svg.png',
                'versione' => 'ES6'
            ],
            [
                'name' => 'php',
                'color' => 'magenta',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png',
                'versione' => '8'
            ],
            [
                'name' => 'laravel',
                'color' => 'green',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png',
                'versione' => '9'
            ],
            [
                'name' => 'vue',
                'color' => 'black',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png',
                'versione' => '3'
            ],
            [
                'name' => 'vite',
                'color' => 'purple',
                'image' => 'https://camo.githubusercontent.com/61e102d7c605ff91efedb9d7e47c1c4a07cef59d3e1da202fd74f4772122ca4e/68747470733a2f2f766974656a732e6465762f6c6f676f2e737667',
                'versione' => '3'
            ],
            [
                'name' => 'nodejs',
                'color' => 'brown',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Node.js_logo.svg/1200px-Node.js_logo.svg.png',
                'versione' => '18.14.2'
            ]
        ];


        foreach ($technologies as $technology) {

            $newTechnology = new Technology();

            $newTechnology->name = $technology['name'];
            $newTechnology->color = $technology['color'];
            $newTechnology->image = $technology['image'];
            $newTechnology->versione = $technology['versione'];
            $newTechnology->save();
        }

    }
}
