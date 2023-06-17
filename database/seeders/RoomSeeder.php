<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            ['hotel_id'=>1,
            'type'=> 'single',
            'image' => 'public/images/hotels/Tut_pyramids_view/single.jpg',

            ],
            ['hotel_id'=>1,
            'type'=> 'double',
            'image' => 'public/images/hotels/Tut_pyramids_view/double.jpg',

            ],
            ['hotel_id'=>1,
            'type'=> 'trible',
            'image' => 'public/images/hotels/Tut_pyramids_view/triple.jpg',

            ],
            ['hotel_id'=>2,
            'type'=> 'single',
            'image' => 'public/images/hotels/hilton/single.jpg',

            ],
            ['hotel_id'=>2,
                'type'=> 'double',
                'image' => 'public/images/hotels/hilton/double.jpg',

            ],
            ['hotel_id'=>2,
            'type'=> 'trible',
            'image' => 'public/images/hotels/hilton/large.jpg',

            ],
            ['hotel_id'=>3,
            'type'=> 'single',
            'image' => 'public/images/hotels/jewel_zamalek_hotel/single.jpg',

            ],
            ['hotel_id'=>3,
                'type'=> 'double',
                'image' => 'public/images/hotels/jewel_zamalek_hotel/double.jpg',

            ],
            ['hotel_id'=>3,
            'type'=> 'trible',
            'image' => 'public/images/hotels/jewel_zamalek_hotel/triple.jpg',

            ],
            [   'hotel_id'=>4,
                'type'=> 'single',
                'image' => 'public/images/hotels/gran_nile_tower/single.jpg',
            ],
            ['hotel_id'=>4,
                'type'=> 'double',
                'image' => 'public/images/hotels/gran_nile_tower/double.jpg',

            ],

            ['hotel_id'=>5,
            'type'=> 'single',
            'image' => 'public/images/hotels/Turquoise_Hotel/single.jpg',

            ],
            ['hotel_id'=>5,
            'type'=> 'double',
            'image' => 'public/images/hotels/Turquoise_Hotel/double.jpg',

            ],
            ['hotel_id'=>5,
            'type'=> 'trible',
            'image' => 'public/images/hotels/Turquoise_Hotel/triple.jpg',

            ],

            ['hotel_id'=>6,
            'type'=> 'single',
            'image' => 'public/images/hotels/intercontinental/trible.jpg',

            ],
            ['hotel_id'=>6,
            'type'=> 'double',
            'image' => 'public/images/hotels/intercontinental/trible.jpg',

            ],
            ['hotel_id'=>6,
            'type'=> 'trible',
            'image' => 'public/images/hotels/intercontinental/suite.jpg',

            ],
        ]);
    }
}
