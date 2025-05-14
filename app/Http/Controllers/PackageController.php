<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Brand;
use App\Models\Carmodels;
use App\Models\Fuel;
use App\Models\service;
use App\Models\services;
use App\Models\AddonPack;
use App\Models\Testimonials;
use App\Models\Cart;
use App\Models\User;
use App\Models\OrderInformation;
use App\Models\OrderPackageInformation;
use App\Models\SeasonalOffer;
use App\Models\OrderPackageService;
use App\Models\AssignedPackages;
use App\Models\CarServiceParts;
use App\Models\CarPartPricing;
use App\Models\ServicesLeads;
use App\Models\BatteryTyreLeads;
use App\Models\GeneralLead;
use App\Models\RewardPoints;
use App\Models\UserReward;

use Mail;
use Session;
use App\Mail\sendingCommonEmail;
use App\Mail\packageInvoiceMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PackageController extends Controller
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
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
        // return view('packages.show',compact('product'));
        $users = Package::get();
        $service = service::get();
        $testimonials = Testimonials::get();
        $rats = Testimonials::select('client_rating')->get();
        $rates;
        $unrates;
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
        // var_dump($service);
        return view('Dashboard/package',compact('users','service','testimonials','rating','unrating'));
 //        $abc= PackageController::edit();
        // dd($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->get('service'));
        $package_id = $request->pid;
        $request->validate([
            'package_name'          =>  'required',
            'package_description'   =>  'required',
            'total_price'           =>  'required',
            'discounted_price'      =>  'required',
            'service_time'          =>  'required',
            'make_id'               =>  'required',
            'model_id'              =>  'required',
            'fuel_id'               =>  'required',
            'package_type'          =>  'required',
        ]);

        $update = Package::where('id', '=', $request->pid)->update([
                'package_name'          => $request->Pname,
                'package_description'   => $request->Description,
                'total_price'           => $request->OriginalPrice,
                'discounted_price'      => $request->DiscountedPrice,
                'service_time'          => $request->ServiceTime,
                'package_type'          => $request->PackType,
                'make_id'               => $request->Makeid,
                'model_id'              => $request->Modelid,
                'fuel_id'               => $request->Fuelid,
            ]);

        // dd($update);
        $del=service::where('package_id','=', $request->pid)->delete();

        if($request->get('service')!== NULL){  
            $serv = $request->get('service');
            $count_items = count($serv);
        // dd($serv);
            for($i = 0; $i<$count_items; $i++){
                $update_old=service::create([
                'service_name' => $request->service[$i],
                'package_id' => $package_id,
                ]);
            }
        }
