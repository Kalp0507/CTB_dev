<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLead;
use App\Models\Brand;
use App\Models\Carmodels;
use App\Models\Fuel;
use App\Models\CarServiceParts;
use App\Models\Cart;
use App\Models\AcLeads;
use App\Models\MechanicalLeads;
use App\Models\UpkeepLeads;
use App\Models\GeneralLead;
use App\Models\ServicesLeads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Redirect;
use GuzzleHttp;
use Session;



class RegistrationController extends Controller
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
            $messages = [
                'mobile.unique' => 'Number Already Exist',
                'email.unique' => 'Email Already Exist',
                'password.min' => 'Password length should not be less than 6 cahracters.',
                'confirmpassword.same' => 'Confirm password should match password.'

            ];

        $request->validate([
         'mobile'           => 'required|unique:users',
         'email'            => 'required|unique:users',
         'password'         =>'required|min:6',
         'confirmpassword'  =>'required|same:password',
        ],$messages);


         $createUser = User::create ([
                'mobile'        => $request->mobile,
                'email'         => $request->email,
                'username'      => $request->username,
                // 'password' => $request->password,
                'password'      => Hash::make($request->password),
            ]);

        if($createUser) {
            Auth::login($createUser, true);
            $msg= "Welcome!! ".$request->username.", You have successfully regestired with mycarmech.com. Regards, TeamMyCarMech.";
            $signupMsgStr = "https://msg.technolitesolution.com/vendorsms/pushsms.aspx?user=Bpointer&password=123456&msisdn=".$request->mobile."&sid=BPOINT&msg=".$msg."&fl=0&gwid=2";
            $client = new GuzzleHttp\Client();
            $res = $client->get($signupMsgStr);
            return redirect('/');
        } else {
          return redirect('/login');
        }
         
         // Alert::message('Location data entered succesfully!');
         // var_dump('user created successfully');
        

    }

    public function loginWithPassword(Request $request) {
        return view('pages.LoginWithPassword');

    }

    public function checkRegistartionValidation(Request $request) {
        // dd($request->all());
        $messages = [
            'mobile.unique'         => 'Number Already Exist',
            'email.unique'          => 'Email Already Exist',
            'password.min'          => 'Password length should not be less than 6 cahracters.',
            'confirmpassword.same'  => 'Confirm password should match password.'
        ];

        $errorMessages = $request->validate([
         'mobile'           => 'required|unique:users',
         'email'            => 'required|unique:users',
         'password'         =>'required|min:6',
         'confirmpassword'  =>'required|same:password',
        ],$messages);
// dd($validator->errors());
        return response()->json($errorMessages, 200);
    }


    public function registerWithOTP(Request $request)
    {
        //
        // dd($request->all());
            $messages = [
                'mobile.unique'         => 'Number Already Exist',
                'email.unique'          => 'Email Already Exist',
                'password.min'          => 'Password length should not be less than 6 cahracters.',
                'confirmpassword.same'  => 'Confirm password should match password.'
            ];

        $request->validate([
         'mobile' => 'required|unique:users',
         'email' => 'required|unique:users',
         'password'=>'required|min:6',
         'confirmpassword'=>'required|same:password',
        ],$messages);


        $createUser = User::create ([
          'mobile'        => $request->mobile,
          'email'         => $request->email,
          'username'      => $request->username,
          'password'      => Hash::make($request->password),
        ]);

        $general_lead=GeneralLead::create([
          'user_id'       =>  $createUser->id,
          'mobile'        =>  $request->mobile,
          'leadType'      =>  'Registration',
          'mature_status' =>  '0',
        ]);

        if($createUser) {
            Auth::login($createUser, true);
            $msg= "Welcome!! ".$request->username.", You have successfully regestired with mycarmech.com. Regards, TeamMyCarMech.";
            $signupMsgStr = "https://msg.technolitesolution.com/vendorsms/pushsms.aspx?user=Bpointer&password=123456&msisdn=".$request->mobile."&sid=BPOINT&msg=".$msg."&fl=0&gwid=2";
            $client = new GuzzleHttp\Client();
            $res = $client->get($signupMsgStr);
            return response("Successfully Registered", 200);   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }

    public function sendOtpAtRegistartion(Request $request){

        $otp = rand(1000,9999);
        // Log::info("otp = ".$otp);
        $otpMsg = 'Dear user, Your OTP for login to mycarmech.com is '.$otp.'. Regards, TeamMyCarMech.';
        // $user = User::where(['mobile' => $request->mobile])->update(['otp' => $otp]);
        // send otp to mobile no using sms api
        $otpSendStr = "https://msg.technolitesolution.com/vendorsms/pushsms.aspx?user=Bpointer&password=123456&msisdn=".$request->mobile."&sid=BPOINT&msg=".$otpMsg."&fl=0&gwid=2";
        // $client = new GuzzleHttp\Client();
        // $res = $client->get($otpSendStr);

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.kaleyra.io/v1/HXAP1689313803IN/messages",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "to=91".$request->mobile."&sender=MCMECH&source=API&body=".$otpMsg."&type=TXN",
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

        return response($otp, 200);     
    }


     public function sendOtp(Request $request){

        $otp = rand(1000,9999);
        // Log::info("otp = ".$otp);
        $userData = User::where(['mobile' => $request->mobile])->first();
        $otpMsg = 'Dear user, Your OTP for login to mycarmech.com is '.$otp.'. Regards, TeamMyCarMech.';
        // $userData = User::where('mobile','=',$request->mobile)->get();
        
        if($userData !== null) {
            $user = User::where(['mobile' => $request->mobile])->update(['otp' => $otp]);
            
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
              CURLOPT_POSTFIELDS => "to=91".$request->mobile."&sender=MCMECH&source=API&body=".$otpMsg."&type=TXN",
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

            return response($otp, 200);
            // return response()->json([$user],200);

        }else {
            return response('User does not exist.', 250);
        }

    }
    public function leadOtp(Request $request){
        $otp = rand(1000,9999);
        $otpMsg = 'Dear user, Your OTP for login to mycarmech.com is '.$otp.'. Regards, TeamMyCarMech.';
        Log::info("otp = ".$otp);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.kaleyra.io/v1/HXAP1689313803IN/messages",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "to=91".$request->mobileNumber."&sender=MCMECH&source=API&body=".$otpMsg."&type=TXN",
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

        if($response) {
            return response($otp,200);
        }else {
          return response($otp,250);
        }

        // $otpSendStr = "https://msg.technolitesolution.com/vendorsms/pushsms.aspx?user=Bpointer&password=123456&msisdn=".$request->mobileNumber."&sid=BPOINT&msg=".$otpMsg."&fl=0&gwid=2";
        //     $client = new GuzzleHttp\Client();
        //     $res = $client->get($otpSendStr);
        //     if ($res) {
        //         # code...
        //     return response($otp,200);
        //     }else{
        //     return response($otp,250);
        //     }
        

    }

    public function authenticateUsers(Request $request){

      $userOld  = User::where(['mobile'=> $request->mobile])->first();
      if ($userOld) {
        Auth::login($userOld, true);
        return response('Mobile Number Verified Successfully', 200);
      }else{
        $createNewUser = User::create ([
            'mobile'    => $request->mobile,
            'email'     => null,
            'username'  => null,
            'password'  => null,
        ]);

        $userNew  = User::where(['mobile'=> $request->leadMobile])->first();
        if($userNew){
          Auth::login($userNew, true);
           $auth_id = Auth::user()->id;
                $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->mobile1,
                    'leadType'  =>  'Memberships',
                    'mature_status' =>  '0',

                  ]);
          return response('Mobile Number Verified Successfully', 200);
        }
      }
    }

     public function withSelectCarRegistration(Request $request)
    {
      // dd($request->all());
      $brandId = $request->brand_id;
        $modelId = $request->model_id;
        $fuelId = $request->fuel_id;

        $brandName = Brand::where(['id' => $brandId])->value('make_name');
        $modelName = Carmodels::where(['id' => $modelId])->value('model_name');
        $fuelName = Fuel::where(['id' => $fuelId])->value('fuel_type');
        Session::put('brandName', $brandName);
        Session::put('modelName', $modelName);
        Session::put('fuelType', $fuelName);

        Session::put('brandId', $brandId);
        Session::put('modelId', $modelId);
        Session::put('fuelId', $fuelId);

        $carDetail = $request->carDetails;
        $carDetailsId = $request->carDetailsIds;
        $userOld  = User::where(['mobile'=> $request->leadMobile])->first();
        if ($userOld) {
            // $createLeadUser = UserLead::create ([
            //     'mobile'        => $request->leadMobile,
            //     'car_details'   => $request->carDetails,
            // ]);

            Auth::login($userOld, true);
             return Response()->json(array(
                'carDetailsIds' => $carDetailsId,
                'car_details' => $carDetail,
            ));
            // return response($carDetail,200);
        }else{
            $createNewUser = User::create ([
                'mobile'    => $request->leadMobile,
                'email'     => null,
                'username'  => null,
                'password'  => null,
            ]);
            $createLeadUser = UserLead::create ([
                'mobile'        => $request->leadMobile,
                'car_details'   => $request->carDetails,
            ]);

            $userNew  = User::where(['mobile'=> $request->leadMobile])->first();
            if($userNew){
                Auth::login($userNew, true);
                $auth_id = Auth::user()->id;
                $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->leadMobile,
                    'leadType'  =>  'Select Car Form Homepage',
                    'mature_status' =>  '0',
                  ]);
                return Response()->json(array(
                    'carDetailsIds' => $carDetailsId,
                    'car_details' => $carDetail,
                ));

            }else{
                dd('error');
            }
            // return response($carDetail,200);
        }

    }

     public function AddonLead(Request $request)
    {
      // dd($request->all());
        $userOld  = User::where(['mobile'=> $request->mobileNumber])->first();
        if ($userOld) {
          Auth::login($userOld, true);
          return Response()->json(array(
           'mobile' => $request->mobileNumber,
           'a_id' => $request->a_Id,
           'status' => true,
            ));
        }else{
          $createNewUser = User::create ([
              'mobile'    => $request->mobileNumber,
              'email'     => null,
              'username'  => null,
              'password'  => null,
          ]);

          $userNew  = User::where(['mobile'=> $request->mobileNumber])->first();
          if($userNew){
              Auth::login($userNew, true);
              $auth_id = Auth::user()->id;
                $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->mobileNumber,
                    'leadType'  =>  'Addon Login',
                    'mature_status' =>  '0',
                  ]);
              return Response()->json(array(
                'mobile' => $request->mobileNumber,
                'a_id' => $request->a_Id,
                'status' => true,
              ));
          }else{
              dd('error');
          }
        }
    }

    public function getEstimate(Request $request){
      // dd($request->all());
        $make_id = $request->brands;
        $model_id = $request->models;
        $fuel_id = $request->fuels;
        $parts = $request->partSelection;
        $mobile = $request->mobile1;
        $partP = [];

        $make_name = Brand::where('id', '=', $make_id)->value('make_name');
        $model_name = Carmodels::where('id','=', $model_id)->value('model_name');
        $fuel_name  = Fuel::where('id','=', $fuel_id)->value('fuel_type');

      $modelNameStr = '';
        if($modelNameStr == ''){
          $modelNameStr = $make_name;
          $modelNameStr = $modelNameStr.','.$model_name;        
          $modelNameStr = $modelNameStr.','.$fuel_name;        
        }
        
        if (gettype($parts) == "string") {
            $arrayData = explode(',', $parts);
        }else{
        $arrayData = $parts;  
        }

        // dd(gettype($parts) );
        // if($parts == ""){
        // dd($arrayData);
        // }
        $partName=[];
      foreach ($arrayData as $key => $value) {
        $partName[$key] = CarServiceParts::where(['id'=> $value])->where(['make_id' => $make_id])->where(['model_id' => $model_id])->where(['fuel_id' => $fuel_id])->sum('price');
      }

      foreach ($arrayData as $key => $value) {
        $partPrice[$key] = CarServiceParts::where(['id'=> $value])->where(['make_id' => $make_id])->where(['model_id' => $model_id])->where(['fuel_id' => $fuel_id])->sum('price');
      }
      $partTotal = 0;
      foreach ($partName as $partKey => $partPrice) {
         $partTotal = (float)$partTotal + (float)$partPrice;        
      }
      // dd($partTotal);
        $totalPrice = number_format($partTotal);
        $userOld  = User::where(['mobile'=> $request->mobile1])->first();
        if ($userOld) {
            Auth::login($userOld, true);
// dd($model_id);
            foreach ($arrayData as $cartKey => $cartValue) {
              $auth_id = Auth::user()->id;
                $partP[$cartKey] = CarServiceParts::where(['id'=> $cartValue])->where(['make_id' => $make_id])->where(['model_id' => $model_id])->where(['fuel_id' => $fuel_id])->value('price');

                $check_addon = Cart::where('pack_id',$cartValue)->where('category',$request->serviceId)->get();
              if($check_addon){
              $emptyCart = Cart::where('pack_id',$cartValue)->where('category',$request->serviceId)->delete();
              }

              $add_cart=Cart::create([
                  'pack_id' => $cartValue,
                  'u_id' => $auth_id,
                  'pack_price' =>$partP[$cartKey],
                  'category'  =>  $request->serviceId,
              ]);

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
            ]);
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
            ]);   
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
            ]);
          }
              if($add_cart){ 
                  $res = array('msg' => 'Package Added Successfully', 'status' => true);
              }
            }

            $insertServiceLeads = ServicesLeads::create([
                'make'              =>  $make_name,
                'model'             =>  $model_name,
                'fuel_type'         =>  $fuel_name,
                'name'              =>  null,
                'mobileNo'          =>  $request->mobile1,
                'leadType'          =>  '1',
                'serviceType'       =>  $request->serviceType,
                'selected_parts'    =>  $modelNameStr,
              ]);
             return Response()->json(array(
               'status' => true,
               'message' => 'Account Logged In Successfully',
               'status'  => true,
                'price'   => $totalPrice,
                'make'    =>$make_name,
                'model'   =>$model_name,
                'fuel'    =>$fuel_name,
                'parts'   =>$parts,
                'res'     => $res,

            ));
        }else{
            // dd('else');
            $createNewUser = User::create ([
                'mobile'    => $request->mobile1,
                'email'     => null,
                'username'  =>  null,
                'password'  => null,
            ]);
            $createLeadUser = UserLead::create ([
                'mobile'        => $request->mobile1,
                'car_details'   => $modelNameStr,
                
            ]);

            $insertServiceLeads = ServicesLeads::create([
                'make'              =>  $make_name,
                'model'             =>  $model_name,
                'fuel_type'         =>  $fuel_name,
                'name'              =>  null,
                'mobileNo'          =>  $request->mobile1,
                'leadType'          =>  '1',
                'serviceType'       =>  $request->serviceType,
                'selected_parts'    =>  $modelNameStr,
              ]);

            $userNew  = User::where(['mobile'=> $request->mobile1])->first();
            if($userNew){
                Auth::login($userNew, true);
                $auth_id = Auth::user()->id;
                  $general_lead=GeneralLead::create([
                      'user_id' => $auth_id,
                      'mobile' =>$request->mobile1,
                      'leadType'  =>  $request->serviceType,
                      'mature_status' =>  '0',
                    ]);
                foreach ($arrayData as $cartKey => $cartValue) {
                $partP[$cartKey] = CarServiceParts::where(['id'=> $cartValue])
                                                  ->where(['make_id' => $make_id])
                                                  ->where(['model_id' => $model_id])
                                                  ->where(['fuel_id' => $fuel_id])->value('price');

                $check_addon = Cart::where('pack_id',$cartValue)->where('category',$request->serviceId)->get();
                if($check_addon){
                  $emptyCart = Cart::where('pack_id',$cartValue)->where('category',$request->serviceId)->delete();
                }
                $add_cart=Cart::create([
                  'pack_id' => $cartValue,
                  'u_id' => $auth_id,
                  'pack_price' =>$partP[$cartKey],
                  'category'  =>  $request->serviceId,
              ]);
                  // dd($add_cart);
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
            ]);
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
            ]);   
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
            ]);
          }

              if($add_cart){ 
                  $res = array('msg' => 'Package Added Successfully', 'status' => true);
              }
            }
                return Response()->json(array(
                    'message'   => 'Account Created Successfully',
                    'status'  => true,
                    'price'   => $totalPrice,
                    'make'    =>$make_name,
                    'model'   =>$model_name,
                    'fuel'    =>$fuel_name,
                    'parts'   =>$parts,
                    'res'     => $res,
                ));

            }else{
                dd('error');
            }
            // return response($carDetail,200);
        }

    }


    public function remarkEstimate(Request $request){
    // dd($request->all());
        $make_id = $request->estimateMake;
        $model_id = $request->estimateModel;
        $fuel_id = $request->estimateFuel;
        $parts = $request->estimatePart;

        $make_name = Brand::where('id', '=', $make_id)->value('make_name');
        $model_name = Carmodels::where('id','=', $model_id)->value('model_name');
        $fuel_name  = Fuel::where('id','=', $fuel_id)->value('fuel_type');

      $modelNameStr = '';
        if($modelNameStr == ''){
          $modelNameStr = $make_name;
          $modelNameStr = $modelNameStr.','.$model_name;        
          $modelNameStr = $modelNameStr.','.$fuel_name;        
        }
        $arrayData = explode(',', $parts);
        $partName=[];
        foreach ($arrayData as $key => $value) {
            $partName[$key] = CarServiceParts::where(['part_name'=> $value])
                                           ->where(['make_id' => $make_id])
                                           ->where(['model_id' => $model_id])
                                           ->where(['fuel_id' => $fuel_id])->sum('price');;
        }
      
        $partTotal = 0;
        foreach ($partName as $partKey => $partPrice) {
            $partTotal = (float)$partTotal + (float)$partPrice;        
        }
        $totalPrice = number_format($partTotal);
        $userOld  = User::where(['mobile'=> $request->estimateMobile])->first();
        if ($userOld) {
            Auth::login($userOld, true);
            $insertServiceLeads = ServicesLeads::create([
                'make'              =>  $make_name,
                'model'             =>  $model_name,
                'fuel_type'         =>  $fuel_name,
                'name'              =>  $request->Uname,
                'mobileNo'          =>  $request->estimateMobile,
                'leadType'          =>  '1',
                'serviceType'       =>  $request->servType,
                'selected_parts'    =>  $parts,
                'remark'            =>  $request->Uremark,
              ]);
            return Response()->json(array(
                'status' => true,
                'message' => 'Account Logged In Successfully',
            ));
        }else{
            $createNewUser = User::create ([
                'mobile'    => $request->estimateMobile,
                'email'     => null,
                'username'  => $request->Uname,
                'password'  => null,
            ]);
            $createLeadUser = UserLead::create ([
                'mobile'        => $request->estimateMobile,
                'car_details'   => $modelNameStr,
                
            ]);
            $insertServiceLeads = ServicesLeads::create([
                'make'              =>  $make_name,
                'model'             =>  $model_name,
                'fuel_type'         =>  $fuel_name,
                'name'              =>  $request->Uname,
                'mobileNo'          =>  $request->estimateMobile,
                'leadType'          =>  '1',
                'serviceType'       =>  $request->servType,
                'selected_parts'    =>  $parts,
                'remark'            =>  $request->Uremark,
              ]);

            $userNew  = User::where(['mobile'=> $request->estimateMobile, 'username' => $request->Uname])->first();
            if($userNew){
                Auth::login($userNew, true);
                 $auth_id = Auth::user()->id;
                $general_lead=GeneralLead::create([
                    'user_id' => $auth_id,
                    'mobile' =>$request->mobile1,
                    'leadType'  =>  'Memberships',
                  ]);
                return Response()->json(array(
                    'message'   => 'Account Created Successfully',
                    'status'  => true,
                ));

            }else{
                dd('error');
            }
            // return response($carDetail,200);
        }

    }


     public function authenticate(Request $request)
    {

        $user  = User::where([['mobile','=',request('mobile')],['otp','=',request('otp')]])->first();
        if( $user){
            // dd($user);
            Auth::login($user, true);
            User::where('mobile','=',$request->mobile)->update(['otp' => null]);
            return view('Dashboard.adminhome');
        }
        else{
            dd('error');
            // return Redirect::back ();
        }
        // $credentials = $request->only('mobile','otp');
        // if (Auth::attempt($credentials)) {
        // dd($credentials);   
        //     // Authentication passed...
        //     return redirect()->intended('Dashboard');
        // }
    }


    public function authenticatePass(Request $request){
        // $user = User::where();
          $credentials = $request->only('email', 'password');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            if($user) {
              if($user->utype == 'ADM') {
                return redirect()->intended('/Dashboard');
              } else {
                return redirect()->intended('/');
              }
            } else {
              return redirect('/loginWithPassword')->with('message','Invalid credentials entered.');
              // return redirect()->intended('/loginWithPassword');

            }
        } else {
            return redirect('/loginWithPassword')->with('message','Invalid credentials entered.');
        }

    }


    public function logout(){
        Auth::logout();
        return redirect('/');
        // return view('pages.home');
    }
}
