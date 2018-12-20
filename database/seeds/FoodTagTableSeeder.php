<?php

use Illuminate\Database\Seeder;
use App\Food;
use App\Tag;

class FoodTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods =[
            'Banana' => ['fruit', 'uncooked'],
            'Oatmeal' => ['grain', 'cooked', 'allergic symptoms afterwards'],
            'Chicken' => ['meat', 'cooked']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($foods as $food => $tags) {

            # First get the book
            $food = Food::where('food', 'like', $food)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();

                # Connect this tag to this book
                $food->tags()->save($tag);
            }
        }
    }
}
