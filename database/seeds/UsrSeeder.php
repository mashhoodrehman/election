<?php

use Illuminate\Database\Seeder;

class UsrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fName' => "User",
            'lName' => "User",
            'email' => 'user@tsbs.com',
            'password' => bcrypt('user123'),
            'role' =>'student',
            'verified' =>'1',
            'status' =>'on',
        ]);
    }
}
