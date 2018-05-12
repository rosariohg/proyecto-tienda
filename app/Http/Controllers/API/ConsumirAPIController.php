<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConsumirAPIRequest;
use App\Http\Requests\API\UpdateConsumirAPIRequest;
use App\Models\Consumir;
use App\Repositories\ConsumirRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConsumirController
 * @package App\Http\Controllers\API
 */

class ConsumirAPIController extends AppBaseController
{
    /** @var  ConsumirRepository */
    private $consumirRepository;

    public function __construct(ConsumirRepository $consumirRepo)
    {
        $this->consumirRepository = $consumirRepo;
    }

    /**
     * Display a listing of the Consumir.
     * GET|HEAD /consumirs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumirRepository->pushCriteria(new RequestCriteria($request));
        $this->consumirRepository->pushCriteria(new LimitOffsetCriteria($request));
        $consumirs = $this->consumirRepository->all();

        return $this->sendResponse($consumirs->toArray(), 'Consumirs retrieved successfully');
    }

    /**
     * Store a newly created Consumir in storage.
     * POST /consumirs
     *
     * @param CreateConsumirAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumirAPIRequest $request)
    {
        $input = $request->all();

        $consumirs = $this->consumirRepository->create($input);

        return $this->sendResponse($consumirs->toArray(), 'Consumir saved successfully');
    }

    /**
     * Display the specified Consumir.
     * GET|HEAD /consumirs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Consumir $consumir */
        $consumir = $this->consumirRepository->findWithoutFail($id);

        if (empty($consumir)) {
            return $this->sendError('Consumir not found');
        }

        return $this->sendResponse($consumir->toArray(), 'Consumir retrieved successfully');
    }

    /**
     * Update the specified Consumir in storage.
     * PUT/PATCH /consumirs/{id}
     *
     * @param  int $id
     * @param UpdateConsumirAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumirAPIRequest $request)
    {
        $input = $request->all();

        /** @var Consumir $consumir */
        $consumir = $this->consumirRepository->findWithoutFail($id);

        if (empty($consumir)) {
            return $this->sendError('Consumir not found');
        }

        $consumir = $this->consumirRepository->update($input, $id);

        return $this->sendResponse($consumir->toArray(), 'Consumir updated successfully');
    }

    /**
     * Remove the specified Consumir from storage.
     * DELETE /consumirs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Consumir $consumir */
        $consumir = $this->consumirRepository->findWithoutFail($id);

        if (empty($consumir)) {
            return $this->sendError('Consumir not found');
        }

        $consumir->delete();

        return $this->sendResponse($id, 'Consumir deleted successfully');
    }
}
