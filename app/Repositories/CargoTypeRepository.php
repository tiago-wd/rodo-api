<?php

namespace App\Repositories;

use App\Models\CargoType;
use App\Repositories\BaseRepository;

/**
 * Class CargoTypeRepository
 * @package App\Repositories
 * @version April 13, 2020, 1:00 pm UTC
*/

class CargoTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CargoType::class;
    }
}
