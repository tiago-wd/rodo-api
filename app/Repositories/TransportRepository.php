<?php

namespace App\Repositories;

use App\Models\Transport;
use App\Repositories\BaseRepository;

/**
 * Class TransportRepository
 * @package App\Repositories
 * @version April 9, 2020, 6:27 pm UTC
*/

class TransportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'brand',
        'color',
        'plate'
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
        return Transport::class;
    }
}
