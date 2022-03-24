<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function __construct() {
    }

    public function brandModels(Request $request){
        $value = $request->get('value');

        $output = '';
        $data = BrandModel::where('brand_id', $value)->get();

        foreach ($data as $row) {
            $output .= '<option value="'. $row->id .'">'. $row->name .'</option>';
        }
        echo $output;
    }

    public function index(){
        $vehicles = Vehicle::paginate(10);;
        return view('vehicles.list',
            [
                'vehicles' => $vehicles
            ]);
    }

    public function create(){
        $brands = Brand::all();
        $brandModels = BrandModel::where('brand_id', $brands->first()->id)->get();
        return view('vehicles.add',
        [
            'brands' => $brands,
            'brandModels' => $brandModels
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'vehicleNumber' => 'required|string|max:255',
            'brand' => 'required|integer|exists:brands,id',
            'brandModel' => 'required|integer|exists:brand_models,id',
            'vehicleType' => 'nullable|string|max:500',
            'vehicleMileage' => 'nullable|integer|max:2147483647',
            'vehiclePrice' => 'nullable|numeric|max:999999999999999',
        ]);
        $brand = Brand::whereId($request->brand)->first();
        $model = $brand->models()->where('id', $request->brandModel)->first();
        if ($model == null){
            return Redirect::back()->withErrors(['message' => 'This brand doesnt have this model']);
        }
        $price = $request->vehiclePrice ? round($request->vehiclePrice, 2) : null;
        Vehicle::create([
            'brand_model_id' => $request->brandModel,
            'vehicle_number'=> $request->vehicleNumber,
            'type'=> $request->vehicleType,
            'mileage'=> $request->vehicleMileage,
            'price'=> $price,
        ]);
        return redirect(route('vehicles.index'));
    }


    public function edit(Vehicle $vehicle){
        $brands = Brand::all();
        $brandModels = BrandModel::where('brand_id', $vehicle->brandModel->brand_id)->get();
        return view('vehicles.change',
            [
                'vehicle' => $vehicle,
                'brands' => $brands,
                'brandModels' => $brandModels
            ]);
    }

    public function update(Request $request, Vehicle $vehicle){
        $request->validate([
            'vehicleNumber' => 'required|string|max:255',
            'brand' => 'required|integer|exists:brands,id',
            'brandModel' => 'required|integer|exists:brand_models,id',
            'vehicleType' => 'nullable|string|max:500',
            'vehicleMileage' => 'nullable|integer|max:2147483647',
            'vehiclePrice' => 'nullable|numeric|max:999999999999999',
        ]);
        $brand = Brand::whereId($request->brand)->first();
        $model = $brand->models()->where('id', $request->brandModel)->first();
        if ($model == null){
            return Redirect::back()->withErrors(['message' => 'This brand doesnt have this model']);
        }
        $price = $request->vehiclePrice ? round($request->vehiclePrice, 2) : null;
        $vehicle->update([
            'brand_model_id' => $request->brandModel,
            'vehicle_number'=> $request->vehicleNumber,
            'type'=> $request->vehicleType,
            'mileage'=> $request->vehicleMileage,
            'price'=> $price,
        ]);
        return redirect(route('vehicles.index'));
    }

    public function delete(Vehicle $vehicle){
        $vehicle->delete();
        return redirect(route('vehicles.index'));
    }

    public function download()
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=vehicles.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        $vehicles = Vehicle::all();
        $list = [];
        foreach ($vehicles as $vehicle){
            $item = [
                'brand' => $vehicle->brandModel->brand->name,
                'brand_model' => $vehicle->brandModel->name,
                'vehicle_number'=> $vehicle->vehicle_number,
                'type'=> $vehicle->type,
                'mileage'=> $vehicle->mileage,
                'price'=> $vehicle->price
            ];
            array_push($list, $item);
        }
        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    }
}
