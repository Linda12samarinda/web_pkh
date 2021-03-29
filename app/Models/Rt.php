<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Rt
 * @package App\Models
 * @version July 27, 2020, 1:12 pm UTC
 *
 * @property \App\Models\Kelurahan $kelurahan
 * @property \Illuminate\Database\Eloquent\Collection $bpnts
 * @property string $name
 * @property string $alamat
 * @property number $lat
 * @property number $lang
 * @property integer $kelurahan_id
 */
class Rt extends Model
{

    public $table = 'rt';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'alamat',
        'lat',
        'lang',
        'kelurahan_id'
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
        'kelurahan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kelurahan_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kelurahan()
    {
        return $this->belongsTo(\App\Models\Kelurahan::class, 'kelurahan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bpnts()
    {
        return $this->hasMany(\App\Models\Bpnt::class, 'rt_id');
    }
}
