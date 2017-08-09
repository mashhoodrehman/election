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
        DB::table('users')->insert([
            'fName' => "Admin",
            'lName' => "John",
            'email' => 'admin@tsbs.com',
            'password' => bcrypt('admin123'),
            'role' =>'admin',
            'verified' =>'1',
            'status' =>'on',
        ]);
    }
}
