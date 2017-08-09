<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(StopsTableSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(UsrSeeder::class);
        $this->call(AnswersSeeder::class);
    }
}
