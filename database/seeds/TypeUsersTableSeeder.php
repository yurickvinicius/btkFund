<?php

use App\TypeUser;
use Illuminate\Database\Seeder;

class TypeUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_users')->truncate();

        ///factory('App\TypeUser', 3)->create();

        TypeUser::create([
            'name'      =>"Administrator",
            'description'     => "Access to everything",
        ]);

        TypeUser::create([
            'name'      =>"Common",
            'description'     => "Limitede access",
        ]);
    }
}
