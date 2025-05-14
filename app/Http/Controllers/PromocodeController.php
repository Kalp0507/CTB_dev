<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $promocodes = Promocode::latest()->paginate(4);
    
        return view('promocode.index',compact('promocodes'))
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
        return view('promocode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //
        $this->validate($request, [
            'promocode_text'            =>  'required',
            'selection_type'            =>  'required',
            'promocode_amount'          =>  'required',
            'promocode_start_date'      =>  'required',
            'promocode_end_date'        =>  'required',
            'promocode_status'          =>  'required',
        ]);

        if($request->selection_type == 1) {
            Promocode::create(['promocode_text'=>$request->promocode_text, 'selection_type'=>$request->selection_type, 'promocode_amount'=>$request->promocode_amount, 'promocode_start_date'=>$request->promocode_start_date, 'promocode_end_date'=>$request->promocode_end_date,'promocode_status'=>$request->promocode_status,'max_discount'=>$request->max_discount]);
        } else {
            Promocode::create(['promocode_text'=>$request->promocode_text, 'selection_type'=>$request->selection_type, 'promocode_amount'=>$request->promocode_amount, 'promocode_start_date'=>$request->promocode_start_date, 'promocode_end_date'=>$request->promocode_end_date,'promocode_status'=>$request->promocode_status,'max_discount'=>null]);
        }
        // Promocode::create($request->all());
        // Promocode::create(['promocode_text'=>$request->promocode_text, 'selection_type'=>$request->selection_type, 'promocode_amount'=>$request->promocode_amount, 'promocode_start_date'=>$request->promocode_start_date, 'promocode_end_date'=>$request->promocode_end_date,'promocode_status'=>$request->promocode_status,'max_discount'=>$request->max_discount]);
         return redirect()->route('promocode.index')
                        ->with('success','You have successfully uploaded your files');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function show(Promocode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocode $promocode)
    {
        // dd($promocode->selection_type);
        //
         return view('promocode.edit',compact('promocode'));
        // $fuels = Promocode::get();
        // return view('car.edit',compact('car','brands','selectedBrand','fuels','fuelSelect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocode $promocode)
    {
        //
        // dd($request->all());
         $request->validate([
            'promocode_text'            =>  'required',
            'selection_type'            =>  'required',
            'promocode_amount'          =>  'required',
            'promocode_start_date'      =>  'required',
            'promocode_end_date'        =>  'required',
            'promocode_status'          =>  'required',
        ]);
    
        $promocode->update($request->all());
    
        return redirect()->route('promocode.index')
                        ->with('success','Promocode updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocode $promocode)
    {
        //
         $promocode->delete();
    
        return redirect()->route('promocode.index')
                        ->with('success','Promocode deleted successfully');
    }
}
