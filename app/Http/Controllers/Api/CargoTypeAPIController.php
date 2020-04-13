<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateCargoTypeAPIRequest;
use App\Http\Requests\Api\UpdateCargoTypeAPIRequest;
use App\Models\CargoType;
use App\Repositories\CargoTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CargoTypeController
 * @package App\Http\Controllers\Api
 */

class CargoTypeAPIController extends AppBaseController
{
    /** @var  CargoTypeRepository */
    private $cargoTypeRepository;

    public function __construct(CargoTypeRepository $cargoTypeRepo)
    {
        $this->cargoTypeRepository = $cargoTypeRepo;
    }

    /**
     * Display a listing of the CargoType.
     * GET|HEAD /cargoTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cargoTypes = $this->cargoTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cargoTypes->toArray(), 'Cargo Types retrieved successfully');
    }

    /**
     * Store a newly created CargoType in storage.
     * POST /cargoTypes
     *
     * @param CreateCargoTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoTypeAPIRequest $request)
    {
        $input = $request->all();

        $cargoType = $this->cargoTypeRepository->create($input);

        return $this->sendResponse($cargoType->toArray(), 'Cargo Type saved successfully');
    }

    /**
     * Display the specified CargoType.
     * GET|HEAD /cargoTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CargoType $cargoType */
        $cargoType = $this->cargoTypeRepository->find($id);

        if (empty($cargoType)) {
            return $this->sendError('Cargo Type not found');
        }

        return $this->sendResponse($cargoType->toArray(), 'Cargo Type retrieved successfully');
    }

    /**
     * Update the specified CargoType in storage.
     * PUT/PATCH /cargoTypes/{id}
     *
     * @param int $id
     * @param UpdateCargoTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var CargoType $cargoType */
        $cargoType = $this->cargoTypeRepository->find($id);

        if (empty($cargoType)) {
            return $this->sendError('Cargo Type not found');
        }

        $cargoType = $this->cargoTypeRepository->update($input, $id);

        return $this->sendResponse($cargoType->toArray(), 'CargoType updated successfully');
    }

    /**
     * Remove the specified CargoType from storage.
     * DELETE /cargoTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CargoType $cargoType */
        $cargoType = $this->cargoTypeRepository->find($id);

        if (empty($cargoType)) {
            return $this->sendError('Cargo Type not found');
        }

        $cargoType->delete();

        return $this->sendSuccess('Cargo Type deleted successfully');
    }
}
