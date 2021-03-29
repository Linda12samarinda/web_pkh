<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Kelurahan
 * @package App\Models
 * @version July 27, 2020, 1:12 pm UTC
 *
 * @property \App\Models\Kecamatan $kecamatan
 * @property \Illuminate\Database\Eloquent\Collection $rts
 * @property string $name
 * @property string $alamat
 * @property number $lat
 * @property number $lang
 * @property integer $kecamatan_id
 */
class Kelurahan extends Model
{

    public $table = 'kelurahan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'alamat',
        'lat',
        'lang',
        'kecamatan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'alamat' => 'string',
        'lat' => 'float',
        'lang' => 'float',
        'kecamatan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kecamatan_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kecamatan()
    {
        return $this->belongsTo(\App\Models\Kecamatan::class, 'kecamatan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function rts()
    {
        return $this->hasMany(\App\Models\Rt::class, 'kelurahan_id');
    }
}
