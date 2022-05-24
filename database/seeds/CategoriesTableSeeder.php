<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            'post of day',
            'sunny',
            'landscape',
            'funny',
            'daily',
            'weather',
            'serious',
            'holiday',
            'blogging',
            'soccer',
        ];
        for ($i=0; $i < count($categories); $i++) {
            $newCategory = new Category();
            $newCategory->name = $categories[$i];
            $newCategory->color = $faker->unique()->hexColor();
            $newCategory->save();
        }
    }
}
