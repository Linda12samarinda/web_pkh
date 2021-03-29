<?php

namespace App\Repositories;

use App\Models\Kecamatan;
use App\Repositories\BaseRepository;

/**
 * Class KecamatanRepository
 * @package App\Repositories
 * @version July 27, 2020, 1:11 pm UTC
*/

class KecamatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'alamat',
        'lat',
        'lang'
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
        return Kecamatan::class;
    }
}
