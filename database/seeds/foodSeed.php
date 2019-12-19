<?php

use App\foods;

use Illuminate\Database\Seeder;
use Carbon\carbon;


class foodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0;$i<10;$i++){

        $food = new foods();
        $food->name = "pitza".rand(0,9);
        $food->room_id = 2;
        $food->created_at = carbon::now();
        $food->save();
       }
    }
}
