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
        DB::table('robot_user')->truncate();
        
        factory('App\RobotUser', 100)->create();
    }
}
