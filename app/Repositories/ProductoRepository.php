<?php

namespace App\Repositories;

use App\Models\Producto;
use InfyOm\Generator\Common\BaseRepository;

class ProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'codigo',
        'cantidad',
        'precio',
        'imagen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Producto::class;
    }
}
