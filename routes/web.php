<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CarmodelsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\MakeCrudController;
use App\Http\Controllers\ModelCrudController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\SeasonalOfferController;
use App\Http\Controllers\AddonController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('models', 'App\Http\Controllers\CommonController@show');


//   Route::get('/', function () {
//     return view('auth.login');
// });
Route::resource('product', ProductController::class);
Route::resource('products..create', ProductController::class);
// Route::resource('packages', PackageController::class);
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/', function()
// {
//     return View::make('pages.home');
// });
// Route::get('about', function()
// {
//     return View::make('pages.about');
// });
// Route::get('gmaps',function(){
//     return view('about');
// })
// Route::get('services', function()
// {
//     return View::make('pages.services');
// });

// Route::middleware(['auth'])->group(function () {
    
// });

Route::get('/', 'App\Http\Controllers\CommonController@login');
// Route::get('login', 'App\Http\Controllers\CommonController@login');
Route::get('afterLogin', 'App\Http\Controllers\CommonController@afterLogin');
Route::get('services', 'App\Http\Controllers\CommonController@onServicePageLoad');
Route::get('services/{servicesModal}', 'App\Http\Controllers\CommonController@onServicePageLoad');

Route::get('accidentalRepair', 'App\Http\Controllers\CommonController@onAccidentalPageLoad');
Route::get('about', 'App\Http\Controllers\CommonController@onAboutPageLoad');
Route::get('/mustKnow', 'App\Http\Controllers\CommonController@mustKnow');
Route::get('/faq', 'App\Http\Controllers\CommonController@faq');
Route::get('/contact', 'App\Http\Controllers\CommonController@onContactLoad');
Route::get('about/{Garage-Form}', 'App\Http\Controllers\CommonController@onAboutPageLoad');
Route::get('about/{contactMap}', 'App\Http\Controllers\CommonController@onAboutPageLoad');
Route::get('getCartCount', 'App\Http\Controllers\CommonController@getCartCount');

Route::post('getMembershipPackages', 'App\Http\Controllers\CommonController@getMembershipPackages');
Route::post('partsToBeRepaired', 'App\Http\Controllers\CommonController@partsToBeRepaired');

Route::post('updatePassword', 'App\Http\Controllers\CommonController@updatePassword');

// Route::get('contact', function()
// {
//     return View::make('pages.contact');
// });
Route::get('signupLogin', function () {
    return view('pages.signupLogin');
});

Route::get('privacy', function () {
    return view('pages.privacyPolicy');
});
Route::get('terms', function () {
    return view('pages.termsConditions');
});
Route::get('refund-cancellation', function () {
    return view('pages.refundCancellation');
});


Route::get('Dashboard/NewBookings', function () {
    return view('Dashboard.NewBookings');
});
// Route::get('Dashboard/Bookings', function () {
//     return view('Dashboard.Bookings');
// });
// Route::get('Dashboard/Leads', function () {
//     return view('Dashboard.Leads');
// });
Route::get('Dashboard/Leads', 'App\Http\Controllers\AdminDashboard@gotToLeads');


Route::get('Dashboard/AddGarages', function () {
    return view('Dashboard.AddGarages');
});

Route::get('Dashboard/AddNewUpkeep', 'App\Http\Controllers\AdminDashboard@addUpkeep');
Route::get('AddNewUpkeep/create', 'App\Http\Controllers\AdminDashboard@createUpkeepView');
Route::post('AddNewUpkeep/createUpkeep', 'App\Http\Controllers\AdminDashboard@createUpkeep');
Route::get('AddNewUpkeep/editUpkeepView/{id}', 'App\Http\Controllers\AdminDashboard@editUpkeepView');
Route::post('AddNewUpkeep/updateUpkeep', 'App\Http\Controllers\AdminDashboard@updateUpkeep');
Route::get('/AddNewUpkeep/assignUpkeepView/{id}', 'App\Http\Controllers\AdminDashboard@assignUpkeepView');
Route::post('/AddNewUpkeep/assignUpkeep', 'App\Http\Controllers\AdminDashboard@assignUpkeep');
Route::post('AddNewUpkeep/deletePackage', 'App\Http\Controllers\AdminDashboard@deleteUpkeep');

