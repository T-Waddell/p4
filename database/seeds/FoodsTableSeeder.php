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
            ['Banana', 'Fruit', 'Breakfast', 1, '2018-11-30'],
            ['Oatmeal', 'Grain', 'Snack', 1, '2018-11-30'],
            ['Chicken', 'Meat', 'Lunch', 1, '2018-11-30'],
            ['Spinach', 'Vegetable', 'Lunch', 2, '2018-11-30'],
            ['Yogurt', 'Dairy', 'Breakfast', 1, '2018-12-01'],
            ['Chocolate', 'Sweet', 'Snack', 1, '2018-12-01'],
        ];

        $count = count($foods);

        foreach ($foods as $key => $foodData) {
            $food = new Food();

            $food->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $food->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $food->food = $foodData[0];
            $food->category = $foodData[1];
            $food->meal = $foodData[2];
            $food->servings = $foodData[3];
            $food->date = $foodData[4];

            $food->save();
            $count--;
        }
    }
}
