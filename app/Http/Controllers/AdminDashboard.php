<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GarageRequests;
use App\Models\OrderInformation;
use App\Models\OrderPackageInformation;
use App\Models\Garages;
use App\Models\requestCall;
use App\Models\ServicesLeads;
use App\Models\AccidentalForm;
use App\Models\User;
use App\Models\Brand;
use App\Models\Carmodels;
use App\Models\Fuel;
use App\Models\Package;
use App\Models\carmodel_fuel;
use App\Models\AssignedPackages;
use App\Models\service;
use App\Models\CarPartPricing;
use App\Models\CarParts;
use App\Models\CarTypes;
use App\Models\CarServiceParts;
use App\Models\AccidentalLeads;
use App\Models\UpkeepLeads;
use App\Models\services;
use App\Models\BatteryTyreLeads;
use App\Models\MechanicalLeads;
use App\Models\AcLeads;
use App\Models\Promocode;
use App\Models\GeneralLead;
use App\Models\UserReward;
use App\Models\InsuranceCompanies;


use Redirect;
use Carbon\Carbon;

class AdminDashboard extends Controller
{
    protected function getGarages(Request $request){
    	$garageDataAll = GarageRequests::get();
        $activeGaragesAll = Garages::where(['status' => '1'])->get();
        $inActiveGaragesAll = Garages::where(['status' => '0'])->get();

        $garageDataCount = count($garageDataAll);
        $activeGaragesCount = count($activeGaragesAll);
        $inActiveGaragesCount = count($inActiveGaragesAll);

        $activeGarages = $activeGaragesAll->all();
        $inActiveGarages = $inActiveGaragesAll->all();

        $garageData = $garageDataAll->all();
    	return view('Dashboard.Garage')->with(compact('garageData','activeGarages','inActiveGarages','activeGaragesCount','inActiveGaragesCount','garageDataCount'));
    }

