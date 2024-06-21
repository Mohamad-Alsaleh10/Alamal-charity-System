<?php

use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();


        $nationals = [
            [

                'en'=> 'Syrian',
                'ar'=> 'سوري'
            ],
            [

                'en'=> 'arabian',
                'ar'=> 'عربي'
            ],
        ];
        foreach ($nationals as $n) {
            Nationalitie::create(['Name' => $n]);
        }

    }
}
