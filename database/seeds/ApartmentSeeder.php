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
                'title' => 'Modern Apartment',
                'address' => 'Via Rossi, 00037 Segni',
                'thumbnail' => 'apartments_img/' . 'modern.jpg',
                'latitude' => 41.69401,
                'longitude' => 13.02347,
                'number_of_rooms' => 3,
                'number_of_beds' => 5,
                'number_of_baths' => 1,
                'square_metres' => 33,
                'slug' => Str::slug('Modern Apartment'),
            ],
            [
                'title' => 'Tommy Guest House Roma',
                'address' => 'Via Bernardino Lotti 11, 00157 Roma',
                'thumbnail' => 'apartments_img/' . 'tommy-guest.jpg',
                'latitude' => 41.91875,
                'longitude' => 12.5476,
                'number_of_rooms' => 6,
                'number_of_beds' => 1,
                'number_of_baths' => 5,
                'square_metres' => 89,
                'slug' => Str::slug('Tommy Guest House Roma'),
            ],
            [
                'title' => 'BB Hotels Aparthotel Visconti',
                'address' => 'Via Tommaso Gulli 1, 20147 Milano',
                'thumbnail' => 'apartments_img/' . 'visconti.jpg',
                'latitude' => 45.46497,
                'longitude' => 9.1356,
                'number_of_rooms' => 5,
                'number_of_beds' => 6,
                'number_of_baths' => 2,
                'square_metres' => 110,
                'slug' => Str::slug('BB Hotels Aparthotel Visconti'),
            ],
            [
                'title' => 'Dreams Hotel Residenza Pianell 10',
                'address' => 'Via Salvatore Pianell 10, 20125 Milano',
                'thumbnail' => 'apartments_img/' . 'dreams.jpg',
                'latitude' => 45.50697,
                'longitude' => 9.20657,
                'number_of_rooms' => 3,
                'number_of_beds' => 5,
                'number_of_baths' => 3,
                'square_metres' => 93,
                'slug' => Str::slug('Dreams Hotel Residenza Pianell 10'),
            ],
            [
                'title' => 'My Sweet Home In S. Frediano',
                'address' => 'Borgo San Frediano 59, 50124 Firenze',
                'thumbnail' => 'apartments_img/' . 'frediano.jpg',
                'latitude' => 43.76991,
                'longitude' => 11.24298,
                'number_of_rooms' => 6,
                'number_of_beds' => 8,
                'number_of_baths' => 4,
                'square_metres' => 126,
                'slug' => Str::slug('My Sweet Home In S. Frediano'),
            ],
            [
                'title' => 'My Boutique Home in Florence',
                'address' => 'Via de Bardi, 50125 Firenze',
                'thumbnail' => 'apartments_img/' . 'boutique.jpg',
                'latitude' => 43.7672,
                'longitude' => 11.25343,
                'number_of_rooms' => 3,
                'number_of_beds' => 5,
                'number_of_baths' => 2,
                'square_metres' => 57,
                'slug' => Str::slug('My Boutique Home in Florence'),
            ],
            [
                'title' => 'City Apartments Rialto',
                'address' => 'Ponte de Rialto, 30124 Venezia',
                'thumbnail' => 'apartments_img/' . 'rialto.jpg',
                'latitude' => 45.43794,
                'longitude' => 12.33612,
                'number_of_rooms' => 2,
                'number_of_beds' => 3,
                'number_of_baths' => 1,
                'square_metres' => 60,
                'slug' => Str::slug('City Apartments Rialto'),
            ],
            [
                'title' => 'Residence degli Artisti',
                'address' => 'Calle del Spezier, 30135 Venezia',
                'thumbnail' => 'apartments_img/' . 'artisti.jpg',
                'latitude' => 45.44095,
                'longitude' => 12.32827,
                'number_of_rooms' => 4,
                'number_of_beds' => 2,
                'number_of_baths' => 1,
                'square_metres' => 67,
                'slug' => Str::slug('Residence degli Artisti'),
            ],
            [
                'title' => 'Suite time Van Gogh',
                'address' => 'Via Francesco Crispi 247, 95129 Catania',
                'thumbnail' => 'apartments_img/' . 'suite-time.jpg',
                'latitude' => 37.51332,
                'longitude' => 15.09371,
                'number_of_rooms' => 2,
                'number_of_beds' => 1,
                'number_of_baths' => 1,
                'square_metres' => 54,
                'slug' => Str::slug('Suite time Van Gogh'),
            ],
            [
                'title' => 'COCO Apartments',
                'address' => 'Via Torino, 95128 Catania',
                'thumbnail' => 'apartments_img/' . 'coco.jpg',
                'latitude' => 37.52442,
                'longitude' => 15.08781,
                'number_of_rooms' => 5,
                'number_of_beds' => 6,
                'number_of_baths' => 3,
                'square_metres' => 89,
                'slug' => Str::slug('COCO Apartments'),
            ],
            [
                'title' => 'Istai Poetto Apartment',
                'address' => 'Spiaggia Del Poetto, Viale Poetto, 09126 Cagliari',
                'thumbnail' => 'apartments_img/' . 'poetto.jpg',
                'latitude' => 39.20254,
                'longitude' => 9.16264,
                'number_of_rooms' => 8,
                'number_of_beds' => 6,
                'number_of_baths' => 4,
                'square_metres' => 165,
                'slug' => Str::slug('Istai Poetto Apartment'),
            ],
            [
                'title' => 'The Good Place',
                'address' => 'Corso Vittorio Emanuele II 28, 09124 Cagliari',
                'thumbnail' => 'apartments_img/' . 'good-place.jpg',
                'latitude' => 39.21755,
                'longitude' => 9.1126,
                'number_of_rooms' => 4,
                'number_of_beds' => 3,
                'number_of_baths' => 3,
                'square_metres' => 77,
                'slug' => Str::slug('The Good Place'),
            ],
            [
                'title' => 'Yachting Residence',
                'address' => 'Via Zanzi, 21037 Lavena Ponte Tresa',
                'thumbnail' => 'apartments_img/' . 'yatching.jpg',
                'latitude' => 45.95839,
                'longitude' => 8.87142,
                'number_of_rooms' => 6,
                'number_of_beds' => 7,
                'number_of_baths' => 5,
                'square_metres' => 154,
                'slug' => Str::slug('Yachting Residence'),
            ],
            [
                'title' => 'Brand new apartments Ortiquattro',
                'address' => 'Via Orti 4, 20122 Milano',
                'thumbnail' => 'apartments_img/' . 'ortiquattro.jpg',
                'latitude' => 45.45482,
                'longitude' => 9.199,
                'number_of_rooms' => 1,
                'number_of_beds' => 2,
                'number_of_baths' => 1,
                'square_metres' => 35,
                'slug' => Str::slug('Brand new apartments Ortiquattro'),
            ],
            [
                'title' => 'Cosmo Residence',
                'address' => 'Via Torri Bianche 5, 20871 Vimercate',
                'thumbnail' => 'apartments_img/' . 'cosmo-residence.jpg',
                'latitude' => 45.60148,
                'longitude' => 9.36053,
                'number_of_rooms' => 7,
                'number_of_beds' => 5,
                'number_of_baths' => 3,
                'square_metres' => 84,
                'slug' => Str::slug('Cosmo Residence'),
            ],
            [
                'title' => 'Privilege Apartments',
                'address' => 'Via Rossino 3, 20871 Vimercate',
                'thumbnail' => 'apartments_img/' . 'privilege.jpg',
                'latitude' => 45.60836,
                'longitude' => 9.38897,
                'number_of_rooms' => 4,
                'number_of_beds' => 6,
                'number_of_baths' => 2,
                'square_metres' => 79,
                'slug' => Str::slug('Privilege Apartments'),
            ],
            [
                'title' => 'Siag Apartments',
                'address' => 'Via Po 72, 20032 Cormano',
                'thumbnail' => 'apartments_img/' . 'siag.jpg',
                'latitude' => 45.54535,
                'longitude' => 9.16049,
                'number_of_rooms' => 3,
                'number_of_beds' => 5,
                'number_of_baths' => 3,
                'square_metres' => 68,
                'slug' => Str::slug('Siag Apartments'),
            ],
            [
                'title' => 'Sweet Home Pitti',
                'address' => 'Via Benzoni 10, 26013 Crema',
                'thumbnail' => 'apartments_img/' . 'pitti.jpg',
                'latitude' => 45.3619,
                'longitude' => 9.68584,
                'number_of_rooms' => 1,
                'number_of_beds' => 1,
                'number_of_baths' => 1,
                'square_metres' => 40,
                'slug' => Str::slug('Sweet Home Pitti'),
            ],
            [
                'title' => 'Isola Apartments',
                'address' => 'Via Pastrengo 14, 20159 Milano',
                'thumbnail' => 'apartments_img/' . 'appartm-isola.jpg',
                'latitude' => 45.48672,
                'longitude' => 9.18618,
                'number_of_rooms' => 2,
                'number_of_beds' => 3,
                'number_of_baths' => 3,
                'square_metres' => 57,
                'slug' => Str::slug('Isola Apartments'),
            ],
            [
                'title' => 'INTOMILAN Aparthotel Galleria Duomo',
                'address' => 'Galleria del Corso, Corso Vittorio Emanuele II, 20122 Milano',
                'thumbnail' => 'apartments_img/' . 'galleria-duomo.jpg',
                'latitude' => 45.46482,
                'longitude' => 9.19515,
                'number_of_rooms' => 4,
                'number_of_beds' => 4,
                'number_of_baths' => 3,
                'square_metres' => 68,
                'slug' => Str::slug('INTOMILAN Aparthotel Galleria Duomo'),
            ],
        ];

        foreach ($samples as $sample) {
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