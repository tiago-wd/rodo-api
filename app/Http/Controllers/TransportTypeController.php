<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransportTypeRequest;
use App\Http\Requests\UpdateTransportTypeRequest;
use App\Repositories\TransportTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TransportTypeController extends AppBaseController
{
    /** @var  TransportTypeRepository */
    private $transportTypeRepository;

    public function __construct(TransportTypeRepository $transportTypeRepo)
    {
        $this->transportTypeRepository = $transportTypeRepo;
    }

    /**
     * Display a listing of the TransportType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $transportTypes = $this->transportTypeRepository->paginate(10);

        return view('transport_types.index')
            ->with('transportTypes', $transportTypes);
    }

    /**
     * Show the form for creating a new TransportType.
     *
     * @return Response
     */
    public function create()
    {
        return view('transport_types.create');
    }

    /**
     * Store a newly created TransportType in storage.
     *
     * @param CreateTransportTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateTransportTypeRequest $request)
    {
        $input = $request->all();

        $transportType = $this->transportTypeRepository->create($input);

        Flash::success('Transport Type saved successfully.');

        return redirect(route('transportTypes.index'));
    }

    /**
     * Display the specified TransportType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transportType = $this->transportTypeRepository->find($id);

        if (empty($transportType)) {
            Flash::error('Transport Type not found');

            return redirect(route('transportTypes.index'));
        }

        return view('transport_types.show')->with('transportType', $transportType);
    }

    /**
     * Show the form for editing the specified TransportType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transportType = $this->transportTypeRepository->find($id);

        if (empty($transportType)) {
            Flash::error('Transport Type not found');

            return redirect(route('transportTypes.index'));
        }

        return view('transport_types.edit')->with('transportType', $transportType);
    }

    /**
     * Update the specified TransportType in storage.
     *
     * @param int $id
     * @param UpdateTransportTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransportTypeRequest $request)
    {
        $transportType = $this->transportTypeRepository->find($id);

        if (empty($transportType)) {
            Flash::error('Transport Type not found');

            return redirect(route('transportTypes.index'));
        }

        $transportType = $this->transportTypeRepository->update($request->all(), $id);

        Flash::success('Transport Type updated successfully.');

        return redirect(route('transportTypes.index'));
    }

    /**
     * Remove the specified TransportType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transportType = $this->transportTypeRepository->find($id);

        if (empty($transportType)) {
            Flash::error('Transport Type not found');

            return redirect(route('transportTypes.index'));
        }

        $this->transportTypeRepository->delete($id);

        Flash::success('Transport Type deleted successfully.');

        return redirect(route('transportTypes.index'));
    }
}
