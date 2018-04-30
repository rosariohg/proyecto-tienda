<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Consumo
 * @package App\Models
 * @version April 30, 2018, 4:22 am UTC
 */
class Consumo extends Model
{
    use SoftDeletes;

    public $table = 'consumos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'consumo_id',
        'descripcion',
        'cantidad',
        'precioUnitario',
        'precioTotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'consumo_id' => 'integer',
        'descripcion' => 'string',
        'cantidad' => 'string',
        'precioUnitario' => 'string',
        'precioTotal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
