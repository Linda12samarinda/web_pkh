<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBpntRequest;
use App\Http\Requests\UpdateBpntRequest;
use App\Repositories\BpntRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Bpnt;
use Salman\GeoFence\Service\GeoFenceCalculator;
use App\Models\Rt;
use Flash;
use Response;

class BpntController extends AppBaseController
{
    /** @var  BpntRepository */
    private $bpntRepository;

    public function __construct(BpntRepository $bpntRepo)
    {
        $this->bpntRepository = $bpntRepo;
    }

    /**
     * Display a listing of the Bpnt.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $bpnts = $this->bpntRepository->all();

        if($request->kk){
            $kk = $input['kk'];
            $bpnts = Bpnt::where('no_kk',$kk)->paginate(30);
              
        }

        return view('bpnts.index')
            ->with('bpnts', $bpnts);
    }

    /**
     * Show the form for creating a new Bpnt.
     *
     * @return Response
     */
    public function create()
    {
        $kategories = Kategori::pluck('name','id');
        $rt = Rt::pluck('name','id');
        return view('bpnts.create',compact('rt','kategories'));
    }

    /**
     * Store a newly created Bpnt in storage.
     *
     * @param CreateBpntRequest $request
     *
     * @return Response
     */
    public function store(CreateBpntRequest $request)
    {
        $input = $request->except('foto_rumah');

        $bpnt = $this->bpntRepository->create($input);

        
       if($request->has('foto_rumah')){
            $foto = $request->file('foto_rumah');
            $filename = $bpnt->id.'.'.$foto->getClientOriginalExtension();
            $saveFoto = $request->foto_rumah->storeAs('/public/foto_rumah',$filename,'local');
            $bpnt->foto_rumah= "storage".substr($saveFoto, strpos($saveFoto, '/'));
            $bpnt->save();

       }

        Flash::success('Bpnt saved successfully.');

        return redirect(route('bpnts.index'));
    }

    /**
     * Display the specified Bpnt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bpnt = $this->bpntRepository->find($id);

        if (empty($bpnt)) {
            Flash::error('Bpnt not found');

            return redirect(route('bpnts.index'));
        }

        return view('bpnts.show')->with('bpnt', $bpnt);
    }

    /**
     * Show the form for editing the specified Bpnt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bpnt = $this->bpntRepository->find($id);
        $kategories = Kategori::pluck('name','id');
        $rt = Rt::pluck('name','id');

        if (empty($bpnt)) {
            Flash::error('Bpnt not found');

            return redirect(route('bpnts.index'));
        }

        return view('bpnts.edit',compact('bpnt','rt','kategories'));
    }

    /**
     * Update the specified Bpnt in storage.
     *
     * @param int $id
     * @param UpdateBpntRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBpntRequest $request)
    {
        $bpnt = $this->bpntRepository->find($id);

        if (empty($bpnt)) {
            Flash::error('Bpnt not found');

            return redirect(route('bpnts.index'));
        }
        $input = $request->except('foto_rumah');

        
       if($request->has('foto_rumah')){

            $foto = $request->file('foto_rumah');
            $filename = $bpnt->name.'_'.$bpnt->id.'.'.$foto->getClientOriginalExtension();
            $saveFoto = $request->foto_rumah->storeAs('/public/foto_rumah',$filename,'local');
            $bpnt->foto_rumah= "storage".substr($saveFoto, strpos($saveFoto, '/'));
            $bpnt->save();

       }

        $bpnt = $this->bpntRepository->update($input, $id);

        Flash::success('Bpnt updated successfully.');

        return redirect(route('bpnts.index'));
    }

    /**
     * Remove the specified Bpnt from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bpnt = $this->bpntRepository->find($id);

        if (empty($bpnt)) {
            Flash::error('Bpnt not found');

            return redirect(route('bpnts.index'));
        }

        $this->bpntRepository->delete($id);

        Flash::success('Bpnt deleted successfully.');

        return redirect(route('bpnts.index'));
    }
    public function directions(Request $request,$id)
    {
        $mylat = floatval($request->lat);
        $myLng = floatval($request->lang);
        $bpnt = $this->bpntRepository->find($id);

        if (empty($bpnt)) {
            Flash::error('Bpnt not found');

            return redirect(route('bpnts.index'));
        }
        $d_calculator = new GeoFenceCalculator();

            $distance = $d_calculator->CalculateDistance($mylat,$myLng, floatval($bpnt->lat), floatval($bpnt->lang));
            $bpnt['distance'] = $distance;
            //return $distance;

        return view('bpnts.rute')->with('bpnt', $bpnt);
    }
}
