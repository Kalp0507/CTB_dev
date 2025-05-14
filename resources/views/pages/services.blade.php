@extends('layouts.default')
@section('content')

 

<!-- our services block start  -->
  <div class="row w-100 our-servicesPage mt-5">
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
      <h4 class="px-4 mt-4 blueColor heading-text">Our Services</h4>
      <div class="service-mmf">
        <div class="row">
          <div class="col-lg-12 col-md-12  py-4 px-4" style="">
            <form id="storeDataInSession" >
              @csrf
              <div class="row shadow py-4 px-4" style="border-radius: 20px; background-color: white;">
                <div class="col-lg-10 col-md-10 p-0">
                  <div class="row">
                    <div class="col-lg-4 col-md-4  form-group mb-0">
                      <select class="js-example-basic-single form-control form-control-lg" name="brands" id="brandSelect">
                        @if(session()->has('brandName'))
                          <option selected class="brandCont" id="make-{{session()->get('brandId')}}" value="{{session()->get('brandId')}}">{{session()->get('brandName')}}</option>
                          @foreach($brandData as $make)
                            @if($make->id != session()->get('brandId'))
                              <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                            @endif
                          @endforeach
                        @else
                          <option selected hidden>Select Make</option>
                            @foreach($brandData as $make)
                              <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                            @endforeach
                        @endif
                      </select> 
                      <div class="d-none text-danger" id="requestMakeError"></div>
                    </div>
                    <div class="col-lg-4 col-md-4  form-group mb-0">
                      <select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
                        @if(session()->has('modelName'))
                          <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>
                        @else
                          <option id="" value="">Select Model</option>
                        @endif
                      </select>
                      <div class="d-none text-danger" id="requestModelError"></div>
                    </div>
                    <div class="col-lg-4 col-md-4  form-group mb-0">
                      <select class="js-example-basic-second form-control form-control-lg fuelSelect battFuelSelect" id="fuelSelect">
                        @if(session()->has('fuelType'))
                          <option id="fuel-{{session()->get('fuelId')}}" value="{{session()->get('fuelId')}}">{{session()->get('fuelType')}}</option> 
                        @else
                          <option>Fuel</option>
                        @endif
                      </select>
                      <div class="d-none text-danger" id="requestFuelError"></div>
                    </div>
                    @if (Auth::check())
                      <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="true" >
                      <input type="hidden" name="mobile1" id="mobile1" value="{{Auth::user()->mobile}}">
                    @else
                      <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="false" >
                    @endif
                  </div>
                </div>
                <div class="col-lg-2 pl-0 searchPackageButton">
                  <div class="form-group m-0">
                      <button type="button" class="btn btn-lg btn-block text-light font-weight-bold home-banner-button form-control-lg" style="font-weight: 300; font-size: 14px;" id="home-send-request">Search</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="row py-4 servicesBlocks">
        @foreach($service as $serv)
          @if($serv->id == 1)
            <a href="/PeriodicServices" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
              <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                <img src="{{ URL::to('/') }}/images/Group 959.png"  class="mb-3"style="max-width:120px;" alt="...">
                <h3 class="blueColor titleBlock mb-4 mt-3">{{$serv->displayName}}</h3>
              </div>
            </a>
          @elseif($serv->id == 2)
            <a href="/accidentalRepair" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
              <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                <img src="{{ URL::to('/') }}/images/Group 969.png"  class="mb-3"style="max-width:120px;" alt="...">
                <h3 class="blueColor titleBlock mb-4 mt-3">{{$serv->displayName}}</h3>
              </div>
            </a>
          @elseif($serv->id == 3)
            <a href="/mechanicalRepairServices" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
              <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                <img src="{{ URL::to('/') }}/images/Group 977.png"  class="mb-3"style="max-width:120px;" alt="...">
                <h3 class="blueColor titleBlock mb-4 mt-3">{{$serv->displayName}}</h3>
              </div>
            </a>
          @elseif($serv->id == 4)
            <a href="/ACRepairServices" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
              <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                <img src="{{ URL::to('/') }}/images/Group 1000.png"  class="mb-3"style="max-width:120px;" alt="...">
                <h3 class="blueColor titleBlock mb-4 mt-3">{{$serv->displayName}}</h3>
              </div>
            </a>
          @elseif($serv->id == 5)
            <a href="/BatteryAndTyre" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
              <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                <img src="{{ URL::to('/') }}/images/Group 5789.png"  class="mb-3"style="max-width:120px;" alt="...">
                <h3 class="blueColor titleBlock mb-4 mt-3">{{$serv->displayName}}</h3>
              </div>
            </a>
          @elseif($serv->id == 6)
            <a href="/upkeepServ" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
              <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                <img src="{{ URL::to('/') }}/images/Group 1013.png"  class="mb-3"style="max-width:120px;" alt="...">
                <h3 class="blueColor titleBlock mb-4 mt-3">{{$serv->displayName}}</h3>
              </div>
            </a>
          @endif
        @endforeach
      </div>
    </div>
      
      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 sideBarServices" style="padding-right: 30px;padding-left: 0px;">
      	<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                  <div class="brand p-1">
                      <div class="row text-center" id="brandData"></div>
                  </div>
                  <div class="models p-1">
                      <div class="row text-center" id="modelData"></div>
                  </div>
                  <div class="fuel p-1">
                      <div class="row text-center" id="fuelData"></div>
                  </div>
                  <div class="py-4 px-3 car-form shadow-lg" style="background-color: #F5E72E; border-radius: 10px; ">
                      <h2 class="text-center pb-3" style="font-weight: 1000; font-size: 24px; color:#182d54;" > SELECT YOUR CAR </h2>
                      <form>
                       
                          <div class="form-group px-3 car-dropdown servicesPageDiv">
                              <span class="form-control" id="changeTextData">Select Car</span>
                              <input type="hidden" name="changeTextDataIds" id="changeTextDataIds" value="" style="height: 10px;" />
                              <div class="d-none" id="div1"></div>
                          </div>
                          <div class="form-group px-3">
                              @if (Auth::check())
                              <input type="tel" name="mobile1" class="form-control" id="mobile1" placeholder="Enter Mobile Number" value="{{Auth::user()->mobile}}" disabled>
                              @else
                              <input type="tel" name="mobile1" class="form-control" id="mobile1" placeholder="Enter Mobile Number">
                              @endif
                              <div class="d-none" id="div2"></div>
                          </div>  
                          <div class="form-group px-3 mb-0">
                              <button class="btn btn-lg btn-block blueButton text-warning" id="selectCar">CHECK SERVICE</button>
                          </div>
                      </form>
                  </div>
              </div> -->
          <div class="row justify-content-around">
              
              <h3 class="text-color seasonal-heading col-md-12 mt-md-4 mb-md-2 p-0 text-left">Seasonal Offers</h3>
               @foreach($seasonal as $season)
              <a href="javascript:void(0)" onclick="ServicePageRedirection(this)" id="{{$season->serviceToRedirectId}}"  class="col-lg-12 col-md-5 col-sm-12 col-xs-12 rounded-30 d-flex season-background" style="padding-left: 0px; padding-right: 0px;background-image: url('../images/seasonal/{{ $season->seasonal_background_image }}'); margin:5px 0px;">
                  <div class="d-flex season-background-inner col-lg 12" style="background-color: rgb(13 13 13 / 0.3); border-radius: 8px;padding-left: 20px;">
                   <img src="{{ URL::to('/') }}/images/seasonal/{{ $season->seasonal_icon}}" style="max-width:40px;" alt="{{ $season->seasonal_icon}}">
                   <h5 class="text-light" style="font-size: 1.2rem; font-weight: bold;align-self: center;margin: 0px 0px 0px 20px;">{{ $season->seasonal_title }}</h5>
                  </div>
              </a>
              @endforeach
          </div>
          <div class="row membership-package d-none" >
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                  <div class="row justify-content-around">
                     <h3 class="text-color seasonal-heading col-md-12 mt-md-4 mb-md-3 p-0 text-left">Packages</h3>
                      @foreach($membershipPackages as $key => $package)
                          <div class="col-lg-12 col-md-5 my-1 px-3 py-3 membership-package-one membershipPackage pack-{{ $key }}" id="{{$package->id}}" data-toggle="modal" data-target="#membershipModal" style="border-radius: 8px">
                              <div>
                                   <h4 class="" style=" font-weight: bold; align-self: center; padding: 5px 10px 0px 10px; text-transform: uppercase;">{{ $package->package_name}}</h4>
                                   <p class="font-weight-bold" style="font-size: 14px;">{{$package->package_description}}</p>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
              
          </div>
  </div>