Route::get('/ViewAssignedPackages', 'App\Http\Controllers\AdminDashboard@ViewAssignedPackages');
Route::get('/editAssignedPackageView/{id}', 'App\Http\Controllers\AdminDashboard@editAssignedPackageView');
Route::post('/updateAssignedPackageView', 'App\Http\Controllers\AdminDashboard@updateAssignedPackageView');
Route::post('/deleteAssignedPackageView/{id}', 'App\Http\Controllers\AdminDashboard@deleteAssignedPackageView');

Route::get('/ViewUserReward', 'App\Http\Controllers\AdminDashboard@ViewUserReward');
Route::get('/editUserReward/{id}', 'App\Http\Controllers\AdminDashboard@editUserReward');
Route::post('/updateUserReward', 'App\Http\Controllers\AdminDashboard@updateUserReward');

Route::get('Dashboard/AddNewPackages', 'App\Http\Controllers\AdminDashboard@addPackages');
Route::get('Dashboard/AddNewServices', 'App\Http\Controllers\AdminDashboard@addServices');
Route::get('/Dashboard/carPartPricing', 'App\Http\Controllers\AdminDashboard@displayPartPricing');
Route::get('AddNewPackages/create', 'App\Http\Controllers\AdminDashboard@createPackageView');
Route::post('AddNewPackages/createPackage', 'App\Http\Controllers\AdminDashboard@createPackage');
Route::post('AddNewPackages/updatePackage', 'App\Http\Controllers\AdminDashboard@updatePackage');
Route::get('AddNewPackages/editPackageView/{id}', 'App\Http\Controllers\AdminDashboard@editPackageView');
Route::get('/AddNewPackages/assignPackageView/{id}', 'App\Http\Controllers\AdminDashboard@assignPackageView');
Route::post('/AddMake/deleteMake', 'App\Http\Controllers\AdminDashboard@deleteMake');
Route::post('AddNewPackages/deletePackage', 'App\Http\Controllers\AdminDashboard@deletePackage');
Route::post('/AddNewPackages/getModelData', 'App\Http\Controllers\AdminDashboard@getModelData');
Route::post('/AddNewPackages/getFuelData', 'App\Http\Controllers\AdminDashboard@getFuelData');
Route::post('/AddNewPackages/assignPackage', 'App\Http\Controllers\AdminDashboard@assignPackage');
Route::get('/AddNewServices/createSeriviceView', 'App\Http\Controllers\AdminDashboard@createSeriviceView');
Route::post('/AddNewServices/createService', 'App\Http\Controllers\AdminDashboard@createService');
Route::get('/AddNewServices/editServiceView/{id}', 'App\Http\Controllers\AdminDashboard@editServiceView');
Route::post('/AddNewServices/updateService', 'App\Http\Controllers\AdminDashboard@updateService');
Route::post('AddNewServices/deleteService', 'App\Http\Controllers\AdminDashboard@deleteService');
Route::get('/AddNewPart/createNewPartView', 'App\Http\Controllers\AdminDashboard@createNewPartView');
Route::post('/AddNewPart/createPart', 'App\Http\Controllers\AdminDashboard@createPart');
Route::get('/AddNewPart/viewParts', 'App\Http\Controllers\AdminDashboard@viewParts');
Route::get('/AddNewPart/editParts/{id}', 'App\Http\Controllers\AdminDashboard@editParts');
Route::post('/AddNewPart/updatePart', 'App\Http\Controllers\AdminDashboard@updatePart');
Route::post('/AddNewPart/deletePart', 'App\Http\Controllers\AdminDashboard@deletePart');
Route::get('/AddNewCarType/viewCarTypes', 'App\Http\Controllers\AdminDashboard@viewCarTypes');
Route::get('/AddNewCarType/createNewCarTypeView', 'App\Http\Controllers\AdminDashboard@createNewCarTypeView');
Route::post('/AddNewCarType/createCarType', 'App\Http\Controllers\AdminDashboard@createCarType');
Route::get('/AddNewCarType/editCarTypeView/{id}', 'App\Http\Controllers\AdminDashboard@editCarTypeView');
Route::post('/AddNewCarType/updateCarType', 'App\Http\Controllers\AdminDashboard@updateCarType');
Route::post('/AddNewCarType/deleteCarType', 'App\Http\Controllers\AdminDashboard@deleteCarType');
Route::get('/carPartPricing/assignPartToType', 'App\Http\Controllers\AdminDashboard@assignPartToType');
Route::post('/carPartPricing/setPartPrice', 'App\Http\Controllers\AdminDashboard@setPartPrice');
Route::get('/Dashboard/serviceParts', 'App\Http\Controllers\AdminDashboard@viewServiceParts');
Route::get('/serviceParts/addServicePartView/{id}', 'App\Http\Controllers\AdminDashboard@addServicePartView');
Route::post('/serviceParts/addServicePart', 'App\Http\Controllers\AdminDashboard@addServicePart');
Route::get('/serviceParts/editServicePartsView/{id}', 'App\Http\Controllers\AdminDashboard@editServicePartsView');
Route::post('/serviceParts/updateServicePart', 'App\Http\Controllers\AdminDashboard@updateServicePart');
Route::post('/serviceParts/deleteServicePart', 'App\Http\Controllers\AdminDashboard@deleteServicePart');
Route::get('/Dashboard/membershipPackages', 'App\Http\Controllers\AdminDashboard@membershipPackages');
Route::get('/AddNewPackages/assignMembershipPackageView/{id}', 'App\Http\Controllers\AdminDashboard@assignMembershipPackageView');
Route::get('AddNewPackages/editMembershipPackageView/{id}', 'App\Http\Controllers\AdminDashboard@editMembershipPackageView');
Route::post('/AddNewPackages/assignMembershipPackage', 'App\Http\Controllers\AdminDashboard@assignMembershipPackage');
Route::post('/AddNewPackages/updateMembershipPackage', 'App\Http\Controllers\AdminDashboard@updateMembershipPackage');
Route::get('/Dashboard/uploadServicesParts', 'App\Http\Controllers\AdminDashboard@uploadServicesParts');
Route::get('/Dashboard/mechanicalServices', 'App\Http\Controllers\AdminDashboard@mechanicalServices');
Route::get('/Dashboard/acServices', 'App\Http\Controllers\AdminDashboard@acServices');
Route::get('/Dashboard/batteryTyres', 'App\Http\Controllers\AdminDashboard@batteryTyres');
Route::get('/Dashboard/upkeepServices', 'App\Http\Controllers\AdminDashboard@upkeepServices');
Route::get('/carPartPricing/accidentalPricingUpdateView/{id}', 'App\Http\Controllers\AdminDashboard@accidentalPricingUpdateView');
Route::POST('/carPartPricing/accidentalPricingUpdate/', 'App\Http\Controllers\AdminDashboard@accidentalPricingUpdate');
Route::POST('/carPartPricing/deleteAccPart', 'App\Http\Controllers\AdminDashboard@deleteAccPart');
Route::get('/Dashboard/insuranceCompanies', 'App\Http\Controllers\AdminDashboard@displayInsuranceCompanies');
Route::POST('/Dashboard/uploadInsuranceCompanies', 'App\Http\Controllers\AdminDashboard@uploadInsuranceCompanies');
Route::get('/Dashboard/insuranceCompanies/addIncCompanyView', 'App\Http\Controllers\AdminDashboard@addIncCompanyView');
Route::POST('/Dashboard/insuranceCompanies/createIncCompany', 'App\Http\Controllers\AdminDashboard@createIncCompany');
Route::get('/Dashboard/insuranceCompanies/editCompanyView/{id}', 'App\Http\Controllers\AdminDashboard@editIncCompany');
Route::POST('/Dashboard/insuranceCompanies/updateIncCompany', 'App\Http\Controllers\AdminDashboard@updateIncCompany');
Route::POST('/Dashboard/insuranceCompanies/deleteIncComp', 'App\Http\Controllers\AdminDashboard@deleteIncComp');




