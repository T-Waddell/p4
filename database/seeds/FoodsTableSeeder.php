<?php

use Illuminate\Database\Seeder;
use App\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            ['Banana', 'Breakfast', 1, '2018-11-30'],
            ['Oatmeal', 'Snack', 1, '2018-11-30'],
            ['Chicken', 'Lunch', 1, '2018-11-30'],
            ['Spinach', 'Lunch', 2, '2018-11-30'],
            ['Yogurt', 'Breakfast', 1, '2018-12-01'],
            ['Chocolate', 'Snack', 1, '2018-12-01'],
        ];

        $count = count($foods);

        foreach ($foods as $key => $foodData) {
            $food = new Food();

            $food->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $food->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $food->food = $foodData[0];
            #$food->category = $foodData[1];
            $food->meal = $foodData[1];
            $food->servings = $foodData[2];
            $food->date = $foodData[3];

            $food->save();
            $count--;
        }
    }
}
