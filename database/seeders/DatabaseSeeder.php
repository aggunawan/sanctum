<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::firstOrCreate(
        	[
        		'email' => 'dummy@mail.com'
        	],
        	[
	        	'name' => 'Dummy User',
	        	'email' => 'dummy@mail.com',
	        	'password' => bcrypt('secret'),
        	]
        );
    }
}
