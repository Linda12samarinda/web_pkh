<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Bpnt
 * @package App\Models
 * @version February 18, 2021, 3:30 am UTC
 *
 * @property \App\Models\Kategory $kategories
 * @property \App\Models\Rt $rt
 * @property string $name
 * @property string $name_suami
 * @property string $no_kk
 * @property string $alamat
 * @property string $name_ibukandung
 * @property string $no_rek
 * @property string $no_kartu
 * @property string $kriteria_miskin
 * @property string $status
 * @property string $kmp_bpnt
 * @property number $lat
 * @property string $lang
 * @property string $foto_rumah
 * @property string $keterangan
 * @property integer $rt_id
 * @property integer $kategories_id
 */
class Bpnt extends Model
{

    public $table = 'bpnt';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'name_suami' => 'string',
        'no_kk' => 'string',
        'alamat' => 'string',
        'name_ibukandung' => 'string',
        'no_rek' => 'string',
        'no_kartu' => 'string',
        'kriteria_miskin' => 'string',
        'status' => 'string',
        'kmp_bpnt' => 'string',
        'lat' => 'float',
        'lang' => 'string',
        'foto_rumah' => 'string',
        'keterangan' => 'string',
        'rt_id' => 'integer',
        'kategories_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rt_id' => 'required',
        'kategories_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rt()
    {
        return $this->belongsTo(\App\Models\Rt::class, 'rt_id');
    }
}
