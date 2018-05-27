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
        //
        \DB::table('users')->insert([

            'firstname' => 'Gideon',
            'lastname' => 'Amowogbaje',
            'role' => 'admin',
            'password' => bcrypt('gideon'),
            'email' => 'amowogbajegideon@gmail.com',
            'phone' => '08174007780',

        ]);
          \DB::table('users')->insert([

            'firstname' => 'Ayoyemi',
            'lastname' => 'Adewumi',
            'role' => 'regular',
            'password' => bcrypt('ayoyemi'),
            'email' => 'ayoyemi@gmail.com',
            'phone' => '08174002780',

        ]);
          \DB::table('users')->insert([

            'firstname' => 'Adenuga',
            'lastname' => 'Adeola',
            'role' => 'regular',
            'password' => bcrypt('adenuga'),
            'email' => 'adenuga@gmail.com',
            'phone' => '08174005780',

        ]);
    }
}
