<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' => '2023-2024'],
            ['key' => 'school_title', 'value' => 'AI'],
            ['key' => 'school_name', 'value' => 'Alamal institute Management System'],
            ['key' => 'end_first_term', 'value' => '01-12-2023'],
            ['key' => 'end_second_term', 'value' => '01-03-2024'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'حمص'],
            ['key' => 'school_email', 'value' => 'info@Alamal.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}
