<?php

use App\drinks;

use Illuminate\Database\Seeder;
use Carbon\carbon;


class drinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0;$i<10;$i++){

        $drink = new drinks();
        $drink->name = "caffe".$i;
        $drink->created_at = carbon::now();
        $drink->save();
       }
    }
}
