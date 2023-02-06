<!-- <?php

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
         $categories = Category::all('id')->all();
         $tags = Tag::all()->pluck('id');
         $tagCount = count($tags);

        for($i=0; $i<50; $i++) {
            $title = $faker->words(rand(3, 7), true);

            /* $number = rand(1, 36);
            if($number) {
                $contents = new File(__DIR__ . '../../storage/app/Random img/img' . $number . '.jpg');
                $img_path = Storage::put('uploads', $contents);
            } else {
                $img_path = null;
            } */

            $post = Post::create([
             'category_id'    => $faker->randomElement($categories)->id,
                'slug'        => Post::getSlug($title),
                'title'       => $title,
                'image'       => 'https://picsum.photos/id/' . rand(0, 100) . '/500/400',
                // 'uploaded_img'=> $img_path,
                'content'     => $faker->paragraphs(rand(1,100), true),
                'except'      => $faker->paragraph(),
            ]);

         $post->tags()->attach($faker->randomElements($tags, rand(0, ($tagCount > 10) ? 10 : $tagCount)));
        }
    }
}