</div>

<!-- our services block end  -->

<!-- how it works block start  -->

      <div class="how-it-works w-100 pt-5">
      <h2 class="heading-text text-center">How It Works</h2>
      <div class= "row w-100 d-flex justify-content-center">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
              <img src="{{ URL::to('/') }}/images/Group1026.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
              <div>
                  <p class="font-weight-bold" style="font-size: 18px;">ENTER YOUR  CAR  DETAILS</p>
                  <p style="font-size: 14px; font-weight: 600;">Select the Make, Model and Fuel Type of your car. This helps us serve you better by displaying all the services curated specially for your car.</p>
              </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 text-center p-0 align-self-center" style="margin-top: -30px">
              <img src="{{ URL::to('/') }}/images/linking.png" class="linking-lines" style="max-width:100px;margin:0px auto;" alt="...">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
              <img src="{{ URL::to('/') }}/images/Group1027.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
              <div>
                  <p class="font-weight-bold" style="font-size: 18px;">SELECT THE PERFECT CAR SERVICE’S</p>
                  <p style="font-size: 14px ;font-weight: 600;">Select one or more services from Car Trust Buddy’s broad selection of services available. You can also select other services from our special seasonal services and offers.  </p>
              </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12  text-center p-0 align-self-center" style="margin-top: -30px">
              <img src="{{ URL::to('/') }}/images/linking2.png" class="linking-lines" style="max-width:100px;margin:0px auto;" alt="...">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
              <img src="{{ URL::to('/') }}/images/Group1028.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
              <div>
                  <p class="font-weight-bold" style="font-size: 18px;">GET QUOTE / MAKE PAYMENT</p>
                  <p style="font-size: 14px; font-weight: 600;">Tell us what your  car needs and we will perform diagnostics and provide you with a fair & transparent price quote. </p>
              </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12  text-center p-0 align-self-center" style="margin-top: -30px">
              <img src="{{ URL::to('/') }}/images/linking.png" class="linking-lines" style="max-width:100px;margin:0px auto;" alt="...">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
              <img src="{{ URL::to('/') }}/images/Group1029.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
              <div>
                  <p class="font-weight-bold" style="font-size: 18px;">GET YOUR CAR FIXED</p>
                  <p style="font-size: 14px; font-weight: 600;">No more trips to garages, just tell us when and where to come and we get the garage to you doorstep. </p>
              </div>
          </div>
      </div>

  </div> 

  <!-- how it works block end  -->

