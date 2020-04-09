<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateTransportAPIRequest;
use App\Http\Requests\Api\UpdateTransportAPIRequest;
use App\Models\Transport;
use App\Repositories\TransportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TransportController
 * @package App\Http\Controllers\Api
 */

class TransportAPIController extends AppBaseController
{
    /** @var  TransportRepository */
    private $transportRepository;

    public function __construct(TransportRepository $transportRepo)
    {
        $this->transportRepository = $transportRepo;
    }

    /**
     * Display a listing of the Transport.
     * GET|HEAD /transports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $transports = $this->transportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($transports->toArray(), 'Transports retrieved successfully');
    }

    /**
     * Store a newly created Transport in storage.
     * POST /transports
     *
     * @param CreateTransportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransportAPIRequest $request)
    {
        $input = $request->all();

        $transport = $this->transportRepository->create($input);

        return $this->sendResponse($transport->toArray(), 'Transport saved successfully');
    }

    /**
     * Display the specified Transport.
     * GET|HEAD /transports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Transport $transport */
        $transport = $this->transportRepository->find($id);

        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }

        return $this->sendResponse($transport->toArray(), 'Transport retrieved successfully');
    }

    /**
     * Update the specified Transport in storage.
     * PUT/PATCH /transports/{id}
     *
     * @param int $id
     * @param UpdateTransportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransportAPIRequest $request)
    {
        $input = $request->all();

        /** @var Transport $transport */
        $transport = $this->transportRepository->find($id);

        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }

        $transport = $this->transportRepository->update($input, $id);

        return $this->sendResponse($transport->toArray(), 'Transport updated successfully');
    }

    /**
     * Remove the specified Transport from storage.
     * DELETE /transports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Transport $transport */
        $transport = $this->transportRepository->find($id);

        if (empty($transport)) {
            return $this->sendError('Transport not found');
        }

        $transport->delete();

        return $this->sendSuccess('Transport deleted successfully');
    }
}
