<?php

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            'Uncategorized',
            'Breaking News',
            'Social',
            'Politics',
            'World',
            'Cooking',
            'Gossip',
            'Science and Tech',
        ];
        foreach($categories as $category){
            Category::create([
                'slug' => Category::getSlug($category),
                'name' => $category,
         'description' => $faker->paragraph(rand(1,5), true),
            ]);
        }
    }
}
