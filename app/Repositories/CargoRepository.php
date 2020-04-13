<?php

namespace App\Repositories;

use App\Models\Cargo;
use App\Repositories\BaseRepository;

/**
 * Class CargoRepository
 * @package App\Repositories
 * @version April 13, 2020, 1:19 pm UTC
*/

class CargoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'weight',
        'price',
        'from_where',
        'to_where'
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
        return Cargo::class;
    }
}
