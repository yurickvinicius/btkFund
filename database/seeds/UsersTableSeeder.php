<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
   
        factory('App\User')->create([
            'name'     => "Admin",
            'email'    => "admin@gmail.com",
            'cpf'       => "001.555.777-01",
            'password'    => Hash::make(123456),
            'account_number'=> 100000,
            'in_use'     => 1,
            'remember_token' => Str::random(10),
            'type_id' => 1,
        ]);
        
        factory('App\User')->create([
            'name'     => "Maria",
            'email'    => "ana@gmail.com",
            'cpf'       => "021.155.277-31",
            'password'    => Hash::make(123456),
            'account_number'=> 100000,
            'in_use'     => 1,
            'remember_token' => Str::random(10),
            'type_id' => 2,
        ]);

        factory('App\User')->create([
            'name'     => "Pedro",
            'email'    => "pedro@gmail.com",
            'cpf'       => "031.415.527-61",
            'password'    => Hash::make(123456),
            'account_number'=> 100000,
            'in_use'     => 1,
            'remember_token' => Str::random(10),
            'type_id' => 2,
        ]);

        factory('App\User')->create([
            'name'     => "Jão",
            'email'    => "joao@gmail.com",
            'cpf'       => "022.322.121-97",
            'password'    => Hash::make(123456),
            'account_number'=> 100000,
            'in_use'     => 1,
            'remember_token' => Str::random(10),
            'type_id' => 2,
        ]);


        factory('App\User', 12)->create();
    }
}
