<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Carmodels;
use App\Models\Fuel;
use App\Models\carmodel_fuel;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function brandData(Request $brand)
    {
        //
        $brandData = Brand::orderBy('make_name')->get();
        // dd($brandData);
        //   // $service = service::get();
        return $brandData;
    }
    
     public function modelData(Request $request)
    {
        //
        // $brandData = $request->all();
        $bid = $request->Brand_id;
        // Via Request
       //  $aid = $request->user()->id;
       //  // Via Auth Facade
       // $aid = Auth::user()->id;

       //  dd($aid); 
         $modelData = Carmodels::where('make_id','=', $bid)->orderBy('model_name')->get();
        // dd(Carmodels::where('Bid','=',$bid)->get());
        // //   // $service = service::get();
        // dd($modelData);
        return $modelData;
    }

    public function fuelData(Request $request)
    {
        $fuel_array = [];
        // $fid = $request->Model_id;
        $fuels = Carmodels::where('id','=',$request->Model_id)->orderBy('model_name')->first();
        // dd($fuels);
        if($fuels !== null) {
            foreach ($fuels->fuels as $key=>$fuel) {
                
                $fuel_array[$key] = [ $fuel->id, $fuel->fuel_type, $fuel->fuel_image ];
            }

        }
        // dd($fuel_array);
        return $fuel_array;

        // $user = model_fuel::where('model_id','=','1');  
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
