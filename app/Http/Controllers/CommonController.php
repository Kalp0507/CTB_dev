<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\services;
use App\Models\Testimonials;
use App\Models\AddonPack;
use App\Models\Membership;
use App\Models\City;
use App\Models\Package;
use App\Models\Carmodels;
use App\Models\Brand;
use App\Models\Fuel;
use App\Models\ServicesLeads;
use App\Models\AcLeads;
use App\Models\MechanicalLeads;
use App\Models\UpkeepLeads;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\GeneralLead;
use App\Models\User;
use Session;
use Mail;
use App\Mail\sendingCommonEmail;
use App\Models\OrderInformation;
use App\Models\OrderPackageInformation;
use App\Models\OrderPackageService;
use App\Models\SeasonalOffer;
use App\Models\Promocode;
use App\Models\CarServiceParts;
use App\Models\AssignedPackages;
use App\Models\CarPartPricing;
use App\Models\CarTypes;
use Illuminate\Support\Facades\Hash;
use App\Models\InsuranceCompanies;

use Illuminate\Support\Facades\Auth;


class CommonController extends Controller
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
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
 public function login(Request $request)
    {
        $service = services::get();
        $seasonal = SeasonalOffer::get();
        $testimonials = Testimonials::get();
        $membership = Membership::get();
         $rats = Testimonials::select('client_rating')->get();
        $brandData = Brand::orderBy('make_name')->get();
        $addons = AddonPack::get();
        $membershipPackages = Package::where(['package_type' => 2])->get();
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
            // dd($unrating);
        return view('pages.home',compact('service','testimonials','membership','rating','unrating','brandData','seasonal','membershipPackages','addons')); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function edit(Common $common)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Common $common)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function destroy(Common $common)
    {
        //
    }


    public function onServicePageLoad(Request $request)
    {
         $service = services::get();
          $testimonials = Testimonials::get();
          $seasonal = SeasonalOffer::get();

          $addons = AddonPack::get();
          $rats = Testimonials::select('client_rating')->get();
          $brandData = Brand::orderBy('make_name')->get();
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
            // dd($unrating);
        return view('pages.services',compact('service','testimonials','addons','rating','unrating','brandData','seasonal','membershipPackages'));

    }

    public function onAccidentalPageLoad(Request $request)
    {
        $selectedData = $request->query();
        if($selectedData !== []) {
            $selectedBrand = $selectedData['brand']; 
            $selectedModel = $selectedData['model']; 
            $selectedFuel = $selectedData['fuel'];
        } else {
            $selectedBrand = '';
            $selectedModel = '';
            $selectedFuel = '';
        }

        $insuranceCompanies = InsuranceCompanies::get();
         $service = services::get();
          $testimonials = Testimonials::where('category','=','2')->get();
          // dd($testimonials);
          $addons = AddonPack::where('category','=','1')->get();
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
        
        // Getting Brand, Model, Fuel code
        $periodic = Package::where('package_type','=','1')->get();
        // $package = service::where('package_id','=','1')->get();
        $brandData = Brand::orderBy('make_name')->get();
        $modelData = Carmodels::orderBy('model_name')->get();
        $fuelData = Fuel::orderBy('fuel_type')->get();
        $carTypes = CarTypes::get();

        // $myArray = explode(',', $id);
        // $brand ="";
        // $model ="";
        // $fuel ="";
        // $brandId ="";
        // $modelId ="";
        // $fuelId ="";

        // if(isset($myArray[1])) {
        //     $brand = $myArray[0];
        //     $model = $myArray[1];
        //     $fuel = $myArray[2];

        //     $brandId = $myArray[3];
        //     $modelId = $myArray[4];
        //     $fuelId = $myArray[5];

        // }

        return view('pages.accidentalRepair',compact('service','testimonials','addons','rating','unrating','selectedModel','selectedFuel','brandData','modelData','selectedBrand','fuelData','carTypes','insuranceCompanies' ));

    }

    public function onAboutPageLoad(Request $request)
    {
        $testimonials = Testimonials::get();
        $service = services::get();

        // $membership = Membership::get();
        $membershipPackages = Package::where(['package_type' => 2])->get();
        $cities = City::get();

         $rats = Testimonials::select('client_rating')->get();
        $rates;
        $unrates;
        $brandData = Brand::orderBy('make_name')->get();
        foreach ($rats as $key=>$rate) {
            $unrates=5;

            $rates = $rate->client_rating;
            $unrates = $unrates - $rates;
            $unrating[$key] = [ $unrates ];
            $rating[$key] = [$rates];
        }
            // dd($unrating);

        return view('pages.about',compact('testimonials','membershipPackages','service','cities','rating','unrating','brandData'));

    }

    public function registerServiceLead(Request $request) {
        $leadData = $request->all();

        $count=0;
        if(Auth::check()) {
          $count=1;
        }
        
        $add_cart=ServicesLeads::create([
            'make' => $leadData['brands'],
            'model' => $leadData['models'],
            'fuel_type' =>$leadData['fuels'],
            'name'  =>  $leadData['username'],
            'mobileNo' =>$leadData['userMobile'],
            'serviceType' =>$leadData['selectedService'],
            'leadType' =>$count,
        ]);

        if($add_cart) {
            return json_encode(['responseCode' => 200, 'responseMessage' => 'Request Form Sumitted']);
        } else {
            return json_encode(['responseCode' => 400, 'responseMessage' => 'Something went wrong']);
        }
    }

    public function getCartCount(Request $request) {
        if(Auth::check()) {
            $userId = Auth::user()->id;
            $cartData = Cart::where('u_id','=',$userId)->get();
            $count = 0;
            if($cartData->all() !== []) {
                $count = $count+1;
            }
            return json_encode(['count' => count($cartData)]);
        }
    }

    public function afterLogin(Request $request) {
      $matchThese = ['mobile' => $request->mobile, 'otp' => $request->otp ];
      $user  = User::where($matchThese)->first();

        if( $user){
            Auth::login($user, true);
            $userType = User::where(['mobile' => $request->mobile])->value('utype');
            User::where(['mobile' => $request->mobile])->update(['otp' => null]);
            if($userType == "ADM") {
              return response('Login Successful', 210);
            }
            return response('Login Successful', 200);
        }
        else{
          return response('Invalid OTP', 250);
            // return Redirect::back ();

        }
    }

    public function contactMail(Request $request) {
      // dd($request->all());
      // if (strlen($request->message) == 0) {
      //   return redirect('contact')->with('message','Please enter a valid message.');
      // }

      // if (strlen($request->name) == 0) {
      //   return redirect('contact')->with('message','Please enter a valid name.');
      // }

      $msgBody = "From: ".$request->name.", Contact: ".$request->number;
      $body = "Message: ".$request->message;
      $msgSubject = "Customer Query";
      $title = "Customer Query";
      $details = [
        'to' => 'customercare@mycarmech.com',
        'from' => 'customercare@mycarmech.com',
        'subject' => $msgSubject,
        'title' => $msgSubject,
        "body"  => $msgBody,
        "body2" => $body
      ];
      Mail::to($details['to'])->send(new \App\Mail\sendingCommonEmail($details));
      // return response()->json([
      //   'status'  => true,
      //   'data'    => $details,
      //   'message' => 'Your details mailed successfully'
      // ]);
      // return Redirect::back()->with('message','Operation Successful !');
      // return redirect('contact')->with('message','Message Submitted Successfully');
      // return redirect('contact')->with('message','Successfully Submitted');
      // return redirect('accidentalRepair')->with('message','Successfully Submitted');

      $arr = array('msg' => 'Request Submitted Successfully', 'status' => true);
        return Response()->json($arr);
        // return redirect('contact')->with('success','Request Submitted Successfully'); 

    }

    public function goToAccount(Request $request) {
      $userId = Auth::user()->id;
        $brandData = Brand::orderBy('make_name')->get();

      $userData = User::where(['id'=>$userId])->first();
      $orderHistoryData = OrderInformation::where(['user_id'=>$userId])->with('hasOrderInformation')->get();
      // $orderPackageInformation = OrderPackageInformation::where()
      $arrayOfCarInfo = [];
      foreach ($orderHistoryData as $key => $orderData) {
      // dd($orderData);
        $arrayOfCarInfoObj = new \stdClass();
        $arrayOfCarInfoObj->orderId = $orderData->id;
        $arrayOfCarInfoObj->paymentId = $orderData->paymentId;
        $arrayOfCarInfoObj->orderpaymentType = $orderData->paymentType;
        foreach ($orderData->hasOrderInformation as $idx => $orderWithPackage) {
          // dd($orderWithPackage);
          $arrayOfCarInfoObj->brand[$idx] = Brand::where('id',$orderWithPackage->make_id)->value('make_name');
          $arrayOfCarInfoObj->model[$idx] = Carmodels::where('id',$orderWithPackage->model_id)->value('model_name');
          $arrayOfCarInfoObj->fuel[$idx] = Fuel::where('id',$orderWithPackage->fuel_id)->value('fuel_type');
          $arrayOfCarInfoObj->vehical_number = $orderWithPackage->vehical_number;

        }
        $arrayOfCarInfo[$key] = $arrayOfCarInfoObj;
      }

      // dd($arrayOfCarInfo);
      return view('pages.account',compact('userData','orderHistoryData','arrayOfCarInfo','brandData'));
    }

    public function updateAccount(Request $request) {
      // dd($request->inputUsername);
      $userId = Auth::user()->id;
      $existingEmail = User::where('email', '=', $request->inputEmail)->where('id','!=',$userId)->get();
// dd(count($existingEmail));
      
      if(count($existingEmail)>0) {
        return response('Email id already exists.', 250);
      }

      $updateProfile = User::where(['id'=>$userId])->update([
        'username' => $request->inputUsername,
        'mobile' => $request->inputMobile,
        'email' => $request->inputEmail,
        'address' => $request->inputAddress
      ]);


      if($updateProfile) {
        return response('Profile Updated Successfully', 200);
      } else {
        return response('Something went wrong', 250);
      }
    }
    public function AcEstimate(Request $request){
      // dd($request->all());
      $make_name = Brand::where('id', '=', $request->brands)->value('make_name');
      $model_name = Carmodels::where('id','=', $request->models)->value('model_name');
      $fuel_name  = Fuel::where('id','=', $request->fuels)->value('fuel_type');
      $partId = $request->partSelection;
      $partName=[];
// dd($partId);
      if($partId == null) {
        return response()->json([
          'status'  => false,
          'message' => 'failed'
          ]);
      }
      foreach ($partId as $key => $value) {
        $partName[$key] = CarServiceParts::where(['part_name'=> $value])
                                           ->where(['make_id' => $request->brands])
                                           ->where(['model_id' => $request->models])
                                           ->where(['fuel_id' => $request->fuels])->sum('price');;
      }
      // dd($partId);
      
      $partTotal = 0;
      foreach ($partName as $partKey => $partPrice) {
         $partTotal = (float)$partTotal + (float)$partPrice;        
      }
        $totalPrice = number_format($partTotal);
    $partNameStr = '';
      foreach ($partId as $part => $partValue) {
        if($partNameStr == ''){
          $partNameStr = $partValue;
        }else{
          $partNameStr = $partNameStr.','.$partValue;        
        }
      }
      // dd($partNameStr);
      $insertServiceLeads = ServicesLeads::create([
        'make'              =>  $make_name,
        'model'             =>  $model_name,
        'fuel_type'         =>  $fuel_name,
        'name'              =>  null,
        'mobileNo'          =>  $request->mobile1,
        'leadType'          =>  '1',
        'serviceType'       =>  $request->serviceType,
        'selected_parts'    =>  $partNameStr,
        'remark'            =>  $request->remark,
      ]);

// dd($totalPrice);
     if($insertServiceLeads)
      {
        return response()->json([
          'status'  => true,
          'price'   => $totalPrice,
          'make'    =>$make_name,
          'model'   =>$model_name,
          'fuel'    =>$fuel_name,
          'parts'   =>$partNameStr,
          'message' => 'Your details filled successfully'
        ]);
      }else{
        return response()->json([
          'status'  => false,
          'message' => 'failed'
          ]);
      }
    }
    

    public function verifyPromocode(Request $request) {
      $promocodes = Promocode::get();
      $count = 0;
      $discount=0;
      $dataToReturn=[];

      foreach ($promocodes as $key => $value) {
        if($request->enteredPromo == $value->promocode_text) {

          $paymentDate = date('Y-m-d');
          $paymentDate=date('Y-m-d', strtotime($paymentDate));

          $promoDateBegin = date('Y-m-d', strtotime($value->promocode_start_date));
          $promoDateEnd = date('Y-m-d', strtotime($value->promocode_end_date));

          if (($paymentDate >= $promoDateBegin) && ($paymentDate <= $promoDateEnd)){
            if($value->selection_type == '1') {
              $discount = ($request->totalAmount * $value->promocode_amount)/100;
              if($discount>$value->max_discount) {
                $discount = $value->max_discount;
              }
              $updatedAmount = $request->totalAmount-$discount;
             
              $dataToReturn = [
                  'discountAmt'  => $discount,
                  'promoType' => $value->selection_type,
                  'updatedAmount' => $updatedAmount
              ];
              $count++;
              return response($dataToReturn,200);
            }
            if($value->selection_type == '2') {
              $updatedAmount = $request->totalAmount - $value->promocode_amount;
              $dataToReturn = [
                  'discountAmt'  => $value->promocode_amount,
                  'promoType' => $value->selection_type,
                  'updatedAmount' => $updatedAmount
              ];
              $count++;

              return response($dataToReturn,200);

            }
          }else{
            return response('Invalid Promocode Code',250);
          }
            

          // if($value->selection_type == '1') {
          //   $discount = ($request->totalAmount * $value->promocode_amount)/100;
          //   $updatedAmount = $request->totalAmount-$discount;
           

          //   $dataToReturn = [
          //       'discountAmt'  => $discount,
          //       'promoType' => $value->selection_type,
          //       'updatedAmount' => $updatedAmount
          //   ];
          //   $count++;
          //   return response($dataToReturn,200);
          // }
          // if($value->selection_type == '2') {
          //   $updatedAmount = $request->totalAmount - $value->promocode_amount;
          //   $dataToReturn = [
          //       'discountAmt'  => $value->promocode_amount,
          //       'promoType' => $value->selection_type,
          //       'updatedAmount' => $updatedAmount
          //   ];
          //   $count++;

          //   return response($dataToReturn,200);

          // }

        } 

      }
        if($count == 0) {
          return response('Invalid Promocode Code',250);
        }
    }

    public function getMembershipPackages(Request $request) {
      $membershipPackages = AssignedPackages::with('hasServices')->where(['package_id' => $request->packId])->first();
      return response($membershipPackages,200);
    }

    public function addMemPackToCart  (Request $request) {
      // dd($request->all());
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
      $packPrice = AssignedPackages::with('hasServices')->where(['make_id' => $request->brandId, 'model_id' => $request->modelId, 'fuel_id' => $request->fuelId, 'package_id' => $request->packId])->first();
      // $packages   = AssignedPackages::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id, 'package_type' => 1 ])->get();
      if($packPrice == null) {
        $res = array('msg' => 'This package is not available for the selected Make, Model and Fuel.', 'status' => false, 'pack_id' => $request->packId);
        return Response()->json($res);  
      }

      if($packPrice->discounted_price > 0) {
        $packagePrice = $packPrice->discounted_price;
      }else {
        $packagePrice = $packPrice->total_price;
      }
       $del=Cart::where('category','=', '10')->delete();
      if(isset(Auth::user()->id)) {
        $auth_id = Auth::user()->id;
        $add_cart=Cart::create([
          'pack_id' => $packPrice->id,
          'u_id' => $auth_id,
          'pack_price' =>$packagePrice,
          'category'  =>  '10',
        ]);

        if($add_cart){ 
            $res = array('msg' => 'Package Added Successfully', 'status' => true, 'pack_id' => $packPrice->id);
        }
        return Response()->json($res);    
      }else {
        $res = array('msg' => 'User Not Logged In', 'status' => false, 'responseCode' => 404);
        return Response()->json($res);
      }
    }
    public function addMemPackToCartLoginCheck(Request $request){
      // dd($request->all());
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
      $packPrice = AssignedPackages::with('hasServices')->where(['make_id' => $request->brandId, 'model_id' => $request->modelId, 'fuel_id' => $request->fuelId, 'package_id' => $request->packId])->first();
      // $packages   = AssignedPackages::where([ 'make_id' => $Brand_id, 'model_id' => $Model_id, 'fuel_id' => $Fuel_id, 'package_type' => 1 ])->get();
      if($packPrice == null) {
        $res = array('msg' => 'This package is not available for the selected Make, Model and Fuel.', 'status' => false, 'pack_id' => $request->packId);
        return Response()->json($res);  
      }

      if($packPrice->discounted_price > 0) {
        $packagePrice = $packPrice->discounted_price;
      }else {
        $packagePrice = $packPrice->total_price;
      }


      $userOld  = User::where(['mobile'=> $request->mobile1])->first();
          if ($userOld) {
            // dd("hi".$packages);
            Auth::login($userOld, true);
                if(isset(Auth::user()->id)) {
            $auth_id = Auth::user()->id;

       $del=Cart::where('category','=', '10')->delete();
            $add_cart=Cart::create([
              'pack_id' => $packPrice->id,
              'u_id' => $auth_id,
              'pack_price' =>$packagePrice,
              'category'  =>  '10',
            ]);

            if($add_cart){ 
                $res = array('msg' => 'Package Added Successfully', 'status' => true, 'pack_id' => $packPrice->id);
            }
            return Response()->json($res);    
          }else {
            $res = array('msg' => 'User Not Logged In', 'status' => false, 'responseCode' => 404);
            return Response()->json($res);
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
                if(isset(Auth::user()->id)) {
                  $auth_id = Auth::user()->id;
                  $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->mobile1,
                    'leadType'  =>  'Memberships',
                  ]);
                  $add_cart=Cart::create([
                    'pack_id' => $packPrice->id,
                    'u_id' => $auth_id,
                    'pack_price' =>$packagePrice,
                    'category'  =>  '1',
                  ]);

                  if($add_cart){ 
                      $res = array('msg' => 'Package Added Successfully', 'status' => true, 'pack_id' => $packPrice->id);
                  }
                  return Response()->json($res);    
                }else {
                  $res = array('msg' => 'User Not Logged In', 'status' => false, 'responseCode' => 404);
                  return Response()->json($res);
                }

            }
        }
    }

    public function partsToBeRepaired(Request $request) {

        $brandName = Brand::where(['id' => $request->carMakeId])->value('make_name');
        $modelName = Carmodels::where(['id' => $request->carModelId])->value('model_name');
        $fuelName = Fuel::where(['id' => $request->carFuelId])->value('fuel_type');

        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $request->carMakeId);
        Session::put('modelId', $request->carModelId);
        Session::put('fuelId', $request->carFuelId);

      $carType = Carmodels::where(['id' => $request->modelId])->value('car_type');
      $partPrices = CarPartPricing::where(['car_type' => $carType])->get();
      
      $accPartsData = [];
      $accPartsData['partPrices'] = $partPrices;
      $accPartsData['carType'] = $carType;

      return response($accPartsData,200);
    }

    public function PartNotFoundLead(Request $request){
      // dd($request->all());
       $make_id = $request->brands;
        $model_id = $request->models;
        $fuel_id = $request->fuels;
        $mobile = $request->mobile1;

        $make_name = Brand::where('id', '=', $make_id)->value('make_name');
        $model_name = Carmodels::where('id','=', $model_id)->value('model_name');
        $fuel_name  = Fuel::where('id','=', $fuel_id)->value('fuel_type');
        
        if ($request->isUserEstimate == "true") {
            if ($request->serviceId == '3') {
              $insertMechLeads = MechanicalLeads::create([
              'mobile'                =>  $mobile,
              'make_name'             =>  $make_name,
              'model_name'            =>  $model_name,
              'fuel_name'             =>  $fuel_name,
              'make_id'               =>  $make_id,
              'model_id'              =>  $model_id,
              'fuel_id'               =>  $fuel_id,
              'remark'                =>  $request->remark,
              'part_not_found'        =>  $request->partNotFound,
              'lead_type'             =>  1,
            ]);
           if($insertMechLeads){ 
            $res = array('msg' => 'Request Submitted Successfully', 'status' => true);
            return Response()->json($res);    
            }
            else {
              $res = array('msg' => 'Package Not Added', 'status' => false);
              return Response()->json($res);
            }

          }elseif ($request->serviceId == '4') {
             $insertAcLeads = AcLeads::create([
              'mobile'                =>  $mobile,
              'make_name'             =>  $make_name,
              'model_name'            =>  $model_name,
              'fuel_name'             =>  $fuel_name,
              'make_id'               =>  $make_id,
              'model_id'              =>  $model_id,
              'fuel_id'               =>  $fuel_id,
              'remark'                =>  $request->remark,
              'part_not_found'        =>  $request->partNotFound,
              'lead_type'             =>  1,
            ]);
              if($insertAcLeads){ 
              $res = array('msg' => 'Request Submitted Successfully', 'status' => true);
              return Response()->json($res);    
            }else {
              $res = array('msg' => 'Package Not Added', 'status' => false);
              return Response()->json($res);
            }


          }elseif ($request->serviceId == '6') {
            $insertUpkeepLeads = UpkeepLeads::create([
              'mobile'                =>  $mobile,
              'make_name'             =>  $make_name,
              'model_name'            =>  $model_name,
              'fuel_name'             =>  $fuel_name,
              'make_id'               =>  $make_id,
              'model_id'              =>  $model_id,
              'fuel_id'               =>  $fuel_id,
              'remark'                =>  $request->remark,
              'part_not_found'        =>  $request->partNotFound,
              'lead_type'             =>  1,
            ]);
      // dd($insertUpkeepLeads);
              if($insertUpkeepLeads){ 
              $res = array('msg' => 'Request Submitted Successfully', 'status' => true);
              return Response()->json($res);    
            }else {
              $res = array('msg' => 'Package Not Added', 'status' => false);
              return Response()->json($res);
            }


          }
        }else{
          
            if ($request->serviceId == '3') {
              $insertMechLeads = MechanicalLeads::create([
              'mobile'                =>  $mobile,
              'make_name'             =>  $make_name,
              'model_name'            =>  $model_name,
              'fuel_name'             =>  $fuel_name,
              'make_id'               =>  $make_id,
              'model_id'              =>  $model_id,
              'fuel_id'               =>  $fuel_id,
              'remark'                =>  $request->remark,
              'part_not_found'        =>  $request->partNotFound,
              'lead_type'             =>  0,
            ]);
           if($insertMechLeads){ 
            $res = array('msg' => 'Package Added Successfully into Mechanical Lead', 'status' => true);
            return Response()->json($res);    
            }
            else {
              $res = array('msg' => 'Package Not Added', 'status' => false);
              return Response()->json($res);
            }

          }elseif ($request->serviceId == '4') {
             $insertAcLeads = AcLeads::create([
              'mobile'                =>  $mobile,
              'make_name'             =>  $make_name,
              'model_name'            =>  $model_name,
              'fuel_name'             =>  $fuel_name,
              'make_id'               =>  $make_id,
              'model_id'              =>  $model_id,
              'fuel_id'               =>  $fuel_id,
              'remark'                =>  $request->remark,
              'part_not_found'        =>  $request->partNotFound,
              'lead_type'             =>  0,
            ]);
              if($insertAcLeads){ 
              $res = array('msg' => 'Package Added Successfully into Ac Services Leads', 'status' => true);
              return Response()->json($res);    
            }else {
              $res = array('msg' => 'Package Not Added', 'status' => false);
              return Response()->json($res);
            }


          }elseif ($request->serviceId == '6') {
            $insertUpkeepLeads = UpkeepLeads::create([
              'mobile'                =>  $mobile,
              'make_name'             =>  $make_name,
              'model_name'            =>  $model_name,
              'fuel_name'             =>  $fuel_name,
              'make_id'               =>  $make_id,
              'model_id'              =>  $model_id,
              'fuel_id'               =>  $fuel_id,
              'remark'                =>  $request->remark,
              'part_not_found'        =>  $request->partNotFound,
              'lead_type'             =>  0,
            ]);
              if($insertUpkeepLeads){ 
              $res = array('msg' => 'Package Added Successfully into Upkeep Leads', 'status' => true);
              return Response()->json($res);    
            }else {
              $res = array('msg' => 'Package Not Added', 'status' => false);
              return Response()->json($res);
            }


          }
           $res = array('msg' => 'Account Created Successfully and and lead inserted into table', 'status' => true);
              return Response()->json($res);    
            // return response($carDetail,200);
        }
    }

    public function updatePassword(Request $request) {
      $userId = Auth::user()->id;
      $user = Auth::user();
      // $userPassword = User::where(['id' => $userId])->value('password');
      // $check = Hash::check($request->oldPassword, $userPassword);

      // if($check) {
        $update = User::where(['id' => $userId])->update([
          'password'      => Hash::make($request->newPassword)
        ]);

        // Auth::login($user,true);
        return response('Password Updated.',200);

      // }else {
      //   return response('Invalid old password.',250);
      // }

    }

    public function mustKnow(Request $request) {
      $service = services::get();
      return view('pages.mustKnow',compact('service'));
      // return view('pages.mustKnow');
    }

    public function faq(Request $request) {
      $service = services::get();
      return view('pages.faq',compact('service'));
      // return view('pages.faq');
    }

    public function getAllServices(Request $request) {
      $service = services::get();
      // return response($service);
      return json_encode(['service' => $service]);  
    }

    public function onContactLoad(Request $request) {
      $service = services::get();
      return view('pages.contact',compact('service'));
    }
}
