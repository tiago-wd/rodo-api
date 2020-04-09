<?php

namespace App\Repositories;

use App\Models\TransportType;
use App\Repositories\BaseRepository;

/**
 * Class TransportTypeRepository
 * @package App\Repositories
 * @version April 9, 2020, 6:11 pm UTC
*/

class TransportTypeRepository extends BaseRepository
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
        return TransportType::class;
    }
}
