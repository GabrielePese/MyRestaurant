<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Simone',
            'email' => 'simone@gmail.com',
            'password' => Hash::make('editorialecec'),
            'admin' => 0
        ]);
    }
}
