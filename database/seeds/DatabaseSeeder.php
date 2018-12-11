<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        //$this->call(Nickel_ScoresTableSeeder::class);
        $this->call(ScoresTableSeeder::class);
    }
}