// Route::get('Dashboard/Garage', function () {
//     return view('Dashboard.Garage');
// });

// Route::get('Dashboard', function () {
//     return view('Dashboard.adminhome');
// });
// Route::get('Dashboard', 'App\Http\Controllers\AdminDashboard@goToDashboard');
Route::post('/addNewGarage', 'App\Http\Controllers\AdminDashboard@addGarages');


Route::post('services/registerServiceLead', 'App\Http\Controllers\CommonController@registerServiceLead');
// Route::post('/PServices/{id}/registerServiceLead', 'App\Http\Controllers\CommonController@registerServiceLead');
Route::post('/registerServiceLead', 'App\Http\Controllers\CommonController@registerServiceLead');



Route::get('Dashboard/package', 'App\Http\Controllers\PackageController@show');

Route::get('PeriodicServices', 'App\Http\Controllers\PackageController@periodicPack');
Route::get('ACRepairServices', 'App\Http\Controllers\PackageController@acRepairServicePage');
Route::get('mechanicalRepairServices', 'App\Http\Controllers\PackageController@mechanicalRepairServicePage');
Route::get('BatteryAndTyre', 'App\Http\Controllers\PackageController@batteryAndTyreServicePage');
Route::post('/ACRepairServices/getServiceParts', 'App\Http\Controllers\PackageController@getServiceParts');
Route::post('/ACRepairServices/getEstimate', 'App\Http\Controllers\PackageController@getEstimate');
Route::post('/BatteryTyreService/getBatteryParts', 'App\Http\Controllers\PackageController@getBatteryParts');
Route::post('/BatteryTyreParts/buyBatteryParts', 'App\Http\Controllers\PackageController@buyBatteryParts');
Route::post('/BatteryTyreParts/submitBatteryRequest', 'App\Http\Controllers\PackageController@submitBatteryRequest');

