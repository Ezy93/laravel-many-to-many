<?php
use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100 ; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->sentence(4);
            $newPost->author = $faker->name();
            $newPost->img_url = "https://i.picsum.photos/id/$i/200/300.jpg";
            $newPost->description = $faker->realText(250, 2);
            $newPost->slug = Str::slug($newPost->title,'-')."-$i";
            $newPost->save();
        }
    }
}
