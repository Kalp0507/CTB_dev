@extends('layouts.default')
@section('content')

<!-- our services block start  -->
    <div class="row w-100 our-services mt-5">
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <h4 class="px-4 mt-4 blueColor heading-text">Our Services</h4>
            <div class="row py-4">
                @foreach($service as $serv)
                    @if($serv->service_name == "Periodic Maintainance")
                        <a href="PeriodicServices" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
                            <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                                <img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}"  class="mb-3"style="max-width:80px;" alt="...">
                                <h3 class="blueColor titleBlock mb-4 mt-3" style="font-size: 25px;margin-top: 15px;font-weight:bold;">{{$serv->service_name}}</h3>
                            </div>
                        </a>
                    @elseif($serv->service_name == "Accidental Repair")
                        <a href="accidentalRepair" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
                            <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                                <img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}"  class="mb-3"style="max-width:80px;" alt="...">
                                <h3 class="blueColor titleBlock mb-4 mt-3" style="font-size: 25px;margin-top: 15px;font-weight:bold;">{{$serv->service_name}}</h3>
                            </div>
                        </a>
                    @elseif($serv->service_name == "AC Servicing")
                        <a href="/ACRepairServices" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
                            <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                                <img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}"  class="mb-3"style="max-width:80px;" alt="...">
                                <h3 class="blueColor titleBlock mb-4 mt-3" style="font-size: 25px;margin-top: 15px;font-weight:bold;">{{$serv->service_name}}</h3>
                            </div>
                        </a>
                    @elseif($serv->service_name == "Upkeep Services")
                        <a href="/upkeepServ" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
                            <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                                <img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}"  class="mb-3"style="max-width:80px;" alt="...">
                                <h3 class="blueColor titleBlock mb-4 mt-3" style="font-size: 25px;margin-top: 15px;font-weight:bold;">{{$serv->service_name}}</h3>
                            </div>
                        </a>
                    @elseif($serv->service_name == "Mechanical Repair")
                        <a href="/mechanicalRepairServices" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 px-3 changeBlock my-3" style="margin-right: 0px">
                            <div class= "shadow-lg py-3 px-4 rounded serviceBlock">
                                <img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}"  class="mb-3"style="max-width:80px;" alt="...">
                                <h3 class="blueColor titleBlock mb-4 mt-3" style="font-size: 25px;margin-top: 15px;font-weight:bold;">{{$serv->service_name}}</h3>
                            </div>
                        </a>
                        @elseif($serv->service_name == 'Battery and Tyres')
                <a href="BatteryAndTyre" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-our-service changeBlock mt-2 mb-4">
                        <div class= "border shadow-lg p-3 rounded serviceBlock" style="height:220px;">
                            <img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}" style="max-width:80px; border-radius: 20px; margin-bottom: 8px;" alt="...">
                            <h3 class="text-color titleBlock" style="font-size: 20px;margin-top: 15px;font-weight: bold">{{$serv->service_name}}</h3>
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 p-0">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                    <div class="brand p-1">
                        <div class="row text-center" id="brandData"></div>
                    </div>
                    <div class="models p-1">
                        <div class="row text-center" id="modelData"></div>
                    </div>
                    <div class="fuel p-1">
                        <div class="row text-center" id="fuelData"></div>
                    </div>
                    <div class="py-4 px-3 car-form shadow-lg" style="background-color: #F7CE46; border-radius: 10px; ">
                        <h2 class="text-center pb-3" style="font-weight: 1000; font-size: 24px; color:#182d54;" > SELECT YOUR CAR </h2>
                        <form>
                         
                            <div class="form-group px-3 car-dropdown">
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
                </div>
            <div class="row justify-content-around">
                
                <h3 class="text-color seasonal-heading col-md-12 mt-md-4 mb-md-2 p-0">Seasonal Offers</h3>
                 @foreach($seasonal as $season)
                <a href="javascript:void(0)" onclick="ServicePageRedirection(this)" id="{{$season->serviceToRedirectId}}"  class="col-lg 12 col-md-5 col-sm-12 col-xs-12 rounded-30 d-flex season-background" style="padding-left: 0px; padding-right: 0px;background-image: url('../images/seasonal/{{ $season->seasonal_background_image }}') ">
                    <div class="d-flex season-background-inner col-lg 12" style="background-color: rgb(13 13 13 / 0.3); border-radius: 8px;padding-left: 20px;">
                     <img src="{{ URL::to('/') }}/images/seasonal/{{ $season->seasonal_icon}}" style="max-width:40px;" alt="{{ $season->seasonal_icon}}">
                     <h5 class="text-light" style="font-size: 1.2rem; font-weight: bold;align-self: center;margin: 0px 0px 0px 20px;">{{ $season->seasonal_title }}</h5>
                    </div>
                </a>
                @endforeach
            </div>
    </div>