<div class= "row w-100 testimonial-block testimonial-block-other pt-5 pb-5">
  <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 row" style="background-image: url({{ URL::to('/') }}/images/google-hangouts-logo.png); background-repeat: no-repeat; background-size: 120px; background-position: right top; align-items: center;margin: 20px 0px 0px 0px;">
      <div class="row ">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
              <h1 style="font-weight: 1000; color:#182d54;">CLIENT TESTIMONIAL</h1>
          </div>
      </div>
  </div>
  <div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 pl-5 testimonials">
      <div class="variable slider testimonial-slider">
          @foreach($testimonials as $key=>$testimonial)
              <div>
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                          <div class="card shadow-lg px-4 pt-5" style="width: 300px; min-height: 230px;border:0px; margin:10px 0px 10px 10px;">
                              <div class="card-image" style="display: flex;">
                                  <img src="{{ URL::to('/') }}/images/{{$testimonial->client_photo}}" style="max-width:30px;height: 30px;" alt="...">
                                  <h5  style="font-size: 14px;font-weight: 600;margin-left:10px;">{{$testimonial->client_name}} <br><span class="pt-2">{{$testimonial->client_location}}</span></h5>
                              
                              </div>
                              <div>
                                  <p style="font-size: 14px;" class="pt-3">{{$testimonial->client_testimonial}}</p>
                                  <div style="position: absolute;bottom: 15px; padding-bottom: 1rem;">
                                       @for($i=0;$i<$rating[$key][0];$i++)
                                          <span class="fa fa-star checked" style="color: #F5E72E;"></span>
                                      @endfor
                                       @for($i=0;$i<$unrating[$key][0];$i++)
                                          <span class="fa fa-star"></span>
                                      @endfor
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
  </div>
