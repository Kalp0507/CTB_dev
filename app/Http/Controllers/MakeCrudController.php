<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class MakeCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $make = Brand::orderBy('make_name')->get();
    
        return view('make.index',compact('make'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('make.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'make_name' => 'required',
            'make_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $make = new Brand($request->input()) ;
        
        $existingData = Brand::where(['make_name'=>$request->make_name])->get();
        if($existingData->toArray() == [] ) {
            if($file = $request->hasFile('make_image')) {
                $file = $request->file('make_image') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/images/brands/' ;
                $file->move($destinationPath,$fileName);
                $make->make_image = $fileName ;
            }
            $make->save();
             return redirect()->route('make.index')
                            ->with('success','Added new Car Brand.');
        } else {
            return redirect()->route('make.index')
                            ->with('success','Car Brand already exist.');
        }
    }


    public function show(Brand $make)
    {
        return view('make.show',compact('make'));
    } 

    public function edit(Brand $make)
    {
        //
        return view('make.edit',compact('make'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $make)
    {
        if($request->make_name != ''){
            $brandName = Brand::where(['id' => $request->id])->update(['make_name' => $request->make_name]);
        }
       //  if($request->make_image != ''){
       //  $brandName = Brand::where('id', '=', $request->id)->update(['make_image' => $request->make_name]);
       // }

       if($request->make_image != ''){
           // $makeU = new Brand($request->except(['id']));

         
            if($file = $request->hasFile('make_image')) {
                $file = $request->file('make_image') ;
                $fileName = $file->getClientOriginalName() ;
                $extension = substr($fileName, strpos($fileName, ".") + 1);
                $destinationPath = public_path().'/images/brands/' ;
                $updatedFilename =$request->id.'.'.$extension ;
                $file->move($destinationPath,$updatedFilename);
                // $makeU->make_image = $updatedFilename ;
            }
            $makeU = Brand::where(['id' => $request->id])->update(['make_image' => $updatedFilename]);
            // $brandImage = Brand::where('id', '=', $request->id)->update(['make_image' => $makeU->make_image]);
                // dd($brandImage);
            // $makeU->save();
       }
    
        return redirect()->route('make.index')
                        ->with('success','Make updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $make)
    {
        $make->delete();
    
        return redirect()->route('make.index')
                        ->with('success','Make deleted successfully');
    }
}
