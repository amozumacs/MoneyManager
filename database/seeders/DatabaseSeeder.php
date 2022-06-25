<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // create an admin user with email admin@library.test and password secret
        User::truncate();
        User::create(array('name' => 'Admin',
                           'email' => 'admin@adminstrator.test', 
                           'password' => bcrypt('secret'),
                           'role' => 1));     
    }
}