</div>
 

<!-- <h2 class="heading-text text-center pt-5 pb-3">Popular Services</h2>
  <div class="variable-width slider new-slider mt-3">
              @foreach($addons as $addon)
          <div>
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card  shadow-lg" style="width: 450px;height: 250px;border:0px;margin:10px 0px 10px 10px;">
                      <div class="card-image d-flex">
                          <img src="{{ URL::to('/') }}/images/aaron-huber.png" style="width:229px;height: 100% " alt="...">
                              <div class="card-content  p-4" style="width: 220px;">
                               <h4 class="card-title blueColor" style="font-size:1.3rem;font-weight: bolder;text-transform: uppercase;"> {{$addon->addon_name}}</h4>
                               <p style="font-size: 14px; display: block; display: -webkit-box; max-width: 100%; height: 60px; margin: 0 auto;-webkit-line-clamp: 3;-webkit-box-orient: vertical;  overflow: hidden; text-overflow: ellipsis;">{{$addon->addon_description}}</p>
                               <div class="form-group px-1 pb-4 mb-0" style="position: absolute;bottom: 8px; width: 35%;">
                                   @if (Auth::check())
                                    <button type="submit" class="btn btn-block blueButton text-light AddonServices font-weight-bold" id="{{$addon->id}}  data-addId="{{$addon->id}}">Read More</button>
                                  @else
                                    <button type="submit" class="btn btn-block blueButton text-light AddNewUser font-weight-bold" id="{{$addon->id}}" data-addId="{{$addon->id}}">Read More</button>
                                  @endif
                               </div>
                              </div>
                          </div>
                      </div>
                  </div>  
              </div>
          </div>
      @endforeach

  </div> -->
<!--  Addon Modal -->
<!-- <div class="modal fade addonServ" id="addonServ" tabindex="-1" role="dialog" aria-labelledby="addonServ" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header blueButton">
       <div id="addonServTitle"></div>
      <button type="button" class="close closePackage btn-close" data-dismiss="modal" aria-label="Close"><span class="text-light"  aria-hidden="true">&times;</span></button>

    </div>
    <div class="modal-body" >
      <div id="addonServDesc">  </div>
      <div id="addonServPrice"> </div>
      <div id="model-button" class="text-right">   </div>
    </div>
  </div>
</div>
</div> -->
<!--  New User Authentication -->
<div class="modal fade" id="authLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header blueButton"  id="authLoginTitle">
      <button type="button" class="close closePackage" data-dismiss="modal" aria-label="Close">
        <span  class="text-light" aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" >
      <div class="row">
        <div class="col-lg-12 bg-light py-4 px-4 rounded-left">
          <form method="POST" id="AuthFor" enctype="multipart/form-data">
            @csrf
              <h4 class="text-center">LOG IN</h4>
              <hr class="orange-line">
              <h5>Enter your Mobile Number</h5>
              <div class="form-group mb-4 mt-3">
                <input id="authMobile" type="tel" pattern="[0-9]{10}" maxlength="10" class="form-control" name="mobile" placeholder="Mobile Number" onkeyup="nospaces(this)">
              </div>
              <div class="form-group mb-4 otpText">
                <input id="mOtp" type="number" name="mOtp"class="form-control" placeholder="Enter OTP">
              </div> 
              <div id="addonIds"></div>
              <div class="d-none text-light" id="requestOtpError"></div>
              <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                <a class="text-warning resendOtpText" onclick="reSendOtp2()" style="font-weight:bolder;"> Resend OTP </a>
                <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time2">01:00</span> </a>
              </div>
              <div class="form-group mb-3 loginUserBtn">
                <button type="button" class="btn btn-secondary btn-block" id="aLogin">LOG IN</button>
              </div>
          </form>
          <div class="form-group mb-3 sendOtpBtn">
            <button type="button" id="AuthOtp" class="btn btn-secondary btn-block">SEND OTP</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer" id="model-footer"></div>
  </div>
