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

        $this->call([
            SponsorSeeder::class,
            ApartmentSeeder::class,
            MessageSeeder::class,
            ServiceSeeder::class,
            ViewSeeder::class
        ]);

    }
}