    protected function updateGarages(Request $request){
        // dd($request->all());
        $updateGarage = Garages::where(['id'=>$request->garageId])->update([
            'garage_name' => $request->garageName,
            'garage_location' => $request->garageLocation,
            'garage_contactNo' => $request->garageContactNo,
            'garage_description' => $request->garageDescription,
            'mechanic_details' => $request->mechanicDetails,
            'other_details' => $request->otherDetails,
            'status' => $request->status
        ]);

        if($updateGarage) {
            return response('Garage Updated Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }

    protected function getBookings(Request $request){
    	$bookingData = OrderPackageInformation::with('getOrderInformation')->get();
        $orderInformationData = OrderInformation::with('hasOrderInformation')->get();
        $service = services::get();
        $ordersArray = [];
        $periodicOrdersCount = 0;
        foreach ($orderInformationData as $key => $value) {
        $ordersData = new \stdClass();
            $ordersData->assignedGarageId = $value->assignedGarageId;
            $ordersData->status = $value->status;
            foreach ($value->hasOrderInformation as $idx => $orders) {
                $ordersData->id = $value->id;
                $ordersData->packageType[$idx] = $orders->package_type;
                $ordersData->name = $orders->name;
                $ordersData->address = $orders->address;
                $ordersData->interestedService[$idx] = $orders->package_name;
                $ordersData->date = $orders->pickup_date;
                $ordersData->contactNumber = $orders->mobile;
                $ordersData->order_id = $orders->order_id;
            }
            
                array_push($ordersArray, $ordersData);
            // var_dump($ordersData);
            
        }

        $bookingCount = count($ordersArray);
        $periodicServiceCount = 0;
        $accidentalRepairCount = 0;
        $mechRepairCount = 0;
        $acRepairCount = 0;
        $batteryTyreCount = 0;
        $upkeepServiceCount = 0;
        $addonCount = 0;


        $garageDataArray = [];
        $garageData = Garages::get();
        $assignedGarageData = new \stdClass();

        if($ordersArray !== []) {
            foreach ($ordersArray as $idx => $order) {
                foreach ($order->packageType as $key => $pkType) {
                    if($pkType == 1) {
                        $periodicServiceCount++;
                    }
                    if($pkType == 2) {
                        $accidentalRepairCount++;
                    }
                    if($pkType == 3) {
                        $mechRepairCount++;
                    }
                    if($pkType == 4) {
                        $acRepairCount++;
                    }
                    if($pkType == 5) {
                        $batteryTyreCount++;
                    }
                    if($pkType == 6) {
                        $upkeepServiceCount++;
                    }
                    if($pkType == 7) {
                        $addonCount++;
                    }
                }
                // if($order->packageType == 1) {
                //     $periodicServiceCount++;
                // }
                // if($order->packageType == 2) {
                //     $accidentalRepairCount++;
                // }
                // if($order->packageType == 3) {
                //     $mechRepairCount++;
                // }
                // if($order->packageType == 4) {
                //     $acRepairCount++;
                // }
                // if($order->packageType == 5) {
                //     $batteryTyreCount++;
                // }
                // if($order->packageType == 6) {
                //     $upkeepServiceCount++;
                // }

                $assignedGarageData = new \stdClass();
                if($order->assignedGarageId == null) {
                    $assignedGarageData->orderId=$order->order_id;
                    $assignedGarageData->garageName="Not Assigned";
                    $garageDataArray[$idx] = $assignedGarageData; 
                    // dd($garageDataArray[$idx]);
                }else {
                    foreach ($garageData as $key => $value) {
                        if($value->id == $order->assignedGarageId) {
                            $assignedGarageData->orderId=$order->order_id;
                            $assignedGarageData->garageName=$value->garage_name;
                            $garageDataArray[$idx] = $assignedGarageData; 
                        }
                    }
                }
            }
            $garageNameArr = $assignedGarageData->garageName;

        }else {
            $assignedGarageData = [];
        }
        
        $garageRequestsData = GarageRequests::get();
        
    	return view('Dashboard.Bookings')->with(compact('ordersArray','bookingCount','garageData','garageRequestsData','garageDataArray','accidentalRepairCount','periodicServiceCount','mechRepairCount','acRepairCount','batteryTyreCount','upkeepServiceCount','service','addonCount' ));
        
    }

    protected function goToDashboard(Request $request){
        $bookingData = OrderPackageInformation::with('getOrderInformation')->get();
        $orderInformationData = OrderInformation::with('hasOrderInformation')->get();
        $leadsData = requestCall::get();
        

        $ordersArray = [];
        foreach ($orderInformationData as $key => $value) {
            $ordersData = new \stdClass();
            if($value->assignedGarageId == null) {
                $ordersData->assignedGarageId = $value->assignedGarageId;
                foreach ($value->hasOrderInformation as $idx => $orders) {
                    // $orderUserId = OrderInformation::where('id',$orders->order_id)->value('user_id');
                    // $orderUserName = User::where('id',$orderUserId)->value('user_id');
                    $ordersData->name = $orders->name;
                    $ordersData->address = $orders->address;
                    $ordersData->interestedService = $orders->package_name;
                    $ordersData->date = $orders->pickup_date;
                    $ordersData->contactNumber = $orders->mobile;
                    $ordersData->make_id = $orders->make_id;
                    $ordersData->model_id = $orders->model_id;
                    $ordersData->fuel_id = $orders->fuel_id;
                    $ordersData->order_id = $orders->order_id;

                }
                    array_push($ordersArray, $ordersData);
            }            
        }
        $unassignedGarageCount = count($ordersArray);

        // foreach ($ordersArray as $key => $value) {
        //     if($value->assignedGarageId == null) {
        //         $unassignedGarageCount = $unassignedGarageCount+1;
        //     }
        // }

        $garageData = Garages::get();
        $garageRequestsData = GarageRequests::get();

        $requestCallbackLeadCount = count($leadsData);
        $garageCount = count($garageData);
        $garageRequestCount = count($garageRequestsData);

        $generalLeadsData = GeneralLead::where('mature_status', '=', null)->orWhere('mature_status', '!=', 1)->get();
        $generalLeadsCount = count($generalLeadsData);

        $generalLeadsUserData = [];

        foreach ($generalLeadsData as $genKey => $generalLead) {
            $genUserData = User::where(['id'=>$generalLead->user_id])->first();
            array_push($generalLeadsUserData, $genUserData);
        }

        return view('Dashboard.adminhome')->with(compact('ordersArray','garageData','garageRequestsData','requestCallbackLeadCount', 'leadsData', 'garageCount','garageRequestCount','unassignedGarageCount','generalLeadsUserData', 'generalLeadsCount' ));
    }

    protected function addGarages(Request $request){
        $garageData = $request->all();
        $addGarage=Garages::create([
            'garage_name' => $garageData['garageData']['garage_name'],
            'garage_location' => $garageData['garageData']['garage_location'],
            'garage_contactNo' => $garageData['garageData']['garage_contactNo'],
            'garage_description' => $garageData['garageData']['garage_description'],
            'mechanic_details' => $garageData['garageData']['mechanic_details'],
            'other_details' => $garageData['garageData']['other_details'],
            'status' => $garageData['garageData']['garageStatus']
        ]);

        if($addGarage) {
            return json_encode(['responseCode' => 200, 'responseMessage' => 'Successfully Added Garage']);
        } else {
            return json_encode(['responseCode' => 400, 'responseMessage' => 'Something went wrong!!!']);
        }
    }

    protected function gotToLeads(Request $request){
        $leadsData = requestCall::get();
        $servicesLeads = ServicesLeads::get();
        $accidentalLeads = AccidentalForm::get();
        $accidentalLeadsCount = count($accidentalLeads);
        $requestCallbackCount =count($leadsData);
        $services = services::get();

        $unpeakServicesCount = 0;
        $batteryTyresCount = 0;
        $mechanicalRepairCount = 0;
        $acRepairCount = 0;

        $unpeakServicesData = [];
        $batteryTyresData = [];
        $mechanicalRepairData = [];
        $acRepairData = [];

        $accidentalNewLeads = AccidentalLeads::get();
        $accidentalNewLeadsCount = count($accidentalNewLeads);
        
        $unpeakServicesData = UpkeepLeads::get();
        $unpeakServicesCount = count($unpeakServicesData);

        $batteryTyresData = BatteryTyreLeads::get();
        $batteryTyresCount = count($batteryTyresData);

        $mechanicalRepairData = MechanicalLeads::get();
        $mechanicalRepairCount = count($mechanicalRepairData);

        $acRepairData = AcLeads::get();
        $acRepairCount = count($acRepairData);

        $generalLeadsData = GeneralLead::get();
        $generalLeadsCount = count($generalLeadsData);

        $generalLeadsUserData = [];

        foreach ($generalLeadsData as $genKey => $generalLead) {
            $genUserData = User::where(['id'=>$generalLead->user_id])->first();
            if($generalLead->mature_status == 1) {
                $genUserData->mature_status= 1;
            } else {
                $genUserData->mature_status= 0;
            }
            array_push($generalLeadsUserData, $genUserData);
        }
        // dd($generalLeadsUserData);

        foreach ($servicesLeads as $key => $service) {
            // if($service->serviceType == "Battery and Tyres") {
            //     $batteryTyresCount++;
            //     array_push($batteryTyresData, $service);
            // }

            // if($service->serviceType == "Mechanical Repair") {
            //     $mechanicalRepairCount++;
            //     array_push($mechanicalRepairData, $service);
            // }

            // if($service->serviceType == "Unpeak Services") {
            //     $unpeakServicesCount++;
            //     array_push($unpeakServicesData, $service);
            // }

            // if($service->serviceType == "AC Servicing") {
            //     $acRepairCount++;
            //     array_push($acRepairData, $service);
            // }

        }
        // foreach ($leadsData as $key => $leadValue) {
        //     dd($leadValue);
            
        // }
        return view('Dashboard.Leads')->with(compact('leadsData','servicesLeads','unpeakServicesCount','batteryTyresCount','mechanicalRepairCount','acRepairCount','accidentalLeadsCount','accidentalNewLeadsCount','batteryTyresData','unpeakServicesData','mechanicalRepairData','acRepairData','requestCallbackCount','accidentalLeads','accidentalNewLeads','generalLeadsData','generalLeadsUserData','generalLeadsCount','services' ));
    }

    protected function getOrderData(Request $request){
        // dd($request->orderId);
        $orderId = $request->orderId;
        $orderInformationData = OrderInformation::where('id',$orderId)->with('hasOrderInformation')->first();
        
        // ReferalData::where('referredTo',$refferedToMobile)->value('referredBy')

        $ordersData = new \stdClass();
        $ordersData->userId = $orderInformationData->user_id;
        $ordersData->orderId = $orderId;
            foreach ($orderInformationData->hasOrderInformation as $idx => $orders) {
                // var_dump($orders);
                $ordersData->mobile = $orders->mobile;
                $ordersData->address = $orders->address;
                $ordersData->package_name[$idx] = $orders->package_name;
                $ordersData->pickup_date = $orders->pickup_date ;       
                $brand = Brand::where('id',$orders->make_id)->value('make_name');
                $model = Carmodels::where('id',$orders->model_id)->value('model_name');
                $fuel = Fuel::where('id',$orders->fuel_id)->value('fuel_type');
                $ordersData->brand[$idx] = $brand;
                $ordersData->model[$idx] = $model;
                $ordersData->fuel[$idx] = $fuel;                
            }

            // dd($ordersData);
        return json_encode(['ordersData' => $ordersData]);
    }

    protected function assignGarageToOrder(Request $request){
        $assignGarage = OrderInformation::where('id',$request->orderId)->update([
            'assignedGarageId' => $request->garageId
        ]);

        $userId = OrderInformation::where('id',$request->orderId)->value('user_id');
        $userData = User::where('id',$userId)->first();
        $garageData = Garages::where('id',$request->garageId)->first();
        // dd($garageData->garage_contactNo);

        // $garageAssignMsgUser = 'Dear user, Your order has been assigned to garage -'.$garageData->garage_name.', located at '.$garageData->garage_location.'. Contact No. for the garage - '.$garageData->garage_contactNo.'. Regards, TeamMyCarMech.';

        $garageAssignMsgUser = 'Dear user, Your order has been assigned to the garage -'.$garageData->garage_name.', located at '.$garageData->garage_location.'. Contact number - '.$garageData->garage_contactNo.'. Regards, TeamMyCarMech';

        // $userDetailsMsg = 'Hello '.$garageData->garage_name.', Order with orderId #'.$request->orderId.' has been assigned to your garage. Order details - Customer Name: '.$userData->username.', Customer Contact No.: '.$userData->mobile.', Customer Address: '.$userData->address.'. Regards, TeamMyCarMech.';

        $userDetailsMsg = 'Hello '.$garageData->garage_name.', order with order-Id #'.$request->orderId.' has been assigned to your garage. Order details - Customer Name: '.$userData->username.', Customer Contact No.: '.$userData->mobile.', Customer Address: '.$userData->address.'. Regards, Team MyCarMech.';
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.kaleyra.io/v1/HXAP1689313803IN/messages",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "to=91".$userData->mobile."&sender=MCMECH&source=API&body=".$garageAssignMsgUser."&type=TXN",
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

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.kaleyra.io/v1/HXAP1689313803IN/messages",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "to=91".$garageData->garage_contactNo."&sender=MCMECH&source=API&body=".$userDetailsMsg."&type=TXN",
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

        if($assignGarage) {
            return response('Garage Assigned Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }

    protected function unassignGarage(Request $request){

        $unassignGarage = OrderInformation::where('id',$request->orderId)->update([
            'assignedGarageId' => null
        ]);

        if($unassignGarage) {
            return response('Garage Unassigned Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }

    protected function updateGarageReqStatus(Request $request){
        $updateReqStatus = GarageRequests::where('id',$request->reqId)->update([
            'status' => $request->status,
            'note' => $request->noteData
        ]);

        if($updateReqStatus) {
            return response('Garage Request Status Updated Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }

    protected function addUpkeep(Request $request){
        $upkeepData = Package::where('package_type', '=', '3')->get();
        return view('Dashboard.AddUpkeep',compact('upkeepData'));
    }
    protected function createUpkeepView(Request $request){
        return view('Dashboard.CreateUpkeep');
    }
    protected function createUpkeep(Request $request){
        // dd($request->all());
        $createNewPackage = Package::create([
            'package_name' => $request->upkeepName,
            'package_description' => $request->upkeepDescription,
            'package_type' => 3,
        ]);
        if($createNewPackage) {
            return Redirect('/Dashboard/AddNewUpkeep');       
        }
    }

    protected function editUpkeepView(Request $request,$id){
        $upkeepData = Package::where(['id'=>$id])->first();
        return view('Dashboard.EditUpkeep',compact('upkeepData'));
    }

    protected function updateUpkeep(Request $request){
        $updateUpkeep = Package::where(['id'=> $request->upkeepId])->update([
            'package_name' => $request->upkeepName,
            'package_description' => $request->upkeepDescription,
            'package_type'          => '3',
        ]);
        if($updateUpkeep) {
            return Redirect('/Dashboard/AddNewUpkeep');       
        }
    }
    protected function assignUpkeepView(Request $request,$id){
        // dd($id);
        $upkeepData = Package::where(['id'=>$id])->first();
        $brandData = Brand::orderBy('make_name')->get();
        $modelData = Carmodels::orderBy('model_name')->get();
        $fuelData = Fuel::orderBy('fuel_type')->get();

        return view('Dashboard.AssignUpkeep',compact('upkeepData','brandData','modelData','fuelData'));
    }
    protected function assignUpkeep(Request $request){
        $assignPacakge = AssignedPackages::create([
            'package_name'=> $request->upkeepName,
            'package_description'=> $request->upkeepDescription,
            'package_id'=> $request->upkeepId,
            'make_id'=> $request->assignMake,
            'model_id'=> $request->assignModel,
            'fuel_id'=> $request->assignFuel,
            'make'=> $request->selectedMake,
            'model'=> $request->selectedModel,
            'fuel'=> $request->selectedFuel,
            'total_price'=> $request->totalPrice,
            'discounted_price'=> $request->discountedPrice,
            'service_time'=> $request->serviceTime,
            'status'=> 'active'
        ]);

        if($assignPacakge) {
            return Redirect('/Dashboard/AddNewUpkeep');
        }
    }
    protected function deleteUpkeep(Request $request){
        // dd($request->all());
        $current_date_time = Carbon::now()->toDateTimeString();
        $deleteUpkeep = Package::where(['id'=> $request->upkeepId])->update([
            'deleted_at' =>$current_date_time
        ]);
        if($deleteUpkeep) {
            return response('Upkeep Deleted Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }
    protected function addPackages(Request $request){
        $packageData = Package::get();
        return view('Dashboard.AddPackages',compact('packageData'));
    }

    protected function createPackageView(Request $request){
        return view('Dashboard.CreatePackage');
    }

    protected function createPackage(Request $request){
        // dd($request->all());
        $createNewPackage = Package::create([
            'package_name' => $request->packageName,
            'package_description' => $request->packageDescription,
            'package_type'          => '1',
        ]);
        if($createNewPackage) {
            return Redirect('/Dashboard/AddNewPackages');       
        }
    }

    protected function editPackageView(Request $request,$id){
        $packageData = Package::where(['id'=>$id])->first();
        return view('Dashboard.EditPackage',compact('packageData'));

    }

    protected function updatePackage(Request $request){

        $packageData = Package::where(['id'=> $request->packageId])->first();

        $updatePackage = Package::where(['id'=> $request->packageId])->update([
            'package_name' => $request->packageName,
            'package_description' => $request->packageDescription
        ]);

        $updateAssignedPackages = AssignedPackages::where(['package_name' => $packageData->package_name])->update([
            'package_name' => $request->packageName,
            'package_description' => $request->packageDescription
        ]);

        if($updateAssignedPackages) {
            return Redirect('/Dashboard/AddNewPackages');       
        }
    }

    protected function deletePackage(Request $request){
        $current_date_time = Carbon::now()->toDateTimeString();
        $deletePackage = Package::where(['id'=> $request->packageId])->update([
            'deleted_at' =>$current_date_time
        ]);

        if($deletePackage) {
            return response('Package Deleted Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }
      protected function ViewAssignedPackages(Request $request){
        $packageData = AssignedPackages::get();
        return view('Dashboard.ViewAssignedPackages',compact('packageData'));
    }
    protected function editAssignedPackageView(Request $request,$id){
        $packageData = AssignedPackages::where(['id'=>$id])->first();
         $selectedBrand = Brand::where([ 'id' => $packageData->make_id])->first();
        $brands = Brand::orderBy('make_name')->get();
        $schedulePack = Package::where(['package_type' => NULL])->get();
        $models = Carmodels::orderBy('model_name')->get();
        $selectedFuel = Carmodels::where(['id' => $packageData->model_id])->first();
        $fuelSelect = Fuel::where(['id' => $packageData->fuel_id])->first();
        // dd($schedulePack);
        $fuels = Fuel::orderBy('fuel_type')->get();
        return view('Dashboard.editAssignedPackageView',compact('packageData','selectedBrand','brands','selectedFuel','fuels','models','fuelSelect','schedulePack'));

    }
    protected function updateAssignedPackageView(Request $request){
        // dd($request->all());
        // $make = new AssignedPackages($request->input()) ;
        $update = AssignedPackages::where(['id' => $request->id])->update([
                "package_name" => $request->package_name,
                "make" => $request->make,
                "model" => $request->model,
                "fuel" => $request->fuel,
                "make_id" => $request->make_id,
                "model_id" => $request->model_id,
                "fuel_id" => $request->fuel_id,
                "total_price" => $request->total_price,
                "discounted_price" => $request->discounted_price,
                "service_time" => $request->servie_time,
                "status" => $request->status,
                ]);
         return redirect('/ViewAssignedPackages')
                        ->with('success','You have successfully update data');
      
    }
    protected function deleteAssignedPackageView($id)
    {
        // dd($id);
        $deletePack = AssignedPackages::where('id',$id)->delete();
        return redirect('/ViewAssignedPackages')
                        ->with('success','Assigned Package deleted successfully');
    }

    protected function assignPackageView(Request $request,$id){
        $packageData = Package::where(['id'=>$id])->first();
        $brandData = Brand::orderBy('make_name')->get();
        $modelData = Carmodels::orderBy('model_name')->get();
        $fuelData = Fuel::orderBy('fuel_type')->get();

        return view('Dashboard.AssignPackage',compact('packageData','brandData','modelData','fuelData'));
    }

    protected function getModelData(Request $request){
        $modelData = Carmodels::where(['make_id'=>$request->brandId])->get();
        return response($modelData, 200);
    }

    protected function getFuelData(Request $request){
        $fuelData = carmodel_fuel::where(['model_id'=>$request->modelId])->get();
        $fuelTypeIdArray = []; 
        foreach ($fuelData as $key => $fuel) {
            array_push($fuelTypeIdArray, $fuel->fuel_id);
        }

        $fuelDataArray=[];
        foreach ($fuelTypeIdArray as $idx => $fuelType) {
            $fuelIdData = Fuel::where(['id'=> $fuelType])->get();
            array_push($fuelDataArray, $fuelIdData);
        }
        return response($fuelDataArray, 200);
    }

    protected function assignPackage(Request $request){
        $assignPacakge = AssignedPackages::create([
            'package_name'=> $request->packageName,
            'package_description'=> $request->packageDescription,
            'package_id'=> $request->packageId,
            'package_type'=> 1,
            'make_id'=> $request->assignMake,
            'model_id'=> $request->assignModel,
            'fuel_id'=> $request->assignFuel,
            'make'=> $request->selectedMake,
            'model'=> $request->selectedModel,
            'fuel'=> $request->selectedFuel,
            'total_price'=> $request->totalPrice,
            'discounted_price'=> $request->discountedPrice,
            'service_time'=> $request->serviceTime,
            'status'=> 'active'
        ]);

        if($assignPacakge) {
            return Redirect('/Dashboard/AddNewPackages');
        }
    }

    protected function addServices(Request $request){
        $serviceData = service::get();
        $packageData = Package::get();
        $pacakegNameData =[];
        foreach ($serviceData as $key => $service) {
            foreach ($packageData as $idx => $package) {
                $packageServiceObj = new \stdClass();
                if($service->package_id == $package->id) {
                    $packageServiceObj->pacakageName = $package->package_name;
                    $packageServiceObj->serviceName = $service->id;
                    $packageServiceObj->pacakageId = $package->id;
                    // $packageServiceObj->serviceName = $service->service_name;
                array_push($pacakegNameData, $packageServiceObj); 
                }
            }
        }
        return view('Dashboard.AddServices',compact('serviceData','pacakegNameData'));
    }

    protected function createSeriviceView(Request $request){
        $packageData = Package::get();
        return view('Dashboard.CreateService',compact('packageData'));
    }

    protected function createService(Request $request){
        $createNewService = service::create([
            'service_name' => $request->serviceName,
            'package_id' => $request->packageId
        ]);
        if($createNewService) {
            return Redirect('/Dashboard/AddNewServices');       
        }
    }

    protected function editServiceView(Request $request,$id){
        $serviceData = service::where(['id'=>$id])->first();

        $selectedPackage = Package::where(['id'=> $serviceData->package_id])->first();
        
        $packageData = Package::get();

        return view('Dashboard.EditService',compact('serviceData','packageData','selectedPackage'));
    }
    
    protected function updateService(Request $request){
        $updateService = service::where(['id'=> $request->serviceId])->update([
            'service_name' => $request->serviceName,
            'package_id' => $request->packageId
        ]);
        if($updateService) {
            return Redirect('/Dashboard/AddNewServices');       
        }
    }    

    protected function deleteService(Request $request){
        $current_date_time = Carbon::now()->toDateTimeString();
        $deleteService = service::where(['id'=> $request->serviceId])->update([
            'deleted_at' =>$current_date_time
        ]);

        if($deleteService) {
            return response('Service Deleted Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }

    protected function displayPartPricing(Request $request){
        $partPriceData = CarPartPricing::get();
        $service = services::where('id',2)->first();

        // dd($partPriceData);
        return view('Dashboard.ManageCarParts',compact('partPriceData','service'));
    }

    protected function createNewPartView(Request $request){
        return view('Dashboard.CreatePart');
    }

    protected function createPart(Request $request){
        $createNewPart = CarParts::create([
            'part_name' => $request->partName,
        ]);
        
        if($createNewPart) {
            return Redirect('/AddNewPart/viewParts');       
        }
    }

    protected function viewParts(Request $request){
        $partsData = CarParts::get();

        return view('Dashboard.ViewParts',compact('partsData'));
    }

    protected function editParts(Request $request,$id){
        $partsData = CarParts::where(['id'=>$id])->first();
        return view('Dashboard.EditPart',compact('partsData'));
    }

    protected function updatePart(Request $request){
        $partsData = CarParts::where(['id'=>$request->partId])->update([
            'part_name' => $request->partName
        ]);
        return Redirect('/AddNewPart/viewParts');  
    }

    protected function deletePart(Request $request){
        $current_date_time = Carbon::now()->toDateTimeString();
        $partsData = CarParts::where(['id'=>$request->partId])->update([
            'deleted_at' => $current_date_time
        ]);
        return Redirect('/AddNewPart/viewParts');  
    }

    protected function viewCarTypes(Request $request){
        $carTypesData = CarTypes::get();
        return view('Dashboard.ViewCarTypes',compact('carTypesData'));
    }

    protected function createNewCarTypeView(Request $request){
        return view('Dashboard.CreateCarType');
    }

    protected function createCarType(Request $request){
        $createNewCarType = CarTypes::create([
            'type_name' => $request->carTypeName,
        ]);
        
        if($createNewCarType) {
            return Redirect('/AddNewCarType/viewCarTypes');       
        }
    }

    protected function editCarTypeView(Request $request,$id){
        $carTypesData = CarTypes::where(['id'=>$id])->first();
        return view('Dashboard.EditCarType',compact('carTypesData'));
    }

    protected function updateCarType(Request $request){
        $carTypesData = CarTypes::where(['id'=>$request->carTypeId])->update([
            'type_name' => $request->carTypeName
        ]);
        return Redirect('/AddNewCarType/viewCarTypes');       
        
    }

    protected function deleteCarType(Request $request){
        $current_date_time = Carbon::now()->toDateTimeString();
        $carTypeData = CarTypes::where(['id'=>$request->carTypeId])->update([
            'deleted_at' => $current_date_time
        ]);

        if($carTypeData) {
            return response('Car Type Deleted Successfully', 200);
        } else {
            return response('Something went wrong', 250);
        }
    }

    protected function assignPartToType(Request $request){
        $carTypeData = CarTypes::get();
        $partsData = CarParts::get();
        return view('Dashboard.AssignPartToType',compact('carTypeData','partsData'));
    }

    protected function setPartPrice(Request $request){
        $partName = CarParts::where(['id' => $request->selectCarParts])->value('part_name');
        $carType = CarTypes::where(['id' => $request->selectCarType])->value('type_name');

        $setPartPrice = CarPartPricing::create([
            'part_name' => $partName,
            'car_type' => $carType,
            'solid' => $request->solidMaterial,
            'metallic' => $request->metallicMaterial,
            'pearl' => $request->pearlMaterial,
            'price' => $request->carTypeName,
        ]);
        
        if($setPartPrice) {
            return Redirect('/Dashboard/carPartPricing');       
        }
    }

    protected function viewServiceParts(Request $request){
        $serviceParts = CarServiceParts::get();
        return view('Dashboard.ServiceParts',compact('serviceParts'));

    }

    protected function addServicePartView(Request $request, $id){
        $brandData = Brand::orderBy('make_name')->get();
        $modelData = Carmodels::orderBy('model_name')->get();
        $fuelData = Fuel::orderBy('fuel_type')->get();
        $servicesData = services::where(['id'=>$id])->get();
        $serviceTypeId = $id;
        // dd($servicesData);
        return view('Dashboard.AddServicePart',compact('brandData','modelData','fuelData','servicesData','serviceTypeId'));

    }

    protected function addServicePart(Request $request){
        if($request->batteryTyreSelect) {
            if($request->batteryTyreSelect == "1") {
                $createServicePart = CarServiceParts::create([
                    'part_name' => $request->partName,
                    'part_description' => $request->partDescription,
                    'make' => $request->selectedMake,
                    'model' => $request->selectedModel,
                    'fuel' => $request->selectedFuel,
                    'make_id' => $request->assignMake,
                    'model_id' => $request->assignModel,
                    'fuel_id' => $request->assignFuel,
                    'price' => $request->price,
                    'image' =>null,
                    'serviceType' => $request->serviceType,
                    'part_type' => 1
                ]);

            } else {
                $createServicePart = CarServiceParts::create([
                    'part_name' => $request->partName,
                    'part_description' => $request->partDescription,
                    'make' => $request->selectedMake,
                    'model' => $request->selectedModel,
                    'fuel' => $request->selectedFuel,
                    'make_id' => $request->assignMake,
                    'model_id' => $request->assignModel,
                    'fuel_id' => $request->assignFuel,
                    'price' => $request->price,
                    'image' =>null,
                    'serviceType' => $request->serviceType,
                    'part_type' => 0
                ]);
            }
        } else {
            $createServicePart = CarServiceParts::create([
                'part_name' => $request->partName,
                'part_description' => $request->partDescription,
                'make' => $request->selectedMake,
                'model' => $request->selectedModel,
                'fuel' => $request->selectedFuel,
                'make_id' => $request->assignMake,
                'model_id' => $request->assignModel,
                'fuel_id' => $request->assignFuel,
                'price' => $request->price,
                'image' =>null,
                'serviceType' => $request->serviceType,
            ]);
        }



        if($createServicePart && $file = $request->file('part_image')) {
            $file = $request->file('part_image');
            $fileName = $file->getClientOriginalName() ;
            $extension = substr($fileName, strpos($fileName, ".") + 1);  
            $destinationPath = public_path().'/images/carParts/' ;
            $updatedFilename =$createServicePart->id.'.'.$extension ;
            $file->move($destinationPath,$updatedFilename);
            $saveImage = CarServiceParts::where(['id'=>$createServicePart->id])->update([
                'image'=>$updatedFilename,
            ]);
            return Redirect('/Dashboard/serviceParts');    
        }
        return Redirect('/Dashboard/serviceParts'); 
    }

    protected function editServicePartsView(Request $request, $id){
        $brandData = Brand::orderBy('make_name')->get();
        $servicesData = services::orderBy('service_name')->get();
        $fuelData = Fuel::orderBy('fuel_type')->get();        

        $selectedServicePartData = CarServiceParts::where(['id'=>$id])->first();
        $selectedBrandData = Brand::where(['id'=>$selectedServicePartData->make_id])->first();
        $modelData = Carmodels::where(['make_id'=>$selectedBrandData->id])->get();
        $selectedModelData = Carmodels::where(['id'=>$selectedServicePartData->model_id])->first();
        $modelFuelData = carmodel_fuel::where(['model_id'=>$selectedModelData->id])->get();
        $fuels = [];
        foreach ($fuelData as $key => $fuel) {
            foreach ($modelFuelData as $idx => $modelFuel) {
                if($modelFuel->fuel_id == $fuel->id) {
                    array_push($fuels, $fuel->fuel_type);
                }
            }
        }
        $selectedFuelData = Fuel::where(['id'=>$selectedServicePartData->fuel_id])->first();

        return view('Dashboard.EditServiceParts',compact('brandData','modelData','fuelData','servicesData','selectedServicePartData','selectedBrandData','selectedModelData','selectedFuelData','fuels'));

    }

    protected function updateServicePart(Request $request){
        $createServicePart = CarServiceParts::where(['id'=>$request->selectedServicePart])->update([
            'part_name' => $request->partName,
            'part_description' => $request->partDescription,
            'make' => $request->selectedMake,
            'model' => $request->selectedModel,
            'fuel' => $request->selectedFuel,
            'make_id' => $request->assignMake,
            'model_id' => $request->assignModel,
            'fuel_id' => $request->assignFuel,
            'price' => $request->price,
            'image' =>null,
            'serviceType' => $request->serviceType,
        ]);
        if($request->selectedServicePart && $file = $request->file('part_image')) {
            $file = $request->file('part_image');
            $fileName = $file->getClientOriginalName() ;
            $extension = substr($fileName, strpos($fileName, ".") + 1);  
            $destinationPath = public_path().'/images/carParts/' ;
            $updatedFilename =$request->selectedServicePart.'.'.$extension ;
            $file->move($destinationPath,$updatedFilename);
            $saveImage = CarServiceParts::where(['id'=>$request->selectedServicePart])->update([
                'image'=>$updatedFilename,
                'part_image'=>$updatedFilename
            ]);
        }
        if($request->serviceType == 'Mechanical Repair') {
            return Redirect('/Dashboard/mechanicalServices');  
        } else if($request->serviceType == 'AC Servicing') {
            return Redirect('/Dashboard/acServices');  
        }else if($request->serviceType == 'Battery and Tyres') {
            return Redirect('/Dashboard/batteryTyres');  
        }else if($request->serviceType == 'Upkeep Services') {
            return Redirect('/Dashboard/upkeepServices');  
        }else{
            return Redirect('/Dashboard');  
        }
    }

    protected function deleteServicePart(Request $request){
        $serviceType = CarServiceParts::where(['id'=>$request->servicePratId])->value('serviceType');
        // dd($serviceType);
        $current_date_time = Carbon::now()->toDateTimeString();
        $createServicePart = CarServiceParts::where(['id'=>$request->servicePratId])->update([
            'deleted_at' => $current_date_time
        ]);

        if($createServicePart) {
            return response($serviceType, 200);
        } else {
            return response('Something went wrong', 250);
        }
    }

    protected function membershipPackages(Request $request){
        $packageData = Package::where(['package_type'=>'2'])->get();
        return view('Dashboard.MembershipPackages',compact('packageData'));
    }

    protected function assignMembershipPackageView(Request $request,$id){
        $packageData = Package::where(['id'=>$id])->first();
        $brandData = Brand::orderBy('make_name')->get();
        $modelData = Carmodels::orderBy('model_name')->get();
        $fuelData = Fuel::orderBy('fuel_type')->get();

        return view('Dashboard.AssignMembershipPackage',compact('packageData','brandData','modelData','fuelData'));
    }

    protected function assignMembershipPackage(Request $request){
        $assignPacakge = AssignedPackages::create([
            'package_name'=> $request->packageName,
            'package_description'=> $request->packageDescription,
            'package_id'=> $request->packageId,
            'package_type'=> 2,
            'make_id'=> $request->assignMake,
            'model_id'=> $request->assignModel,
            'fuel_id'=> $request->assignFuel,
            'make'=> $request->selectedMake,
            'model'=> $request->selectedModel,
            'fuel'=> $request->selectedFuel,
            'total_price'=> $request->totalPrice,
            'discounted_price'=> $request->discountedPrice,
            'service_time'=> $request->serviceTime,
            'status'=> 'active'
        ]);

        if($assignPacakge) {
            return Redirect('/Dashboard/membershipPackages');
        }
    }

    protected function editMembershipPackageView(Request $request, $id){
        $packageData = Package::where(['id'=>$id])->first();
        return view('Dashboard.EditMembershipPackage',compact('packageData'));
    }

    protected function updateMembershipPackage(Request $request){
        $updatePackage = Package::where(['id'=> $request->packageId])->update([
            'package_name' => $request->packageName,
            'package_description' => $request->packageDescription
        ]);
        if($updatePackage) {
            return Redirect('/Dashboard/membershipPackages');       
        }
    }

    protected function uploadBrands(Request $request) {
      if($file = $request->hasFile('uploadCsv')) {
        $file = $request->file('uploadCsv');

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv");
        $location = 'uploads/csv/brands';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);

        // Reading file
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );

            if($i == 0){
                $i++;
                continue; 
            }

            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);

        foreach($importData_arr as $importData){
            $make = Brand::where('make_name',$importData[0])->get();

            if($make->toArray() == [] ) {
                $insertData = Brand::create([
                    "make_name"=>$importData[0],
                    "make_image"=>$importData[1],
                ]);
            } else {
                $insertData = "Make already exist";
            }
        }

        if($insertData) {
            return Redirect('/Dashboard/make'); 
        }

      }
    }

    protected function uploadModels(Request $request) {
      if($file = $request->hasFile('uploadCsv')) {
        $file = $request->file('uploadCsv');

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv");
        $location = 'uploads/csv/models';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);

        // Reading file
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );

            if($i == 0){
                $i++;
                continue; 
            }

            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);
        foreach($importData_arr as $importData){
            $existingData = Carmodels::where('model_name',$importData[0])->get();

            if($existingData->toArray() == [] ) {
                $insertData = Carmodels::create([
                    "model_name"=>$importData[0],
                    "model_image"=>$importData[1],
                    "car_type"=>$importData[2],
                    "make_id"=>$importData[3],
                ]);
            } else {
                $updateData = Carmodels::where(['model_name'=>$importData[0]])->update([
                    "car_type"=>$importData[2]
                ]);
            }
        }

        // if($insertData) {
            return Redirect('/Dashboard/car'); 
        // }

      }
    }

    protected function uploadPackages(Request $request) {
      if($file = $request->hasFile('uploadCsv')) {
        $file = $request->file('uploadCsv');

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv");
        $location = 'uploads/csv/packages';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);

        // Reading file
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );

            if($i == 0){
                $i++;
                continue; 
            }

            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);
        foreach($importData_arr as $importData){
            $existingData = Package::where('package_name',$importData[0])->get();

            if($existingData->toArray() == [] ) {
                $insertData = Package::create([
                    "package_name"=>$importData[0],
                    "package_description"=>$importData[1],
                    "package_type"=>$importData[2],
                ]);
            }
        }

        if($insertData) {
            return Redirect('/Dashboard/AddNewPackages'); 
        }

      }
    }

    protected function uploadServices(Request $request) {
      if($file = $request->hasFile('uploadCsv')) {
        $file = $request->file('uploadCsv');

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv");
        $location = 'uploads/csv/services';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);

        // Reading file
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );

            if($i == 0){
                $i++;
                continue; 
            }

            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);
        foreach($importData_arr as $importData){
            $existingData = service::where(['service_name'=>$importData[0], "package_id"=>$importData[1]])->get();

            if($existingData->toArray() == [] ) {
                $insertData = service::create([
                    "service_name"=>$importData[0],
                    "package_id"=>$importData[1],
                ]);
            }
        }

        // if($insertData) {
            return Redirect('/Dashboard/AddNewServices'); 
        // }

      }
    }

    protected function uploadCarParts(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/carParts';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $existingData = CarParts::where(['part_name'=>$importData[0]])->get();

                if($existingData->toArray() == [] ) {
                    $insertData = CarParts::create([
                        "part_name"=>$importData[0],
                        "part_category"=>null,
                    ]);
                }
            }

            if($insertData) {
                return Redirect('/AddNewPart/viewParts'); 
            }

          }
    }

    protected function uploadCarTypes(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/carTypes';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $existingData = CarTypes::where(['type_name'=>$importData[0]])->get();

                if($existingData->toArray() == [] ) {
                    $insertData = CarTypes::create([
                        "type_name"=>$importData[0],
                    ]);
                }
            }

            if($insertData) {
                return Redirect('/AddNewCarType/viewCarTypes'); 
            }

        }
    }

    protected function accidentalPricingUpdateView(Request $request, $id) {
        $accidentalPartData = CarPartPricing::where(['id'=>$id])->first();
        return view('Dashboard.EditAccidentalParts',compact('accidentalPartData'));
    }

    protected function deleteAccPart(Request $request) {
        $current_date_time = Carbon::now()->toDateTimeString();
        $deleteAccPart = CarPartPricing::where(['id'=> $request->servicePratId])->update([
            'deleted_at' =>$current_date_time
        ]);
        if($deleteAccPart) {
            return response('Success',200);
        }
    }

    protected function accidentalPricingUpdate(Request $request) {
        // dd($request->all());
        $accidentalPartUpdate = CarPartPricing::where(['id'=>$request->part_id])->update([
            "part_name"=>$request->selectCarParts,
            "car_type"=>$request->selectCarType,
            "solid"=>$request->solidMaterial,
            "metallic"=>$request->metallicMaterial,
            "pearl"=>$request->pearlMaterial,
        ]);
        
        if($accidentalPartUpdate) {
            return Redirect('/Dashboard/carPartPricing');  
        }
    }

    protected function accidentalPricingUpload(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/accidentalPricing';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $existingData = CarPartPricing::where(['part_name'=>$importData[0], "car_type"=>$importData[1]])->get();

                if($existingData->toArray() == [] ) {
                    $insertData = CarPartPricing::create([
                        "part_name"=>$importData[0],
                        "car_type"=>$importData[1],
                        "solid"=>$importData[2],
                        "metallic"=>$importData[3],
                        "pearl"=>$importData[4],
                    ]);
                } else {
                    $updateData = CarPartPricing::where(['part_name'=>$importData[0], "car_type"=>$importData[1]])->update([
                        "part_name"=>$importData[0],
                        "car_type"=>$importData[1],
                        "solid"=>$importData[2],
                        "metallic"=>$importData[3],
                        "pearl"=>$importData[4],
                    ]);
                }

            }

            if(isset($insertData) || isset($updateData) ) {
                return Redirect('/Dashboard/carPartPricing');
            }

        }
    }

    protected function uploadPromocodes(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/promocodes';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $existingData = Promocode::where(['promocode_text'=>$importData[0]])->get();

                if($existingData->toArray() == [] ) {
                    $insertData = Promocode::create([
                        "promocode_text"=>$importData[0],
                        "selection_type"=>$importData[1],
                        "promocode_amount"=>$importData[2],
                        "promocode_start_date"=>$importData[3],
                        "promocode_end_date"=>$importData[4],
                        "promocode_status"=>$importData[5],
                    ]);
                }
            }

            if($insertData) {
                return Redirect('/Dashboard/promocode'); 
            }

        }
    }

    protected function uploadServicePartPricing(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/servicePartPricing';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $existingData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[3], "model"=>$importData[4], "fuel"=>$importData[5]])->get();

                if($existingData->toArray() == [] ) {
                    $insertData = CarServiceParts::create([
                        "part_name"=>$importData[0],
                        "part_description"=>$importData[1],
                        "part_image"=>$importData[2],
                        "make"=>$importData[3],
                        "model"=>$importData[4],
                        "fuel"=>$importData[5],
                        "make_id"=>$importData[6],
                        "model_id"=>$importData[7],
                        "fuel_id"=>$importData[8],
                        "price"=>$importData[9],
                        "serviceType"=>$importData[10],
                        "part_type"=>$importData[11],
                    ]);
                }

            }

            if($insertData) {
                return Redirect('/Dashboard/serviceParts'); 
            }

        }
    }

    protected function uploadFuelAssign(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/uploadFuelAssign';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $existingData = carmodel_fuel::where(['model_id'=>$importData[0], "fuel_id"=>$importData[1]])->get();

                if($existingData->toArray() == [] ) {
                    $insertData = carmodel_fuel::create([
                        "model_id"=>$importData[0],
                        "fuel_id"=>$importData[1],
                    ]);
                }
            }

            if($insertData) {
                return Redirect('/Dashboard/car'); 
            }
        }
    }

    protected function uploadMasterCSVNew(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/uploadMasterCSV';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $make = Brand::where('make_name',$importData[0])->get();
                if($importData[2]=="Petrol") {
                    $fuelId=1;
                } else if($importData[2]=="Diesel") {
                    $fuelId=2;
                } else if($importData[2]=="CNG"){
                    $fuelId=3;
                }
                // dd($fuelId);
                
                if($make->toArray() == [] ) {
                    $insertData = Brand::create([
                        "make_name"=>$importData[0],
                    ]);

                    Brand::where('id',$insertData->id)->update([
                        "make_image"=>$insertData->id.'.jpeg'
                    ]);
                }

                $model = Carmodels::where(['model_name'=>$importData[1], 'car_type'=>$importData[5] ])->get();
                $makeId = Brand::where('make_name',$importData[0])->value('id');

                if($model->toArray() == [] ) {
                    $insertModelData = Carmodels::create([
                        "model_name"=>$importData[1],
                        "car_type"=>$importData[5],
                        "make_id"=>$makeId
                    ]);

                    Carmodels::where('id',$insertModelData->id)->update([
                        "model_image"=>$insertModelData->id.'.jpeg'
                    ]);
                }

                $modelId = Carmodels::where('model_name',$importData[1])->value('id');

                $packageData = Package::where(['package_name' => $importData[6]])->first();

                if($packageData->toArray() == [] ) {
                    $newPackage = Package::create([
                        'package_name'=> $importData[6],
                        'package_description'=> $importData[7]
                    ]);                    
                }

                $packages = AssignedPackages::where(['package_name'=>$importData[6], 'make_id'=>$makeId, 'model_id'=>$modelId, 'fuel_id'=>$fuelId ])->first();

                $fuelMaping = carmodel_fuel::where(['model_id'=>$modelId, "fuel_id"=>$fuelId])->get();

                if($fuelMaping->toArray() == [] ) {
                    $insertFuelModelMaping = carmodel_fuel::create([
                        "model_id"=>$modelId,
                        "fuel_id"=>$fuelId,
                    ]);
                }

                if($packageData->toArray() !== [] ) {
                    if($packages->toArray() == []) {
                        $insertPackageData = AssignedPackages::create([
                            "package_name"=>$importData[6],
                            "package_description"=>$importData[7],
                            "package_id"=>$packageData->id,
                            "package_type"=>1,
                            "make_id"=>$makeId,
                            "model_id"=>$modelId,
                            "fuel_id"=>$fuelId,
                            "make"=>$importData[0],
                            "model"=>$importData[1],
                            "fuel"=>$importData[2],
                            "total_price"=>$importData[8],
                            "discounted_price"=>$importData[9],
                            "service_time"=>$importData[10],
                            "status"=>"active"
                        ]);
                    } else {
                        if($importData[10] == "null") {
                            $insertPackageData = AssignedPackages::where(['id' => $packages->id])->update([
                                "total_price"=>$importData[8],
                                "discounted_price"=>$importData[9],
                                "service_time"=>null,
                            ]);    
                        } else {
                            $insertPackageData = AssignedPackages::where(['id' => $packages->id])->update([
                                "total_price"=>$importData[8],
                                "discounted_price"=>$importData[9],
                                "service_time"=>$importData[10],
                            ]);
                        }
                    }
                } else {
                    // dd("New Package Aadded");
                }
            }

            if($insertPackageData) {
                return Redirect('/Dashboard/AddNewPackages'); 
            }
        }
    }

    protected function uploadPeriodicCSV(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/uploadPeriodicCSV';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $make = Brand::where('make_name',$importData[0])->first();
                $model = Carmodels::where(['model_name'=>$importData[1], 'car_type'=>$importData[3] ])->first();
                $packageData = Package::where(['package_name' => $importData[4]])->first();

                if($importData[2]=="Petrol") {
                    $fuelId=1;
                } else if($importData[2]=="Diesel") {
                    $fuelId=2;
                } else if($importData[2]=="CNG"){
                    $fuelId=3;
                }
// dd($packageData);
                if($packageData==null || $packageData->toArray() == [] ) {
                    $newPackage = Package::create([
                        'package_name'=> $importData[4],
                        'package_description'=> $importData[5]
                    ]);                    
                }

                if($model!==null && $make!==null) {
                    $packages = AssignedPackages::where(['package_name'=>$importData[4], 'make_id'=>$make->id, 'model_id'=>$model->id, 'fuel_id'=>$fuelId ])->first();
                    if($packageData !== null ) {
                        if($packages == null || $packages->toArray() == []) {
                            $insertPackageData = AssignedPackages::create([
                                "package_name"=>$packageData->package_name,
                                "package_description"=>$packageData->package_description,
                                "package_id"=>$packageData->id,
                                "package_type"=>1,
                                "make_id"=>$make->id,
                                "model_id"=>$model->id,
                                "fuel_id"=>$fuelId,
                                "make"=>$importData[0],
                                "model"=>$importData[1],
                                "fuel"=>$importData[2],
                                "total_price"=>$importData[6],
                                "discounted_price"=>$importData[7],
                                "service_time"=>$importData[8],
                                "status"=>"active"
                            ]);
                        } else {
                            $insertPackageData = AssignedPackages::where(['id' => $packages->id])->update([
                                "total_price"=>$importData[6],
                                "discounted_price"=>$importData[7],
                                "service_time"=>$importData[8],
                            ]);
                        }
                    }else {
                        $insertPackageData = AssignedPackages::create([
                            "package_name"=>$newPackage->package_name,
                            "package_description"=>$newPackage->package_description,
                            "package_id"=>$newPackage->id,
                            "package_type"=>1,
                            "make_id"=>$make->id,
                            "model_id"=>$model->id,
                            "fuel_id"=>$fuelId,
                            "make"=>$importData[0],
                            "model"=>$importData[1],
                            "fuel"=>$importData[2],
                            "total_price"=>$importData[6],
                            "discounted_price"=>$importData[7],
                            "service_time"=>$importData[8],
                            "status"=>"active"
                        ]);
                    }

                }
            }

            // if($insertPackageData) {
                return Redirect('/Dashboard/AddNewPackages'); 
            // }
        }
    }

    protected function uploadMasterCSV(Request $request) {
        if($file = $request->hasFile('uploadCsv')) {
            $file = $request->file('uploadCsv');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            $valid_extension = array("csv");
            $location = 'uploads/csv/uploadMasterCSV';
            $file->move($location,$filename);
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );

                if($i == 0){
                    $i++;
                    continue; 
                }

                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            foreach($importData_arr as $importData){
                $make = Brand::where('make_name',$importData[1])->get();
                if($importData[4]=="Petrol") {
                    $fuelId=1;
                } else if($importData[4]=="Diesel") {
                    $fuelId=2;
                } else if($importData[4]=="CNG"){
                    $fuelId=3;
                }
                // dd($fuelId);
                
                if($make->toArray() == [] ) {
                    $insertData = Brand::create([
                        "make_name"=>$importData[1],
                    ]);

                    Brand::where('id',$insertData->id)->update([
                        "make_image"=>$insertData->id.'.jpeg'
                    ]);
                    // dd($insertData);

                }

                $model = Carmodels::where(['model_name'=>$importData[2], 'car_type'=>$importData[3] ])->get();
                $makeId = Brand::where('make_name',$importData[1])->value('id');

                if($model->toArray() == [] ) {
                    $insertModelData = Carmodels::create([
                        "model_name"=>$importData[2],
                        "car_type"=>$importData[3],
                        "make_id"=>$makeId
                    ]);

                    Carmodels::where('id',$insertModelData->id)->update([
                        "model_image"=>$insertModelData->id.'.jpeg'
                    ]);
                }

                $modelId = Carmodels::where('model_name',$importData[2])->value('id');

                $packages = AssignedPackages::where(['package_name'=>$importData[0], 'make_id'=>$makeId, 'model_id'=>$modelId, 'fuel_id'=>$fuelId ])->get();

                $fuelMaping = carmodel_fuel::where(['model_id'=>$modelId, "fuel_id"=>$fuelId])->get();

                if($fuelMaping->toArray() == [] ) {
                    $insertFuelModelMaping = carmodel_fuel::create([
                        "model_id"=>$modelId,
                        "fuel_id"=>$fuelId,
                    ]);
                }

                if($packages->toArray() == [] ) {
                    $insertPackageData = AssignedPackages::create([
                        "package_name"=>$importData[0],
                        "package_description"=>null,
                        "package_id"=>null,
                        "package_type"=>1,
                        "make_id"=>$makeId,
                        "model_id"=>$modelId,
                        "fuel_id"=>$fuelId,
                        "make"=>$importData[1],
                        "model"=>$importData[2],
                        "fuel"=>$importData[4],
                        "total_price"=>$importData[5],
                        "discounted_price"=>"0",
                        "service_time"=>null,
                        "status"=>"active"
                    ]);
                }

                // if($importData[0] == "Basic Service") {
                //     $existingPackages = AssignedPackages::where(['package_name'=>$importData[0], 'make'=>$importData[1], 'model'=>$importData[2], 'fuel'=>$importData[4], 'total_price'=>$importData[5] ])->update([ 'package_id'=>20 ]);
                // }

                // if($importData[0] == "Standard Service") {
                //     $existingPackages = AssignedPackages::where(['package_name'=>$importData[0], 'make'=>$importData[1], 'model'=>$importData[2], 'fuel'=>$importData[4], 'total_price'=>$importData[5] ])->update([ 'package_id'=>21 ]);
                    
                // }

                // if($importData[0] == "Comprehensive Service") {
                //     $existingPackages = AssignedPackages::where(['package_name'=>$importData[0], 'make'=>$importData[1], 'model'=>$importData[2], 'fuel'=>$importData[4], 'total_price'=>$importData[5] ])->update([ 'package_id'=>22 ]);
                    
                // }

            }

            if($insertData) {
                return Redirect('/Dashboard/AddNewPackages'); 
            }
        }
    }

    protected function uploadServicesParts(Request $request) {
        return view('Dashboard.UploadServicesParts');
    }

    protected function servicesPartsCSV(Request $request) {
        if($request->selectedService == "Accidental") {
            if($file = $request->hasFile('uploadCsv')) {
                $file = $request->file('uploadCsv');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();
                $valid_extension = array("csv");
                $location = 'uploads/csv/accidentalPricing';
                $file->move($location,$filename);
                $filepath = public_path($location."/".$filename);

                // Reading file
                $file = fopen($filepath,"r");
                $importData_arr = array();
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );

                    if($i == 0){
                        $i++;
                        continue; 
                    }

                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                    $i++;
                }
                fclose($file);
                foreach($importData_arr as $importData){
                    $existingData = CarPartPricing::where(['part_name'=>$importData[0], "car_type"=>$importData[1]])->get();

                    if($existingData->toArray() == [] ) {

                        $insertData = CarPartPricing::create([
                            "part_name"=>$importData[0],
                            "car_type"=>$importData[1],
                            "solid"=>$importData[2],
                            "metallic"=>$importData[3],
                            "pearl"=>$importData[4],
                        ]);
                    } else {
                        return Redirect('/Dashboard/uploadServicesParts'); 
                    }

                }

                if($insertData) {
                    return Redirect('/Dashboard/uploadServicesParts'); 
                }

            }
        } 

        if($request->selectedService == "Mechanical") {
            if($file = $request->hasFile('uploadCsv')) {
                $file = $request->file('uploadCsv');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();
                $valid_extension = array("csv");
                $location = 'uploads/csv/servicePartPricing';
                $file->move($location,$filename);
                $filepath = public_path($location."/".$filename);

                // Reading file
                $file = fopen($filepath,"r");
                $importData_arr = array();
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );

                    if($i == 0){
                        $i++;
                        continue; 
                    }

                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                    $i++;
                }
                fclose($file);
                foreach($importData_arr as $importData){
                    $existingData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[3], "model"=>$importData[4], "fuel"=>$importData[5]])->get();

                    if($importData[5]=="Petrol") {
                        $fuelId=1;
                    } else if($importData[5]=="Diesel") {
                        $fuelId=2;
                    } else if($importData[5]=="CNG"){
                        $fuelId=3;
                    }

                    $brandId = Brand::where(['make_name' => $importData[3]])->get();
                    $modelId = Carmodels::where(['model_name' => $importData[4]])->value('id');

                    if($existingData->toArray() == [] && $brandId->toArray() != [] && $modelId != null) {
                        $insertData = CarServiceParts::create([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            "part_image"=>$importData[2],
                            "make"=>$importData[3],
                            "model"=>$importData[4],
                            "fuel"=>$importData[5],
                            "make_id"=>Brand::where(['make_name' => $importData[3]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[4]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[6],
                            "serviceType"=>'Mechanical Repair',
                            "part_type"=>null
                        ]);
                    } else {
                        $updateData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[3], "model"=>$importData[4], "fuel"=>$importData[5]])->update([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            "part_image"=>$importData[2],
                            "make"=>$importData[3],
                            "model"=>$importData[4],
                            "fuel"=>$importData[5],
                            "make_id"=>Brand::where(['make_name' => $importData[3]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[4]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[6],
                            "serviceType"=>'Mechanical Repair',
                            "part_type"=>null
                        ]);
                    }

                }

                if(isset($insertData) || isset($updateData) ) {
                    return Redirect('/Dashboard/mechanicalServices'); 
                }
            }
        }

        if($request->selectedService == "AC") {
            if($file = $request->hasFile('uploadCsv')) {
                $file = $request->file('uploadCsv');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();
                $valid_extension = array("csv");
                $location = 'uploads/csv/servicePartPricing';
                $file->move($location,$filename);
                $filepath = public_path($location."/".$filename);

                // Reading file
                $file = fopen($filepath,"r");
                $importData_arr = array();
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );

                    if($i == 0){
                        $i++;
                        continue; 
                    }

                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                    $i++;
                }
                fclose($file);
                foreach($importData_arr as $importData){
                    $existingData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[3], "model"=>$importData[4], "fuel"=>$importData[5]])->get();

                    if($importData[5]=="Petrol") {
                        $fuelId=1;
                    } else if($importData[5]=="Diesel") {
                        $fuelId=2;
                    } else if($importData[5]=="CNG"){
                        $fuelId=3;
                    }

                    $brandId = Brand::where(['make_name' => $importData[3]])->get();
                    $modelId = Carmodels::where(['model_name' => $importData[4]])->value('id');

                    if($existingData->toArray() == [] && $brandId->toArray() != [] && $modelId != null) {
                        $insertData = CarServiceParts::create([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            "part_image"=>$importData[2],
                            "make"=>$importData[3],
                            "model"=>$importData[4],
                            "fuel"=>$importData[5],
                            "make_id"=>Brand::where(['make_name' => $importData[3]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[4]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[6],
                            "serviceType"=>'AC Servicing',
                            "part_type"=>null
                        ]);
                    } else {
                        $updateData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[3], "model"=>$importData[4], "fuel"=>$importData[5]])->update([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            "part_image"=>$importData[2],
                            "make"=>$importData[3],
                            "model"=>$importData[4],
                            "fuel"=>$importData[5],
                            "make_id"=>Brand::where(['make_name' => $importData[3]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[4]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[6],
                            "serviceType"=>'AC Servicing',
                            "part_type"=>null
                        ]);
                    }

                }

                if(isset($insertData) || isset($updateData) ) {
                    return Redirect('/Dashboard/acServices'); 
                }
            }
        }

        if($request->selectedService == "Upkeep") {
            if($file = $request->hasFile('uploadCsv')) {
                $file = $request->file('uploadCsv');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();
                $valid_extension = array("csv");
                $location = 'uploads/csv/servicePartPricing';
                $file->move($location,$filename);
                $filepath = public_path($location."/".$filename);

                // Reading file
                $file = fopen($filepath,"r");
                $importData_arr = array();
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );

                    if($i == 0){
                        $i++;
                        continue; 
                    }

                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                    $i++;
                }
                fclose($file);
                foreach($importData_arr as $importData){
                    $existingData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[3], "model"=>$importData[4], "fuel"=>$importData[5]])->get();

                    if($importData[5]=="Petrol") {
                        $fuelId=1;
                    } else if($importData[5]=="Diesel") {
                        $fuelId=2;
                    } else if($importData[5]=="CNG"){
                        $fuelId=3;
                    }

                    $brandId = Brand::where(['make_name' => $importData[3]])->get();
                    $modelId = Carmodels::where(['model_name' => $importData[4]])->value('id');

                    if($existingData->toArray() == [] && $brandId->toArray() != [] && $modelId != null) {
                        $insertData = CarServiceParts::create([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            "part_image"=>$importData[2],
                            "make"=>$importData[3],
                            "model"=>$importData[4],
                            "fuel"=>$importData[5],
                            "make_id"=>Brand::where(['make_name' => $importData[3]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[4]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[6],
                            "serviceType"=>'Upkeep Services',
                            "part_type"=>null
                        ]);
                    } else {
                        $updateData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[3], "model"=>$importData[4], "fuel"=>$importData[5]])->update([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            "part_image"=>$importData[2],
                            "make"=>$importData[3],
                            "model"=>$importData[4],
                            "fuel"=>$importData[5],
                            "make_id"=>Brand::where(['make_name' => $importData[3]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[4]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[6],
                            "serviceType"=>'Upkeep Services',
                            "part_type"=>null
                        ]);
                    }

                }

                if(isset($insertData) || isset($updateData) ) {
                    return Redirect('/Dashboard/upkeepServices');
                }
            }
        }

        if($request->selectedService == "BatteryTyres") {
            if($file = $request->hasFile('uploadCsv')) {
                $file = $request->file('uploadCsv');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize();
                $mimeType = $file->getMimeType();
                $valid_extension = array("csv");
                $location = 'uploads/csv/servicePartPricing';
                $file->move($location,$filename);
                $filepath = public_path($location."/".$filename);

                // Reading file
                $file = fopen($filepath,"r");
                $importData_arr = array();
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );

                    if($i == 0){
                        $i++;
                        continue; 
                    }

                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                    $i++;
                }
                fclose($file);
                foreach($importData_arr as $importData){
                    $existingData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[2], "model"=>$importData[3], "fuel"=>$importData[4]])->get();

                    if($importData[4]=="Petrol") {
                        $fuelId=1;
                    } else if($importData[4]=="Diesel") {
                        $fuelId=2;
                    } else if($importData[4]=="CNG"){
                        $fuelId=3;
                    }

                    if($importData[6]=="battery" || $importData[6]=="Battery") {
                        $batteryTyre=0;
                    } else if($importData[6]=="tyre" || $importData[6]=="Tyre") {
                        $batteryTyre=1;
                    } else {
                        $batteryTyre=null;
                    }

                    $brandId = Brand::where(['make_name' => $importData[3]])->get();
                    $modelId = Carmodels::where(['model_name' => $importData[4]])->value('id');

                    if($existingData->toArray() == []  && $brandId->toArray() != [] && $modelId != null) {
                        $insertData = CarServiceParts::create([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            // "part_image"=>$importData[2],
                            // "image"=>$importData[2],
                            "make"=>$importData[2],
                            "model"=>$importData[3],
                            "fuel"=>$importData[4],
                            "make_id"=>Brand::where(['make_name' => $importData[2]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[3]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[5],
                            "serviceType"=>'Battery and Tyres',
                            "part_type"=>$batteryTyre
                        ]);
                    } else {
                        $updateData = CarServiceParts::where(['part_name'=>$importData[0], "make"=>$importData[2], "model"=>$importData[3], "fuel"=>$importData[4]])->update([
                            "part_name"=>$importData[0],
                            "part_description"=>$importData[1],
                            // "part_image"=>$importData[2],
                            // "image"=>$importData[2],
                            "make"=>$importData[2],
                            "model"=>$importData[3],
                            "fuel"=>$importData[4],
                            "make_id"=>Brand::where(['make_name' => $importData[2]])->value('id'),
                            "model_id"=>Carmodels::where(['model_name' => $importData[3]])->value('id'),
                            "fuel_id"=>$fuelId,
                            "price"=>$importData[5],
                            "serviceType"=>'Battery and Tyres',
                            "part_type"=>$batteryTyre
                        ]);
                    }

                }


                if(isset($insertData) || isset($updateData) ) {
                    return Redirect('/Dashboard/batteryTyres');
                }
            }
        }     

    }


    protected function uploadAssignModels(Request $request) {
      if($file = $request->hasFile('uploadCsv')) {
        $file = $request->file('uploadCsv');

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv");
        $location = 'uploads/csv/models';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);

        // Reading file
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );

            if($i == 0){
                $i++;
                continue; 
            }

            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);
        foreach($importData_arr as $importData){
            $existingData = Carmodels::where('model_name',$importData[0])->first();
            $existingMake = Brand::where('make_name',$importData[1])->first();
            if($importData[4]=="Petrol") {
                $fuelId=1;
            } else if($importData[4]=="Diesel") {
                $fuelId=2;
            } else if($importData[4]=="CNG"){
                $fuelId=3;
            }
// dd($existingData);
            if($existingData == null) {
                $makeId = Brand::where('make_name',$importData[1])->value('id');
                $insertData = Carmodels::create([
                    "model_name"=>$importData[0],
                    "model_image"=>$importData[2],
                    "car_type"=>$importData[3],
                    "make_id"=>$existingMake->id,
                ]);
            }else {
                if($existingData->toArray() == [] ) {
                    if($existingMake->toArray() !== [] ) {
                        $makeId = Brand::where('make_name',$importData[1])->value('id');
                        $insertData = Carmodels::create([
                            "model_name"=>$importData[0],
                            "model_image"=>$importData[2],
                            "car_type"=>$importData[3],
                            "make_id"=>$makeId,
                        ]);
                    }
                    $existingFuelModel = carmodel_fuel::where(['model_id'=>$insertData->id, 'fuel_id'=>$fuelId ])->get();
                    if($existingFuelModel->toArray() == [] ) {
                        $insertAssignFuel = carmodel_fuel::create([
                            "model_id"=>$insertData->id,
                            "fuel_id"=>$fuelId,
                        ]);
                    }
                } else {
                    $updateData = Carmodels::where('model_name',$importData[0])->update([
                        "car_type"=>$importData[3],
                    ]);
                    $existingFuelModel = carmodel_fuel::where(['model_id'=>$existingData->id, 'fuel_id'=>$fuelId ])->get();
                    if($existingFuelModel->toArray() == [] ) {
                        $insertAssignFuel = carmodel_fuel::create([
                            "model_id"=>$existingData->id,
                            "fuel_id"=>$fuelId,
                        ]);
                    }
                }
            }


        }

        // if($insertData) {
        return Redirect('/Dashboard/car'); 
        // }

      }
    }

    protected function uploadInsuranceCompanies(Request $request) {
      if($file = $request->hasFile('uploadCsv')) {
        $file = $request->file('uploadCsv');

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv");
        $location = 'uploads/csv/insuranceCompanies';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);

        // Reading file
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );

            if($i == 0){
                $i++;
                continue; 
            }

            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);
        foreach($importData_arr as $importData){
            $existingData = InsuranceCompanies::where('insurance_company',$importData[0])->get();

            if($existingData->toArray() == [] ) {
                $insertData = InsuranceCompanies::create([
                    "insurance_company"=>$importData[0]
                ]);
            }
        }

        if($insertData) {
            return Redirect('/Dashboard/insuranceCompanies'); 
        }

      }
    }

    protected function deleteMake(Request $request) {
        $deleteMake = Brand::where(['id'=> $request->makeId])->delete();
        if($deleteMake) {
            return response('Deleted Make',200);
        } else {
            return response('Something went wrong',250);
        }
    }



    protected function ViewUserReward(Request $request)
    {
        $reward = UserReward::get();
        // dd($reward);
        return view('Dashboard.ViewUserReward',compact('reward'));
    }

    protected function editUserReward(Request $request, $id){
        $rewardData = UserReward::where(['id'=>$id])->first();
        return view('Dashboard.editUserReward',compact('rewardData'));
    }
    protected function updateUserReward(Request $request){
        // dd($request->all());
        $update = UserReward::where(['id' => $request->id])->update([
                "reward_in_percent" => $request->reward_in_percent,
                "min_order_price_to_get" => $request->min_order_price_to_get,
                "max_reward_per_order" => $request->max_reward_per_order,
                "max_reward_point_to_apply" => $request->max_reward_point_to_apply,
                "reward_status" => $request->status,
                ]);
         return redirect('ViewUserReward')
                        ->with('success','You have successfully update data');
      
        // $rewardData = UserReward::where(['id'=>$id])->first();
        // return view('Dashboard.editUserReward',compact('rewardData'));
    }

    protected function mechanicalServices(Request $request){
        $serviceParts = CarServiceParts::where(['serviceType' => 'Mechanical Repair'])->get();
        $service = services::where('id',3)->first();

        return view('Dashboard.MechanicalServices',compact('serviceParts','service'));
    }

    protected function acServices(Request $request){
        $serviceParts = CarServiceParts::where(['serviceType' => 'AC Servicing'])->get();
        $service = services::where('id',4)->first();
        return view('Dashboard.ACService',compact('serviceParts','service'));
    }

    protected function batteryTyres(Request $request){
        $serviceParts = CarServiceParts::where(['serviceType' => 'Battery and Tyres'])->get();
        $service = services::where('id',5)->first();
        return view('Dashboard.BatteryTyres',compact('serviceParts','service'));
    }

    protected function upkeepServices(Request $request){
        $serviceParts = CarServiceParts::where(['serviceType' => 'Upkeep Services'])->get();
        $service = services::where('id',6)->first();

        return view('Dashboard.UpkeepServices',compact('serviceParts','service'));
    }

    protected function displayInsuranceCompanies(Request $request){
        $companyData = InsuranceCompanies::get();
        return view('Dashboard.InsuranceCompaniesView',compact('companyData'));
    }

    protected function addIncCompanyView(Request $request) {
        return view('Dashboard.AddIncCompany');
    }

    protected function createIncCompany(Request $request) {
        $existingData = InsuranceCompanies::where(['insurance_company'=>$request->companyName])->get();
        if($existingData->toArray() == [] ) {
            $insertData = InsuranceCompanies::create([
                "insurance_company"=>$request->companyName
            ]);

            if($insertData) {
                return Redirect('/Dashboard/insuranceCompanies'); 
            }
        }
    }

    protected function editIncCompany(Request $request, $id) {
        $companyData = InsuranceCompanies::where(['id'=>$id])->first();
        return view('Dashboard.EditIncCompany',compact('companyData'));
    }

    protected function updateIncCompany(Request $request) {
        $update = InsuranceCompanies::where(['id'=>$request->companyId])->update([
            'insurance_company' => $request->companyName
        ]);

        if($update) {
                return Redirect('/Dashboard/insuranceCompanies'); 
        }
    }

    protected function deleteIncComp(Request $request) {
        $current_date_time = Carbon::now()->toDateTimeString();
        $deleteIncComp = InsuranceCompanies::where(['id'=> $request->incCompId])->delete();
        if($deleteIncComp) {
            return response('Success', 200);
        }
    }

    protected function getOrderDetails(Request $request) {
        $orderInformation = OrderInformation::get();
        $userData = User::all(); 
        $orderInformationData = OrderInformation::with('hasOrderInformation')->get();
        $brands = Brand::get();
        $models = Carmodels::get();
        $garages = Garages::get();
        return view('Dashboard.OrderDetails')->with(compact('orderInformationData','userData','brands','models','garages'));
    }

    protected function editOrderDetails(Request $request, $id) {
        $orderInformationData = OrderInformation::where(['id' => $id])->with('hasOrderInformation')->first();
        return view('Dashboard.EditOrderDetails')->with(compact('orderInformationData'));
    }

    protected function updateOrderDetails(Request $request) {
        // dd($request->all());
        $updateOrder = OrderInformation::where(['id' => $request->orderId])->update([
            'updated_cost' => $request->totalAmount,
            'note'=>$request->note,
            'tip'=>$request->tip
        ]);

        if($updateOrder) {
            return Redirect('/Dashboard/Orders'); 
        }
        // dd($updateOrder);
    }
}
