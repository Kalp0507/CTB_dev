@extends('layouts.default')
@section('content')

<div class="home-banner">
    <div class="banner-first-half row">
        <div class="col-lg-5 col-md-5">
            <h1 class="text-light font-weight-bold">Why Choose Us?</h1>
            <p class="text-light" style="padding-right: 25%;">We focus on providing our client the highest level of service and customer support.</p>
            <hr class="banner-line">
            <a href="/about" class="text-light" style="font-size: 14px;">Learn more<span><i class="fas fa-arrow-right text-light ml-2"></i></span></a>
            <div class="row w-100 pt-4">
                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs my-2">
                    <img src="{{ URL::to('/') }}/images/handShake.png" style="max-width:50px; height: 50px;" alt="...">
                    <div class="inner-info-tabs ml-4">
                        <h6 class="" style="font-weight: bolder; font-size: 16px;color: #F5E72E;">DOORSTEP PICK-UP AND DROP</h6>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs my-2">
                    <img src="{{ URL::to('/') }}/images/clock.png" style="max-width:50px; height: 50px;" alt="...">
                    <div class="inner-info-tabs ml-4">
                        <h6 class="" style="font-weight: bolder; font-size: 16px;color: #F5E72E;">100% GENUINE SPARE PARTS</h6>
                    </div>
                </div> -->
                <div id="carouselExampleIndicators1" class="carousel slide w-100 pb-5 pt-3 carousel-fade" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="4"></li>
                      </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp1.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">One stop solution for your vehicle</h6>
                                </div>
                            </div>
                            

                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp2.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Affordable and Reliable service & repair</h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp8.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Assurance and warranty</h6>
                                </div>
                            </div>
                            

                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp4.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Genuine OEM/OES spare parts</h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp5.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Support in insurance claim process</h6>
                                </div>
                            </div>
                            

                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp6.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Personalise tips for your vehicle maintenance</h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp7.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">History of vehicle parts repair and replacement</h6>
                                </div>
                            </div>
                            

                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp3.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Wide spread network of garages</h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp5.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Doorstep Check-up, estimate and minor repair</h6>
                                </div>
                            </div>
                            

                            <div class="d-flex mt-1">
                                <img src="{{ URL::to('/') }}/images/usp9.png" style="max-width:40px; height: 40px;" alt="...">
                                <div class="inner-info-tabs ml-2">
                                    <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Free pick up and drop facility</h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                  </div>
                   <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a> -->
                  <!-- <a class="carousel-control-next uspNextSlideBtn" href="#carouselExampleIndicators1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a> -->
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 text-right homepageSliderDiv">
            <div id="carouselExampleIndicators" class="carousel slide homepageSlider" data-ride="carousel">
                  <!-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol> -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block slideCenter" src="{{ URL::to('/') }}/images/carRepairImg1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block slideCenter" src="{{ URL::to('/') }}/images/home-slider2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block slideCenter" src="{{ URL::to('/') }}/images/carCleaningImg.jpg" alt="Third slide">
                </div>
              </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- <img src="{{ URL::to('/') }}/images/home-banner.png" alt="..." style=""> -->
        </div>
        
    </div>
    <div class="banner-second-half">
        <div class="row">
            <div class="col-lg-12 col-md-12  py-4 px-4" style="">
                <form id="storeDataInSession" >
                    @csrf
                    <div class="row shadow py-4 px-4" style="border-radius: 20px; background-color: white;">
                        <div class="col-lg-10 col-md-12 p-0">
                            <div class="row">
                                <div class="col-lg-4 col-md-4  form-group mb-0">
                                    <select class="js-example-basic-single form-control form-control-lg" name="brands" required id="brandSelect">

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
                                            <option id="" value="" selected hidden>Select Model</option>
                                        @endif
                                    </select>
                                    <div class="d-none text-danger" id="requestModelError"></div>
                                </div>
                                <div class="col-lg-4 col-md-4  form-group mb-0">
                                    <select class="js-example-basic-second form-control form-control-lg fuelSelect battFuelSelect" id="fuelSelect">
                                        @if(session()->has('fuelType'))
                                            <option id="fuel-{{session()->get('fuelId')}}" value="{{session()->get('fuelId')}}">{{session()->get('fuelType')}}</option> 
                                            @else
                                            <option id="" value="" selected hidden>Select Fuel</option>
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
                        <div class="col-lg-2 col-md-12 pl-0 searchPackageButton">
                            <div class="form-group m-0">
                                <button type="button" class="btn btn-lg btn-block text-light font-weight-bold home-banner-button form-control-lg" style="font-weight: 300; font-size: 14px;" id="home-send-request">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="variable-width slider new-slider mt-3 addonSlider">
        @foreach($addons as $addon)
            <div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 addon-columns">
                    <div class="card  shadow-lg" style="width: 450px;height: 250px;border:0px;margin:10px 0px 10px 0px;">
                        <div class="card-image d-flex">
                            <img src="{{ URL::to('/') }}/images/addons/{{$addon->addon_icon}}" style="width:229px;height: 100%;border:1px solid #F5E72E;" alt="...">
                                <div class="card-content  p-4">
                                 <h4 class="card-title text-light" style="font-size:1.3rem;font-weight: bolder;text-transform: uppercase;"> {{$addon->addon_name}}</h4>
                                 <p class="text-light" style="font-size: 14px; display: block; display: -webkit-box; max-width: 100%; height: 60px; margin: 0 auto;-webkit-line-clamp: 3;-webkit-box-orient: vertical;  overflow: hidden; text-overflow: ellipsis;">{{$addon->addon_description}}</p>
                                 <div class="form-group px-1 pb-4 mb-0" style="/*position: absolute;bottom: 8px; width: 35%;*/">
                                     @if (Auth::check())
                                      <button type="submit" class="btn btn-block AddonServices font-weight-bold" id="{{$addon->id}}" style="background-color: #F5E72E;font-size:14px;padding:10px 0px;" data-addId="{{$addon->id}}">Buy</button>
                                    @else
                                      <button type="submit" class="btn btn-block AddNewUser font-weight-bold" id="{{$addon->id}}" data-addId="{{$addon->id}}" style="background-color: #F5E72E;font-size:14px;padding:10px 0px;">Buy</button>
                                    @endif
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        @endforeach
  
    </div>


