<?php

use App\Models\Apartment;
use App\User;
use App\Models\Service;
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
                'description' => 'My place is close to great panoramic views,verdant chestnut groves,great restaurants, and family activities. Numerous archaeological sites and places of high cultural interest. You will love the house for its comfort and elegant furnishings care. My place is on the second floor and is good for couples, lonely adventurers, business travelers, and families (with kids). Rome can be reached in 40 minutes by car, bus and train.',
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
                'description' => 'Large, bright apartment for 6/11 people in an elegant and quiet residential area close to the fascinating district of Trastevere. Four bedrooms, kitchen, living room, two bathrooms. Air conditioning, internet wi-fi, dishwasher, TV, whashing-machine (On request: baby cot free-of-charges).
                Comfortable, spacious apartment for 6 to 11 people a few steps away from Trastevere station (train terminal to / from Fiumicino airport). Full of light, quiet (even though it is situated in close proximity to Rome’s thriving old centre), the apartment is on the 3rd floor of a 1930’s building (with lift). It has been redecorated and furnished with care. It has a spacious living room with double sofa bed, a fully furnished kitchen (dishwasher, washing machine, fridge freezer, oven and 4 burner stove), 1 bedroom with king-size bed, 1 bedroom with queen-size bed, 1 bedroom with a bunk-bed, 1 small bedroom with a queen-size bed, two bathrooms (one with shower and one with double sink and tub) and a balcony. The apartment is equipped with: TV, air conditioning in every room (available at an additional fee of 9 euros per day), iron and ironing board; baby’s cot (free-of-charges) on request.

                The price includes: central heating, electricity consumption, check-in and initial and final cleaning.
                - Linen is not included in the price, you can bring it you, or we can supply it to us. In the latter case, the price is: Sheets and pillowcases + pair of towels (bath towel + face towel) 6 euro per person.
                - For the use of air conditioning we ask a contribution of EUR 9 per day.
                - Touristic tax: 3,5 euro/day per person (children less than 10 years old excluded).

                Within the apartment’s immediate surroundings you’ll find everything you might need: cafes, supermarkets, banks, restaurants, pharmacies etc...',
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
                'description' => 'IT
                Bright and cozy two-room apartment for up to 4 people, this apartment is ideal for both tourist and business stays. L’appartamento è dotato di self check in.

                EN
                Bright and welcoming two-room apartment able to accommodate up to 4 people, this apartment is ideal for tourist or business. The apartment is equipped with self check in.
                The space
                IT
                Bright and cozy two-room apartment for up to 4 people, this apartment is ideal for both tourist and business stays. The apartment is equipped with self check in.
                The apartment consists of an equipped dining area and kitchen equipped with kitchen utensils, washing machine, dishwasher refrigerator, toaster bread, kettle, microwave oven and a double sofa bed. The bedroom has a double bed and wardrobe. Tiled bathroom with large shower, linen and hairdryer. Other accessories available: A/C, 40 inch flat screen TV, free WiFi, Netflix.
                A few minutes from Gambara red metro stop.
                Bus 80 walking distance to San Siro stadium or Rossa De Angeli metro stop
                CIR: 015146-CNI-03391. The Identification Code of Recognition is a code that certifies the safety and regularity of this accommodation facility at the Municipality of Milan, the Lombardy Region and the Italian State. This guarantees you a high standard of reception and hospitality services and compliance with the necessary requirements provided by Italian law.
                PLEASE NOTE: - All guest IDs must be sent immediately after booking - The apartment is equipped with self check in
                Pets are not
                allowed Smoking is forbidden
                No disturbance to the Condominium neighbors with shouts, songs, sounds, dances or other, operate radio, sound reproduction, high tone televisions, with the precision that after 22 hours sounds and songs are forbidden
                EN
                Bright and welcoming two-room apartment able to accommodate up to 4 people, this apartment is ideal for tourist or business. The apartment is equipped with self check in.
                The apartment consists of an equipped dining area and kitchen equipped with kitchen utensils, washing machine, dish washer,refrigerator, toaster, kettle, microwave and a double sofa bed. The bedroom has a double bed and wardrobe. Tiled bathroom with large shower, linen and hairdryer. Other accessories available: A / C, 40 inch flat screen TV, free wifi.
                CIR: 015146-CNI-03391. The Identification Identification Code is a code that certifies the safety and regularity of this accommodation facility in the Municipality of Milan, the Lombardy Region and the Italian State. This guarantees you a high standard of reception and hospitality services and compliance with the necessary requirements provided by Italian law.
                PUBBLIC TRANSPORT AVAILABILITY
                few minutes walk to reach Metro Station "Gambara", red one.
                Closer bus n°80 to reach San Siro Stadium and red metro station De Angeli.
                PLEASE NOTE: - All guests\' identity documents must be sent immediately after booking - The apartment is equipped with self check in.
                Pets are not allowed
                Smoking is forbidden
                It is forbidden to disturb neighboring condominiums with crowds, songs, sounds, dances or other, to operate radio equipment, to reproduce sounds, high-toned televisions, with the precision that after 10 pm noises and songs are forbidde.n',
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
                'description' => 'Between M1 (between the fork) and M5 metro lines, just out the center, the house is situated in a strategic position for all kind of travel: in 10 - 20 min you can reach duomo, navigli, isola and his skyscrapers, cadorna castello, fiera milano and san siro stadium (10 min walking).
                It\'s good for those traveling for business or for a pleasant stay with your partner or family.
                The apartment is on 3rd floor of 8 floors building. Just renovated! Is 48 squares meters divided into two main rooms: a living (with kitchen and a sofa double bed) and a bedroom (with double bed).

                The house is perfect for couples with or without children (there is also a small folding bed), for 3 people or, if you are 2 couples and want save money and don\'t have problem in sharing spaces, this house is the best.

                Everything you need, you\'ll find it!

                I forgot to write it down, there is a bathroom with a shower!
                Other things to note
                200 metres far is a payment parking lot. If you want I can reserve for you.

                Tourist Tax:
                In Milan, if you are after 18, Airbnb collect 3€ per day for the first 14 days. This tax is included in airbnb.',
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
                'description' => 'COMPLETELY INDEPENDENT APARTMENT IDEAL FOR FAMILIES AND GROUP OF FRIENDS!

                The apartment “Il Magnifico" is on the 2nd floor of a Florentine building that dates back to the 19th century. It is very close to the Historical center, but just outside the restricted traffic zone. It also has a lift and a reserved car space.
                The space
                The apartment is composed of a living/dining room with satellite TV, kitchen with dining table, freezer, oven, microwave, store-room with washing machine, access to an internal terrace, 1 double bedroom, 1 bathroom with bath/shower, another small living room with single sofa bed and mezzanine with double bedroom or, if required two single beds. The apartment surrounding is peaceful as it faces an internal courtyard. The apartment has heating, air conditioning and Wi-Fi internet connection.
                Other things to note
                Child bed are free',
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
                'description' => 'The house is located a stone\'s throw from Ponte Vecchio, Palazzo Pitti and Boboli garden, on the road that leads to Forte Belvedere. Located in the historic center of the city, just a ten-minute walk from the Duomo, Piazza della Signoria and the Uffizi Gallery. With a private entrance, it can accommodate up to four people. It consists of a double bedroom, a living room with double sofa bed, a bathroom and a kitchen, fully furnished with the greatest comfort.
                Other things to note
                " As per Legislative Decree 229/2021 ( OJ 309 30/12/21 ), access to the accommodation will be allowed only to subjects with a" reinforced "Green Pass.
                The guidelines for the reopening of economic and social activities ( OJ 290 of 6/12 ), have listed short leases among the receptive activities that provide for the obligation of Green Pass  (in relation to Legislative Decree 172/2021 ).
                Upon arrival, we will need to verify your stronger green pass with the "C 19 " verification app and only allow access to those who will have it.',
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
                'description' => 'In the heart of the city just five minutes from Rialto and San Marco a large apartment ideal for those who want a quiet place in the center. Close to the market, the taverns and the characteristic bacari. Supermarket and bakeries within walking distance.
                Enjoy a bright and panoramic living room with comfortable sofa and tv. One double bedroom and one twin bedroom with tv. The kitchen is equipped with microwave, espresso machine, kettle, toaster. The bathroom comes with a hairdryer, washer and dryer. Iron.
                Guest access
                Guests have access to the entire apartment.
                Other things to note
                The apartment is on one level on the third floor.',
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
                'description' => 'Home is located in heart of Venice , in cannaregio near to Guglie bridge, near to touristic spots but in a quiet residential zone far from tourists traffic Good access to many good bar,restaurants and supermarkets. 20 minutes by walk from train station and 3 minutes by walk from waterbus stop.
                Upon arrival, passport photo and city tax (€ 3 per person in cash) are required.
                Our address is: Sestiere Cannaregio, Calle del sotoportego Scuro, 1002A',
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
                'description' => 'Casa Celeste is located in a strategic and widely served position of the city and is ideal for any type of stay: tourist, to walk among the old buildings of the historic center and visit the most fascinating sites and monuments of Catania, or to leave for the numerous places of natural interest in the surroundings, as well as for professional purposes.
                The loft is cozy and welcoming with cozy, functional, and well-equipped spaces for a comfortable and enjoyable stay.
                Located on the second non-elevated floor of a typical building in the historic centre of Catania, the apartment can accommodate up to four people and consists of a practical hallway entrance with coat rack and shoe rack; a living area with fully equipped kitchen (including fridge, freezer, oven, complete set of crockery and cutlery, coffee maker, kettle, juicer), living area with double sofa bed, dining table, TV and DVD player with attached small selection of movies and cartoons.
                Bathroom with shower, hairdryer and dispenser with hand soap, body soap and shampoo.
                Laundry with washing machine at your disposal, as well as iron and ironing board.
                Double bedroom on mezzanine with large wardrobe and comfortable two-seater sofa.
                Smoking is not allowed inside the home. A pretty balcony overlooking the entrance road, via Celeste, overlooking Mount Etna, can be used as a smoking area.
                The environment is heat-cold air conditioned. Free WiFi access.
                There are also a variety of games to entertain adults and children and a few books for your moments of relaxation.
                For your safety, you will find an emergency room cabinet and a fire extinguisher inside the apartment.
                Possibility of free unattended parking.',
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
                'description' => 'It is located in Catania, in a strategic position, a few hundred meters from the central metro station, the Le Ciminiere Exhibition Centre, Piazza Duomo,and Corso Italia, famous shopping street Catanese. In addition, just a few meters from the ABC,Brancati and Musco Theatres.
                This holiday home has 2 bedrooms, flat-screen TV, dining area, kitchen, microwave, and living.The property also has 2 bathrooms, but only one with shower.Garage available
                Guest access
                Entire apartment
                Other things to note
                Tourist tax, €2 per person per day, payable on arrival in the apartment.',
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
                'description' => 'The apartment is located in the Villanova neighborhood. This is one of the four historic neighborhoods of Cagliari that make up the city center.
                Close to the pedestrian shopping area, to all the city\'s cultural centers, to the Saint Remy bastion. Nearby are the oldest churches in the city, including the church of San Saturnino. Very close to the marina and all the city\'s historic centers of interest. Although the street is in the central area, it has free free parking',
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
                'description' => 'Discover Cagliari\'s true life by staying in a corner that recalls centuries of history. Ancient traces such as arches and exposed beams are complemented by memorabilia and furnishings from different eras, which merge into a hospitable embrace suspended over time.
                The apartment overlooks a condominium courtyard where there is also a small table for breakfast or an outdoor aperitif.
                For smart working, the internet line is fibre with speeds of up to 1 Gigabit',
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
                'description' => 'Located on the top of the hill. Less than 5 minutes from Ponte Tresa lake! You\'ll find there a spectacular view from the window
                This romantic place would be perfect for couples! This room has been completely renovated. We offer you a fusion of ancient Italian architecture and modern interior.

                Equipment:
                double bed,
                fully equipped kitchen,
                dishwasher,
                cooker,
                oven,
                bathroom with toilet,
                dining table,
                amazing view from the window,
                evening silence,
                good sleep,
                towels, bed linen,
                free WIFI.',
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
                'description' => 'A warm welcome to all my guests!
                (NB: you\'ll have your own bed in the shared bedroom with myself, so, male guests only).
                Probably the BEST place for the BEST price in the BEST location! Very central and easy to reach. Only 300 metres from Duomo Metro station in a quiet side street.
                A very comfortable wide bed, fast WiFi., a wardrobe, desk and swivvel chair. Clean sheets, towels and toiletries. Check-in / check-out times are flexible.
                If the calendar\'s open, you can book instantly!',
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
                'description' => 'The flat is inside a typical Lombard Court dated back to 1500.
                The guests rent it exclusively
                It has 2 bedrooms, living-room with an open kitchen, bathroom with shower and washing-machine. 4 guests confortably accomaded.
                Fully furnished with crockery and cutlery, pans, toaster and kettle, cooking-gas, electric-oven or microwave, fridge for a confortable stay. Wi-Fi included, free car park inside.
                No smoking flat. If you are a smoker you can always smoke outside in the courtyard.
                Mosquito nets',
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
                'description' => 'The warm and welcoming house furnished in a classic way is populated by the thousand horses that give the name,
                represent the different people who meet in life and the powerful engine of the famous Ferrari that showcases its power every year in the nearby city of Monza.
                For these reasons, the small studio is ideal as a starting point for excursions of all kinds.',
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
                'description' => 'Apartment located in the center of the city, in front of the Atm parking of the buses that connect Monza, Milan, Trezzo sull \'Adda, Arcore and Carnate train station. It is within walking distance of the major serves: bars, restaurants, supermarkets. Just a 15-minute walk to Vimercate\'s new hospital, there is also a shuttle service in front of the house. A few hundred meters away is the junction of the eastern ring road, through which you can reach any direction by car',
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
                'description' => 'The apartment is located in the heart of Crema Old Town, located on a quiet characteristic street within a 1500\'s palace. It has private access and views of the courtyard, high ceilings and exposed beams. It is a spacious and modern open space (renovated in January 2018), consisting of a living room with open kitchen and double sofa bed (comfortable, personally tested) and bathroom with shower. All in a really warm atmosphere!',
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
                'description' => 'Hi, I\'m renting out the bedroom in my apartment. I can not give availability for the kitchen but in the room there is a minifridge and a kettle and what you need for breakfast. I have 4 cats running around the house, this means that it is very easy to find them everywhere (this is why the room must remain closed), 2 rabbits and a 6kg dog. Even though I clean well, there\'s always hair around, so keep in mind that the standards of cleanliness will never be 5 stars.',
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
                'description' => 'Double room in a 100 sq. m. flat (in the apartment there is another double room). Characteristic building located in Piazza XXV Aprile, Corso Como/Garibaldi, a strategic location with trendy bars and restaurants.
                Very well connected by public transportation.',
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
            //create apartment istance and save mock data
            $apartment = new Apartment();
            $apartment->title = $sample['title'];
            $apartment->description = $sample['description'];
            $apartment->address = $sample['address'];
            $apartment->thumbnail = $sample['thumbnail'];
            $apartment->latitude = $sample['latitude'];
            $apartment->longitude = $sample['longitude'];
            $apartment->number_of_rooms = $sample['number_of_rooms'];
            $apartment->number_of_beds = $sample['number_of_beds'];
            $apartment->number_of_baths = $sample['number_of_baths'];
            $apartment->square_metres = $sample['square_metres'];
            $apartment->slug = $sample['slug'];
            //save apartment record
            $apartment->save();
        }
        //assign apartment to user
        if (User::exists()) {
            User::first()->apartment()->saveMany(Apartment::all());
        } else {
            info('No users in database. Apartments will not be assigned to any user.');
        };
    }
}