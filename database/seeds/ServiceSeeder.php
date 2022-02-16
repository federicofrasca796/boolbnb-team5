<?php

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['WiFi', 'Kitchen', 'Self check-in', 'Pool', 'Hot tub', 'Free parking', 'Air Conditioning', 'Gym', 'EV charger', 'Smoke alarm', 'Fireplace', 'Dryer', 'Washer', 'Dedicated workspace'];

        foreach ($services as $service) {
            $newService = new Service;
            $newService->name = $service;
            $newService->save();
        }
    }
}