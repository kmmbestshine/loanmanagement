<?php

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
        $this->call(LibrariesTableSeeder::class);
        $this->call(ThingsTableSeeder::class);
    }
}
