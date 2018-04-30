<?php

namespace App\Repositories;

use App\Models\Consumo;
use InfyOm\Generator\Common\BaseRepository;

class ConsumoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'consumo_id',
        'descripcion',
        'cantidad',
        'precioUnitario',
        'precioTotal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Consumo::class;
    }
}
