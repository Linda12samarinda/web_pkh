<?php

namespace App\Repositories;

use App\Models\Rt;
use App\Repositories\BaseRepository;

/**
 * Class RtRepository
 * @package App\Repositories
 * @version July 27, 2020, 1:12 pm UTC
*/

class RtRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'alamat',
        'lat',
        'lang',
        'kelurahan_id'
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
        return Rt::class;
    }
}
