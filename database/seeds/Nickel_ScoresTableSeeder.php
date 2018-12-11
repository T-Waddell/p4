<?php

use Illuminate\Database\Seeder;
use App\Nickel_Score;

class Nickel_ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nickel_scores = [
            ['Banana', 'Fruit', 1],
            ['Oatmeal', 'Grain', 9],
            ['Chicken', 'Meat', 1],
            ['Spinach', 'Vegetable', 2],
            ['Yogurt', 'Dairy', 2],
            ['Chocolate', 'Sweet', 6],
        ];

        $count = count($nickel_scores);

        foreach ($nickel_scores as $key => $nickelScoreData) {
            $nickelScore = new Nickel_Score();

            $nickelScore->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $nickelScore->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $nickelScore->food = $nickelScoreData[0];
            $nickelScore->category = $nickelScoreData[1];
            $nickelScore->nickel_point_value = $nickelScoreData[2];

            $nickelScore->save();
            $count--;
        }
    }
}
