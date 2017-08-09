<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class QuestionsSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		$this->table = 'questionnaires';
		$this->seedFromCSV(base_path('database/seeds/csvs/Questionslist.csv'));

		parent::run();
    }
}
