<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // llamamos al seeder que queremos que se ejecute
        $this->call(UserSeeder::class);


    }
}
