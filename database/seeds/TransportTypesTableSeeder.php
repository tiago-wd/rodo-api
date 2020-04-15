<?php

use App\Models\TransportType;
use Illuminate\Database\Seeder;

class TransportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TransportType::class, 30)->create();
    }
}
