<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