<div class="home-service-banner">
    <div class="home-service-banner-first-half">
        <h1 class="font-weight-bold text-center pt-5 mb-5" style="font-size: 50px;color:#F5E72E;">Our Services</h1>
        <div class="row ourServices" >

            @foreach($service as $serv)
                @if($serv->id == 1)
                    <a href="/PeriodicServices" class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inner-our-service changeBlock mt-2 mb-4 mx-1">
                        <div class= "border shadow-lg p-3 rounded serviceBlock" style="height:220px; background-color:white;">
                            <img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}" style="max-width:125px;border-radius: 20px; margin-bottom: 8px;" alt="...">
                            <h3 class="text-color titleBlock" >{{$serv->displayName}}</h3>
                        </div>
                    </a>
                @elseif($serv->id == 2)
                    <a href="/accidentalRepair" class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inner-our-service changeBlock mt-2 mb-4 mx-1">
                        <div class= "border shadow-lg p-3 rounded serviceBlock" style="height:220px; background-color:white;">
                            <img src="{{ URL::to('/') }}/images/Group 969.png" style="max-width:120px; border-radius: 20px; margin-bottom: 8px;" alt="...">
                            <h3 class="text-color titleBlock" >{{$serv->displayName}}</h3>
                        </div>
                    </a>
                @elseif($serv->id == 3)
                <a href="mechanicalRepairServices" class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inner-our-service changeBlock mt-2 mb-4 mx-1">
                    <div class= "border shadow-lg p-3 rounded serviceBlock" style="height:220px; background-color:white;">
                        <img src="{{ URL::to('/') }}/images/Group 977.png" style="max-width:120px; border-radius: 20px; margin-bottom: 8px;" alt="...">
                        <h3 class="text-color titleBlock">{{$serv->displayName}}</h3>
                    </div>
                </a>
                @elseif($serv->id == 4)
                    <a href="/ACRepairServices" class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inner-our-service changeBlock mt-2 mb-4 mx-1">
                        <div class= "border shadow-lg p-3 rounded serviceBlock" style="height:220px; background-color:white;">
                            <img src="{{ URL::to('/') }}/images/Group 1000.png" style="max-width:120px; border-radius: 20px; margin-bottom: 8px;" alt="...">
                            <h3 class="text-color titleBlock">{{$serv->displayName}}</h3>
                        </div>
                    </a>
                 @elseif($serv->id == 6)
                    <a href="/upkeepServ" class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inner-our-service changeBlock mt-2 mb-4 mx-1">
                        <div class= "border shadow-lg p-3 rounded serviceBlock" style="height:220px; background-color:white;">
                            <img src="{{ URL::to('/') }}/images/Group 1013.png" style="max-width:120px; border-radius: 20px; margin-bottom: 8px; " alt="...">
                            <h3 class="text-color titleBlock">{{$serv->displayName}}</h3>
                        </div>
                    </a>
                @elseif($serv->id == 5)
                <a href="BatteryAndTyre" class="col-lg-4 col-md-4 col-sm-6 col-xs-6 inner-our-service changeBlock mt-2 mb-4 mx-1">
                        <div class= "border shadow-lg p-3 rounded serviceBlock" style="height:220px; background-color:white;">
                            <img src="{{ URL::to('/') }}/images/Group 5789.png" style="max-width:120px; border-radius: 20px; margin-bottom: 8px;" alt="...">
                            <h3 class="text-color titleBlock">{{$serv->displayName}}</h3>
                        </div>
                    </a>
                @endif
            @endforeach
            </div>
    </div>
    <div class="home-service-banner-second-half">
        
    </div>
