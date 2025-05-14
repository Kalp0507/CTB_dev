<?php

namespace App\Http\Controllers;

use App\Models\AccidentalForm;
use App\Models\requestCall;
use App\Models\GarageRequests;
use App\Models\CarPartPricing;
use App\Models\Cart;
use App\Models\User;
use App\Models\AccidentalLeads;
use App\Models\GeneralLead;
use App\Models\Brand;
use App\Models\Carmodels;
use App\Models\Fuel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\sendingCommonEmail;


// use App\Mail\Notification;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\SendMail;


class SendEmailController extends Controller
{
  public function index(){
   // return view('send_email');
  }

  public function send(Request $request){
    // $this->validate($request, [
    //   'hiddenBrand' => 'required',
    //   'hiddenModel' => 'required',
    //   'hiddenFuel' => 'required',
    // ]);
    // dd($request->all());
    $count=0;
    if(Auth::check()) {
      $count=1;
    }
    if (gettype($request->partsToRepair) == "string") {
            $partsToRepair = explode(',', $request->partsToRepair);
        }else{
        $partsToRepair = $request->partsToRepair;  
        }

    // $partsToRepair = $request->partsToRepair;
    $arrayOfPartsId = [];
    $arrayOfPartsMaterial = [];
    $arrayOfPartsPrice = [];
    $arrayOfPartsName = [];

    if($request->partFound =="true") {
      foreach ($partsToRepair as $key => $part) {
        
        $arr = explode(",", $part, 2);
        $partId = $arr[0];
        // dd($arr);
        // $partMaterial = $arr[1];
        array_push($arrayOfPartsId, $partId);
        // array_push($arrayOfPartsMaterial, $partMaterial);
      }
      
      foreach ($arrayOfPartsId as $key => $partids) {
        $partPrice = CarPartPricing::where(['id'=>$partids])->value($request->partColor);
        array_push($arrayOfPartsPrice, $partPrice);

      }
      // dd($arrayOfPartsPrice );

      foreach ($arrayOfPartsId as $key => $partids) {
        $partName = CarPartPricing::where(['id'=>$partids])->value('part_name');
        array_push($arrayOfPartsName, $partName);
      }


      $partNamesStr = '';
      foreach ($arrayOfPartsName as $key => $partStr) {
        if($partNamesStr=='') {
          $partNamesStr = $partStr;
        }else {
          $partNamesStr = $partNamesStr.','.$partStr;
        }
      }

      $save=AccidentalForm::create([
        'car_type'=>$request->carTypeHidden,
        'parts_to_repair'=>$partNamesStr,
        'remark'=>$request->accidentalRemark,
        'insurance_claim_type'=>$request->FinanceType,
        'insurance_company'=>$request->insuranceCompany,
        'brand' =>  $request->hiddenBrand,
        'model' =>  $request->hiddenModel,
        'fuel' =>  $request->hiddenFuel,
        'leadType'  => $count
      ]);


    $make_id  = Brand::where('make_name',$request->hiddenBrand)->value('id');
    $model_id = Carmodels::where('model_name',$request->hiddenModel)->value('id');
    $fuel_id  = Fuel::where('fuel_type',$request->hiddenFuel)->value('id');
    // dd($fuel_id);

      if($save) {
        if($request->hasFile('accidentalImage')) {
          // $file = $request->hasFile('accidentalImage');
          $names = [];
          $content = new \stdClass();
          foreach($request->file('accidentalImage') as $image) {
            $destinationPath = public_path().'/images/accidentalImages/';
            $filename = $image->getClientOriginalName();
            $image->move($destinationPath, $filename);
            array_push($names, $filename);
          }
          $content->image = json_encode($names);
          $saveImage = AccidentalForm::where(['id'=>$save->id])->update([
            'image'=>$content->image,
          ]);
        }
      }

 $userOld  = User::where(['mobile'=> $request->mobile])->first();
      if(isset(Auth::user()->id)) {
        $auth_id = Auth::user()->id;
        foreach ($arrayOfPartsId as $key => $partId) {
            $check_addon = Cart::where('pack_id',$partId)->where('category','2')->get();
            if($check_addon){
              $emptyCart = Cart::where('pack_id',$partId)->where('category','2')->delete();
             }
          $add_cart=Cart::create([
            'pack_id' => $partId,
            'u_id' => $auth_id,
            'car_type' =>$request->carTypeHidden,
            'pack_price' =>$arrayOfPartsPrice[$key],
            'part_material' =>$request->partColor,
            'category'  =>  '2',
            'make_id'   =>  $make_id,
            'model_id'  =>  $model_id,
            'fuel_id'  =>  $fuel_id,
          ]);
        }
      }elseif ($userOld) {
         Auth::login($userOld, true);
          $auth_id = Auth::user()->id;
    // dd($auth_id);
        foreach ($arrayOfPartsId as $key => $partId) {
          $check_addon = Cart::where('pack_id',$partId)->where('category','2')->get();
            if($check_addon){
              $emptyCart = Cart::where('pack_id',$partId)->where('category','2')->delete();
             }
          $add_cart=Cart::create([
            'pack_id' => $partId,
            'u_id' => $auth_id,
            'car_type' =>$request->carTypeHidden,
            'pack_price' =>$arrayOfPartsPrice[$key],
            'part_material' =>$request->partColor,
            'category'  =>  '2',
            'make_id'   =>  $make_id,
            'model_id'  =>  $model_id,
            'fuel_id'  =>  $fuel_id,
          ]);
        }
        # code...
      }else{
        $createNewUser = User::create ([
                'mobile'    => $request->mobile,
                'email'     => null,
                'username'  =>  null,
                'password'  => null,
            ]);
              $userNew  = User::where(['mobile'=> $request->mobile])->first();
            if($userNew){
                Auth::login($userNew, true);
                  $auth_id = Auth::user()->id;
                $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->mobile,
                    'leadType'  =>  'Accidental Repair',
                  ]);
                  foreach ($arrayOfPartsId as $key => $partId) {
                    $add_cart=Cart::create([
                      'pack_id' => $partId,
                      'u_id' => $auth_id,
                      'car_type' =>$request->carTypeHidden,
                      'pack_price' =>$arrayOfPartsPrice[$key],
                      'part_material' =>$request->partColor,
                      'category'  =>  '2',
                      'make_id'   =>  $make_id,
                      'model_id'  =>  $model_id,
                      'fuel_id'  =>  $fuel_id,
                    ]);
                  }
              }
            }

