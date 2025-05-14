<?php

namespace App\Http\Controllers;

use App\Models\Carmodels;
use Illuminate\Http\Request;

class CarmodelsController extends Controller
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
     * @param  \App\Models\Carmodels  $carmodels
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        // $brandData = $request->all();
        $bid = $request->Brand_id;

        dd($bid); 
         $modelData = Carmodels::where('make_id','=','1')orderBy('model_name')->->get();
        // dd(Carmodels::where('Bid','=',$bid)->get());
        // //   // $service = service::get();
        return $modelData;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carmodels  $carmodels
     * @return \Illuminate\Http\Response
     */
    public function edit(Carmodels $carmodels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carmodels  $carmodels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carmodels $carmodels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carmodels  $carmodels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carmodels $carmodels)
    {
        //
    }
}
