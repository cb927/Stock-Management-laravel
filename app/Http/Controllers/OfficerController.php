<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('officer.index', compact('vehicles'));
    }
    public function add_vehicle()
    {
        return view('officer.addVehicle');
    }
    public function edit_vehicle($id)
    {
        $vehicle = Vehicle::find($id);
        return view('officer.editVehicle', compact('vehicle'));
    }
    public function delete_vehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return back();
    }
    public function store_vehicle(Request $request)
    {
        $name = $request->name;
        $number = $request->number;
        $description = $request->description;

        Vehicle::create([
            'name' => $name,
            'number' => $number,
            'description' => $description
        ]);

        return redirect('/');
    }

    public function update_vehicle(Request $request, $id)
    {
        $name = $request->name;
        $number = $request->number;
        $description = $request->description;

        $vehicle = Vehicle::find($id);

        $vehicle->name = $name;
        $vehicle->number = $number;
        $vehicle->description = $description;

        $vehicle->save();

        return redirect('/');
    }

    public function drivers()
    {
        $drivers = Driver::all();

        return view('officer.drivers', compact('drivers'));
    }

    public function add_driver()
    {
        $vehicles = Vehicle::all();
        return view('officer.addDriver', compact('vehicles'));
    }

    public function edit_driver($id)
    {
        $vehicles = Vehicle::all();
        $driver = Driver::find($id);
        return view('officer.editDriver', compact('driver', 'vehicles'));
    }

    public function store_driver(Request $request)
    {
        $name = $request->name;
        $vehicle_id = $request->vehicle_id;
        if($vehicle_id == null){
            $vehicle_id = 0;
        }

        Driver::create([
            'name' => $name,
            'vehicle_id' => $vehicle_id
        ]);

        return redirect(route('drivers'));
    }

    public function update_driver(Request $request, $id)
    {
        $name = $request->name;
        $vehicle_id = $request->vehicle_id;

        $driver = Driver::find($id);

        $driver->name = $name;
        $driver->vehicle_id = $vehicle_id;

        $driver->save();

        return redirect(route('drivers'));
    }

    public function delete_driver($id)
    {
        $driver = Driver::find($id);

        $driver->delete();

        return back();
    }
}
