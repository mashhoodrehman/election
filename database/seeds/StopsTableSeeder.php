<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;


class StopsTableSeeder extends CsvSeeder 
{
   public function __construct()
	{
		
		
	}

	public function run()
	{
		// Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		 $this->table = 'schools';
		$this->seedFromCSV(base_path('database/seeds/csvs/SchoolsList.csv'));

		parent::run();
	}
}