</div>
</div>
<!--  Membership Modal -->


  <div class="modal fade" id="membershipModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title text-white membershipPackTitle" id="membershipPackTitle">Membership Package Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-light" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="javascript:void(0)" id="membershipPackForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="column pr-5 pl-5 pt-2" style="display: flex; flex-direction: row; align-items: center;">
                        <div class="form-group w-100 pr-2">
                            <!-- <label>Select Make:*</label> -->
                            <div class="">
                                <!-- <select class="js-example-basic-single form-control-lg form-control" name="brands" id="brandSelect">
                                    <option value="">Make</option>
                                    @foreach($brandData as $make)
                                        <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                    @endforeach
                                </select> -->
                                 <select class="js-example-basic-single form-control form-control-lg" name="brands" id="MemBrandSelect">
                                  @if(session()->has('brandName'))
                                    <option selected class="brandCont" id="make-{{session()->get('brandId')}}" value="{{session()->get('brandId')}}">{{session()->get('brandName')}}</option>

                                    @foreach($brandData as $make)
                                      @if($make->id != session()->get('brandId'))
                                        <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                      @endif
                                    @endforeach
                                  @else
                                    <option selected hidden>Select Make</option>
                                    @foreach($brandData as $make)
                                      <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                    @endforeach
                                  @endisset
                                </select>
                                <div class="d-none" style="color:red;" id="brandError"></div>
                            </div>
                        </div>

                        <div class="form-group w-100 pr-2">
                            <!-- <label>Select Model:*</label> -->
                            <div class="">
                                <select class="js-example-basic-first form-control form-control-lg modelSelect" id="MemModelSelect">
                                  @if(session()->has('modelName'))
                                    <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>
                                  @else
                                    <option id="" value="" selected hidden>Select Model</option>
                                  @endif
                                </select>
                                <!-- <select name="models" class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
                                    <option value="">Model</option> 
                                </select> -->
                                <div class="d-none" style="color:red;" id="modelError"></div>
                            </div>
                        </div>
                        <div class="form-group w-100 pr-2">
                            <!-- <label>Select Fule Type:*</label> -->
                            <div class="">
                                <!-- <select name="fuels" class="js-example-basic-first form-control form-control-lg fuelSelect" id="fuelSelect">
                                    <option value="">Fuel</option> 
                                </select> -->
                                <select class="js-example-basic-second form-control form-control-lg fuelSelect" id="MemFuelSelect">
                                  @if(session()->has('fuelType'))
                                    <option id="fuel-{{session()->get('fuelId')}}" value="{{session()->get('fuelId')}}">{{session()->get('fuelType')}}</option> 
                                  @else
                                    <option selected hidden>Select Fuel</option>
                                  @endif

                                    <!-- @isset($fuelId)
                                    <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                                    @endisset
                                    <option>Fuel</option>  -->
                                </select>
                                <div class="d-none" style="color:red;" id="fuelError"></div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="true" >
                        <input type="hidden" name="mobile1" id="mobile1" value="{{Auth::user()->mobile}}">
                    @else
                        <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="false" >
                    @endif
                    <div class="packageInfo">
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  



   <div class="modal fade" id="accLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #182d54;">
        <h5 class="modal-title text-light" id="exampleModalLongTitle">Mobile Verification</h5>
          <button type="button" class="close closePack" data-dismiss="modal" aria-label="Close">
            <span class="text-light" aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="membeshipLoginForm" class="" enctype="multipart/form-data" style="padding: 2em;">
          @csrf
          <h4 class="text-center">LOG IN</h4>
          <hr class="orange-line">
          <h5>Enter your Mobile Number</h5>
          <div class="form-group mb-4 mt-3">
            <input id="mobile1" type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" name="mobile1" required autofocus placeholder="Mobile Number" onkeyup="nospaces(this)">
          </div>
          <div class="hideData"></div>
          <div class="form-group mb-4 otp-block">
              <input id="otpVal" type="number" name="otp"class="form-control" value="" placeholder="Enter OTP">
          </div> 
          
          <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
            <a class="text-warning resendOtpText" onclick="reSendOtp6()" style="font-weight:bolder;"> Resend OTP </a>
            <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time6">01:00</span> </a>
          </div>

          <div class="form-group mb-3 login-btn" >
            <button type="button" id="membershipPackageCheck" class="btn btn-secondary btn-block">LOG IN</button>
          </div>
          <div class="form-group mb-3 otp-btn">
              <button type="button" onclick="sendLeadOtp()" class="btn btn-secondary btn-block">SEND OTP</button>
            </div>

        </form>
    </div>
  </div>