      if($add_cart) {
        // return response("Generated Lead",200);
        return redirect('accidentalRepair')->with('message','Successfully Submitted');
      }

    }//Part found if ends
    else {

          // dd($request->all());
      $save=AccidentalLeads::create([
        'make' =>  $request->hiddenBrand,
        'model' =>  $request->hiddenModel,
        'fuel' =>  $request->hiddenFuel,
        'leadType'  => $count,
        'car_type'=>$request->carTypeHidden,
        'query'=>$request->accidentalRemark,
        'mobile' => $request->mobile
      ]);

      if($save) {
        if($request->hasFile('images')) {
          // $file = $request->hasFile('accidentalImage');
          $names = [];
          $content = new \stdClass();
          foreach($request->file('images') as $image) {
            $destinationPath = public_path().'/images/accidentalImages/';
            $filename = $image->getClientOriginalName();
            $image->move($destinationPath, $filename);
            array_push($names, $filename);
          }
          $content->image = json_encode($names);
          $saveImage = AccidentalLeads::where(['id'=>$save->id])->update([
            'image'=>$content->image,
          ]);
        }
        return redirect('accidentalRepair')->with('message','Request Submitted');
      }

    }

    // if($save) {
    //   $msgBody= "Your Accidental Repair Request has been successfully registered with us. We will get back in touch with you soon!";
    //   $msgBody2= "";
    //   $msgSubject="Accidental Repair Request";
    //   $this->sendEmailCommonFunction($request->accidentalEmail,$msgBody,$msgBody2,$msgSubject);
    // }

    return redirect('accidentalRepair')->with('message','Successfully Submitted');
  }

  public function requestCallBack(Request $request){
  	// $data1 =requestCall::get();
  	// dd($request->all());
    $count=0;
    $userData="";
    if(Auth::check()) {
      $count=1;
      $userData = Auth::user();
      $leadData = GeneralLead::where('user_id',Auth::user()->id)->first();
    }
    $userData = User::where(['email'=>$request->email])->first();
    if($userData !== null) {
      $userId = $userData->id;
      $leadData = GeneralLead::where('user_id',$userId)->first();
      if($leadData->mature_status !== 1) {
        $count = 0;
      } else {
        $count = 1;
      }
    } else {
      $count = 0;
    }

   	$this->validate($request, [
	      	'name'     	=> 'required',
	      	'mobile'  	=> 'required',
          'email'     => 'required'
	     ]);

 	  $result=requestcall::create([
        'name' 	 => $request->name,
        'mobile' => $request->mobile,
        'email'  => $request->email,
        'leadType'  => $count
    ]);

    if($result){ 
        $arr = array('msg' => 'Request Submitted', 'status' => true);
        if($userData != "") {
          $userEmail = $request->email;
          $msgBody = "Your request has been registered with us. We will get back in touch with you soon!";
          $msgBody2="";
          $msgSubject = "Request for calback";
          $this->sendEmailCommonFunction($userEmail, $msgBody, $msgBody2, $msgSubject);
        }
    }
    return Response()->json($arr);


     //  return redirect('login')->with('message','Successfully Submitted');

  }

    public function GarageRequest(Request $request)
    {
    	// $data1 =GarageRequests::get();
    	// dd($request->all());
     	$this->validate($request, [
            'name'      => 'required',
		      	'address'     	=> 'required',
		      	'mobile'  	=> 'required',
		      	'email'		=> 'required',
		     ]);


     	  $result=GarageRequests::create([
          'name'   => $request->name,
          'address' 	 => $request->address,
          'mobile' => $request->mobile,
          'email'  => $request->email,
          'status'  => 'pending'
        ]);

        if($result){ 
            $arr = array('msg' => 'Request sent. My Car Mech team will contact you for onboarding.', 'status' => true);
            $msgBody= "Your Garage Request has been successfully registered with us. We will get back in touch with you soon!";
            $msgBody2= "";
            $msgSubject="Garage Request";
            $this->sendEmailCommonFunction($request->email,$msgBody,$msgBody2,$msgSubject);

            $adminMsg1 = "A garage request has been made by ".$request->name;
            $adminMsg2 = "Contact No.: ".$request->mobile." Contact Email: ".$request->email;
            $adminSubject = "Garage Request";
            $this->sendAdminEmailCommonFunction("customercare@mycarmech.com",$adminMsg1,$adminMsg2,$adminSubject);
            
        }
        return Response()->json($arr);

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

    protected function sendEmailCommonFunction($email,$body,$body2,$msgSubject){
      $details = [
        'to' => $email,
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

}