</div>
<div class="request-callback-block py-5">
    <div class="row">
        <!-- <div class="col-lg-5 col-md-12 col-12 align-self-center">
            <div class="about-heading">
                <h1 class="" style="font-weight: bolder;">What We Do...</h1>
                <h1 class="" style="font-weight: bolder;">Who We Are</h1>
            </div>
                <p class="" style="padding-right: 25%;font-size: 14px;">We focus on providing our client the highest level of service and customer support.We focus on providing our client the highest level of service and customer support.</p>
        </div> -->
        <div class="col-lg-2"></div>
        <div class="col-md-12 col-lg-8 col-12">
        <div class="row" style="background-color: #F5E72E; border-radius: 10px">
        <div class="col-lg-12 col-md-12 col-12 py-4 px-4">
            <div class="bg-white request-form-inner shadow-lg" style="border-radius: 10px;">
                        <h2 class="text-center blueColor pb-4" style="font-weight: bold; font-size: 35px;"> Request a callback </h2>
                        <form method="post" id="request_form" action="javascript:void(0)">
                            {{ csrf_field() }}
                            <div class="alert alert-success d-none" id="msg_div">
                                <span id="res_message"></span>
                            </div>

                            @if (Auth::check())
                                <input type="hidden" name="isLoggedIn" class="isLoggedIn" value="true" />
                            @else
                                <input type="hidden" name="isLoggedIn" class="isLoggedIn" value="false" />
                            @endif

                            <div class="form-group px-3">
                                @if (Auth::check())
                                    @if(Auth::user()->username)
                                        <input type="text" class="form-control"name="name" id="requestName" placeholder="Name" value="{{Auth::user()->username}}" required>
                                    @else
                                        <input type="text" class="form-control form-control-lg"name="name" id="requestName" placeholder="Name" required>
                                    @endif
                                @else
                                    <input type="text" class="form-control form-control-lg"name="name" id="requestName" placeholder="Name" required>
                                @endif
                                <!-- <input type="text" class="form-control"name="name" id="requestName" placeholder="Name" required> -->
                                 <div class="d-none text-danger" id="requestNameError"></div>
                            </div> 
                            <div class="form-group px-3">
                                @if (Auth::check())
                                    @if(Auth::user()->mobile)
                                        <input type="tel" class="form-control" name="mobile" id="requestmobile" placeholder="Mobile Number" pattern="[0-9]{10}" maxlength="10" value="{{Auth::user()->mobile}}" required onkeyup="nospaces(this)">
                                    @else
                                        <input type="tel" class="form-control form-control-lg" name="mobile" id="requestmobile" placeholder="Phone Number" pattern="[0-9]{10}" required onkeyup="nospaces(this)">
                                    @endif
                                @else
                                    <input type="tel" class="form-control form-control-lg" name="mobile" id="requestmobile" placeholder="Phone Number" pattern="[0-9]{10}" maxlength="10" required onkeyup="nospaces(this)">
                                @endif
                                <!-- <input type="tel" class="form-control" name="mobile" id="requestmobile" placeholder="Mobile Number" pattern="[6-9]{1}[0-9]{9}" required> -->
                                 <div class="d-none text-danger" id="requestMobileError"></div>

                            </div> 
                            <div class="form-group px-3">
                                @if (Auth::check())
                                    @if(Auth::user()->email)
                                        <input type="email" class="form-control" name="email" id="requestEmail" value="{{Auth::user()->email}}" required>
                                    @else
                                        <input type="email" class="form-control form-control-lg" name="email" id="requestEmail" placeholder="Email" required>
                                    @endif
                                @else
                                   <input type="email" class="form-control form-control-lg" name="email" id="requestEmail" placeholder="Email"  required>
                                @endif
                                <!-- <input type="tel" class="form-control" name="mobile" id="requestmobile" placeholder="Mobile Number" pattern="[6-9]{1}[0-9]{9}" required> -->
                                 <div class="d-none text-danger" id="requestEmailError"></div>

                            </div> 
                            <div class="form-group px-3 py-3 mb-0 Phone">
                                <button type="submit" id="request_submit" class="btn btn-lg form-control-lg blueButton btn-block text-light" style="font-size: 14px;margin:0px auto; width: 70%;">Send Request</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="how-it-works w-100 py-5">
    <h2 class="heading-text text-center mb-5" style="font-size: 50px; font-weight: 700;">How It Works</h2>
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