Route::post('/saveDataToSession', 'App\Http\Controllers\PackageController@saveDataToSession');
Route::post('/saveHomeDataToSession', 'App\Http\Controllers\PackageController@saveHomeDataToSession');
Route::post('/saveAuthHomeDataToSession', 'App\Http\Controllers\PackageController@saveAuthHomeDataToSession');



Route::post('Dashboard/package/edit', 'App\Http\Controllers\PackageController@update');

Route::get('/loginWithPassword', 'App\Http\Controllers\RegistrationController@loginWithPassword');

Route::post('Pages/register', 'App\Http\Controllers\RegistrationController@store');
Route::post('Pages/registerWithOTP', 'App\Http\Controllers\RegistrationController@registerWithOTP');

Route::post('sendOtp', 'App\Http\Controllers\RegistrationController@sendOtp');
Route::post('leadOtp', 'App\Http\Controllers\RegistrationController@leadOtp');
Route::post('withSelectCarRegistration', 'App\Http\Controllers\RegistrationController@withSelectCarRegistration');
Route::post('AddonLead', 'App\Http\Controllers\RegistrationController@AddonLead');
Route::post('getEstimate', 'App\Http\Controllers\RegistrationController@getEstimate');
Route::post('sendOtpAtRegistartion', 'App\Http\Controllers\RegistrationController@sendOtpAtRegistartion');
Route::post('checkRegistartionValidation', 'App\Http\Controllers\RegistrationController@checkRegistartionValidation');
Route::post('authenticateUsers', 'App\Http\Controllers\RegistrationController@authenticateUsers');


