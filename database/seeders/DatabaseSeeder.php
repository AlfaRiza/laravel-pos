<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alfa',
            'email' => 'malfariza45@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => 0
        ]);

        User::create([
            'name' => 'Alam',
            'email' => 'alam@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => 1
        ]);
    }
}
