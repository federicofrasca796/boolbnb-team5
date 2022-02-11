<?php

use App\Models\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Base',
                'duration' => 24,
                'price' => 2.99,

            ],
            [
                'name' => 'Advanced',
                'duration' => 72,
                'price' => 5.99,

            ],
            [
                'name' => 'Pro',
                'duration' => 144,
                'price' => 9.99,

            ],
        ];

        foreach ($packages as $package) {
            $newpackage = new Sponsor();
            $newpackage->name = $package['name'];
            $newpackage->slug = Str::slug($package['name']);
            $newpackage->duration = $package['duration'];
            $newpackage->price = $package['price'];
            $newpackage->save();

        }

    }
}
