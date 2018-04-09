<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductoAPIRequest;
use App\Http\Requests\API\UpdateProductoAPIRequest;
use App\Models\Producto;
use App\Repositories\ProductoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductoController
 * @package App\Http\Controllers\API
 */

class ProductoAPIController extends AppBaseController
{
    /** @var  ProductoRepository */
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * Display a listing of the Producto.
     * GET|HEAD /productos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productoRepository->pushCriteria(new RequestCriteria($request));
        $this->productoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productos = $this->productoRepository->all();

        return $this->sendResponse($productos->toArray(), 'Productos retrieved successfully');
    }

    /**
     * Store a newly created Producto in storage.
     * POST /productos
     *
     * @param CreateProductoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoAPIRequest $request)
    {
        $input = $request->all();

        $productos = $this->productoRepository->create($input);

        return $this->sendResponse($productos->toArray(), 'Producto saved successfully');
    }

    /**
     * Display the specified Producto.
     * GET|HEAD /productos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Producto $producto */
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        return $this->sendResponse($producto->toArray(), 'Producto retrieved successfully');
    }

    /**
     * Update the specified Producto in storage.
     * PUT/PATCH /productos/{id}
     *
     * @param  int $id
     * @param UpdateProductoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Producto $producto */
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        $producto = $this->productoRepository->update($input, $id);

        return $this->sendResponse($producto->toArray(), 'Producto updated successfully');
    }

    /**
     * Remove the specified Producto from storage.
     * DELETE /productos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Producto $producto */
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        $producto->delete();

        return $this->sendResponse($id, 'Producto deleted successfully');
    }
}
