<?php

use App\Models\Apartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $samples = [
            [
                'title' => 'Cantami o Diva del pelide Achille l\'ira funesta',
                'address' => 'via Del Pelide Achille 83 04011 Aprilia LT',
                'thumbnail' => 'https://images7.alphacoders.com/365/thumb-1920-365706.jpg',
                'latitude' => 13.89649743,
                'longitude' => 111.23413764,
                'number_of_rooms' => 3,
                'number_of_beds' => 5,
                'number_of_baths' => 1,
                'square_metres' => 33,
                'slug' => Str::slug('Cantami o Diva del pelide Achille l\'ira funesta')
            ],
            [
                'title' => 'Cantami o Diva del pelide Achille l\'ira funesta',
                'address' => 'via Enzo Dotti 11 00040 Roma RM',
                'thumbnail' => 'https://images7.alphacoders.com/365/thumb-1920-365706.jpg',
                'latitude' => 14.86249743,
                'longitude' => 13.11413664,
                'number_of_rooms' => 6,
                'number_of_beds' => 1,
                'number_of_baths' => 5,
                'square_metres' => 89,
                'slug' => Str::slug('Cantami o Diva del pelide Achille l\'ira funesta')
            ]
        ];

        foreach($samples as $sample){
            $apartment = new Apartment();
            $apartment->title = $sample['title'];
            $apartment->address = $sample['address'];
            $apartment->thumbnail = $sample['thumbnail'];
            $apartment->latitude = $sample['latitude'];
            $apartment->longitude = $sample['longitude'];
            $apartment->number_of_rooms = $sample['number_of_rooms'];
            $apartment->number_of_beds = $sample['number_of_beds'];
            $apartment->number_of_baths = $sample['number_of_baths'];
            $apartment->square_metres = $sample['square_metres'];
            $apartment->slug = $sample['slug'];
            $apartment->save();
        }
    }
}
