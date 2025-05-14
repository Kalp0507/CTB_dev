<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Carmodels;
use App\Models\Fuel;
use App\Models\carmodel_fuel;
use App\Models\CarTypes;

class ModelController extends Controller
{
    //
    public function index(){
    	// $cars = Carmodels::get();
    	$cars = Carmodels::orderBy('model_name')->get();
    
        return view('car.index',compact('cars'));
    }

    //     public function create(){
    //     $brands = Brand::get();
    //    return view('car.create', compact('brands'));
    // }
    public function create()
    {
        $brands = Brand::orderBy('make_name')->get();
        $fuels = Fuel::orderBy('fuel_type')->get();
        $carTypes = CarTypes::get();
       return view('car.create', compact('brands','fuels','carTypes'));
    }

    public function store(Request $request)
    {
        $existingData = Carmodels::where(['model_name'=>$request->model_name])->get();
      $model_name = $request->model_name;
        $fuel_id = $request->fuel_id;
      $m_n = Carmodels::where('model_name',$model_name)->value('model_name');
      $get_all = Carmodels::where('model_name',$model_name)->value('id');
      // dd($get_all);
      $model = '';
      if ($m_n == null) {
        $this->validate($request, [
            'model_name'    => 'required',
            'model_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'make_id'       => 'required',
            'fuel_id'       => 'required',
            'car_type'		  => 'required',
        ]);
        $model = new Carmodels($request->input()) ;


        if($existingData->toArray() == [] ) {

        }

        if($file = $request->hasFile('model_image')) {
            $file = $request->file('model_image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/models/' ;
            $file->move($destinationPath,$fileName);
            $model->model_image = $fileName ;
        }
        $model->save();
        
      }
      if ($model == '') {
        $model_id = $get_all;
      }else{
        $model_id = $model->id;
      }
      // dd($model_id);
     
        // $model_id = $model->id;

        // dd($carType);
      $check = carmodel_fuel::where('model_id',$model_id)->where('fuel_id',$fuel_id)->first();
      // dd($check);
      if ($check == null) {
        $fuel_model =  carmodel_fuel::create([
          'model_id' => $model_id,
          'fuel_id' => $fuel_id,
        ]);
      }else{
           return redirect()->route('car.index')
                        ->with('danger','This model and fuel type already exist');        
      }
        // $model_id = Carmodels::get()->last(1);
        // dd($model_id);

         return redirect()->route('car.index')
                        ->with('success','You have successfully uploaded your files');
    }

     public function show(Carmodels $car)
    {
        return view('car.show',compact('car'));
    } 

    public function edit(Carmodels $car)
    {
        //
        // dd($car);
        $selectedBrand = Brand::where([ 'id' => $car->make_id])->first();
        $brands = Brand::orderBy('make_name')->get();
        $selectedFuel = carmodel_fuel::where(['model_id' => $car->id])->first();
        $fuelSelect = Fuel::where(['id' => $selectedFuel->fuel_id])->first();
        $carTypes = CarTypes::get(); 
        $selectedCarType = CarTypes::where(['type_name' => $car->car_type])->first();
        // dd($selectedCarType);
        $fuels = Fuel::orderBy('fuel_type')->get();
        return view('car.edit',compact('car','brands','selectedBrand','fuels','fuelSelect','selectedCarType','carTypes'));
    }
    public function update(Request $request, Carmodels $car)
    {
        //
      // dd($request->all());
       if($request->model_name != ''){
       	$carModel = Carmodels::where('id', '=', $request->id)->update(['model_name' => $request->model_name]);
       }
       if($request->make_id != ''){
       	$carModel = Carmodels::where('id', '=', $request->id)->update(['make_id' => $request->make_id]);
       }
       if($request->fuel_id != ''){
       	 $f_mUpdate =  carmodel_fuel::where(['model_id'=>$request->id])
       	 							->update(['model_id' => $request->id, 
       	 									  'fuel_id' => $request->fuel_id,
               							 ]);
       }
       if($request->car_type != ''){
        $carModel = Carmodels::where('id', '=', $request->id)->update(['car_type' => $request->car_type]);
       }
       if($request->model_image != ''){
        // $carU = new Carmodels($request->input()) ;
        if($file = $request->hasFile('model_image')) {
            $file = $request->file('model_image') ;
            $fileName = $file->getClientOriginalName() ;
            $extension = substr($fileName, strpos($fileName, ".") + 1);
            $destinationPath = public_path().'/images/models/' ;
            $updatedFilename =$request->id.'.'.$extension ;
            $file->move($destinationPath,$updatedFilename);
            // $carU->model_image = $fileName ;
        }
     	// dd($carU->update($request->all()));
            $carM = Carmodels::where('id', '=', $request->id)->update(['model_image' => $updatedFilename]);
     		// dd($carM);
        // $carU->save() ;
       }
         return redirect()->route('car.index')
                        ->with('success','You have successfully uploaded your files');
    }
     public function destroy(Carmodels $car)
    {
      // dd($car);
        $car->delete();
    
        return redirect()->route('car.index')
                        ->with('success','Model deleted successfully');
    }
    public function testing(){
    	$brands = Carmodels::get();

    	// $userId = Auth::user()->id;
     //  $userData = User::where(['id'=>$userId])->first();
     //  $orderHistoryData = OrderInformation::where(['user_id'=>$userId])->with('hasOrderInformation')->get();

      // $arrayOfCarInfo = [];
    	$carModelInformation = [];
    	foreach($brands as $key => $brandData ){
    		$fuelObj = new \stdClass();

    		$arrayOfCarInfoObj->orderId = $orderData->id;

    		dd($brandData);

    	}

      // foreach ($orderHistoryData as $key => $orderData) {
      //   $arrayOfCarInfoObj = new \stdClass();
      //   $arrayOfCarInfoObj->orderId = $orderData->id;
      //   foreach ($orderData->hasOrderInformation as $idx => $orderWithPackage) {
      //   //   // dd($orderWithPackage);
      //     $arrayOfCarInfoObj->brand[$idx] = Brand::where('id',$orderWithPackage->make_id)->value('make_name');
      //     $arrayOfCarInfoObj->model[$idx] = Carmodels::where('id',$orderWithPackage->model_id)->value('model_name');
      //     $arrayOfCarInfoObj->fuel[$idx] = Fuel::where('id',$orderWithPackage->fuel_id)->value('fuel_type');
      //   }
      //   $arrayOfCarInfo[$key] = $arrayOfCarInfoObj;
      // }

      // // dd($arrayOfCarInfo);
      // return view('pages.account',compact('userData','orderHistoryData','arrayOfCarInfo'));
    }

}
