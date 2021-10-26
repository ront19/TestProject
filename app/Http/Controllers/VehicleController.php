<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function searchVehicles(Request $request){
        $vehicles = Vehicle::query()
            ->where('make', 'LIKE', "%{$request->search_string}%")
            ->orWhere('model', 'LIKE', "%{$request->search_string}%")
            ->orWhere('year', 'LIKE', "%{$request->search_string}%")
            ->orWhere('color', 'LIKE', "%{$request->search_string}%")
            ->get();
        return response()->json(['success'=>true,'vehicles'=>$vehicles], 200);
    }

    public function vehicleSales(Request $request){
        $vehicles = Vehicle::all();
        return response()->json(['success'=>true,'vehicles'=>$vehicles], 200);
    }
}
