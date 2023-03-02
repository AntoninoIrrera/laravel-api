<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $types=[
            [
                'name' => 'front-end',
                'color' => 'blue',
                'image' => 'https://img.freepik.com/premium-vector/front-end-word-concepts-banner-web-applications-programming_106317-84.jpg?w=2000'
            ],
            [
                'name' => 'back-end',
                'color' => 'green',
                'image' => 'https://img.freepik.com/premium-vector/flat-design-backend-developer-concept-illustration-websites-landing-pages-mobile-applications-posters-banners_108061-780.jpg?w=2000'
            ],
            [
                'name' => 'full-stack',
                'color' => 'red',
                'image' => 'https://img.freepik.com/premium-vector/full-stack-developer-working-computer-it-professional-programmer-coding-website-creation-proccess-computer-technology_277904-5495.jpg?w=2000'
            ]
        ];


        foreach ($types as $type) {
            
            $newType = new Type();

            $newType->name = $type['name'];
            $newType->color = $type['color'];
            $newType->image = $type['image'];
            $newType->save();
            

        }


    }
}
