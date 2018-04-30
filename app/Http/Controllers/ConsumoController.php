<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsumoRequest;
use App\Http\Requests\UpdateConsumoRequest;
use App\Repositories\ConsumoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConsumoController extends AppBaseController
{
    /** @var  ConsumoRepository */
    private $consumoRepository;

    public function __construct(ConsumoRepository $consumoRepo)
    {
        $this->consumoRepository = $consumoRepo;
    }

    /**
     * Display a listing of the Consumo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumoRepository->pushCriteria(new RequestCriteria($request));
        $consumos = $this->consumoRepository->all();

        return view('consumos.index')
            ->with('consumos', $consumos);
    }

    /**
     * Show the form for creating a new Consumo.
     *
     * @return Response
     */
    public function create()
    {
        return view('consumos.create');
    }

    /**
     * Store a newly created Consumo in storage.
     *
     * @param CreateConsumoRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumoRequest $request)
    {
        $input = $request->all();

        $consumo = $this->consumoRepository->create($input);

        Flash::success('Consumo saved successfully.');

        return redirect(route('consumos.index'));
    }

    /**
     * Display the specified Consumo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consumo = $this->consumoRepository->findWithoutFail($id);

        if (empty($consumo)) {
            Flash::error('Consumo not found');

            return redirect(route('consumos.index'));
        }

        return view('consumos.show')->with('consumo', $consumo);
    }

    /**
     * Show the form for editing the specified Consumo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consumo = $this->consumoRepository->findWithoutFail($id);

        if (empty($consumo)) {
            Flash::error('Consumo not found');

            return redirect(route('consumos.index'));
        }

        return view('consumos.edit')->with('consumo', $consumo);
    }

    /**
     * Update the specified Consumo in storage.
     *
     * @param  int              $id
     * @param UpdateConsumoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumoRequest $request)
    {
        $consumo = $this->consumoRepository->findWithoutFail($id);

        if (empty($consumo)) {
            Flash::error('Consumo not found');

            return redirect(route('consumos.index'));
        }

        $consumo = $this->consumoRepository->update($request->all(), $id);

        Flash::success('Consumo updated successfully.');

        return redirect(route('consumos.index'));
    }

    /**
     * Remove the specified Consumo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consumo = $this->consumoRepository->findWithoutFail($id);

        if (empty($consumo)) {
            Flash::error('Consumo not found');

            return redirect(route('consumos.index'));
        }

        $this->consumoRepository->delete($id);

        Flash::success('Consumo deleted successfully.');

        return redirect(route('consumos.index'));
    }
}
