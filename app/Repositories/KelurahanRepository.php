<?php

namespace App\Repositories;

use App\Models\Kelurahan;
use App\Repositories\BaseRepository;

/**
 * Class KelurahanRepository
 * @package App\Repositories
 * @version July 27, 2020, 1:12 pm UTC
*/

class KelurahanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'alamat',
        'lat',
        'lang',
        'kecamatan_id'
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
        return Kelurahan::class;
    }
}
