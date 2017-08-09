<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class CitySeeder extends CsvSeeder
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
		 $this->table = 'cities';
		$this->seedFromCSV(base_path('database/seeds/csvs/CityList.csv'));

		parent::run();
    }
}
