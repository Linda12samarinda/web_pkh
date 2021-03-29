<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBpntAPIRequest;
use App\Http\Requests\API\UpdateBpntAPIRequest;
use App\Models\Bpnt;
use App\Repositories\BpntRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BpntController
 * @package App\Http\Controllers\API
 */

class BpntAPIController extends AppBaseController
{
    /** @var  BpntRepository */
    private $bpntRepository;

    public function __construct(BpntRepository $bpntRepo)
    {
        $this->bpntRepository = $bpntRepo;
    }

    /**
     * Display a listing of the Bpnt.
     * GET|HEAD /bpnts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $bpnts = $this->bpntRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );


        return $this->sendResponse($bpnts->toArray(), 'Bpnts retrieved successfully');
    }

    /**
     * Store a newly created Bpnt in storage.
     * POST /bpnts
     *
     * @param CreateBpntAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBpntAPIRequest $request)
    {
        $input = $request->all();

        $bpnt = $this->bpntRepository->create($input);

        return $this->sendResponse($bpnt->toArray(), 'Bpnt saved successfully');
    }

    /**
     * Display the specified Bpnt.
     * GET|HEAD /bpnts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bpnt $bpnt */
        $bpnt = $this->bpntRepository->find($id);

        if (empty($bpnt)) {
            return $this->sendError('Bpnt not found');
        }

        return $this->sendResponse($bpnt->toArray(), 'Bpnt retrieved successfully');
    }

    /**
     * Update the specified Bpnt in storage.
     * PUT/PATCH /bpnts/{id}
     *
     * @param int $id
     * @param UpdateBpntAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBpntAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bpnt $bpnt */
        $bpnt = $this->bpntRepository->find($id);

        if (empty($bpnt)) {
            return $this->sendError('Bpnt not found');
        }

        $bpnt = $this->bpntRepository->update($input, $id);

        return $this->sendResponse($bpnt->toArray(), 'Bpnt updated successfully');
    }

    /**
     * Remove the specified Bpnt from storage.
     * DELETE /bpnts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bpnt $bpnt */
        $bpnt = $this->bpntRepository->find($id);

        if (empty($bpnt)) {
            return $this->sendError('Bpnt not found');
        }

        $bpnt->delete();

        return $this->sendSuccess('Bpnt deleted successfully');
    }
}
