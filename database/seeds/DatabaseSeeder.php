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
        DB::table('employees')->insert(array(
            	['name' => 'Shaukat Hyder' ],
            	['name' => 'Proloy Roy' ],
            	['name' => 'Nitish Dolakasharia' ],
            	['name' => 'Deepjyoti Kalita' ],
            	['name' => 'Rituraj Borgohain' ],
            	['name' => 'Shantanu Das' ],
            	['name' => 'Himangshu Das' ],
            	['name' => 'Aqib Hauque' ],
            	['name' => 'Rahul Goswami' ],
            )
        );
        $this->command->info('Employee Added !');
    }
}
