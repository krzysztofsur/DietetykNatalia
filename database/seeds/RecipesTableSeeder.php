<?php
use App\Recipes;
use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
 
            $recipes = new Recipes();
            $recipes->category = 'Przepisy';
            $recipes->title = 'Title'. $i;
            $recipes->photo = '/img/background_1.jpg';
            $recipes->short = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate commodi voluptatibus quia voluptatem ab alias sequi vitae inventore';
            $recipes->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate commodi voluptatibus quia voluptatem ab alias sequi vitae inventore possimus, blanditiis facilis porro ipsa debitis explicabo quis cumque corporis labore. Explicabo.';
            $recipes->save();
        }
    }
}
