<?php

use App\Models\Transport;
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
        factory(Transport::class, 30)->create();
    }
}