// dd($request->list[1]);
        if($request->get('list') != NULL){  
            $list = $request->get('list');
            $count_lists = count($list);
            for($j = 1; $j<=$count_lists; $j++)
                {
                    $update_list=service::create([
                        'service_name' => $request->list[$j],
                        'package_id' => $package_id,
                    ]);
                }
        }
        return redirect('/Dashboard/package')->with('message','Profile updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
    public function deleteCartItem(Request $request){
        $auth_id = Auth::user()->id;
        $del = Cart::where(['pack_id' => $request->cartId])->where(['u_id' => $auth_id])->first();
        $deleted =  $del->delete();
        // dd($deleted);
    }
    public function emptyCart(){
         $auth_id = Auth::user()->id;
            $del = Cart::where(['u_id' => $auth_id])->count();
            if($del != 0){
                for ($i=0; $i <$del ; $i++) { 
                    $cart_item = Cart::where(['u_id' => $auth_id])->first();
                    $deleted =  $cart_item->delete();
            // dd($deleted);
                }
            }
         // if($del != null){
         //     $deleted =  $del->delete();
         // }
    }

    public function periodicPack(Package $package)
    {
        $periodic = Package::where('package_type','=','1')->get();
        // $package = service::where('package_id','=','1')->get();
        // $serv = services::get();
        $service = services::get();
        // dd($serv);
         $seasonal = SeasonalOffer::get();
        $addons = AddonPack::get();
        $brandData = Brand::orderBy('make_name')->get();
        $testimonials = Testimonials::get();
        $rats = Testimonials::select('client_rating')->get();
        $membershipPackages = Package::where(['package_type' => 2])->get();
        $rates;
        $unrates;
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
        return view('pages/PeriodicServices',compact('periodic','service','testimonials','rating','unrating','brandData','addons','seasonal','membershipPackages'));
    }

     public function UnkeepServices(Package $package)
    {
        $periodic = Package::where('package_type','=','3')->get();
        // $package = service::where('package_id','=','1')->get();
        $service = services::get();
        $addons = AddonPack::get();
        $brandData = Brand::orderBy('make_name')->get();
        $testimonials = Testimonials::get();
        $rats = Testimonials::select('client_rating')->get();
        $seasonal = SeasonalOffer::get();
        $rates;
        $unrates;
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
        return view('pages/UpkeepServices',compact('periodic','service','testimonials','rating','unrating','brandData','addons','seasonal'));
    }

    public function acRepairServicePage(Package $package)
    {
        $periodic = Package::where('package_type','=','1')->get();
        // $package = service::where('package_id','=','1')->get();
        $service = services::get();
        $addons = AddonPack::get();
        $brandData = Brand::orderBy('make_name')->get();
        $seasonal = SeasonalOffer::get();
        $servicePartsData = CarServiceParts::where(['serviceType'=>'AC Servicing'])->get();
        $testimonials = Testimonials::get();
        $rats = Testimonials::select('client_rating')->get();
        $membershipPackages = Package::where(['package_type' => 2])->get();
        $rates;
        $unrates;
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
        return view('pages/ACRepairServices',compact('periodic','service','testimonials','rating','unrating','brandData','addons','servicePartsData','seasonal','membershipPackages'));
    }

    public function mechanicalRepairServicePage(Package $package)
    {
        $periodic = Package::where('package_type','=','1')->get();
        // $package = service::where('package_id','=','1')->get();
        $service = services::get();
        $addons = AddonPack::get();
        $brandData = Brand::orderBy('make_name')->get();
        $seasonal = SeasonalOffer::get();
        $servicePartsData = CarServiceParts::where(['serviceType'=>'AC Servicing'])->get();
        $testimonials = Testimonials::get();
        $rats = Testimonials::select('client_rating')->get();
        $rates;
        $unrates;
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
        return view('pages/mechanicalRepairServices',compact('periodic','service','testimonials','rating','unrating','brandData','addons','servicePartsData','seasonal'));
    }

    public function batteryAndTyreServicePage(Package $package)
    {
        $periodic = Package::where('package_type','=','1')->get();
        // $package = service::where('package_id','=','1')->get();
        $service = services::get();
        $addons = AddonPack::get();
        $brandData = Brand::orderBy('make_name')->get();
        $seasonal = SeasonalOffer::get();
        $servicePartsData = CarServiceParts::where(['serviceType'=>'AC Servicing'])->get();
        $testimonials = Testimonials::get();
        $rats = Testimonials::select('client_rating')->get();
        $rates;
        $unrates;
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
        return view('pages/BatteryandTyreServices',compact('periodic','service','testimonials','rating','unrating','brandData','addons','servicePartsData','seasonal'));
    }

    public function getServiceParts(Request $request){
        $brandId = $request->brandId;
        $modelId = $request->modelId;
        $fuelId = $request->fuelId;

        $brandName = Brand::where(['id' => $brandId])->value('make_name');
        $modelName = Carmodels::where(['id' => $modelId])->value('model_name');
        $fuelName = Fuel::where(['id' => $fuelId])->value('fuel_type');

        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $brandId);
        Session::put('modelId', $modelId);
        Session::put('fuelId', $fuelId);

        if($request->serviceType ==  'Mechanical Repair') {
            $serviceParts = CarServiceParts::where(['serviceType'=>'Mechanical Repair', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId ])->get();
        } 
        else if($request->serviceType ==  'Battery and Tyres') {
            $serviceParts = CarServiceParts::where(['serviceType'=>'Battery and Tyres', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId ])->get();
        }
         else if($request->serviceType ==  'AC Servicing') {
            $serviceParts = CarServiceParts::where(['serviceType'=>'AC Servicing', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId ])->get();
       }
        else if($request->serviceType ==  'Upkeep Services') {
            $serviceParts = CarServiceParts::where(['serviceType'=>'Upkeep Services', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId ])->get();
        } 

        return response($serviceParts, 200);
    }

    public function getBatteryParts(Request $request){

        $brandName = Brand::where(['id' => $request->brandId])->value('make_name');
        $modelName = Carmodels::where(['id' => $request->modelId])->value('model_name');
        $fuelName = Fuel::where(['id' => $request->fuelId])->value('fuel_type');

        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $request->brandId);
        Session::put('modelId', $request->modelId);
        Session::put('fuelId', $request->fuelId);

        $userOld  = User::where(['mobile'=> $request->mobile])->first();
        if(isset(Auth::user()->id)){
            $auth_id = Auth::user()->id;
            $getCart = Cart::where('u_id','=',$auth_id)->where('category','5')->get();

            $serviceParts = CarServiceParts::where(['serviceType'=>'Battery and Tyres', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId, 'part_type' => $request->batteryOrTyre  ])->get();
            $existingParts = [];
            $dataToReturn=[];

            if ($getCart->toArray() != []) {
                foreach ($serviceParts as $serviceKey => $servicePart) {
                    $partsData = new \stdClass();
                    foreach($getCart as $key=>$value){
                        if($value->pack_id == $servicePart->id) {
                            $partsData->partId = $value->pack_id;
                            $partsData->qty = $value->part_quantity;
                            array_push($existingParts, $partsData);
                        }
                    }   
                }
            }
        }
      elseif ($userOld) {
            Auth::login($userOld, true);
             $auth_id = Auth::user()->id;
            $getCart = Cart::where('u_id','=',$auth_id)->where('category','5')->get();

            $serviceParts = CarServiceParts::where(['serviceType'=>'Battery and Tyres', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId, 'part_type' => $request->batteryOrTyre  ])->get();
            $existingParts = [];
            $dataToReturn=[];

            if ($getCart->toArray() != []) {
                foreach ($serviceParts as $serviceKey => $servicePart) {
                    $partsData = new \stdClass();
                    foreach($getCart as $key=>$value){
                        if($value->pack_id == $servicePart->id) {
                            $partsData->partId = $value->pack_id;
                            $partsData->qty = $value->part_quantity;
                            array_push($existingParts, $partsData);
                        }
                    }   
                }
            }

      }else{
        $createNewUser = User::create ([
            'mobile'    => $request->mobile,
            'email'     => null,
            'username'  => null,
            'password'  => null,
        ]);

        $userNew  = User::where(['mobile'=> $request->mobile])->first();
        if($userNew){
            Auth::login($userNew, true);
             $auth_id = Auth::user()->id;
                $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->mobile,
                    'leadType'  =>  'Battery And Tyres',
                  ]);
            $getCart = Cart::where('u_id','=',$auth_id)->where('category','5')->get();
            $serviceParts = CarServiceParts::where(['serviceType'=>'Battery and Tyres', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId, 'part_type' => $request->batteryOrTyre  ])->get();
            $existingParts = [];
            $dataToReturn=[];
            if ($getCart->toArray() != []) {
                foreach ($serviceParts as $serviceKey => $servicePart) {
                    $partsData = new \stdClass();
                    foreach($getCart as $key=>$value){
                        if($value->pack_id == $servicePart->id) {
                            $partsData->partId = $value->pack_id;
                            $partsData->qty = $value->part_quantity;
                            array_push($existingParts, $partsData);
                        }
                    }   
                }
            }
        }
      }
        

        $dataToReturn['existingParts'] = $existingParts;
        $dataToReturn['serviceParts'] = $serviceParts;



        return response($dataToReturn, 200);
    }

    public function submitBatteryRequest(Request $request){
        // dd($request->all());
        $count=0;
        if(Auth::check()) {
          $count=1;
          // $mobile = Auth::user()->mobile; 
        }

        $saveBatteryLead =  BatteryTyreLeads::create([
            'make' => $request->brandId,
            'model' => $request->modelId,
            'fuel' => $request->fuelId,
            'leadType' => $count,
            'query' => $request->batteryQuery,
            'mobile' => $request->mobile,
            'battery_or_tyre' => $request->batteryORTyre,
        ]);
        if($saveBatteryLead) {
            return response("Form Submitted Successfully", 200);
        }
    }

    public function buyBatteryParts(Request $request){
        $partsIdArray = $request->partSelect;
        $arrayOfPartsName=[];
        $arrayOfPartsPrice=[];

        foreach ($partsIdArray as $key => $partId) {
            $partName = CarServiceParts::where(['id'=>$partId, 'serviceType'=>'Battery and Tyres' ])->value('part_name');
            array_push($arrayOfPartsName, $partName);
        }

        foreach ($partsIdArray as $key => $partId) {
            $partPrice = CarServiceParts::where(['id'=>$partId, 'serviceType'=>'Battery and Tyres' ])->value('price');
            array_push($arrayOfPartsPrice, $partPrice);
        }

        $brandName = Brand::where(['id' => $request->brandId])->value('make_name');
        $modelName = Carmodels::where(['id' => $request->modelId])->value('model_name');
        $fuelName = Fuel::where(['id' => $request->fuelId])->value('fuel_type');

        $partNamesStr = '';
        foreach ($arrayOfPartsName as $key => $partStr) {
            if($partNamesStr=='') {
                $partNamesStr = $partStr;
            }else {
                $partNamesStr = $partNamesStr.','.$partStr;
            }
        }

        $count=0;
        if(Auth::check()) {
          $count=1;
        }

        $userName='';
        if(isset(Auth::user()->id)) {
            $userName = Auth::user()->username;
        }

        $createBatteryServiceLead = ServicesLeads::create([
            'make' => $brandName,
            'model' => $modelName,
            'fuel_type' => $fuelName,
            'name' => $userName,
            'selected_parts' => $partNamesStr,
            'remark' => $request->batteryRemark,
            'mobileNo' => $request->mobile,
            'leadType' => $count,
            'serviceType' => $request->serviceType,
        ]);

        if(isset(Auth::user()->id)) {
            $auth_id = Auth::user()->id;
            foreach ($partsIdArray as $key => $partId) {
                $check_addon = Cart::where('pack_id',$partId)->where('category','5')->get();
            if($check_addon){
              $emptyCart = Cart::where('pack_id',$partId)->where('category','5')->delete();
             }
              $add_cart=Cart::create([
                'pack_id' => $partId,
                'u_id' => $auth_id,
                'pack_price' =>$arrayOfPartsPrice[$key],
                'category'  =>  '5',
              ]);
            }

            if($add_cart) {
                $res = array('msg' => 'Package Added Successfully', 'status' => true);
                return Response()->json($res);
            }
        }

    }

    public function getEstimate(Request $request){
        // dd($request->all());
        $selectedServicePart = CarServiceParts::where(['serviceType'=>'AC Servicing', 'make_id'=>$request->brandId, 'model_id'=>$request->modelId,'fuel_id'=>$request->fuelId, 'id'=>$request->partId ])->first();
        // dd($selectedServicePart);
        if($selectedServicePart) {
            return response($selectedServicePart, 200);
        }
    }

    public function searchPack(Request $request){
        // dd($request->all());
        $Brand_id = $request->Brand_id;
        $Model_id = $request->Model_id;
        $Fuel_id = $request->Fuel_id;

        $brandId = $request->Brand_id;
        $modelId = $request->Model_id;
        $fuelId = $request->Fuel_id;

        $brandName = Brand::where(['id' => $brandId])->value('make_name');
        $modelName = Carmodels::where(['id' => $modelId])->value('model_name');
        $fuelName = Fuel::where(['id' => $fuelId])->value('fuel_type');
        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $brandId);
        Session::put('modelId', $modelId);
        Session::put('fuelId', $fuelId);


        
        $services=[];
        $servData=[];
        $userOld  = User::where(['mobile'=> $request->mobile1])->first();
        // dd($userOld);
        $packages   = AssignedPackages::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id, 'package_type' => 1 ])->get();
        // $packages   = Package::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id ])->get();
        $getPackId  = AssignedPackages::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id, 'package_type' => 1 ])->select('id')->get();
        // $getPackId  = Package::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id ])->select('id')->get();

        if(Auth::check()) {
            if($packages->count() > 0) {
            foreach ($getPackId as $key=>$serv) {
                $services[$key] = [$serv->id];
            }
            foreach ($services as $key => $value) {

                $PackageData[$key] = AssignedPackages::with('hasServices')->where(['id' => $value[0]])->first();
                // dd($PackageData[$key]);
                // $servData[$key] = service::select('service_name')->where('package_id','=',$value[0])->get();
            }        

            return Response()->json(array(
                'categories' => $PackageData
            ));
            }else {
                return(['responseCode'=>400, 'responseMessage'=> 'No packages available!!!' ]);
            }
        }

         if ($userOld) {
            // dd("hi".$packages);
            Auth::login($userOld, true);
             if($packages->count() > 0) {
            foreach ($getPackId as $key=>$serv) {
                $services[$key] = [$serv->id];
            }
            foreach ($services as $key => $value) {

                $PackageData[$key] = AssignedPackages::with('hasServices')->where(['id' => $value[0]])->first();
                // dd($PackageData[$key]);
                // $servData[$key] = service::select('service_name')->where('package_id','=',$value[0])->get();
            }        

            return Response()->json(array(
                'categories' => $PackageData
            ));
            }else {
                return(['responseCode'=>400, 'responseMessage'=> 'No packages available!!!' ]);
            }
            
        }else{
            // dd("hello".$userOld);

             $createNewUser = User::create ([
                'mobile'    => $request->mobile1,
                'email'     => null,
                'username'  =>  null,
                'password'  => null,
            ]);
              $userNew  = User::where(['mobile'=> $request->mobile1])->first();
            if($userNew){
                Auth::login($userNew, true);
                 $auth_id = Auth::user()->id;
                $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->mobile1,
                    'leadType'  =>  'Periodic Services',
                  ]);
               if($packages->count() > 0) {
                    foreach ($getPackId as $key=>$serv) {
                        $services[$key] = [$serv->id];
                    }
            
            foreach ($services as $key => $value) {

                $PackageData[$key] = AssignedPackages::with('hasServices')->where(['id' => $value[0]])->first();
                // dd($PackageData[$key]);
                // $servData[$key] = service::select('service_name')->where('package_id','=',$value[0])->get();
            }        
            return Response()->json(array(
                'categories' => $PackageData
            ));
        }else {
            return(['responseCode'=>400, 'responseMessage'=> 'No packages available!!!' ]);
        }

            }
        }
       

    }

    //    public function searchUpkeepPack(Request $request){
    //     // dd($request->all())

    //     $Brand_id = $request->Brand_id;
    //     $Model_id = $request->Model_id;
    //     $Fuel_id = $request->Fuel_id;
    //     $services=[];
    //     $servData=[];
         
    //     $packages   = AssignedPackages::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id, 'package_type' => 3 ])->get();
    //     // $packages   = Package::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id ])->get();
    //     // dd($packages);
    //     $getPackId  = AssignedPackages::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id, 'package_type' => 3 ])->select('id')->get();
    //     // $getPackId  = Package::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id ])->select('id')->get();
    //     if($packages->count() > 0) {
    //             foreach ($getPackId as $key=>$serv) {
    //                 $services[$key] = [$serv->id];
    //             }
    //             foreach ($services as $key => $value) {
    //                 $PackageData[$key] = AssignedPackages::with('hasServices')->where(['id' => $value[0]])->first();
    //             // dd($PackageData[$key]);
    //             // $servData[$key] = service::select('service_name')->where('package_id','=',$value[0])->get();
    //             }        
    //             return Response()->json(array(
    //                 'categories' => $PackageData
    //             ));
    //         }else {
    //             return(['responseCode'=>400, 'responseMessage'=> 'No packages available!!!' ]);
    //         }
       


    // }

    public function addPartToCart(Request $request){
        $partData = CarServiceParts::where(['id' => $request->part_id])->first();
        $totalPrice = $partData->price * $request->partQty;
        $auth_id = Auth::user()->id;
        $getCart = Cart::where('u_id','=',$auth_id)->where('category','5')->get();
        $updatedPartQty = 0;
        if ($getCart->toArray() != []) {
            foreach($getCart as $key=>$value){
                if($value->pack_id == $request->part_id) {
                    $updatedPartQty = $value->part_quantity+1;
                    $update_cart=Cart::where(['pack_id' => $request->part_id, 'u_id' => Auth::user()->id ])->update([
                        'part_quantity' => $updatedPartQty,
                        'pack_price' =>$totalPrice,
                    ]);
                    if($update_cart){ 
                        $res = array('msg' => 'Part Added Successfully', 'status' => true, 'pack_id' => $request->part_id);
                        return Response()->json($res);
                    }
                } 
            }

            $add_cart=Cart::create([
                'pack_id' => $request->part_id,
                'u_id' => $auth_id,
                'pack_price' =>$totalPrice,
                'part_quantity' =>$request->partQty,
                'category'  =>  '5',
            ]);

            if($add_cart){ 
                $res = array('msg' => 'Part Added Successfully', 'status' => true, 'pack_id' => $request->part_id);
            }
            return Response()->json($res);

        } else {
            if(isset(Auth::user()->id)) {
                // $auth_id = Auth::user()->id;
                $add_cart=Cart::create([
                    'pack_id' => $request->part_id,
                    'u_id' => $auth_id,
                    'pack_price' =>$totalPrice,
                    'part_quantity' =>$request->partQty,
                    'category'  =>  '5',
                ]);

                if($add_cart){ 
                    $res = array('msg' => 'Part Added Successfully', 'status' => true, 'pack_id' => $request->part_id);
                }
                return Response()->json($res);    
            }else {
                $res = array('msg' => 'User Not Logged In', 'status' => false, 'responseCode' => 404);
                return Response()->json($res);
            }

        }

        // dd($totalPrice);
    }

    public function removePartFromCart(Request $request){
        $partData = CarServiceParts::where(['id' => $request->part_id])->first();
        $totalPrice = $partData->price * $request->partQty;
        $auth_id = Auth::user()->id;
        $getCart = Cart::where('u_id','=',$auth_id)->where('category','5')->get();
        $updatedPartQty = 0;

        if ($getCart->toArray() != []) {
            foreach($getCart as $key=>$value){
                if($value->pack_id == $request->part_id) {
                    $updatedPartQty = $value->part_quantity-1;
                    if($updatedPartQty == 0) {
                        $update_cart=Cart::where(['pack_id' => $request->part_id, 'u_id' => Auth::user()->id ])->delete();
                    } else {
                        $update_cart=Cart::where(['pack_id' => $request->part_id, 'u_id' => Auth::user()->id ])->update([
                            'part_quantity' => $updatedPartQty,
                            'pack_price' =>$totalPrice,
                        ]);
                    }
                    if($update_cart){ 
                        $res = array('msg' => 'Part Added Successfully', 'status' => true, 'pack_id' => $request->part_id);
                        return Response()->json($res);
                    }
                } 
            }

            $add_cart=Cart::create([
                'pack_id' => $request->part_id,
                'u_id' => $auth_id,
                'pack_price' =>$totalPrice,
                'part_quantity' =>$request->partQty,
                'category'  =>  '5',
            ]);

            if($add_cart){ 
                $res = array('msg' => 'Part Added Successfully', 'status' => true, 'pack_id' => $request->part_id);
            }
            return Response()->json($res);

        } else {
            if(isset(Auth::user()->id)) {
                // $auth_id = Auth::user()->id;
                $add_cart=Cart::create([
                    'pack_id' => $request->part_id,
                    'u_id' => $auth_id,
                    'pack_price' =>$totalPrice,
                    'part_quantity' =>$request->partQty,
                    'category'  =>  '5',
                ]);

                if($add_cart){ 
                    $res = array('msg' => 'Part Added Successfully', 'status' => true, 'pack_id' => $request->part_id);
                }
                return Response()->json($res);    
            }else {
                $res = array('msg' => 'User Not Logged In', 'status' => false, 'responseCode' => 404);
                return Response()->json($res);
            }

        }


        // if(isset(Auth::user()->id)) {
        //     $auth_id = Auth::user()->id;
        //     $delete_cart=Cart::where(['pack_id' => $request->part_id])->delete();

        //     if($delete_cart){ 
        //         $res = array('msg' => 'Part Removed Successfully', 'status' => true, 'pack_id' => $request->part_id);
        //         return Response()->json($res);    
        //     }
        // }else {
        //     $res = array('msg' => 'User Not Logged In', 'status' => false, 'responseCode' => 404);
        //     return Response()->json($res);
        // }
    }

     public function addToCart(Request $request){
        if(isset(Auth::user()->id)) {
            $auth_id = Auth::user()->id;
            $check = Cart::where('category','1')->first();
            // dd($check);
            if($check){
                $del = Cart::where('category','1')->delete();
            }
             $add_cart=Cart::create([
                'pack_id' => $request->package_id,
                'u_id' => $auth_id,
                'pack_price' =>$request->package_price,
                'category'  =>  '1',
                ]);

            if($add_cart){ 
                $res = array('msg' => 'Package Added Successfully', 'status' => true, 'pack_id' => $request->package_id);
            }
            return Response()->json($res);    
        }else {
            $res = array('msg' => 'User Not Logged In', 'status' => false, 'responseCode' => 404);
            return Response()->json($res);
        }
    }
    public function addAddon(Request $request){
        $auth_id = Auth::user()->id;
        $addon_Price = AddonPack::where('id',$request->addon_id)->value('addon_price');
        // dd($addon_Price);
        $check_addon = Cart::where('pack_id',$request->addon_id)->where('category','7')->get();
        // dd($check_addon);
        if($check_addon){
        $emptyCart = Cart::where('pack_id',$request->addon_id)->where('category','7')->delete();

        }
        $add_cart=Cart::create([
            'pack_id' => $request->addon_id,
            'u_id' => $auth_id,
            'pack_price' =>$addon_Price,
            'category'  =>  '7',
        ]);
        // dd($add_cart);

        if($add_cart){ 
            $res = array('msg' => 'Package Added Successfully', 'status' => true);
        }
        return Response()->json($res);    
    }

    public function getCart(Request $request){
        $auth_id    = Auth::user()->id;
        $getCart            = Cart::where('u_id','=',$auth_id)->where('category','1')->select('pack_id')->get();
        $getAccidentalParts = Cart::where('u_id','=',$auth_id)->where('category','2')->get();
        $getMechRepair      = Cart::where('u_id','=',$auth_id)->where('category','3')->select('pack_id')->get();
        $getAcRepair        = Cart::where('u_id','=',$auth_id)->where('category','4')->select('pack_id')->get();
        $getBatteryData     = Cart::where('u_id','=',$auth_id)->where('category','5')->select('pack_id')->get();
        $getUpkeepServ      = Cart::where('u_id','=',$auth_id)->where('category','6')->select('pack_id')->get();
        $getAddon           = Cart::where('u_id','=',$auth_id)->where('category','7')->select('pack_id')->get();
        $getMemPack           = Cart::where('u_id','=',$auth_id)->where('category','10')->select('pack_id')->get();

        $addonData  = [];
        $batteryPartsData  = [];
        $cartData  = [];
        $accPartsData = [];

        $addonCartData = [];
        $cartAcData = [];
        $cartMechData = [];
        $cartUpkeepData = [];
        $cartMemData= [];


        if ($getCart->toArray() != []) {
            foreach($getCart as $key1=>$pac){
                 $cartData[$key1] = AssignedPackages::with('hasServices')->where('id', $pac->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found Periodicpackage in Cart','responseCode'=>400,'status' => true);
        }

         if ($getAcRepair->toArray() != []) {
            foreach($getAcRepair as $acKey=>$acData){
                 $cartAcData[$acKey] = CarServiceParts::where('id', $acData->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found AC package in Cart','responseCode'=>400,'status' => true);
        }
        if ($getMechRepair->toArray() != []) {
            foreach($getMechRepair as $mechKey=>$mechData){
                 $cartMechData[$mechKey] = CarServiceParts::where('id', $mechData->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found Mechanical package in Cart','responseCode'=>400,'status' => true);
        }
        if ($getUpkeepServ->toArray() != []) {
            foreach($getUpkeepServ as $upKey=>$upData){
                 $cartUpkeepData[$upKey] = CarServiceParts::where('id', $upData->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found Upkeep package in Cart','responseCode'=>400,'status' => true);
        }

        if ($getAddon->toArray() != []) {
            foreach($getAddon->toArray() as $key2=>$value2){
                 $addonData[$key2] = AddonPack::where('id', $value2)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found in addon Cart','responseCode'=>400,'status' => true);
        }

        if ($getBatteryData->toArray() != []) {
            foreach($getBatteryData->toArray() as $batKey=>$batId){
                 $batteryPartsData[$batKey] = CarServiceParts::where('id', $batId)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found in addon Cart','responseCode'=>400,'status' => true);
        }

        if ($getMemPack->toArray() != []) {
            foreach($getMemPack as $keyMem=>$pacMem){
                 $cartMemData[$keyMem] = AssignedPackages::with('hasServices')->where('id', $pacMem->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found Periodicpackage in Cart','responseCode'=>400,'status' => true);
        }

        if ($getAccidentalParts->toArray() != []) {
            foreach($getAccidentalParts as $idx=>$accParts){
            $partsData = new \stdClass();
                $partName = CarPartPricing::where(['id'=> $accParts->pack_id, 'car_type' => $accParts->car_type ])->value('part_name');
                $partsData->id = $accParts->pack_id;
                $partsData->partName = $partName;
                $partsData->partMaterial = $accParts->part_material;
                $partsData->partPrice = $accParts->pack_price;
                $partsData->carType = $accParts->car_type;
                array_push($accPartsData, $partsData);

            }
        }

        return Response()->json(array(
            'res'            =>  $cartData,
            'cartId'         =>  $getCart,
            'acData'         =>  $cartAcData,
            'addon'          =>  $addonData,
            'batteryData'    =>  $batteryPartsData,
            'accPartsData'   =>  $accPartsData,
            'mechData'       =>  $cartMechData,
            'upData'         =>  $cartUpkeepData,
            'MemData'         =>  $cartMemData,
        ));
        return Response()->json($res);
    }

    public function checkoutCart(Request $request){
        $auth_id = Auth::user()->id;
        $mobile = User::where('id','=',$auth_id)->select('mobile')->get();
        
        $cartData = [];
        $accPartsData = [];
        $batteryTyreData = [];
        $batteryTyreQty = [];
        $addonCartData = [];
        $cartAcData = [];
        $cartMechData = [];
        $cartUpkeepData = [];
        $batteryTyrePartsData = [];
        $cartMemData = [];

        $reward = UserReward::first();
        $user_rew = User::where('id',$auth_id)->value('reward');
        $applied_points = 0;
        if($user_rew >= $reward->max_reward_point_to_apply){
            $applied_points = $reward->max_reward_point_to_apply;
        }else{
            $applied_points = $user_rew;
        }

        
        $getCart            = Cart::where('u_id','=',$auth_id)->where('category','1')->select('pack_id')->get();
        $getAccidentalParts = Cart::where('u_id','=',$auth_id)->where('category','2')->get();
        $getMechRepair      = Cart::where('u_id','=',$auth_id)->where('category','3')->select('pack_id')->get();
        $getAcRepair        = Cart::where('u_id','=',$auth_id)->where('category','4')->select('pack_id')->get();
        $batteryCartData    = Cart::where('u_id','=',$auth_id)->where('category','5')->get();
        $getUpkeepServ      = Cart::where('u_id','=',$auth_id)->where('category','6')->select('pack_id')->get();
        $getAddonCart       = Cart::where('u_id','=',$auth_id)->where('category','7')->select('pack_id')->get();
        $getMemPack           = Cart::where('u_id','=',$auth_id)->where('category','10')->select('pack_id')->get();

        $sum = Cart::where('u_id','=',$auth_id)->sum('pack_price');

        $reward = UserReward::first();

        $minimumAmtForReward = $reward->min_order_price_to_get;

        // $max_reward = '';
        // if($reward->min_order_price_to_get <= $sum){
        //     $percent = ($reward->reward_in_percent * $sum) / 100;
        //     if($percent >= $reward->max_reward_per_order){
        //         $max_reward = $reward->max_reward_per_order;
        //     }else{
        //         $max_reward = $percent;
        //     }


        // }
        // dd($max_reward);

         $user_rew = User::where('id',$auth_id)->value('reward');
         $applied_points = 0;
         if($user_rew >= $reward->max_reward_point_to_apply){
            $applied_points = $reward->max_reward_point_to_apply;
         }else{
            $applied_points = $user_rew;
         }
         // dd($applied_points);

        if ($getCart->toArray() != []) {
            foreach($getCart as $key1=>$pac){
                // dd($pac);
                // $cartData=Package::where('id','=',$pac->pack_id)->get();
                 $cartData[$key1] = AssignedPackages::with('hasServices')->where('id', $pac->pack_id)->first();
            }
        }

        if ($batteryCartData->toArray() != []) {
            foreach($batteryCartData as $batKey=>$batterydata){
                // dd($pac);
                // $cartData=Package::where('id','=',$pac->pack_id)->get();
                $batteryTyreQty[$batKey] = $batterydata->part_quantity;
                $batteryTyreData[$batKey] = CarServiceParts::where('id', $batterydata->pack_id)->first();
            }
            $batteryTyrePartsData['batteryTyreData'] = $batteryTyreData;
            $batteryTyrePartsData['partsQty'] = $batteryTyreQty;

        }

        if ($getAccidentalParts->toArray() != []) {
            foreach($getAccidentalParts as $idx=>$accParts){
            $partsData = new \stdClass();
                $partName = CarPartPricing::where(['id'=> $accParts->pack_id, 'car_type' => $accParts->car_type ])->value('part_name');
                $partsData->partName = $partName;
                $partsData->partMaterial = $accParts->part_material;
                $partsData->partPrice = $accParts->pack_price;
                $partsData->carType = $accParts->car_type;
                array_push($accPartsData, $partsData);

            }
        }

        // return Response()->json(array(
        //     'cartData' => $cartData,
        //     'mobile'   => $mobile,
        //     'sum'      => $sum,
        //     // 'batteryTyreData' => $batteryTyreData,
        // ));
        if ($getAcRepair->toArray() != []) {
            foreach($getAcRepair as $acKey=>$acData){
                // dd($pac);
                // $cartData=Package::where('id','=',$pac->pack_id)->get();
                 $cartAcData[$acKey] = CarServiceParts::where('id', $acData->pack_id)->first();
            }
            // dd($cartAcData);
        }
        else{
            $res = array('msg' => 'No data found package in Cart','responseCode'=>400,'status' => true);
        }

         if ($getMechRepair->toArray() != []) {
            foreach($getMechRepair as $mechKey=>$mechData){
                $cartMechData[$mechKey] = CarServiceParts::where('id', $mechData->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found package in Cart','responseCode'=>400,'status' => true);
        }
        if ($getUpkeepServ->toArray() != []) {
            foreach($getUpkeepServ as $upKey=>$upData){
                $cartUpkeepData[$upKey] = CarServiceParts::where('id', $upData->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found package in Cart','responseCode'=>400,'status' => true);
        }

        if ($getAddonCart->toArray() != []) {
            foreach($getAddonCart as $addkey=>$addCart){
                // $cartData=Package::where('id','=',$pac->pack_id)->get();
                 $addonCartData[$addkey] = AddonPack::where('id', $addCart->pack_id)->first();
        // dd($addonCartData[$key1]);
            }
                // dd($addCart->pack_id);
        }
         if ($getMemPack->toArray() != []) {
            foreach($getMemPack as $keyMem=>$pacMem){
                 $cartMemData[$keyMem] = AssignedPackages::with('hasServices')->where('id', $pacMem->pack_id)->first();
            }
        }
        else{
            $res = array('msg' => 'No data found Periodicpackage in Cart','responseCode'=>400,'status' => true);
        }

        return Response()->json(array(
            'cartData' => $cartData,
            'mobile'   => $mobile,
            'sum'      => $sum,
            'addonData' => $addonCartData,
            'accPartsData'=> $accPartsData,
            'batteryTyrePartsData' => $batteryTyrePartsData,
            'acData'    => $cartAcData,
            'mechData'    => $cartMechData,
            'upData'    => $cartUpkeepData,
            'MemData'         =>  $cartMemData,
            'applied_points'        =>  $applied_points,
            'total_points'          =>  $user_rew,
            'max_reward_point_to_apply' => $reward->max_reward_point_to_apply,
            'minimumAmtForReward' => $minimumAmtForReward
        ));

    }

    public function Checkout(Request $request){


    }

    public function offlineSubmitRequest(Request $request){

        if($request->email!= null) {
            $email = $request->email;
        } 
        if($request->hiddenEmail != null) {
            $email = $request->hiddenEmail;
        }

        if($request->hiddenName != null) {
            $name = $request->hiddenName;
        }else{
            $name = $request->checkoutName;
        } 

        $auth_id    = Auth::user()->id;
        $userData   = User::where('id',$auth_id)->get();
        $userPhone  = User::where('id',$auth_id)->select('mobile')->get();
        $mobile     = $userPhone[0]->mobile;

        $getMemPack  = Cart::where('u_id','=',$auth_id)->where('category','10')->select('pack_id')->get();
        $getAccidentalParts = Cart::where('u_id','=',$auth_id)->where('category','2')->get();
        $getBatteryTyreParts = Cart::where('u_id','=',$auth_id)->where('category','5')->get();
        $getCart    = Cart::where('u_id','=',$auth_id)->where('category','1')->select('pack_id')->get();
        $getAddonCart = Cart::where('u_id','=',$auth_id)->where('category','7')->select('pack_id')->get();
        $getAcCart = Cart::where('u_id','=',$auth_id)->where('category','4')->select('pack_id')->get();
        $getMechCart = Cart::where('u_id','=',$auth_id)->where('category','3')->select('pack_id')->get();
        $getUpkeepCart = Cart::where('u_id','=',$auth_id)->where('category','6')->select('pack_id')->get();
        $cartData   = Cart::where('u_id',$auth_id)->get();
        $sum        = Cart::where('u_id','=',$auth_id)->sum('pack_price');

        $packData = [];
        $accPartsData = [];
        $servData=[];
        $batteryTyreData=[];

        $couponType = $request->couponType;
        $couponAmt = $request->couponAmt;
        $orderedPackages =[];

        $leadData = GeneralLead::where('user_id',$auth_id)->where('mature_status','0')->value('id');
        $leadUpdate ='';
        if ($leadData != null) {
        $leadUpdate = GeneralLead::where('id',$leadData)->update(['mature_status' => '1']);
        }

        $checkEmail  = User::where('id',$auth_id)->value('email');
        $updateEmail='';
        if($checkEmail == null){
            $updateEmail = User::where('id',$auth_id)->update(['email' => $email]);
        }
        $checkName  = User::where('id',$auth_id)->value('username');
        $updateName ='';
        if($checkName == null){
            $updateName = User::where('id',$auth_id)->update(['username' => $name]);
        }

        $packData = [];
        if ($getCart->toArray() != []) {
            foreach($getCart as $key1=>$pac_id){
                 $packData[$key1] = AssignedPackages::with('hasServices')->where('id', $pac_id->pack_id)->first();
            }
        }
        
        $addonCartData = [];
        if ($getAddonCart->toArray() != []) {
            foreach($getAddonCart as $addkey=>$addCart){
                 $addonCartData[$addkey] = AddonPack::where('id', $addCart->pack_id)->first();
            }
        }
        
        $acCartData = [];
          if ($getAcCart->toArray() != []) {
            foreach($getAcCart as $ackey=>$acCart){
                 $acCartData[$ackey] = CarServiceParts::where('id', $acCart->pack_id)->first();
            }
        }

        $servData = [];
        if ($getCart->toArray() != []) {
            foreach($getCart->toArray() as $key2=>$packs_id){
                $servData[$key2] = service::where('package_id', $packs_id)->get();
            }
        }

        if ($getBatteryTyreParts->toArray() != []) {
            foreach($getBatteryTyreParts->toArray() as $batKey=>$batterydata){
                $batteryTyreData[$batKey] = CarServiceParts::where(['id' => $batterydata['pack_id']])->first();
            }
        }

         $cartMemData = [];
         if ($getMemPack->toArray() != []) {
            foreach($getMemPack as $keyMem=>$pacMem){
                 $cartMemData[$keyMem] = AssignedPackages::with('hasServices')->where('id', $pacMem->pack_id)->first();
            }
        }

        if ($getAccidentalParts->toArray() != []) {
            // dd($getAccidentalParts);
            foreach($getAccidentalParts as $idx=>$accParts){
            $partsData = new \stdClass();
                $partName = CarPartPricing::where(['id'=> $accParts->pack_id, 'car_type' => $accParts->car_type ])->value('part_name');
                $partsData->partName = $partName;
                $partsData->partMaterial = $accParts->part_material;
                $partsData->partPrice = $accParts->pack_price;
                $partsData->carType = $accParts->car_type;
                $partsData->make_id = $accParts->make_id;
                $partsData->model_id = $accParts->model_id;
                $partsData->fuel_id = $accParts->fuel_id;
                array_push($accPartsData, $partsData);

            }
        }


        $mechanicCartData = [];
          if ($getMechCart->toArray() != []) {
            foreach($getMechCart as $Mechkey=>$MechCart){
                 $mechanicCartData[$Mechkey] = CarServiceParts::where('id', $MechCart->pack_id)->first();
            }
        }


         $upkeepCartData = [];
          if ($getUpkeepCart->toArray() != []) {
            foreach($getUpkeepCart as $Upkeepkey=>$UpkeepCart){
                 $upkeepCartData[$Upkeepkey] = CarServiceParts::where('id', $UpkeepCart->pack_id)->first();
            }
        }
        $totalPrice =0;
        // foreach ($cartData as $idx => $cartItem) {
        //     $totalPrice = $totalPrice+$cartItem->pack_price;
            
        // }

        $totalPrice = $sum;

        if($couponAmt>0) {
            if($couponType == 1){
                $totalPrice = $totalPrice-$couponAmt;
            } elseif($couponType == 2) {
                $totalPrice = $totalPrice-$couponAmt;
            }
        }

        $rewardData = UserReward::where(['reward_status' => 'active'])->first();

        $rewardPointsAddition = ($totalPrice*$rewardData->reward_in_percent)/100;
        // dd($rewardPointsAddition);

        if($rewardPointsAddition>$rewardData->max_reward_per_order) {
            $rewardPointsEarned =  $rewardData->max_reward_per_order;
        } else {
            $rewardPointsEarned = $rewardPointsAddition;
        }

        $orderPlace = OrderInformation::create([
            'user_id' => $auth_id,
            'final_cost' => $totalPrice,
            'total_cost' => '480',
            'discount_cost' => $request->couponAmt,
            'discount_perc' => '2',
            'promo_code' =>$request->promo,
            'promo_id' =>'1234',
            'paymentType' =>'cod',
            'paymentId' => null,
            'reward_points_earned' => $rewardPointsEarned
        ]);

        // if($orderPlace) {
        //     $rewardPoints = RewardPoints::create([
        //         'userId' => $auth_id,
        //         'orderId' => $orderPlace
        //     ]);
        // }

        $userRewardPoints = User::where(['id' => $auth_id])->value('reward');

        if($orderPlace) {
            $updateUserRewardPoints = User::where(['id' => $auth_id])->update([
                'reward' => $userRewardPoints+$rewardPointsEarned
            ]);
        } 


        $last = OrderInformation::orderBy('id', 'DESC')->select('id')->first();
        
        $order_id = $last->id;
        
        if ($packData != []) {}
            
        foreach ($packData as $key => $value) {
            if ($value->discounted_price>0) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'At Garage',
                    'order_id'                  =>  $order_id,
                    'mobile'                    =>  $mobile,
                    'name'                      =>  $name,
                    'pickup_date'               =>  $request->pickupDate,
                    'time_of_pickup'            =>  $request->pickupTime,
                    // 'special_remark'            =>  $request->specialRemark,
                    'address'                   =>  $request->location,
                    'vehical_number'            =>  $request->carNumber,
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->discounted_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);
            }else{
                OrderPackageInformation::create([
                    'payment_option'            =>  'At Garage',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $request->pickupDate,
                    'time_of_pickup'            =>  $request->pickupTime,
                    // 'special_remark'            =>  $request->specialRemark,
                    'address'                   =>  $request->location,
                    'vehical_number'            =>  $request->carNumber,
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->discounted_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);

            }

            array_push($orderedPackages, $value->package_name);
        }
         foreach ($cartMemData as $key => $value) {
            if ($value->discounted_price>0) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'At Garage',
                    'order_id'                  =>  $order_id,
                    'mobile'                    =>  $mobile,
                    'name'                      =>  $name,
                    'pickup_date'               =>  $request->pickupDate,
                    'time_of_pickup'            =>  $request->pickupTime,
                    // 'special_remark'            =>  $request->specialRemark,
                    'address'                   =>  $request->location,
                    'vehical_number'            =>  $request->carNumber,
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->discounted_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);
            }else{
                OrderPackageInformation::create([
                    'payment_option'            =>  'At Garage',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $request->pickupDate,
                    'time_of_pickup'            =>  $request->pickupTime,
                    // 'special_remark'            =>  $request->specialRemark,
                    'address'                   =>  $request->location,
                    'vehical_number'            =>  $request->carNumber,
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->discounted_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);

            }

            array_push($orderedPackages, $value->package_name);
        }
        foreach ($addonCartData as $key => $value) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'At Garage',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $request->pickupDate,
                    'time_of_pickup'            =>  $request->pickupTime,
                    // 'special_remark'            =>  $request->specialRemark,
                    'address'                   =>  $request->location,
                    'vehical_number'            =>  $request->carNumber,
                    'package_name'              =>  $value->addon_name,
                    'package_description'       =>  $value->addon_description,
                    'total_price'               =>  $value->addon_price,
                    // 'service_time'              =>  $value->service_time,
                    'package_type'              =>  7,
                    'status'                    =>  0,
                    // 'make_id'                   =>  $value->make_id,
                    // 'model_id'                  =>  $value->model_id,
                    // 'fuel_id'                   =>  $value->fuel_id
                ]);
            array_push($orderedPackages, $value->addon_name);
        }
        foreach ($mechanicCartData as $MeKey => $MeValue) {
            OrderPackageInformation::create([
                'payment_option'            =>  'At Garage',
                'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                'mobile'                    =>  $mobile,
                'pickup_date'               =>  $request->pickupDate,
                'time_of_pickup'            =>  $request->pickupTime,
                // 'special_remark'            =>  $request->specialRemark,
                'address'                   =>  $request->location,
                'vehical_number'            =>  $request->carNumber,
                'package_name'              =>  $MeValue->part_name,
                'package_description'       =>  $MeValue->part_description,
                'total_price'               =>  $MeValue->price,
                'service_time'              =>  null,
                'package_type'              =>  3,
                'status'                    =>  0,
                'make_id'                   =>  $MeValue->make_id,
                'model_id'                  =>  $MeValue->model_id,
                'fuel_id'                   =>  $MeValue->fuel_id
            ]);
            array_push($orderedPackages, $MeValue->part_name);
        }
        foreach ($acCartData as $AcKey => $AcValue) {
            OrderPackageInformation::create([
                'payment_option'            =>  'At Garage',
                'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                'mobile'                    =>  $mobile,
                'pickup_date'               =>  $request->pickupDate,
                'time_of_pickup'            =>  $request->pickupTime,
                // 'special_remark'            =>  $request->specialRemark,
                'address'                   =>  $request->location,
                'vehical_number'            =>  $request->carNumber,
                'package_name'              =>  $AcValue->part_name,
                'package_description'       =>  $AcValue->part_description,
                'total_price'               =>  $AcValue->price,
                'service_time'              =>  null,
                'package_type'              =>  4,
                'status'                    =>  0,
                'make_id'                   =>  $AcValue->make_id,
                'model_id'                  =>  $AcValue->model_id,
                'fuel_id'                   =>  $AcValue->fuel_id
            ]);
            array_push($orderedPackages, $AcValue->part_name);
        }
         foreach ($upkeepCartData as $UpKey => $UpValue) {
            OrderPackageInformation::create([
                'payment_option'            =>  'At Garage',
                'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                'mobile'                    =>  $mobile,
                'pickup_date'               =>  $request->pickupDate,
                'time_of_pickup'            =>  $request->pickupTime,
                // 'special_remark'            =>  $request->specialRemark,
                'address'                   =>  $request->location,
                'vehical_number'            =>  $request->carNumber,
                'package_name'              =>  $UpValue->part_name,
                'package_description'       =>  $UpValue->part_description,
                'total_price'               =>  $UpValue->price,
                'service_time'              =>  null,
                'package_type'              =>  6,
                'status'                    =>  0,
                'make_id'                   =>  $UpValue->make_id,
                'model_id'                  =>  $UpValue->model_id,
                'fuel_id'                   =>  $UpValue->fuel_id
            ]);
            array_push($orderedPackages, $UpValue->part_name);
        }

        if ($accPartsData != []) {
            foreach ($accPartsData as $key => $value) {
                // dd($value);

                OrderPackageInformation::create([
                    'payment_option'            =>  'At Garage',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $request->pickupDate,
                    'time_of_pickup'            =>  $request->pickupTime,
                    // 'special_remark'            =>  $request->specialRemark,
                    'address'                   =>  $request->location,
                    'vehical_number'            =>  $request->carNumber,
                    'package_name'              =>  $value->partName,
                    'package_description'       =>  $value->partMaterial,
                    'total_price'               =>  $value->partPrice,
                    'service_time'              =>  0,
                    'package_type'              =>  2,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id,
                    'car_type'                  =>  $value->carType
                ]);

                array_push($orderedPackages, $value->partName); 
            }
        }

        if ($batteryTyreData != []) {
            foreach ($batteryTyreData as $key => $value) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'At Garage',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $request->pickupDate,
                    'time_of_pickup'            =>  $request->pickupTime,
                    // 'special_remark'            =>  $request->specialRemark,
                    'address'                   =>  $request->location,
                    'vehical_number'            =>  $request->carNumber,
                    'package_name'              =>  $value->part_name,
                    'package_description'       =>  $value->part_description,
                    'total_price'               =>  $value->price,
                    'service_time'              =>  0,
                    'package_type'              =>  5,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id,
                ]);

                array_push($orderedPackages, $value->part_name); 
            }
        }
       
        foreach ($servData as $idx1 => $data1) {
            foreach ($data1 as $idx2 => $data2) {
                OrderPackageService::create([
                'order_service_name'  =>  $data2->service_name,
                'order_package_id' =>  $data2->package_id,
                ]);  
            }
        }

        $packagesString = "";

        foreach ($orderedPackages as $key => $value) {
            if($packagesString == "") {
                $packagesString = $value;
            } else {
                $packagesString = $packagesString.", ".$value;            
            }
        }
        if($orderPlace) {
            $msgBody= "Your order with order id #".$order_id." has been placed successfully.";
            $packagesOrdered=$packagesString;

            $msgSubject="Order Invoice";
            $this->sendInvoiceEmailFunction($email,$msgBody,$packagesOrdered,$msgSubject);

            // Code for admin mail
            $adminMsg1 = "Order for ".$packagesString." with order id #".$order_id." has been placed.";
            $adminMsg2 = "";
            $adminSub = "Order Placed";
            $this->sendAdminEmailCommonFunction("customercare@mycarmech.com",$adminMsg1,$adminMsg2,$adminSub);

        }

        $emptyCart = Cart::where('u_id',$auth_id)->delete();
        // $Msg = 'Order for '.$packagesString.' with order id #'.$order_id.' has been placed. Regards, TeamMyCarMech.';

        $Msg = 'Order for '.$packagesString.' with order id #'.$order_id.' has been placed. Regards, Team MyCarMech';
        if($mobile !== null) {
        // $otp = rand(1000,9999);
        // $otpMsg = 'Dear user, Your OTP for login to mycarmech.com is '.$otp.'. Regards, TeamMyCarMech.';
            // send otp to mobile no using sms api
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.kaleyra.io/v1/HXAP1689313803IN/messages",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "to=91".$mobile."&sender=MCMECH&source=API&body=".$Msg."&type=TXN",
              CURLOPT_HTTPHEADER => array(
                "api-key: Ae8098b35d218aae2ae5ccfaeb4a2f00b",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: 9eb0d739-9e60-67bf-1962-ca9ba5f9f4e0"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            // $otpSendStr = "https://msg.technolitesolution.com/vendorsms/pushsms.aspx?user=Bpointer&password=123456&msisdn=".$request->mobile."&sid=BPOINT&msg=".$otpMsg."&fl=0&gwid=2";
            // $client = new GuzzleHttp\Client();
            // $res = $client->get($otpSendStr);

            return response('OTP sent.', 200);
            // return response()->json([$user],200);

        }else {
            return response('User does not exist.', 250);
        }
    }

    public function onlineSubmitRequest(Request $request){
            // dd($request->all());
        $rewardPointsAmt = 0;
        parse_str($request->data, $formdata);
        if(isset($formdata['rewardPoints'])) {
            $rewardPointsAmt = $formdata['rewardPoints'];
        }else {
            $rewardPointsAmt = 0;
        }
        
        $rewardData = UserReward::where(['reward_status' => 'active'])->first();

        $auth_id    = Auth::user()->id;
        $userData   = User::where('id',$auth_id)->get();
        $userPhone  = User::where('id',$auth_id)->select('mobile')->get();
        $mobile     = $userPhone[0]->mobile;

        $email      = $request->email;

        $getMemPack  = Cart::where('u_id','=',$auth_id)->where('category','10')->select('pack_id')->get();
        $getCart    = Cart::where('u_id','=',$auth_id)->where('category','1')->select('pack_id')->get();
        $getAddonCart = Cart::where('u_id','=',$auth_id)->where('category','7')->select('pack_id')->get();
        $getAcCart = Cart::where('u_id','=',$auth_id)->where('category','4')->select('pack_id')->get();
        $getMechCart = Cart::where('u_id','=',$auth_id)->where('category','3')->select('pack_id')->get();
        $getUpkeepCart = Cart::where('u_id','=',$auth_id)->where('category','6')->select('pack_id')->get();
        $cartData   = Cart::where('u_id',$auth_id)->get();
        $getAccidentalParts = Cart::where('u_id','=',$auth_id)->where('category','2')->get();
        $getBatteryTyreParts = Cart::where('u_id','=',$auth_id)->where('category','5')->get();
        $sum        = Cart::where('u_id','=',$auth_id)->sum('pack_price');
        
        $couponType = $formdata['couponType'];
        $couponAmt = $formdata['couponAmt'];
        $checkEmail  = User::where('id',$auth_id)->value('email');
        $checkName  = User::where('id',$auth_id)->value('username');
        $updateEmail='';

        $leadData = GeneralLead::where('user_id',$auth_id)->where('mature_status','0')->value('id');
        $leadUpdate ='';
        if ($leadData != null) {
        $leadUpdate = GeneralLead::where('id',$leadData)->update(['mature_status' => '1']);
        }
        // dd($leadUpdate);

        if($formdata['checkoutName'] != null) {
            $name = $formdata['checkoutName'];
        }else{
            $name = $formdata['hiddenName'];
        }

        if($checkEmail == null){
            $updateEmail = User::where('id',$auth_id)->update(['email' => $email]);
        }

        $updateName = '';
        if($checkName == null){
            $updateName = User:: where('id',$auth_id)->update(['username' => $name]);
        }

        // dd($updateEmail);
        $orderedPackages =[];
        $packData = [];
        $accPartsData = [];
        $servData=[];
        $batteryTyreData=[];
        

        if ($getCart->toArray() != []) {
            foreach($getCart as $key1=>$pac_id){
                 $packData[$key1] = AssignedPackages::with('hasServices')->where('id', $pac_id->pack_id)->first();
            }
        }

        $addonCartData = [];
        if ($getAddonCart->toArray() != []) {
            foreach($getAddonCart as $addkey=>$addCart){
                 $addonCartData[$addkey] = AddonPack::where('id', $addCart->pack_id)->first();
            }
        }
        
        $acCartData = [];
          if ($getAcCart->toArray() != []) {
            foreach($getAcCart as $ackey=>$acCart){
                 $acCartData[$ackey] = CarServiceParts::where('id', $acCart->pack_id)->first();
            }
        }

        $servData = [];
        if ($getCart->toArray() != []) {
            foreach($getCart->toArray() as $key2=>$packs_id){
                $servData[$key2] = service::where('package_id', $packs_id)->get();
            }
        }
        $mechanicCartData = [];
          if ($getMechCart->toArray() != []) {
            foreach($getMechCart as $Mechkey=>$MechCart){
                 $mechanicCartData[$Mechkey] = CarServiceParts::where('id', $MechCart->pack_id)->first();
            }
        }


         $upkeepCartData = [];
          if ($getUpkeepCart->toArray() != []) {
            foreach($getUpkeepCart as $Upkeepkey=>$UpkeepCart){
                 $upkeepCartData[$Upkeepkey] = CarServiceParts::where('id', $UpkeepCart->pack_id)->first();
            }
        }
        $cartMemData = [];
         if ($getMemPack->toArray() != []) {
            foreach($getMemPack as $keyMem=>$pacMem){
                 $cartMemData[$keyMem] = AssignedPackages::with('hasServices')->where('id', $pacMem->pack_id)->first();
            }
        }

        if ($getAccidentalParts->toArray() != []) {
            foreach($getAccidentalParts as $idx=>$accParts){
            $partsData = new \stdClass();
                $partName = CarPartPricing::where(['id'=> $accParts->pack_id, 'car_type' => $accParts->car_type ])->value('part_name');
                $partsData->partName = $partName;
                $partsData->partMaterial = $accParts->part_material;
                $partsData->partPrice = $accParts->pack_price;
                $partsData->carType = $accParts->car_type;
                $partsData->make_id = $accParts->make_id;
                $partsData->model_id = $accParts->model_id;
                $partsData->fuel_id = $accParts->fuel_id;
                array_push($accPartsData, $partsData);

            }
        }

        if ($getBatteryTyreParts->toArray() != []) {
            foreach($getBatteryTyreParts->toArray() as $batKey=>$batterydata){
                $batteryTyreData[$batKey] = CarServiceParts::where(['id' => $batterydata['pack_id']])->first();
            }
        }


        $totalPrice =0;
        // foreach ($cartData as $idx => $cartItem) {
        //     $totalPrice = $totalPrice+$cartItem->pack_price;
            
        // }

        $totalPrice = $sum;
        // dd($couponAmt);

        if($couponAmt>0) {
            if($couponType == 1){
                $totalPrice = $totalPrice-$couponAmt;
            } elseif($couponType == 2) {
                $totalPrice = $totalPrice-$couponAmt;
            }
        }

        if($rewardPointsAmt>0) {
            $totalPrice = $totalPrice - $rewardPointsAmt; 
        }


        // if($couponAmt>0) {
        //     if($couponType == 1){
        //         $totalPrice = $totalPrice-$couponAmt;
        //     } elseif($couponType == 2) {
        //         $totalPrice = $totalPrice-$couponAmt;
        //     }
        // }
            $rewardPointsAddition = ($totalPrice*$rewardData->reward_in_percent)/100;
            // dd($rewardPointsAddition);

            if($rewardPointsAddition>$rewardData->max_reward_per_order) {
                $rewardPointsEarned =  $rewardData->max_reward_per_order;
            } else {
                $rewardPointsEarned = $rewardPointsAddition;
            }

            $orderPlace = OrderInformation::create([
                'user_id' => $auth_id,
                'final_cost' => $totalPrice,
                'total_cost' => '480',
                'discount_cost' => (string)$formdata['couponAmt'],
                'discount_perc' => '2',
                'promo_code' => $formdata['promo'],
                'promo_id' =>'1234',
                'paymentType' =>'online',
                'paymentId' => $request->transactionId,
                'reward' => $rewardPointsAmt,
                'reward_points_earned' => $rewardPointsEarned
            ]);

            $userRewardPoints = User::where(['id' => $auth_id])->value('reward');

            if($rewardPointsAmt>0 && $orderPlace) {
                $updateUserRewardPoints = User::where(['id' => $auth_id])->update([
                    'reward' => $userRewardPoints-$rewardPointsAmt
                ]);
            } 

            $updatedUserRewardPoints = User::where(['id' => $auth_id])->value('reward');

            if($rewardPointsAddition>$rewardData->max_reward_per_order) {
                $addedRewardPoints = $updatedUserRewardPoints+$rewardData->max_reward_per_order;
            } else {
                $addedRewardPoints = $rewardPointsAddition;
            }

                // $addedRewardPoints = $rewardData->max_reward_per_order;

            if($orderPlace) {
                $addRewardPoints = User::where(['id' => $auth_id])->update([
                    'reward' => $addedRewardPoints
                ]);
            }

            $last = OrderInformation::orderBy('id', 'DESC')->select('id')->first();
            $order_id = $last->id;

        foreach ($packData as $key => $value) {
            if ($value->discounted_price>0) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'Online',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $formdata['pickupDate'],
                    'time_of_pickup'            =>  $formdata['pickupTime'],
                    // 'time_of_pickup'            =>  "23:11:00",
                    // 'special_remark'            =>  $formdata['specialRemark'],
                    'address'                   =>  $formdata['location'],
                    'vehical_number'            =>  $formdata['carNumber'],
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->discounted_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);
            }else{
                OrderPackageInformation::create([
                    'payment_option'            =>  'Online',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $formdata['pickupDate'],
                    'time_of_pickup'            =>  $formdata['pickupTime'],
                    // 'time_of_pickup'            =>  "23:11:00",
                    // 'special_remark'            =>  $formdata['specialRemark'],
                    'address'                   =>  $formdata['location'],
                    'vehical_number'            =>  $formdata['carNumber'],
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->total_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);
            }

            array_push($orderedPackages, $value->package_name);
        }

          foreach ($cartMemData as $key => $value) {
            if ($value->discounted_price>0) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'Online',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $formdata['pickupDate'],
                    'time_of_pickup'            =>  $formdata['pickupTime'],
                    // 'time_of_pickup'            =>  "23:11:00",
                    // 'special_remark'            =>  $formdata['specialRemark'],
                    'address'                   =>  $formdata['location'],
                    'vehical_number'            =>  $formdata['carNumber'],
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->discounted_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);
            }else{
                OrderPackageInformation::create([
                    'payment_option'            =>  'Online',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $formdata['pickupDate'],
                    'time_of_pickup'            =>  $formdata['pickupTime'],
                    // 'time_of_pickup'            =>  "23:11:00",
                    // 'special_remark'            =>  $formdata['specialRemark'],
                    'address'                   =>  $formdata['location'],
                    'vehical_number'            =>  $formdata['carNumber'],
                    'package_name'              =>  $value->package_name,
                    'package_description'       =>  $value->package_description,
                    'total_price'               =>  $value->total_price,
                    'service_time'              =>  $value->service_time,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id
                ]);
            }

            array_push($orderedPackages, $value->package_name);
        }

        foreach ($addonCartData as $key => $value) {
            OrderPackageInformation::create([
                'payment_option'            =>  'Online',
                'order_id'                  =>  $order_id,
                'name'                      =>  $name,
                'mobile'                    =>  $mobile,
                'pickup_date'               =>  $formdata['pickupDate'],
                'time_of_pickup'            =>  $formdata['pickupTime'],
                // 'time_of_pickup'            =>  "23:11:00",
                // 'special_remark'            =>  $formdata['specialRemark'],
                'address'                   =>  $formdata['location'],
                'vehical_number'            =>  $formdata['carNumber'],
                'package_name'              =>  $value->addon_name,
                'package_description'       =>  $value->addon_description,
                'total_price'               =>  $value->addon_price,
                'service_time'              =>  null,
                'package_type'              =>  7,
                'status'                    =>  0,
                // 'make_id'                   =>  $value->make_id,
                // 'model_id'                  =>  $value->model_id,
                // 'fuel_id'                   =>  $value->fuel_id
            ]);
            array_push($orderedPackages, $value->addon_name);
        }

        foreach ($mechanicCartData as $MeKey => $MeValue) {
            OrderPackageInformation::create([
                'payment_option'            =>  'Online',
                'order_id'                  =>  $order_id,
                'name'                      =>  $name,
                'mobile'                    =>  $mobile,
                'pickup_date'               =>  $formdata['pickupDate'],
                'time_of_pickup'            =>  $formdata['pickupTime'],
                // 'special_remark'            =>  $formdata['specialRemark'],
                'address'                   =>  $formdata['location'],
                'vehical_number'            =>  $formdata['carNumber'],
                'package_name'              =>  $MeValue->part_name,
                'package_description'       =>  $MeValue->part_description,
                'total_price'               =>  $MeValue->price,
                'service_time'              =>  null,
                'package_type'              =>  3,
                'status'                    =>  0,
                'make_id'                   =>  $MeValue->make_id,
                'model_id'                  =>  $MeValue->model_id,
                'fuel_id'                   =>  $MeValue->fuel_id
            ]);
            array_push($orderedPackages, $MeValue->part_name);
        }

        foreach ($acCartData as $AcKey => $AcValue) {
            OrderPackageInformation::create([
                'payment_option'            =>  'Online',
                'order_id'                  =>  $order_id,
                'name'                      =>  $name,
                'mobile'                    =>  $mobile,
                'pickup_date'               =>  $formdata['pickupDate'],
                'time_of_pickup'            =>  $formdata['pickupTime'],
                // 'special_remark'            =>  $formdata['specialRemark'],
                'address'                   =>  $formdata['location'],
                'vehical_number'            =>  $formdata['carNumber'],
                'package_name'              =>  $AcValue->part_name,
                'package_description'       =>  $AcValue->part_description,
                'total_price'               =>  $AcValue->price,
                'service_time'              =>  null,
                'package_type'              =>  4,
                'status'                    =>  0,
                'make_id'                   =>  $AcValue->make_id,
                'model_id'                  =>  $AcValue->model_id,
                'fuel_id'                   =>  $AcValue->fuel_id
            ]);
            array_push($orderedPackages, $AcValue->part_name);
        }

        foreach ($upkeepCartData as $UpKey => $UpValue) {
            OrderPackageInformation::create([
                'payment_option'            =>  'Online',
                'order_id'                  =>  $order_id,
                'name'                      =>  $name,
                'mobile'                    =>  $mobile,
                'pickup_date'               =>  $formdata['pickupDate'],
                'time_of_pickup'            =>  $formdata['pickupTime'],
                // 'special_remark'            =>  $formdata['specialRemark'],
                'address'                   =>  $formdata['location'],
                'vehical_number'            =>  $formdata['carNumber'],
                'package_name'              =>  $UpValue->part_name,
                'package_description'       =>  $UpValue->part_description,
                'total_price'               =>  $UpValue->price,
                'service_time'              =>  null,
                'package_type'              =>  6,
                'status'                    =>  0,
                'make_id'                   =>  $UpValue->make_id,
                'model_id'                  =>  $UpValue->model_id,
                'fuel_id'                   =>  $UpValue->fuel_id
            ]);
            array_push($orderedPackages, $UpValue->part_name);
        }

        if ($accPartsData != []) {
            foreach ($accPartsData as $key => $value) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'Online',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $formdata['pickupDate'],
                    'time_of_pickup'            =>  $formdata['pickupTime'],
                    // 'special_remark'            =>  $formdata['specialRemark'],
                    'address'                   =>  $formdata['location'],
                    'vehical_number'            =>  $formdata['carNumber'],
                    'package_name'              =>  $value->partName,
                    'package_description'       =>  $value->partMaterial,
                    'total_price'               =>  $value->partPrice,
                    'service_time'              =>  0,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id,
                    'car_type'                  =>  $value->carType
                ]);

                array_push($orderedPackages, $value->partName); 
            }
        }

        if ($batteryTyreData != []) {
            foreach ($batteryTyreData as $key => $value) {
                OrderPackageInformation::create([
                    'payment_option'            =>  'Online',
                    'order_id'                  =>  $order_id,
                    'name'                      =>  $name,
                    'mobile'                    =>  $mobile,
                    'pickup_date'               =>  $formdata['pickupDate'],
                    'time_of_pickup'            =>  $formdata['pickupTime'],
                    // 'special_remark'            =>  $formdata['specialRemark'],
                    'address'                   =>  $formdata['location'],
                    'vehical_number'            =>  $formdata['carNumber'],
                    'package_name'              =>  $value->part_name,
                    'package_description'       =>  $value->part_description,
                    'total_price'               =>  $value->price,
                    'service_time'              =>  0,
                    'package_type'              =>  1,
                    'status'                    =>  0,
                    'make_id'                   =>  $value->make_id,
                    'model_id'                  =>  $value->model_id,
                    'fuel_id'                   =>  $value->fuel_id,
                ]);

                array_push($orderedPackages, $value->part_name); 
            }

        }



        foreach ($servData as $idx1 => $data1) {
            foreach ($data1 as $idx2 => $data2) {
                OrderPackageService::create([
                'order_service_name'  =>  $data2->service_name,
                'order_package_id' =>  $data2->package_id,
                ]);  
            }
        }

        $packagesString = "";

        foreach ($orderedPackages as $key => $value) {
            if($packagesString == "") {
                $packagesString = $value;
            } else {
                $packagesString = $packagesString.", ".$value;            
            }
        }

        if($orderPlace) {
            $msgBody= "Your order with order id #".$order_id." has been placed successfully.";
            $packagesOrdered=$packagesString;

            $msgSubject="Order Invoice";
            $this->sendInvoiceEmailFunction($email,$msgBody,$packagesOrdered,$msgSubject);

            // Code for admin mail
            $adminMsg1 = "Order for ".$packagesString." with order id #".$order_id." has been placed.";
            $adminMsg2 = "";
            $adminSub = "Order Placed";
            $this->sendAdminEmailCommonFunction("customercare@mycarmech.com",$adminMsg1,$adminMsg2,$adminSub);


        }

        $emptyCart = Cart::where('u_id',$auth_id)->delete();
        // $Msg = 'Order for '.$packagesString.' with order id #'.$order_id.' has been placed. Regards, TeamMyCarMech.';
        $Msg = 'Order for '.$packagesString.' with order id #'.$order_id.' has been placed. Regards, Team MyCarMech';
        // $userData = User::where('mobile','=',$request->mobile)->get();
        
        if($mobile !== null) {
            // $user = User::where(['mobile' => $request->mobile])->update(['otp' => $otp]);
            
            // send otp to mobile no using sms api
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.kaleyra.io/v1/HXAP1689313803IN/messages",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "to=91".$mobile."&sender=MCMECH&source=API&body=".$Msg."&type=TXN",
              CURLOPT_HTTPHEADER => array(
                "api-key: Ae8098b35d218aae2ae5ccfaeb4a2f00b",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: 9eb0d739-9e60-67bf-1962-ca9ba5f9f4e0"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            // $otpSendStr = "https://msg.technolitesolution.com/vendorsms/pushsms.aspx?user=Bpointer&password=123456&msisdn=".$request->mobile."&sid=BPOINT&msg=".$otpMsg."&fl=0&gwid=2";
            // $client = new GuzzleHttp\Client();
            // $res = $client->get($otpSendStr);

            return response('OTP sent.', 200);
            // return response()->json([$user],200);

        }else {
            return response('User does not exist.', 250);
        }
    }

    public function deleteItem(Request $request){
         $auth_id = Auth::user()->id;
         $pack_id = $request->package_id;
         // Cart::where('u_id', $auth_id)->where('pack_id',$pack_id)->delete();
    }


    public function getSingleAddon(Request $request){
        // dd($request->all());
        $singleAddon = AddonPack::where('id',$request->data)->get();
        // dd($singleAddon);

        return Response()->json($singleAddon);


    }

    public function displayPeriodicServices (Request $request, $id){
        $periodic = Package::where('package_type','=','1')->get();
        // $package = service::where('package_id','=','1')->get();
        $service = service::get();
        $addons = AddonPack::get();
        $brandData = Brand::orderBy('make_name')->get();
        $modelData = Carmodels::orderBy('model_name')->get();
        $testimonials = Testimonials::get();

        $rats = Testimonials::select('client_rating')->get();
        $rates;
        $unrates;
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }


        $myArray = explode(',', $id);
        // dd($myArray[1]);
        // $carData = $request->all();
        $brand ="";
        $model ="";
        $fuel ="";
        $brandId ="";
        $modelId ="";
        $fuelId ="";

        if(isset($myArray[1])) {
            $brand = $myArray[0];
            $model = $myArray[1];
            $fuel = $myArray[2];

            $brandId = $myArray[3];
            $modelId = $myArray[4];
            $fuelId = $myArray[5];
            
            Session::put('brandName', $brand);
            Session::put('modelName', $model);
            Session::put('fuelType', $fuel);

            Session::put('brandId', $brandId);
            Session::put('modelId', $modelId);
            Session::put('fuelId', $fuelId);
        }
        // $returnHTML = view('pages/PeriodicServices',compact('periodic','service','testimonials','rating','unrating','brandData','addons','brand','model','fuel'))->render();

        // // dd($brand);


        return view('pages/PeriodicServices',compact('periodic','service','testimonials','rating','unrating','brandData', 'modelData', 'addons', 'brand', 'model', 'fuel', 'brandId', 'modelId', 'fuelId'));
    }

    public function getCartPackages(Request $request) {
        $auth_id = Auth::user()->id;
        $cartData = Cart::where('u_id', '=', $auth_id)->get();
        $checkData = Cart::where('u_id', '=', $auth_id)->where('category','1')->get();
        $cartIdArr = [];
        foreach ($cartData->all() as $key => $value) {
            array_push($cartIdArr, $value->pack_id);
            
        }
        // dd($checkData);
        return(['cartIdArr'=> $cartIdArr,'checkData' =>$checkData ]);
    }

    public function getCartPackages1(Request $request) {
        $auth_id = Auth::user()->id;
        $cartData = Cart::where('u_id', '=', $auth_id)->get();
        $cartIdArr = [];
        foreach ($cartData->all() as $key => $value) {
            array_push($cartIdArr, $value->pack_id);
            
        }
        return(['cartIdArr'=> $cartIdArr ]);
    }

    public function removeCartPackages(Request $request) {
        $auth_id = Auth::user()->id;
        $matchThese = ['u_id' => $auth_id, 'pack_id' => $request->obj ];

        $deletedData = Cart::where($matchThese)->delete();
        if($deletedData) {
            return(['responseStatus'=> 200, 'responseMessage' => 'Package removed from cart!!!' ]);
        }
    }

    protected function sendInvoiceEmailFunction($email,$body,$packagesOrdered,$msgSubject){
      $details = [
        'to' => $email,
        'from' => 'customercare@mycarmech.com',
        'subject' => $msgSubject,
        'title' => $msgSubject,
        "body"  => $body,
        "packagesOrdered" => $packagesOrdered
      ];
      Mail::to($details['to'])->send(new \App\Mail\packageInvoiceMail($details));
      return response()->json([
        'status'  => true,
        'data'    => $details,
        'message' => 'Your details mailed successfully'
      ]);
    }

    protected function sendAdminEmailCommonFunction($email,$body,$body2,$msgSubject){
      $details = [
        'to' => 'customercare@mycarmech.com',
        'from' => 'customercare@mycarmech.com',
        'subject' => $msgSubject,
        'title' => $msgSubject,
        "body"  => $body,
        "body2" => $body2
      ];
      Mail::to($details['to'])->send(new \App\Mail\sendingCommonEmail($details));
      return response()->json([
        'status'  => true,
        'data'    => $details,
        'message' => 'Your details mailed successfully'
      ]);
    }

    public function saveDataToSession(Request $request) {
        // dd($request->all());
        $idsArr = explode(',', $request->idsSelection);
        $selectedDataStr = '';

        $brandId = $idsArr[0];
        $modelId = $idsArr[1];
        $fuelId = $idsArr[2];

        $brandName = Brand::where(['id' => $brandId])->value('make_name');
        $modelName = Carmodels::where(['id' => $modelId])->value('model_name');
        $fuelName = Fuel::where(['id' => $fuelId])->value('fuel_type');

        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $brandId);
        Session::put('modelId', $modelId);
        Session::put('fuelId', $fuelId);

        $selectedDataStr = $brandName.','.$modelName.','.$fuelName;
        return response($selectedDataStr,200);
    }
       public function saveHomeDataToSession(Request $request) {
        // dd($request->all());

        $brandName = Brand::where(['id' => $request->brand])->value('make_name');
        $modelName = Carmodels::where(['id' => $request->model])->value('model_name');
        $fuelName = Fuel::where(['id' => $request->fuel])->value('fuel_type');

        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $request->brand);
        Session::put('modelId', $request->model);
        Session::put('fuelId', $request->fuel);

        $selectedDataStr = $brandName.','.$modelName.','.$fuelName;
        return response($selectedDataStr,200);
    }
     public function saveAuthHomeDataToSession(Request $request) {
        // dd($request->all());
        $userOld  = User::where(['mobile'=> $request->mobile])->first();

        $brandName = Brand::where(['id' => $request->brand])->value('make_name');
        $modelName = Carmodels::where(['id' => $request->model])->value('model_name');
        $fuelName = Fuel::where(['id' => $request->fuel])->value('fuel_type');

        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $request->brand);
        Session::put('modelId', $request->model);
        Session::put('fuelId', $request->fuel);

         if ($userOld) {
            Auth::login($userOld, true);
        }else{
            $createNewUser = User::create ([
                'mobile'    => $request->mobile,
                'email'     => null,
                'username'  =>  null,
                'password'  => null,
            ]);

            $general_lead=GeneralLead::create([
                'user_id' => $createNewUser->id,
                'mobile' =>$request->mobile,
                'leadType'  =>  'Homepage',
                'mature_status' =>  '0',
            ]);

              $userNew  = User::where(['mobile'=> $request->mobile])->first();
            if($userNew){
                Auth::login($userNew, true);
        }

        $selectedDataStr = $brandName.','.$modelName.','.$fuelName;
        return response($selectedDataStr,200);
    }
}


public function checkCartItem(){
     $auth_id = Auth::user()->id;
        // $del = Cart::where(['pack_id' => $request->cartId])->where(['u_id' => $auth_id])->first();
    $check = Cart::where(['u_id' => $auth_id])->count();
    // dd($check);
    if($check){
       // return response("Cart has items",200);
       return Response()->json(array(
                'msg' => "Cart has items",
                'status'    => 200,
            ));
    }else{
       // return response("Cart does not have item",400);
    return Response()->json(array(
                'msg' => "Cart does not have item",
                'status'    => 400,
            ));
    }

}

}
