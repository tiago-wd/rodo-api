<?php

use App\Models\TransportType;
use Illuminate\Database\Migrations\Migration;

class AddTransportTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $transportTypes = [
            'Caminhão de 3,5T a 8T',
            'Caminhão de 8T a 29T',
            'Caminhão Trator',
            'Caminhão Trator Especial',
            'Caminhonete/Furgão até 3,5T',
            'Reboque',
            'Semirreboque',
            'Bi-truck',
            'Semirreboque especial',
            'Utilitário leve (VUC)',
            'Operacional de apoio (veículo leve)'
        ];

        foreach($transportTypes as $transportType) {
            TransportType::create(['name' => $transportType]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        TransportType::truncate();
    }
}
