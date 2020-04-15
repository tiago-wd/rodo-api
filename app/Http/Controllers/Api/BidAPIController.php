<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateBidAPIRequest;
use App\Http\Requests\Api\UpdateBidAPIRequest;
use App\Models\Bid;
use App\Repositories\BidRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BidController
 * @package App\Http\Controllers\Api
 */

class BidAPIController extends AppBaseController
{
    /** @var  BidRepository */
    private $bidRepository;

    public function __construct(BidRepository $bidRepo)
    {
        $this->bidRepository = $bidRepo;
    }

    /**
     * Display a listing of the Bid.
     * GET|HEAD /bids
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bids = $this->bidRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bids->toArray(), 'Bids retrieved successfully');
    }

    /**
     * Store a newly created Bid in storage.
     * POST /bids
     *
     * @param CreateBidAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBidAPIRequest $request)
    {
        $input = $request->all();

        $bid = $this->bidRepository->create($input);

        return $this->sendResponse($bid->toArray(), 'Bid saved successfully');
    }

    /**
     * Display the specified Bid.
     * GET|HEAD /bids/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bid $bid */
        $bid = $this->bidRepository->find($id);

        if (empty($bid)) {
            return $this->sendError('Bid not found');
        }

        return $this->sendResponse($bid->toArray(), 'Bid retrieved successfully');
    }

    /**
     * Update the specified Bid in storage.
     * PUT/PATCH /bids/{id}
     *
     * @param int $id
     * @param UpdateBidAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBidAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bid $bid */
        $bid = $this->bidRepository->find($id);

        if (empty($bid)) {
            return $this->sendError('Bid not found');
        }

        $bid = $this->bidRepository->update($input, $id);

        return $this->sendResponse($bid->toArray(), 'Bid updated successfully');
    }

    /**
     * Remove the specified Bid from storage.
     * DELETE /bids/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bid $bid */
        $bid = $this->bidRepository->find($id);

        if (empty($bid)) {
            return $this->sendError('Bid not found');
        }

        $bid->delete();

        return $this->sendSuccess('Bid deleted successfully');
    }
}