</div>
<!-- Membership modal end -->

  <!--  New User Authentication for make model fuel -->
<div class="modal fade" id="HomeSessionLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
     <div class="modal-header blueButton"  id="authLoginTitle">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-light" aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body" >
      <div class="row">
        <div class="col-lg-12 bg-light py-4 px-4 rounded-left">
          <form method="POST" id="HomeLoginForm" enctype="multipart/form-data">
            @csrf
              <h4 class="text-center">LOG IN</h4>
              <hr class="orange-line">
              <h5>Enter your Mobile Number</h5>
              <div class="form-group mb-4 mt-3">
                <input id="authHomeMobile" type="tel" class="form-control" name="mobile" placeholder="Mobile Number" onkeyup="nospaces(this)">
              </div>
              <div class="form-group mb-4 otpText">
                <input id="HomeOtp" type="number" name="HomeOtp" class="form-control" placeholder="Enter OTP">
              </div> 
              <div class="d-none text-light" id="requestOtpError"></div>
               <div id="Ids"></div>
              <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                <a class="text-warning resendOtpText" onclick="reSendOtp3()" style="font-weight:bolder;"> Resend OTP </a>
                <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time3">01:00</span> </a>
              </div>
              <div class="form-group mb-3 loginUserBtn">
                <button type="button" class="btn btn-secondary btn-block" id="HomeLogin">LOG IN</button>
              </div>
          </form>
          <div class="form-group mb-3 sendOtpBtn">
            <button type="button" id="HomeAuthOtp" class="btn btn-secondary btn-block">SEND OTP</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer" id="model-footer"></div>
  </div>
</div>
</div>

@stop

<!-- Modal -->
<!-- <div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header backgroundBlue noBorderRadius">
              <h3 class="modal-title textYellow" id="servicesModalTitle">Modal title</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="textYellow" aria-hidden="true">&times;</span>
              </button>
          </div>
          <form method="POST" action="javascript:void(0)" class="mb-0" id="servicesForm" enctype="multipart/form-data">
              <div class="modal-body">
                  @csrf
                  <div class="column pr-5 pl-5 pt-2">
                      <div class="form-group">
                          <label>Select Make:*</label>
                          <div class="">
                              <select class="js-example-basic-single form-control-lg form-control" name="brands" id="brandSelect">
                                  <option value="">Make</option>
                                  @foreach($brandData as $make)
                                      <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                  @endforeach
                              </select>
                              <div class="d-none" style="color:red;" id="brandError"></div>
                          </div>
                          
                      </div>

                      <div class="form-group">
                          <label>Select Model:*</label>
                          <div class="">
                              <select name="models" class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
                                  <option value="">Model</option> 
                              </select>
                              <div class="d-none" style="color:red;" id="modelError"></div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label>Select Fule Type:*</label>
                          <div class="">
                              <select name="fuels" class="js-example-basic-first form-control form-control-lg fuelSelect" id="fuelSelect">
                                  <option value="">Fuel</option> 
                              </select>
                              <div class="d-none" style="color:red;" id="fuelError"></div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="user_name">Name*</label>
                          @if (Auth::check())
                              @if(Auth::user()->username)
                                  <input name="username" type="text" class="form-control input-fixed-height" id="user_name" aria-describedby="userHelp" placeholder="Enter your name" value="{{Auth::user()->username}}">
                              @else
                                  <input name="username" type="text" class="form-control input-fixed-height" id="user_name" aria-describedby="userHelp" placeholder="Enter your name">
                              @endif
                          @else
                              <input name="username" type="text" class="form-control input-fixed-height" id="user_name" aria-describedby="userHelp" placeholder="Enter your name">
                          @endif
                          <div class="d-none" style="color:red;" id="usernameError"></div>
                      </div>

                      <div class="form-group">
                          <label for="mobileNo">Mobile No.*</label>
                          @if (Auth::check())
                              @if(Auth::user()->mobile)
                                  <input name="userMobile" type="text" class="form-control input-fixed-height" id="mobileNo" aria-describedby="mobileHelp" value="{{Auth::user()->mobile}}" placeholder="Enter mobile no" maxlength="10">
                              @else
                                  <input name="userMobile" type="text" class="form-control input-fixed-height" id="mobileNo" aria-describedby="mobileHelp" placeholder="Enter mobile no" maxlength="10">
                              @endif
                          @else
                              <input name="userMobile" type="text" class="form-control input-fixed-height" id="mobileNo" aria-describedby="mobileHelp" placeholder="Enter mobile no" maxlength="10">
                          @endif
                          <div class="d-none" style="color:red;" style="color:red;" id="mobileError"></div>
                      </div>
                      <input name="selectedService" type="hidden" class="form-control" id="selectedService" value="" aria-describedby="selectedServiceHelp" >
                  </div>
              </div>
              <div class="modal-footer text-center" style="justify-content: center;">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
    <!--               <button type="submit" class="btn textYellow blueButton serviceModalBtnSize" id="submitServicesFormBtn">Request Callback</button>
              </div>
          </form>
      </div>
  </div>
