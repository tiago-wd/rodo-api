<?php

use App\Models\CargoType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCargoTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cargoTypes = [
            'Carga Geral',
            'Carga a Granel',
            'Carga Neogranel',
            'Carga Frigorificada',
            'Carga Perigosa',
        ];

        foreach($cargoTypes as $cargoType) {
            CargoType::create(['name' => $cargoType]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        CargoType::truncate();
    }
}
