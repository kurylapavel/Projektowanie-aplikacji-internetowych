<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        //definition::factory->count(1)->create();

        DB::table('users')
        ->insert([
            'name' => 'Root',
            'surname' => 'Admin',
            'email' => 'root@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Root'), 
            'isActivated' => 1, 
            'isAdmin' => 1, 
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