</div>

  <!-- our services block end  -->

  <!-- how it works block start  -->

        <div class="how-it-works w-100 pt-5">
        <h2 class="heading-text text-center pt-5">How It Works</h2>
        <div class= "row w-100 d-flex justify-content-center">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
                <img src="{{ URL::to('/') }}/images/Group1026.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
                <div>
                    <p class="font-weight-bold" style="font-size: 18px;">ENTER YOUR  CAR  DETAILS</p>
                    <p style="font-size: 14px; font-weight: 600;">Select the Make, Model and Fuel Type of your car. This helps us serve you better by displaying all the services curated specially for your car.</p>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 text-center p-0 align-self-center" style="margin-top: -30px">
                <img src="{{ URL::to('/') }}/images/linking.png" style="max-width:100px;margin:0px auto;" alt="...">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
                <img src="{{ URL::to('/') }}/images/Group1027.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
                <div>
                    <p class="font-weight-bold" style="font-size: 18px;">SELECT THE PERFECT CAR SERVICE’S</p>
                    <p style="font-size: 14px ;font-weight: 600;">Select one or more services from Car Trust Buddy’s broad selection of services available. You can also select other services from our special seasonal services and offers.  </p>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12  text-center p-0 align-self-center" style="margin-top: -30px">
                <img src="{{ URL::to('/') }}/images/linking2.png" style="max-width:100px;margin:0px auto;" alt="...">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
                <img src="{{ URL::to('/') }}/images/Group1028.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
                <div>
                    <p class="font-weight-bold" style="font-size: 18px;">GET QUOTE / MAKE PAYMENT</p>
                    <p style="font-size: 14px; font-weight: 600;">Tell us what your  car needs and we will perform diagnostics and provide you with a fair & transparent price quote. </p>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12  text-center p-0 align-self-center" style="margin-top: -30px">
                <img src="{{ URL::to('/') }}/images/linking.png" style="max-width:100px;margin:0px auto;" alt="...">
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

<div class= "row w-100 testimonial-block pt-5">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 row" style="background-image: url({{ URL::to('/') }}/images/google-hangouts-logo.png); background-repeat: no-repeat; background-size: 120px; background-position: right top; align-items: center;margin: 20px 0px 0px 0px;">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <h1 style="font-weight: 1000; color:#182d54;">CLIENT TESTIMONIAL</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pl-5">
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
                                            <span class="fa fa-star checked"></span>
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
   

	<h2 class="heading-text text-center pt-5 pb-3">Popular Services</h2>
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
            					       <button type="submit" class="btn btn-block blueButton text-light">Read More</button>
            					   </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        @endforeach
  
    </div>

@stop

<!-- Modal -->
<div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="dropdown-icon-disable">
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
                            <div class="dropdown-icon-disable">
                                <select name="models" class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
                                    <option value="">Model</option> 
                                </select>
                                <div class="d-none" style="color:red;" id="modelError"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Select Fule Type:*</label>
                            <div class="dropdown-icon-disable">
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
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn textYellow blueButton serviceModalBtnSize" id="submitServicesFormBtn">Request Callback</button>
                </div>
            </form>
        </div>
    </div>
</div>