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
        $this->call([SettingSeeder::class]);

       User::factory()->create([
            'name' => 'Albert',
            'email' => 'alberthaciverdiyev55@gmail.com',
            'password' => Hash::make('aer12!@*HU>@!t'),
        ]);
        User::factory()->create([
            'name' => 'Zhala',
            'email' => 'zhala@jobing.az',
            'password' => Hash::make('zha!@la!@3$^&gvc'),
        ]);

    }
}
