<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('customer.index');
    }

    public function search_vehicle(Request $request)
    {
        $key = strtolower($request->key);

        $vehicles = Vehicle::all();

        $result = [];
        foreach($vehicles as $item){
            $name = strtolower($item->name);
            $number = strtolower($item->number);
            
            if(strpos($name, $key) !== false || strpos($number, $key) !== false){
                array_push($result, $item);
            }
        }

        return view('customer.searchResult', compact('result', 'key'));
    }

    public function send_request($id)
    {
        $vehicle = Vehicle::find($id);

        VehicleRequest::create([
            'vehicle_id' => $vehicle->id,
            'status' => 0
        ]);

        return redirect(route('view.request'));
    }
    public function view_request()
    {
        $requests = VehicleRequest::all();

        return view('customer.viewRequest', compact('requests'));
    }
    public function cost_calc()
    {
        return view('customer.cost');
    }
}
