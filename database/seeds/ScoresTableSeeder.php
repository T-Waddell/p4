<?php

use Illuminate\Database\Seeder;
use App\Score;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scores = [
            ['Banana', 'Fruit', 1],
            ['Oatmeal', 'Grain', 9],
            ['Chicken', 'Meat', 1],
            ['Spinach', 'Vegetable', 2],
            ['Yogurt', 'Dairy', 2],
            ['Chocolate', 'Sweet', 6],
        ];

        $count = count($scores);

        foreach ($scores as $key => $scoreData) {
            $score = new Score();

            $score->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $score->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $score->food = $scoreData[0];
            $score->category = $scoreData[1];
            $score->nickel_point_value = $scoreData[2];

            $score->save();
            $count--;
        }
    }
}
