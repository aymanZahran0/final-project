<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'Name'=>'Tut pyramids view',
                'image'=>'public/images/hotels/Tutpyramidsview.jpg',

            ],
            [
                'name'=>'Hilton Cairo Heliopolis Hotel',
                'image'=>'public/images/hotels/hiltoncairohelioplishotel.jpg',

            ],
            [
                'name'=>'Jewel zamalek Hotel',
                'image'=>'public/images/hotels/jewelzamalekhotel.jpg',

            ],
            [
                'name'=>'Grand Nile Tower',
                'image'=>'public/images/hotels/grandniletower.jpg',

            ],
            [
                'name'=>'Turquoise pyramids & Grand Egyptian museum view hotel',
                'image'=>'public/images/hotels/TurquoiseHotel.jpg',

            ],
            [

                'name'=>'intercontinentalCairosemiramis',
                'image'=>'public/images/hotels/intercontinentalCairosemiramis.jpg',

            ],

        ]);

        DB::table('tourists')->insert([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'SSN' => '13568484',
            'gender' => 'male',
            'phone' => '316456843156',
        ]);
    }
}
