<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Capacity;
use DB;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        // Validation
        $rules = [
            'weight' => 'required_without:length,height,width|nullable|numeric|between:0,99.99',
            'length' => 'required_without:weight,height,width|nullable|numeric|between:0,99.99',
            'height' => 'required_without:weight,length,width|nullable|numeric|between:0,99.99',
            'width' => 'required_without:weight,height,length|nullable|numeric|between:0,99.99'
        ];

        if (empty($request->all()['weight']) && empty($request->all()['length'])
            && empty($request->all()['height']) && empty($request->all()['width'])
        ) {
            $message = "Please enter a search parameter";
            return redirect('home')
                        ->withErrors($message)
                        ->withInput();
        }

        $capacities = [];
        // Processing result
        // Fetching results from database
        // $capacities = Capacity::all();
        // $bind = [
        //     'weight' => $request->all()['weight'] ?? 0,
        //     'height' => $request->all()['height'] ?? 0,
        //     'width' => $request->all()['width'] ?? 0,
        //     'length' => $request->all()['length'] ?? 0
        // ];
        $bind = [
            $request->all()['weight'] ?? 0,
            $request->all()['weight'] ?? 0,
            $request->all()['height'] ?? 0,
            $request->all()['height'] ?? 0,
            $request->all()['width'] ?? 0,
            $request->all()['width'] ?? 0,
            $request->all()['length'] ?? 0,
            $request->all()['length'] ?? 0
        ];
        // print_r($bind); die;
        $capacities = DB::select("SELECT ac.`name`, ac.`variant` FROM aircrafts ac LEFT JOIN `capacities` ca ON(ca.`aircraft_id`=ac.`id`) WHERE ac.`status` ='Active' AND (ca.`weight_min` < ? AND ca.`weight_max` > ?) OR (ca.`height_min` < ? AND ca.`height_max` > ?)
            OR (ca.`width_min` < ? AND ca.`width_max` > ?) OR (ca.`length_min` < ? AND ca.`length_max` > ?)", $bind);
        // print_r($capacities); die;
        return view('home')->with('capacities', $capacities);
        // passing to the front-end
    }
}
