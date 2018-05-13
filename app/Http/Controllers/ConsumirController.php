<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateConsumirRequest;
use App\Http\Requests\UpdateConsumirRequest;
use App\Models\Producto;
use App\Repositories\ConsumirRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConsumirController extends AppBaseController
{
    /** @var  ConsumirRepository */
    private $consumirRepository;

    public function __construct(ConsumirRepository $consumirRepo)
    {
        $this->consumirRepository = $consumirRepo;
    }

    /**
     * Display a listing of the Consumir.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumirRepository->pushCriteria(new RequestCriteria($request));
        $consumirs = $this->consumirRepository->all();

        return view('consumirs.index')
            ->with('consumirs', $consumirs);
    }

    /**
     * Show the form for creating a new Consumir.
     *
     * @return Response
     */
    public function create()
    {
        $productos = Producto::pluck('nombre', 'id');
        return view('consumirs.create', compact('productos'));
    }

    /**
     * Store a newly created Consumir in storage.
     *
     * @param CreateConsumirRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumirRequest $request)
    {
        $input = $request->all();

        $consumir = $this->consumirRepository->create($input);

        Flash::success('Consumir saved successfully.');

        return redirect(route('consumirs.index'));
    }

    /**
     * Display the specified Consumir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consumir = $this->consumirRepository->findWithoutFail($id);

        if (empty($consumir)) {
            Flash::error('Consumir not found');

            return redirect(route('consumirs.index'));
        }

        return view('consumirs.show')->with('consumir', $consumir);
    }

    /**
     * Show the form for editing the specified Consumir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consumir = $this->consumirRepository->findWithoutFail($id);

        if (empty($consumir)) {
            Flash::error('Consumir not found');

            return redirect(route('consumirs.index'));
        }

        return view('consumirs.edit')->with('consumir', $consumir);
    }

    /**
     * Update the specified Consumir in storage.
     *
     * @param  int              $id
     * @param UpdateConsumirRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumirRequest $request)
    {
        $consumir = $this->consumirRepository->findWithoutFail($id);

        if (empty($consumir)) {
            Flash::error('Consumir not found');

            return redirect(route('consumirs.index'));
        }

        $consumir = $this->consumirRepository->update($request->all(), $id);

        Flash::success('Consumir updated successfully.');

        return redirect(route('consumirs.index'));
    }

    /**
     * Remove the specified Consumir from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consumir = $this->consumirRepository->findWithoutFail($id);

        if (empty($consumir)) {
            Flash::error('Consumir not found');

            return redirect(route('consumirs.index'));
        }

        $this->consumirRepository->delete($id);

        Flash::success('Consumir deleted successfully.');

        return redirect(route('consumirs.index'));
    }
}
