<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Kecamatan
 * @package App\Models
 * @version July 27, 2020, 1:11 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $kelurahans
 * @property string $name
 * @property string $alamat
 * @property number $lat
 * @property number $lang
 */
class Kecamatan extends Model
{

    public $table = 'kecamatan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'alamat',
        'lat',
        'lang'
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
        'lang' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kelurahans()
    {
        return $this->hasMany(\App\Models\Kelurahan::class, 'kecamatan_id');
    }
}