</div> -->

<!--  New User Authentication for make model fuel -->
<!-- <div class="modal fade" id="HomeSessionLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-body" >
      <div class="row">
        <div class="col-lg-12 bg-light py-4 px-4 rounded-left">
          <form method="POST" id="HomeLoginForm" enctype="multipart/form-data">
            @csrf
              <h4 class="text-center">LOG IN</h4>
              <hr class="orange-line">
              <h5>Enter your Mobile Number</h5>
              <div class="form-group mb-4 mt-3">
                <input id="authHomeMobile" type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" name="mobile" placeholder="Mobile Number">
              </div>
              <div class="form-group mb-4 otpText">
                <input id="HomeOtp" type="number" name="HomeOtp" class="form-control" placeholder="Enter OTP">
              </div> 
              <div class="d-none text-light" id="requestOtpError"></div>
               <div id="Ids"></div>
              <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                <a class="text-warning resendOtpText" onclick="reSendOtp3()" style="font-weight:bolder;"> Resend OTP </a>
                <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time3">01:00</span> </a>
              </div>
              <div class="form-group mb-3 loginUserBtn">
                <button type="button" class="btn btn-secondary btn-block" id="HomeLogin">LOG IN</button>
              </div>
          </form>
          <div class="form-group mb-3 sendOtpBtn">
            <button type="button" id="HomeAuthOtp" class="btn btn-secondary btn-block">SEND OTP</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer" id="model-footer"></div>
  </div>
</div>
</div> -->

<script>
var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";

// Function to lazy load a script
// -----------------------------------------------
var loadExternalScript = function(path) {
  var result = $.Deferred(),
      script = document.createElement("script");

  script.async = "async";
  script.type = "text/javascript";
  script.src = path;
  script.onload = script.onreadystatechange = function(_, isAbort) {
    if (!script.readyState || /loaded|complete/.test(script.readyState)) {
      if (isAbort) {

        result.reject();
      }
      else{

        result.resolve();
      }
    }
  };

  script.onerror = function() {
    result.reject();
  };

  $("head")[0].appendChild(script);

  return result.promise();
};

// CountDown Timer Code-------------------------------

function CountDownTimer(duration, granularity) {
  this.duration = duration;
  this.granularity = granularity || 1000;
  this.tickFtns = [];
  this.running = false;
}

CountDownTimer.prototype.start = function() {
  if (this.running) {
    return;
  }
  this.running = true;
  var start = Date.now(),
      that = this,
      diff, obj;

  (function timer() {
    diff = that.duration - (((Date.now() - start) / 1000) | 0);
    
    if (diff > 0) {
      setTimeout(timer, that.granularity);
    } else {
      diff = 0;
      that.running = false;
    }

    obj = CountDownTimer.parse(diff);
    that.tickFtns.forEach(function(ftn) {
      ftn.call(this, obj.minutes, obj.seconds);
    }, that);
  }());
};

CountDownTimer.prototype.onTick = function(ftn) {
  if (typeof ftn === 'function') {
    this.tickFtns.push(ftn);
  }
  return this;
};

