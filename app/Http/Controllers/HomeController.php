<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Salman\GeoFence\Service\GeoFenceCalculator;
use App\Models\Bpnt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mylat = floatval($request->lat);
        $myLng = floatval($request->lang);

        $data = Bpnt::all();
        $d_calculator = new GeoFenceCalculator();
        foreach ($data as $key ) {
            $distance = $d_calculator->CalculateDistance($mylat,$myLng, floatval($key->lat), floatval($key->lang));
            $key['distance'] = $distance;
        }
        //return $distance;
        return view('home',compact('data','distance'));
    }
}
