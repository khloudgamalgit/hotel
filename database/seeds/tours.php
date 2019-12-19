<?php

use App\tour;

use Illuminate\Database\Seeder;
use Carbon\carbon;


class tours extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0;$i<10;$i++){

        $tour = new tour();
        $tour->title = "voyage".rand(0,9);
        $tour->description = "This trip is a free journey".rand(0,9);
        $tour->country_id = 1;
        $tour->city_id = 1;
        $tour->created_at = carbon::now();
        $tour->save();
       }
    }
}
