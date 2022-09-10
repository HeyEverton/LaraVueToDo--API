<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'Everton',
            'last_name' => 'Henrique',
            'email' => 'everton@everton.com',
            'password' => bcrypt('123456789')
        ]);
        User::factory(5)->create();
    }
}
