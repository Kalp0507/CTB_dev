<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddonPack;

class AddonController extends Controller
{
    //
    public function index(){
    	// $cars = Carmodels::get();
    	$addons = AddonPack::get();
    
        return view('addon.index',compact('addons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //     public function create(){
    //     $brands = Brand::get();
    //    return view('car.create', compact('brands'));
    // }
    public function create()
    {
       return view('addon.create');
    }

    public function store(Request $request)
    {
        
        // dd($request->all());
        $this->validate($request, [
            'addon_name'        => 'required',
            'addon_icon'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'addon_description' => 'required',
            'addon_price'		    => 'required',
        ]);
        $addon = new AddonPack($request->input()) ;
     
        if($file = $request->hasFile('addon_icon')) {
            $file = $request->file('addon_icon') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/addons/' ;
            $file->move($destinationPath,$fileName);
            $addon->addon_icon = $fileName ;
        }
        // dd($file = $request->hasFile('addon_icon'));
        $addon->save();
         // AddonPack::create($request->all());
    
        return redirect()->route('addon.index')
                        ->with('success','You have successfully uploaded addon file');
    }

     public function show(AddonPack $addon)
    {
        // 
    } 

    public function edit(AddonPack $addon)
    {
        //
             return view('addon.edit',compact('addon'));

    }
    public function update(Request $request, AddonPack $addon)
    {
        //
        // dd($request->all());
       if($request->addon_name != ''){
       	$carModel = AddonPack::where('id', '=', $request->id)->update(['addon_name' => $request->addon_name]);
       }
       if($request->addon_description != ''){
       	$carModel = AddonPack::where('id', '=', $request->id)->update(['addon_description' => $request->addon_description]);
       }
        if($request->addon_price != ''){
        $carModel = AddonPack::where('id', '=', $request->id)->update(['addon_price' => $request->addon_price]);
       }
      
       if($request->addon_icon != ''){
        $addonU = new AddonPack($request->input()) ;
        if($file = $request->hasFile('addon_icon')) {

            $file = $request->file('addon_icon') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/addons/' ;
            $file->move($destinationPath,$fileName);
            $addonU->addon_icon = $fileName ;
        }
            $addonU = AddonPack::where('id', '=', $request->id)->update(['addon_icon' => $addonU->addon_icon]);
       }
         return redirect()->route('addon.index')
                        ->with('success','You have successfully updated addon file');
    }
     public function destroy(AddonPack $addon)
    {
        $addon->delete();
    
        return redirect()->route('addon.index')
                        ->with('success','Addon deleted successfully');
    }
    public function getAddonData(Request $request){
      $singleAddonData = AddonPack::where('id', '=', $request->id)->get();
      // dd($singleAddonData);
      return Response()->json(array(
                'Add_Data' => $singleAddonData
            ));
    }
}
