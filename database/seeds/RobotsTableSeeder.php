<?php

use Illuminate\Database\Seeder;

class RobotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('robots')->truncate();
       
        factory('App\Robot', 15)->create();
    }
}
