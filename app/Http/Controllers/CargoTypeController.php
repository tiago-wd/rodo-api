<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCargoTypeRequest;
use App\Http\Requests\UpdateCargoTypeRequest;
use App\Repositories\CargoTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CargoTypeController extends AppBaseController
{
    /** @var  CargoTypeRepository */
    private $cargoTypeRepository;

    public function __construct(CargoTypeRepository $cargoTypeRepo)
    {
        $this->cargoTypeRepository = $cargoTypeRepo;
    }

    /**
     * Display a listing of the CargoType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cargoTypes = $this->cargoTypeRepository->paginate(10);

        return view('cargo_types.index')
            ->with('cargoTypes', $cargoTypes);
    }

    /**
     * Show the form for creating a new CargoType.
     *
     * @return Response
     */
    public function create()
    {
        return view('cargo_types.create');
    }

    /**
     * Store a newly created CargoType in storage.
     *
     * @param CreateCargoTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoTypeRequest $request)
    {
        $input = $request->all();

        $cargoType = $this->cargoTypeRepository->create($input);

        Flash::success('Cargo Type saved successfully.');

        return redirect(route('cargoTypes.index'));
    }

    /**
     * Display the specified CargoType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cargoType = $this->cargoTypeRepository->find($id);

        if (empty($cargoType)) {
            Flash::error('Cargo Type not found');

            return redirect(route('cargoTypes.index'));
        }

        return view('cargo_types.show')->with('cargoType', $cargoType);
    }

    /**
     * Show the form for editing the specified CargoType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cargoType = $this->cargoTypeRepository->find($id);

        if (empty($cargoType)) {
            Flash::error('Cargo Type not found');

            return redirect(route('cargoTypes.index'));
        }

        return view('cargo_types.edit')->with('cargoType', $cargoType);
    }

    /**
     * Update the specified CargoType in storage.
     *
     * @param int $id
     * @param UpdateCargoTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoTypeRequest $request)
    {
        $cargoType = $this->cargoTypeRepository->find($id);

        if (empty($cargoType)) {
            Flash::error('Cargo Type not found');

            return redirect(route('cargoTypes.index'));
        }

        $cargoType = $this->cargoTypeRepository->update($request->all(), $id);

        Flash::success('Cargo Type updated successfully.');

        return redirect(route('cargoTypes.index'));
    }

    /**
     * Remove the specified CargoType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cargoType = $this->cargoTypeRepository->find($id);

        if (empty($cargoType)) {
            Flash::error('Cargo Type not found');

            return redirect(route('cargoTypes.index'));
        }

        $this->cargoTypeRepository->delete($id);

        Flash::success('Cargo Type deleted successfully.');

        return redirect(route('cargoTypes.index'));
    }
}
