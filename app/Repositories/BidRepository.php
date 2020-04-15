<?php

namespace App\Repositories;

use App\Models\Bid;
use App\Repositories\BaseRepository;

/**
 * Class BidRepository
 * @package App\Repositories
 * @version April 15, 2020, 5:10 pm UTC
*/

class BidRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Bid::class;
    }
}