CountDownTimer.prototype.expired = function() {
  return !this.running;
};

CountDownTimer.parse = function(seconds) {
  return {
    'minutes': (seconds / 60) | 0,
    'seconds': (seconds % 60) | 0
  };
};
// CountDown Timer Code End-------------------------------

 function checkOtp() {
    // window.location()
    // console.log("Chicking OTP");
    $mobileNumber = $('#mobilenum1').val();
    var enteredOtp = $('#otpVal').val();
    // console.log("Chicking Ent OTP0---"+ enteredOtp );

  $storedOTP = localStorage.getItem('otp');
    // console.log("Chicking Stored OTP0---"+ $storedOTP );

  if($storedOTP == enteredOtp) {
    $('#accLogin').modal('hide');
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
     var base_url = window.location.origin;
      $serviceType = $( "#serviceType" ).val();
      $.ajax({
        url: "/BatteryTyreService/getBatteryParts",
        method: 'POST',
        data:{'brandId':$makeId, 'modelId':$modelId, 'fuelId':$fuelId, 'serviceType':$serviceType, 'batteryOrTyre':$batteryORTyre,'mobile':$mobileNumber},
        success: function(data,status,xhr){
          // console.log("XHRData---"+JSON.stringify(data.serviceParts));
          $('#batteryTyreDiv').html('');
          var partSelectOptions='';
          if(data !== []) {
            partSelectOptions+='<div class="col-lg-12">';
            if(data.serviceParts.length >=1) {
              data.serviceParts.map((partData,idx)=>{

                partSelectOptions+='<div class="col-lg-12 mb-3 pt-3" style="display:flex; flex-direction:row;">';

                partSelectOptions+='<div class="col-lg-4">';
                partSelectOptions+='<div class=""><img src="'+base_url+'/images/carParts/'+partData.part_image+'" style="width:100px;height: 100px" /></div>';
                partSelectOptions+='</div>';

                partSelectOptions+='<div class="col-lg-5">';
                partSelectOptions+='<div class"col-lg-12"><h4 class="pt-2">'+partData.part_name+'<h4></div>';
                partSelectOptions+='<div class"col-lg-12"><h5 class="">₹'+partData.price+'<h5></div>';
                // partSelectOptions+='<div class"col-lg-12"><button class="btn text-light blueButton mr-1 addAccPart" id="part-'+partData.id+'" onclick="addAccidentalPart('+partData.id+')">ADD</button><button class="btn text-light blueButton mr-1 d-none removeAccPart" id="remPart-'+partData.id+'" onclick="removePartFromCart('+partData.id+')">REMOVE</button></div>';
                // partSelectOptions+='<div class"col-lg-12"><button class="btn text-light blueButton mr-1 addAccPart" id="part-'+partData.id+'" onclick="addAccidentalPart('+partData.id+')">ADD</button><button class="btn text-light blueButton mr-1 d-none removeAccPart" id="remPart-'+partData.id+'" onclick="removePartFromCart('+partData.id+')">REMOVE</button></div>';
                partSelectOptions+='</div>';


                partSelectOptions+='<div class="col-lg-3" style="display: flex;align-items: center;">';

                    var count =0;
                if(data.existingParts.length > 1) {
                  // data.existingParts.map((existingPart,key)=>{
                  for (var i = 0; i < data.existingParts.length; i++) {
                    if(data.existingParts[i].partId == partData.id) {
                      partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="'+data.existingParts[i].qty+'" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';
                      count = 1;
                    }
                  }

                  if(count != 1) {
                    partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="0" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';
                  }
                } else {
                  partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="0" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';
                }
                // partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="0" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';

                partSelectOptions+='</div>';
                partSelectOptions+='</div>';

                partSelectOptions+='<hr />';

              });

            } else {
              // console.log("No products---");
              partSelectOptions+='<div class="p-3"><h4>No products available for the selected Make, Model & Fuel</h4></div>';
              $('#batteryCheckoutBtn').addClass('d-none');
            }

            partSelectOptions+='</div>';
          }

          $('#batteryTyreDiv').append(partSelectOptions);
        }
      });
 $('#batteryTyreModal').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true
      });
  }
  else {
    alert("Invalid OTP");
  }
    
  }
  
</script>