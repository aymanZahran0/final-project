<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('restaurants')->insert([

            [
                'Name'=>'Mezcal Restaurant',
                'Image'=>'public/images/restaurant/Mezcal_Restaurant/main_photo.jpg',
            ],
            [
                'Name' => 'Le Deck Restaurant',
                'Image' =>'public/images/restaurant/Le_Deck_Restaurant/main_photo.jpg'
            ],
            [
                'Name' => 'Piazzini Restaurant',
                'Image' => 'public/images/restaurant/Piazzini_Restaurant/main_photo.jpg'
            ],
            [ 'Name' => 'Hadramawt Antar',
            'Image' => 'public/images/restaurant/Hadramawt_Antar/main_photo.jpg'
            ],
        [
            'Name' => 'Om sherif Restaurant',
            'Image'=>'public/images/restaurant/om_sherif_Restaurant/main_photo.jpg'
        ],
        [
            'Name' => 'El Dahan Restaurant',
            'Image' => 'public/images/restaurant/El_Dahan_Restaurant/main_photo.jpg'
        ],
        [
            'Name' => 'Shalaolao Restaurant',
            'Image' => 'public/images/restaurant/Shalaolao_Restaurant/main.jpg'
        ],
        [
            'Name' => 'Harons Restaurant',
            'Image' => 'public/images/restaurant/Haron’s_Restaurant/main_photo.jpg'
        ],
        [
            'Name' => 'Les Amis restaurant',
            'Image' => 'public/images/restaurant/Les_Amis_restaurant/main.jpg'
        ],
        [
            'Name' => 'Sachi Heliopolis Restaurant',
            'Image' => 'public/images/restaurant/Sachi_Heliopolis/main_photo.jpg'
        ],
        [
            'Name' => 'The Edwards',
            'Image' => 'public/images/restaurant/The_Edward’s/main_photo.jpg'
        ],
        [
            'Name' => 'Garcia Restaurant & Cafe',
            'Image' => 'public/images/restaurant/Garcia_Restaurant/main_photo.jpg'
        ],
        ]);

    }
}