<div class="membership-package-block mb-5">
    <div class="row package-block">
        <div class="col-lg-6 d-none">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-around">
                        @foreach($membershipPackages as $key => $package)
                            <div class="col-lg-12 col-md-5 my-1 px-3 py-3 membership-package-one membershipPackage" id="{{$package->id}}" data-toggle="modal" data-target="#membershipModal" style="border-radius: 8px">
                                <div>
                                    <h4 class="" style=" font-weight: bold; align-self: center; padding: 5px 10px 0px 10px; text-transform: uppercase; font-size: 18px;color:#F5E72E">{{ $package->package_name}}</h4>
                                    <p class="font-weight-bold" style="font-size: 16px; color:#fff">{{$package->package_description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-6">
            <div class="embed-responsive embed-responsive-4by3" style="border-radius: 10px; border:2px solid #F5E72E">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
        </div>
        
    </div>

</div>
<div class="home-testimonial-block mt-5 py-5">
    <div class= "row w-100 testimonial-block">
        <h1 class="text-center font-weight-bold m-auto" style="color:black; font-size: 50px; margin-bottom: 2rem !important">CUSTOMER SPEAKS</h1>
        <!-- <p class="text-center font-weight-bold m-auto pt-3">We focus on providing our client the highest level of service and customer support.Highest level of service and customer support</p> -->
        <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12 testimonials">
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
</div>

<!-- <div class="home-contact-us mt-5 py-5">
    <div class="row home-contact-row" style="height: 310px;">
        <div class="col-lg-6">
             <img src="{{URL::to('/') }}/images/aaron-huber.png" alt="..." style="">
        </div>
        <div class="col-lg-6 px-5 align-self-center">
            <h2 class="font-weight-bold text-light">CONTACT US TODAY</h2>
            <p class="text-light">CALL US AT <span>+91 000 000 0000</span></p>
            <hr class="banner-line">
            <div>
                <button class="btn font-weight-bold" onclick="window.location='{{ url("/contact") }}'">Mail Us</button>
                <button class="btn font-weight-bold">Get a Quote</button>
            </div>
        </div>
        
    </div>
</div> -->
<div class="contact-us w-100 py-5 mt-0" style="height: 375px;">
        <div class="row w-100 contact-us-inner h-100 " style="border-radius: 1.25rem">
            <div class="col-lg-4 col-md-7 col-sm-12 col-xs-12 text-center">
                <h1 class= "text-white"style="font-size: 35px; font-weight: bolder">CONTACT US TODAY</h1>
                <p class="" style="font-size: 26px;font-weight: bolder;color: #F5E72E;">CALL US AT 703 000 2323</p>
            </div>
            <div class="col-lg-5 col-md-1 col-sm-12 col-xs-12"></div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pr-md-5 pl-md-0">
                <a href="/contact"><button class="btn blueButton text-light my-4 my-sm-2 w-100" style="padding: 0.7rem; font-size:14px;">Mail Us</button></a>
                <!-- <button class="btn orangeButton my-4 my-sm-2 w-100" style="padding:0.7rem; font-size:14px;">Get A Quote</button> -->
            </div>
            
        </div>
    </div>
<!-- <div class="modal fade addonServ" id="addonServ" tabindex="-1" role="dialog" aria-labelledby="addonServ" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header blueButton">
        <div id="addonServTitle"></div>
      <button type="button" class="close closePackage btn-close" data-dismiss="modal" aria-label="Close"><span class="text-light" aria-hidden="true">&times;</span></button>
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
<!-- <div class="modal fade" id="authLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
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
            <form method="POST" id="AuthFor" enctype="multipart/form-data">
              @csrf
                <h4 class="text-center">LOG IN</h4>
                <hr class="orange-line">
                <h5>Enter your Mobile Number</h5>
                <div class="form-group mb-4 mt-3">
                  <input id="authMobile" type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" name="mobile" placeholder="Mobile Number" onkeyup="nospaces(this)">
                </div>
                <div class="form-group mb-4 otpText">
                  <input id="mOtp" type="number" name="mOtp"class="form-control" placeholder="Enter OTP">
                </div> 
                <div id="addonIds"></div>
                <div class="d-none text-light" id="requestOtpError"></div>
                <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                  <a class="text-warning resendOtpText" id="resendOtpHome" onclick="reSendOtp3()" style="font-weight:bolder;"> Resend OTP </a>
                  <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;" > in <span id="time3">01:00</span> </a>
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
</div> -->

<!--  New User Authentication for make model fuel -->
<div class="modal fade" id="HomeSessionLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
         <div class="modal-header blueButton" >
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
                  <input id="authHomeMobile" type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" name="mobile" placeholder="Mobile Number" onkeyup="nospaces(this)">
                </div>
                <div class="form-group mb-4 otpText">
                  <input id="HomeOtp" type="number" name="HomeOtp" class="form-control" placeholder="Enter OTP">
                </div> 
                <div class="d-none text-light" id="requestOtpError"></div>
                 <div id="Ids"></div>
                <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                  <a class="text-warning resendOtpText"  onclick="reSendOtp2()" style="font-weight:bolder;"> Resend OTP </a>
                  <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time2">01:00</span> </a>
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
<!--  New User Authentication for request_callback -->
<div class="modal fade" id="reqCBLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mobile Verification</h5>
                <button type="button" class="close closePack" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="modal-body" method="post" id="reqCBLoginForm" action="javascript:void(0)">
                {{ csrf_field() }}
                <div class="row">
                <div class="col-lg-12 p-0">
                  <div class="row">
                    <div class="col-lg-12 bg-light py-4 px-4">
                      <h4 class="text-center">LOG IN</h4>
                        <hr class="orange-line">
                        <div class="form-group mb-4 mt-3" id="outerLeadMobile">
                    </div>
                    <div class="d-none text-light" id="requestMobiError"></div>
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" placeholder="Enter OTP" id="leadOtp" name="leadOtp">
                    </div>
                    @if (Auth::check())
                      <input type="hidden" name="isUserLoggedIn" class="form-control" id="isUserLoggedIn" value="true" >
                    @else
                      <input type="hidden" name="isUserLoggedIn" class="form-control" id="isUserLoggedIn" value="false" >
                    @endif
                    <div class="d-none text-light" id="requestOtpError"></div>

                    <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                              <a class="text-warning resendOtpText" id="resendOtpHome" style="font-weight:bolder;"> Resend OTP </a>
                              <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time3">01:00</span> </a>
                          </div>

                    <div class="form-group mb-3 otp-btn ">
                      <button type="button" class="btn btn-secondary btn-block" id="verifyReqCBLogin">Verify Number</button>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
             </form>
        </div>
      </div>
    </div>
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
            <input id="mobile1" type="tel" class="form-control" maxlength="10" pattern="[0-9]{10}" name="mobile1" required autofocus placeholder="Mobile Number" onkeyup="nospaces(this)">
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
@stop

<script>

    function sendLeadOtp() {
    // console.log("Checii---"+$('#mobile1').val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax( {
        url:'leadOtp',
        type:'post',
        data: {'mobileNumber': $('#mobile1').val()},
        // alert(data);
        success:function(data,status,xhr) {
          if(xhr.status==200) {
          localStorage.setItem("otp", xhr.responseText);
              $('.otp-block').show();
              $('.login-btn').show();
              $('.otp-btn').hide();
              $('.resendOtpDiv').removeClass('d-none');
              $('.resendOtpText').css('cursor','not-allowed');
              $('.resendOtpText').css('pointer-events','none');
              // var fiveMinutes = 60 * 1,
              var display2 = document.querySelector('#time2');
              var timer2 = new CountDownTimer(30);
              timer2.onTick(format(display2)).start();

              function format(display) {
                return function (minutes, seconds) {
                  minutes = minutes < 10 ? "0" + minutes : minutes;
                  seconds = seconds < 10 ? "0" + seconds : seconds;
                  display.textContent = minutes + ':' + seconds;
                  // console.log("Check---"+seconds);
                  if(seconds == 0) {
                    $('.resendOtpTextTimer').addClass('d-none');
                    $('.resendOtpText').css('pointer-events','auto');
                    $('.resendOtpText').css('cursor','pointer');
                  }
                };
              }   
          }
          if(xhr.status==250) {
            swal(xhr.responseText, "", "warning");
          }
        },
        error:function () {
            // console.log('error');
        }
    });
  }
  

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
