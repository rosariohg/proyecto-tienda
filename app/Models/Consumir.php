<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Consumir
 * @package App\Models
 * @version May 12, 2018, 8:45 pm UTC
 */
class Consumir extends Model
{
    use SoftDeletes;

    public $table = 'consumirs';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'producto_id',
        'cantidad_total',
        'cantidad_consumo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'producto_id'      => 'integer',
        'cantidad_total'   => 'string',
        'cantidad_consumo' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id');
    }

}
