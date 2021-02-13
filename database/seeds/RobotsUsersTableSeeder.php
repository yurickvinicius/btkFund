<?php

use Illuminate\Database\Seeder;

class RobotsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('robots_users')->truncate();
        
        factory('App\RobotUser', 100)->create();
    }
}
