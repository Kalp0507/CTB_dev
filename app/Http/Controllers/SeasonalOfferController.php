<?php

namespace App\Http\Controllers;

use App\Models\SeasonalOffer;
use App\Models\services;
use Illuminate\Http\Request;

class SeasonalOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = services::get();

            $seasonals = SeasonalOffer::latest()->paginate(4);
    
        return view('seasonal.index',compact('seasonals','services'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
     * @param  \App\Models\SeasonalOffer  $seasonalOffer
     * @return \Illuminate\Http\Response
     */
    public function show(SeasonalOffer $seasonalOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeasonalOffer  $seasonalOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(SeasonalOffer $seasonal)
    {
        $services = services::get();
        return view('seasonal.edit',compact('services','seasonal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeasonalOffer  $seasonalOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeasonalOffer $seasonalOffer)
    {
        //
        // if($request->seasonal_title != ''){
            $seasonalTitle = SeasonalOffer::where('id', '=', $request->id)->update(['seasonal_title' => $request->seasonal_title]);
        // }
         if($request->seasonal_icon != ''){
             $seasonal_iconU = new SeasonalOffer($request->input()) ;

            if($file = $request->hasFile('seasonal_icon')) {
                $file = $request->file('seasonal_icon') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/images/seasonal/' ;
                $file->move($destinationPath,$fileName);
                $seasonal_iconU->seasonal_icon = $fileName ;
            }
            $seasonalTitle = SeasonalOffer::where('id', '=', $request->id)->update(['seasonal_icon' => $seasonal_iconU->seasonal_icon ]);
        }
         if($request->seasonal_background_image != ''){
            $seasonal_backgroundU = new SeasonalOffer($request->input()) ;

            if($file = $request->hasFile('seasonal_background_image')) {
                $file = $request->file('seasonal_background_image') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/images/seasonal/' ;
                $file->move($destinationPath,$fileName);
                $seasonal_backgroundU->seasonal_background_image = $fileName ;
            }
            $seasonalTitle = SeasonalOffer::where('id', '=', $request->id)->update(['seasonal_background_image' => $seasonal_backgroundU->seasonal_background_image]);
        }
         if($request->serviceToRedirectId != ''){
            $serviceName = services::where('id', '=', $request->serviceToRedirectId)->select('displayName')->first();
            // dd($serviceName->service_name);
        $seasonalTitle = SeasonalOffer::where('id', '=', $request->id)->update(['serviceToRedirectId' => $request->serviceToRedirectId]);
        $seasonName = SeasonalOffer::where('id', '=', $request->id)->update(['service_name' => $serviceName->displayName]);
       }
        return redirect()->route('seasonal.index')
                        ->with('success','You have successfully uploaded your files');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeasonalOffer  $seasonalOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeasonalOffer $seasonalOffer)
    {
        //
    }
    public function seasonalRedirect(Request $request){
        dd($request->all());

    }
}
