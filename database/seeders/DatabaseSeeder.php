<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([SettingSeeder::class]);
//        $this->call([RolesAndPermissions::class]);
        $this->call([HistorySeeder::class]);

//        $adminUser = User::factory()->create([
//            'name' => 'Admin User',
//            'email' => 'admin@dev.com',
//            'password' => Hash::make('admin123'),
//        ]);
////        $adminUser->assignRole('admin');
//
//        $developerUser = User::factory()->create([
//            'name' => 'Developer User',
//            'email' => 'developer@dev.com',
//            'password' => Hash::make('developer123'),
//        ]);
//
       User::factory()->create([
            'name' => 'Albert',
            'email' => 'alberthaciverdiyev55@gmail.com',
            'password' => Hash::make('albert'),
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@hovsanport.az',
            'password' => Hash::make('hovsanport'),
        ]);
////        $developerUser->assignRole('developer');
//
//        $normalUser = User::factory()->create([
//            'name' => 'Normal User',
//            'email' => 'user@dev.com',
//            'password' => Hash::make('user123'),
//        ]);
//        $normalUser->assignRole('user');
    }
}
