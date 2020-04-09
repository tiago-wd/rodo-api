<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateTransportTypeAPIRequest;
use App\Http\Requests\Api\UpdateTransportTypeAPIRequest;
use App\Models\TransportType;
use App\Repositories\TransportTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TransportTypeController
 * @package App\Http\Controllers\Api
 */

class TransportTypeAPIController extends AppBaseController
{
    /** @var  TransportTypeRepository */
    private $transportTypeRepository;

    public function __construct(TransportTypeRepository $transportTypeRepo)
    {
        $this->transportTypeRepository = $transportTypeRepo;
    }

    /**
     * Display a listing of the TransportType.
     * GET|HEAD /transportTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $transportTypes = $this->transportTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($transportTypes->toArray(), 'Transport Types retrieved successfully');
    }

    /**
     * Store a newly created TransportType in storage.
     * POST /transportTypes
     *
     * @param CreateTransportTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransportTypeAPIRequest $request)
    {
        $input = $request->all();

        $transportType = $this->transportTypeRepository->create($input);

        return $this->sendResponse($transportType->toArray(), 'Transport Type saved successfully');
    }

    /**
     * Display the specified TransportType.
     * GET|HEAD /transportTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransportType $transportType */
        $transportType = $this->transportTypeRepository->find($id);

        if (empty($transportType)) {
            return $this->sendError('Transport Type not found');
        }

        return $this->sendResponse($transportType->toArray(), 'Transport Type retrieved successfully');
    }

    /**
     * Update the specified TransportType in storage.
     * PUT/PATCH /transportTypes/{id}
     *
     * @param int $id
     * @param UpdateTransportTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransportTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransportType $transportType */
        $transportType = $this->transportTypeRepository->find($id);

        if (empty($transportType)) {
            return $this->sendError('Transport Type not found');
        }

        $transportType = $this->transportTypeRepository->update($input, $id);

        return $this->sendResponse($transportType->toArray(), 'TransportType updated successfully');
    }

    /**
     * Remove the specified TransportType from storage.
     * DELETE /transportTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransportType $transportType */
        $transportType = $this->transportTypeRepository->find($id);

        if (empty($transportType)) {
            return $this->sendError('Transport Type not found');
        }

        $transportType->delete();

        return $this->sendSuccess('Transport Type deleted successfully');
    }
}
