<?php

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $Sections = [
            ['en' => 'Educational Support', 'ar' => 'دعم تعليمي'],
            ['en' => 'Psychological Support', 'ar' => 'دعم نفسي'],
            ['en' => 'Speech and Language Therapy', 'ar' => ' نطق وتخاطب'],
            ['en' => 'Learning Difficulties' , 'ar' => 'صعوبات تعلم'],
            ['en' => 'Inclusion of Children with Special Needs' , 'ar' => ' دمج الاطفال ذوي الاحتياجات الخاصة'],

        ];

        foreach ($Sections as $section) {
            Section::create([
                'Name_Section' => $section,
                'Status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Class_id' => ClassRoom::all()->unique()->random()->id
            ]);
        }
    }
}