// Route::post('login', 'App\Http\Controllers\RegistrationController@authenticate');

Route::post('loginWithPass', 'App\Http\Controllers\RegistrationController@authenticatePass');

Route::get('logout', 'App\Http\Controllers\RegistrationController@logout');

Route::post('brands', 'App\Http\Controllers\BrandController@brandData');

Route::post('models', 'App\Http\Controllers\BrandController@modelData');
Route::post('fuels', 'App\Http\Controllers\BrandController@fuelData');

// Route::group(['middleware' => 'auth'], function () {
    
//         Route::get('Dashboard', function () {
//             return view('Dashboard.adminhome');
//         });
//  });


Route::post('sendemail/send', 'App\Http\Controllers\SendEmailController@send');

Route::post('Callback', 'App\Http\Controllers\SendEmailController@requestCallBack');

Route::post('GarageReq', 'App\Http\Controllers\SendEmailController@GarageRequest');

Route::post('searchPackages', 'App\Http\Controllers\PackageController@searchPack');
Route::post('searchUpkeepPackages', 'App\Http\Controllers\PackageController@searchUpkeepPack');

// Route::post('addCart', 'App\Http\Controllers\PackageController@addToCart');
// Route::post('addNewAddon', 'App\Http\Controllers\PackageController@addAddon');
// Route::post('getCartData', 'App\Http\Controllers\PackageController@getCart');
// Route::post('checkoutPage', 'App\Http\Controllers\PackageController@checkoutCart');
// Route::post('finalcheck', 'App\Http\Controllers\PackageController@Checkout');
// Route::post('offlineCheck', 'App\Http\Controllers\PackageController@offlineSubmitRequest');
// Route::post('deleteCartItem', 'App\Http\Controllers\PackageController@deleteItem');
// Route::post('addonModel', 'App\Http\Controllers\PackageController@getSingleAddon');

Route::get('payment-razorpay', 'App\Http\Controllers\PaymentController@create')->name('paywithrazorpay');
Route::post('payment', 'App\Http\Controllers\PaymentController@payment')->name('payment');

//Prat Routes
Route::get('Dashboard/Garage', 'App\Http\Controllers\AdminDashboard@getGarages');
Route::get('Dashboard/Bookings', 'App\Http\Controllers\AdminDashboard@getBookings');
Route::get('/Dashboard/Orders', 'App\Http\Controllers\AdminDashboard@getOrderDetails');
Route::get('/Dashboard/Orders/EditOrder/{id}', 'App\Http\Controllers\AdminDashboard@editOrderDetails');
Route::post('/updateOrderAmount', 'App\Http\Controllers\AdminDashboard@updateOrderDetails');



// Route::get('PServices/{id}', 'App\Http\Controllers\PackageController@displayPeriodicServices');
// Route::post('/PServices/models', 'App\Http\Controllers\BrandController@modelData');
// Route::post('/PServices/fuels', 'App\Http\Controllers\BrandController@fuelData');
// Route::post('/PServices/searchPackages', 'App\Http\Controllers\PackageController@searchPack');
// Route::get('getCartPackages', 'App\Http\Controllers\PackageController@getCartPackages');
// Route::post('/PServices/getCartPackages1', 'App\Http\Controllers\PackageController@getCartPackages1');
// Route::post('removeCartPackages', 'App\Http\Controllers\PackageController@removeCartPackages');
// Route::post('/PServices/addCart', 'App\Http\Controllers\PackageController@addToCart');
// Route::post('/PServices/getCartData', 'App\Http\Controllers\PackageController@getCart');
// Route::post('/PServices/removeCartPackages', 'App\Http\Controllers\PackageController@removeCartPackages');
// Route::post('/PServices/checkoutPage', 'App\Http\Controllers\PackageController@checkoutCart');
// Route::post('/PServices/offlineCheck', 'App\Http\Controllers\PackageController@offlineSubmitRequest');
// Route::post('/PServices/getCartCount', 'App\Http\Controllers\CommonController@getCartCount');

