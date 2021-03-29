<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRtRequest;
use App\Http\Requests\UpdateRtRequest;
use App\Repositories\RtRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RtController extends AppBaseController
{
    /** @var  RtRepository */
    private $rtRepository;

    public function __construct(RtRepository $rtRepo)
    {
        $this->rtRepository = $rtRepo;
    }

    /**
     * Display a listing of the Rt.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rts = $this->rtRepository->all();

        return view('rts.index')
            ->with('rts', $rts);
    }

    /**
     * Show the form for creating a new Rt.
     *
     * @return Response
     */
    public function create()
    {
        return view('rts.create');
    }

    /**
     * Store a newly created Rt in storage.
     *
     * @param CreateRtRequest $request
     *
     * @return Response
     */
    public function store(CreateRtRequest $request)
    {
        $input = $request->all();

        $rt = $this->rtRepository->create($input);

        Flash::success('Rt saved successfully.');

        return redirect(route('rts.index'));
    }

    /**
     * Display the specified Rt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        return view('rts.show')->with('rt', $rt);
    }

    /**
     * Show the form for editing the specified Rt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        return view('rts.edit')->with('rt', $rt);
    }

    /**
     * Update the specified Rt in storage.
     *
     * @param int $id
     * @param UpdateRtRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRtRequest $request)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        $rt = $this->rtRepository->update($request->all(), $id);

        Flash::success('Rt updated successfully.');

        return redirect(route('rts.index'));
    }

    /**
     * Remove the specified Rt from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        $this->rtRepository->delete($id);

        Flash::success('Rt deleted successfully.');

        return redirect(route('rts.index'));
    }
}
