<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Kategori
 * @package App\Models
 * @version August 4, 2020, 7:46 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bpnts
 * @property \Illuminate\Database\Eloquent\Collection $kecamatans
 * @property \Illuminate\Database\Eloquent\Collection $kelurahans
 * @property \Illuminate\Database\Eloquent\Collection $rts
 * @property string $name
 * @property string $icon
 */
class Kategori extends Model
{

    public $table = 'kategories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string'
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
    public function bpnts()
    {
        return $this->hasMany(\App\Models\Bpnt::class, 'kategories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kecamatans()
    {
        return $this->hasMany(\App\Models\Kecamatan::class, 'kategories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kelurahans()
    {
        return $this->hasMany(\App\Models\Kelurahan::class, 'kategories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function rts()
    {
        return $this->hasMany(\App\Models\Rt::class, 'kategories_id');
    }
}
