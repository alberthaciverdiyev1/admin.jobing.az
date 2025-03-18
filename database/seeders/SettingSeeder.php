<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        if (DB::table('settings')->where('id', '>', 0)->exists()) {
//            DB::table('settings')->where('id', '>', 0)->delete();
//        }
        DB::table('settings')->insert([
            'phone_number_1' => '+1 (800) 123-4567',
            'email' => 'info@example.com',
            'address' => '1234 Elm Street, Springfield, IL',
            'google_map_location' => 'https://maps.google.com/?q=1234+Elm+Street,Springfield,IL',
            'instagram_url' => 'https://instagram.com',
            'facebook_url' => 'https://facebook.com',
            'logo' => null,
            'favicon' => null,
        ]);

//        DB::table('ceos')->insert([
//            'description' => '*',
//        ]);
    }
}
