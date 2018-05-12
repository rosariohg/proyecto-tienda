<?php

namespace App\Repositories;

use App\Models\Consumir;
use InfyOm\Generator\Common\BaseRepository;

class ConsumirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'producto_id',
        'cantidad_total',
        'cantidad_consumo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Consumir::class;
    }
}