Route::post('Dashboard/getOrderData', 'App\Http\Controllers\AdminDashboard@getOrderData');
Route::post('Dashboard/assignGarageToOrder', 'App\Http\Controllers\AdminDashboard@assignGarageToOrder');
Route::post('Dashboard/unassignGarage', 'App\Http\Controllers\AdminDashboard@unassignGarage');
Route::post('Dashboard/updateGarageReqStatus', 'App\Http\Controllers\AdminDashboard@updateGarageReqStatus');
Route::post('/contactMail', 'App\Http\Controllers\CommonController@contactMail');


// Route::get('/accidentalRepair', 'App\Http\Controllers\CommonController@goToAccidentalRepair');
//
// Route::get('/SignupLogin', 'App\Http\Controllers\CommonController@goToSignupLogin');
Route::get('/PServices/logout', 'App\Http\Controllers\RegistrationController@logout');

Route::get('PServices/{id}', 'App\Http\Controllers\PackageController@displayPeriodicServices');
Route::post('/PServices/models', 'App\Http\Controllers\BrandController@modelData');
Route::post('/PServices/fuels', 'App\Http\Controllers\BrandController@fuelData');
Route::post('/PServices/searchPackages', 'App\Http\Controllers\PackageController@searchPack');

Route::middleware(['auth','auth:sanctum'])->group(function () {
	Route::get('getCartPackages', 'App\Http\Controllers\PackageController@getCartPackages');
	Route::post('/PServices/getCartPackages1', 'App\Http\Controllers\PackageController@getCartPackages1');
	Route::post('removeCartPackages', 'App\Http\Controllers\PackageController@removeCartPackages');
	Route::post('/PServices/addCart', 'App\Http\Controllers\PackageController@addToCart');
	Route::post('/PServices/getCartData', 'App\Http\Controllers\PackageController@getCart');
	Route::post('/PServices/removeCartPackages', 'App\Http\Controllers\PackageController@removeCartPackages');
	Route::post('/PServices/checkoutPage', 'App\Http\Controllers\PackageController@checkoutCart');
	Route::post('/PServices/offlineCheck', 'App\Http\Controllers\PackageController@offlineSubmitRequest');
	Route::post('/PServices/onlineCheckout', 'App\Http\Controllers\PackageController@onlineSubmitRequest');
	Route::post('/PServices/getCartCount', 'App\Http\Controllers\CommonController@getCartCount');

	Route::post('addPartToCart', 'App\Http\Controllers\PackageController@addPartToCart');
	Route::post('removePartFromCart', 'App\Http\Controllers\PackageController@removePartFromCart');

	Route::post('addCart', 'App\Http\Controllers\PackageController@addToCart');
	Route::post('addNewAddon', 'App\Http\Controllers\PackageController@addAddon');
	Route::post('getCartData', 'App\Http\Controllers\PackageController@getCart');
	Route::post('checkoutPage', 'App\Http\Controllers\PackageController@checkoutCart');
	Route::post('finalcheck', 'App\Http\Controllers\PackageController@Checkout');
	Route::post('offlineCheck', 'App\Http\Controllers\PackageController@offlineSubmitRequest');
	Route::post('onlineCheckout', 'App\Http\Controllers\PackageController@onlineSubmitRequest');
	Route::post('deleteCartItem', 'App\Http\Controllers\PackageController@deleteItem');
	Route::post('addonModel', 'App\Http\Controllers\PackageController@getSingleAddon');
	Route::get('/account', 'App\Http\Controllers\CommonController@goToAccount');
	Route::post('/updateAccount', 'App\Http\Controllers\CommonController@updateAccount');	
	Route::post('/addMemPackToCart', 'App\Http\Controllers\CommonController@addMemPackToCart');	
	Route::post('emptyCart', 'App\Http\Controllers\PackageController@emptyCart');	
	Route::post('checkCartItem', 'App\Http\Controllers\PackageController@checkCartItem');	

	
});

