<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 * @package App\Models
 * @version May 12, 2018, 7:30 pm UTC
 */
class Producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'cantidad',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre'      => 'string',
        'descripcion' => 'string',
        'foto'        => 'string',
        'cantidad'    => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function consumos()
    {
        return $this->hasMany('App\Models\Consumir');
    }
}
