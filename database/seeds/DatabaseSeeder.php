<?php

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
        $this->call(TransportsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(BidsTableSeeder::class);
    }
}