Route::post('/verifyPromocode', 'App\Http\Controllers\CommonController@verifyPromocode');

Route::middleware(['authadmin', 'auth:sanctum'])->group(function () {
	Route::get('Dashboard', 'App\Http\Controllers\AdminDashboard@goToDashboard');
	Route::post('/updateGarages', 'App\Http\Controllers\AdminDashboard@updateGarages');
	Route::post('/uploadBrands', 'App\Http\Controllers\AdminDashboard@uploadBrands');
	Route::post('/uploadModels', 'App\Http\Controllers\AdminDashboard@uploadModels');
	Route::post('/uploadAssignModels', 'App\Http\Controllers\AdminDashboard@uploadAssignModels');
	Route::post('/uploadPackages', 'App\Http\Controllers\AdminDashboard@uploadPackages');
	Route::post('/uploadServices', 'App\Http\Controllers\AdminDashboard@uploadServices');
	Route::post('/uploadCarParts', 'App\Http\Controllers\AdminDashboard@uploadCarParts');
	Route::post('/uploadCarTypes', 'App\Http\Controllers\AdminDashboard@uploadCarTypes');
	Route::post('/accidentalPricingUpload', 'App\Http\Controllers\AdminDashboard@accidentalPricingUpload');
	Route::post('/uploadPromocodes', 'App\Http\Controllers\AdminDashboard@uploadPromocodes');
	Route::post('/uploadServicePartPricing', 'App\Http\Controllers\AdminDashboard@uploadServicePartPricing');
	Route::post('/uploadFuelAssign', 'App\Http\Controllers\AdminDashboard@uploadFuelAssign');
	Route::post('/uploadMasterCSV', 'App\Http\Controllers\AdminDashboard@uploadMasterCSV');
	Route::post('/uploadPeriodicCSV', 'App\Http\Controllers\AdminDashboard@uploadPeriodicCSV');
	Route::post('/servicesPartsCSV', 'App\Http\Controllers\AdminDashboard@servicesPartsCSV');
});




Route::resource('/Dashboard/make', MakeCrudController::class);
Route::resource('/Dashboard/car', ModelController::class);
Route::resource('/Dashboard/promocode', PromocodeController::class);
Route::resource('/Dashboard/seasonal', SeasonalOfferController::class);
Route::resource('/Dashboard/addon', AddonController::class);
// Route::get('car', 'App\Http\Controllers\ModelController@show');
Route::get('update', 'App\Http\Controllers\ModelController@update');
Route::post('AddonModelData', 'App\Http\Controllers\AddonController@getAddonData');
Route::post('SeasonalOfferPage', 'App\Http\Controllers\SeasonalOfferController@seasonalRedirect');
Route::post('/ACRepairServices/AcEstimate', 'App\Http\Controllers\CommonController@AcEstimate');
Route::post('/ACRepairServices/remarkEstimate', 'App\Http\Controllers\RegistrationController@remarkEstimate');
Route::get('upkeepServ', 'App\Http\Controllers\PackageController@UnkeepServices');
Route::post('PartNotFoundLead', 'App\Http\Controllers\CommonController@PartNotFoundLead');
Route::post('/addMemPackToCartLoginCheck', 'App\Http\Controllers\CommonController@addMemPackToCartLoginCheck');	
Route::post('deleteCartItem', 'App\Http\Controllers\PackageController@deleteCartItem');	
Route::post('getAllServices', 'App\Http\Controllers\CommonController@getAllServices');	









