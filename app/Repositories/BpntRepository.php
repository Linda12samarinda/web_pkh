<?php

namespace App\Repositories;

use App\Models\Bpnt;
use App\Repositories\BaseRepository;

/**
 * Class BpntRepository
 * @package App\Repositories
 * @version February 18, 2021, 3:30 am UTC
*/

class BpntRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'name_suami',
        'no_kk',
        'alamat',
        'name_ibukandung',
        'no_rek',
        'no_kartu',
        'kriteria_miskin',
        'status',
        'kmp_bpnt',
        'lat',
        'lang',
        'foto_rumah',
        'keterangan',
        'rt_id',
        'kategories_id'
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
        return Bpnt::class;
    }
}
