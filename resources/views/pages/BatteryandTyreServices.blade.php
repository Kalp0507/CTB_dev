@extends('layouts.default')
@section('content')
	<div class="row mt-5">
		<div class="col-lg-12 px-5 ServiceNamesBlock">
			<div class="row">
        @foreach($service as $serv)
          @if($serv->id == 1)
            <div class="col-lg-2 col-md-4  col-sm-2 col-sm-2 pr-1 pl-2 ServiceNames">
              <a href="/PeriodicServices">
              <div class="text-center py-4 px-3 rounded shadow serviceBlock" >
                <img src="{{ URL::to('/') }}/images/Group 959.png" style="width:50px;height: 50px" alt="...">
                <h6 class="blueColor pt-3" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
              </div>
              </a>
            </div>
          @elseif($serv->id == 2)
            <div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
                  <a href="/accidentalRepair" id='linkToAccidentalRepair' >
                    <div class="text-center py-4 px-3 rounded shadow serviceBlock">
                      <img src="{{ URL::to('/') }}/images/Group 969.png" style="width:50px;height: 50px" alt="...">
                      <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
                    </div>
                  </a>
            </div>
          @elseif($serv->id == 3)
            <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
              <a href="/mechanicalRepairServices" id="Mechanical Repair">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock">
                  <img src="{{ URL::to('/') }}/images/Group 977.png" style="width:50px;height: 50px" alt="...">
                  <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
                </div>
              </a>
            </div>
          @elseif($serv->id == 4)
            <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
              <a href="/ACRepairServices" id="AC Servicing">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock">
                  <img src="{{ URL::to('/') }}/images/Group 1000.png" style="width:50px;height: 50px" alt="...">
                  <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
                </div>
              </a>
            </div>
          @elseif($serv->id == 5)
            <?php $currentService = $serv->displayName  ?>
            <div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
              <a href="/BatteryAndTyre" id="Battery and Tyres">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
                  <img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
                  <h6 class="textYellow pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
                </div>
              </a>
            </div>
          @elseif($serv->id == 6)
            <div class="col-lg-2 col-md-4 col-sm-2 pr-2 pl-1 ServiceNames">
              <a href="/upkeepServ" id="Unpeak Services">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock">
                  <img src="{{ URL::to('/') }}/images/Group 1013.png" style="width:50px;height: 50px" alt="...">
                  <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
                </div>
              </a>
            </div> 
          @endif
        @endforeach
        <!-- <div class="col-lg-2 col-md-4 col-sm-2 pr-1 pl-2 ServiceNames">
          <a href="PeriodicServices">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock">
            <img src="{{ URL::to('/') }}/images/Group 959.png" style="width:50px;height: 50px" alt="...">
            <h6 class="blueColor pt-3" style="font-weight: bolder;font-size: 1rem;"> Periodic Maintainance </h6>
          </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
          <a href="/accidentalRepair" id='linkToAccidentalRepair' >
            <div class="text-center py-4 px-3 rounded shadow serviceBlock">
              <img src="{{ URL::to('/') }}/images/Group 969.png" style="width:50px;height: 50px" alt="...">
              <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Accidental Repair </h6>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
          <a href="/mechanicalRepairServices" id="Mechanical Repair">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock">
            <img src="{{ URL::to('/') }}/images/Group 977.png" style="width:50px;height: 50px" alt="...">
            <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Mechanical Repair </h6>
          </div>
        </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-2 col-sm-2 px-1 ServiceNames">
          <a href="/ACRepairServices" id="AC Servicing">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock">
            <img src="{{ URL::to('/') }}/images/Group 1000.png" style="width:50px;height: 50px" alt="...">
            <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> AC Servicing </h6>
          </div>
        </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
          <a href="/BatteryAndTyre" id="Battery and Tyres">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
            <img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
            <h6 class="textYellow pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Battery and Tyres </h6>
          </div>
        </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-2 pr-2 pl-1 ServiceNames">
          <a href="/upkeepServ" id="Unpeak Services">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock">
            <img src="{{ URL::to('/') }}/images/Group 1013.png" style="width:50px;height: 50px" alt="...">
            <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Upkeep Services </h6>
          </div>
        </a>
        </div> -->
        
      </div>
		</div>
	</div>

    <div class="row mt-5">
    <div class="col-lg-12 px-5">
      <p style="font-weight: bolder;color: #121A7F;font-size: 1.8rem">Our Services  <i class="fas fa-angle-right mx-2" style="color:#F5E72E;"></i><span style="font-size: 1.5rem;">{{$currentService}}</span></p>
    </div>
  </div>

	<!-- <div class="row mt-3 px-5 servicesParentDiv"> -->

   <!--  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 col-12 servicesParentDiv1 hideForTablet" style="display: flex;">
      <div class="row justify-content-around">
          <h3 class="text-color seasonal-heading col-md-12 text-center mt-md-2 mb-md-3" style="margin-top:1.1rem;margin-bottom:0.5rem; font-size: 24px; font-weight: bold; text-align: left;">Seasonal Offers</h3>
          @foreach($seasonal as $season)
            <div class="mb-3">
              <a href="javascript:void(0)" onclick="ServicePageRedirection(this)" id="{{$season->serviceToRedirectId}}"  class="col-lg 12 col-md-5 col-sm-12 col-xs-12 rounded-30 d-flex season-background mt-2" style="padding-left: 0px; padding-right: 0px;background-image: url('../images/seasonal/{{ $season->seasonal_background_image }}') ">
                  <div class="d-flex season-background-inner col-lg 12" style="background-color: rgb(13 13 13 / 0.3); border-radius: 8px;padding-left: 20px; padding-right: 20px; justify-content: flex-start; padding-top: 3em; padding-bottom: 3em;">
                   <img src="{{ URL::to('/') }}/images/seasonal/{{ $season->seasonal_icon}}" style="max-width:50px;" alt="{{ $season->seasonal_icon}}">
                   <h5 class="text-light" style="font-size: 1.5rem; font-weight: bold;align-self: center;margin: 0px 0px 0px 20px;">{{ $season->seasonal_title }}</h5>
                  </div>
              </a>
              
            </div>
          @endforeach
      </div>     
    </div> -->
<!--     <div class="col-md-12 onlyForTablet" style="display: none">
      <div class="row justify-content-around">
        <h3 class="text-color seasonal-heading col-md-12 text-center mt-md-2 mb-md-3" style="margin-top:1.1rem;margin-bottom:0.5rem; font-size: 24px; font-weight: bold; text-align: left;">Seasonal Offers</h3>
         @foreach($seasonal as $season)
        <a class="col-md-5 rounded-30 season-background mt-2" href="javascript:void(0)" onclick="ServicePageRedirection(this)" id="{{$season->serviceToRedirectId}}" style="padding-left: 0px; padding-right: 0px;background-image: url('../images/seasonal/{{ $season->seasonal_background_image }}') ">
          <div class="d-flex season-background-inner col-lg 12" style="background-color: rgb(13 13 13 / 0.3); border-radius: 8px;padding-left: 20px; padding-right: 20px; justify-content: flex-start; padding-top: 2em; padding-bottom: 2em;">
                   <img src="{{ URL::to('/') }}/images/seasonal/{{ $season->seasonal_icon}}" style="max-width:50px;" alt="{{ $season->seasonal_icon}}">
                   <h5 class="text-light" style="font-size: 1.2rem; font-weight: bold;align-self: center;margin: 0px 0px 0px 20px;">{{ $season->seasonal_title }}</h5>
                  </div>
          
        </a>
        @endforeach
      </div>
      
    </div> -->

		<div class="col-lg-12 col-md-12 col-12 mobileServicesForm servicesParentDiv2" style="padding: 0px 10em;">
      <form method="post" id="batteryForm" action="javascript:void(0)" class="formBackground p-4">
        @csrf
  			<div class="row shadow-lg p-4 batteryContainer">

          @if(session()->has('message'))
                <div class="alert alert-success">
                    <!-- {{ session()->get('message') }} -->
                    @if(session()->get('message') == 'Request Submitted')
                      {{ session()->get('message') }}
                    @endif
                </div>
            @endif

  				<div class="col-lg-3 form-group width-33">
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
            <!-- <select class="js-example-basic-single form-control-lg form-control" name="brands" id="brandSelect">
              @isset($brandId))
                <option selected class="brandCont" id="make-{{$brandId}}" value="{{$brandId}}">{{$brand}}</option>

                @foreach($brandData as $make)
                  @if($make->id != $brandId)
                    <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                  @endif
                @endforeach
              @else
                <option>Make</option>
                @foreach($brandData as $make)
                  <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                @endforeach
              @endisset
            </select> -->
            <div class="d-none text-danger" id="requestMakeError"></div>
  				</div>
  			
  				<div class="col-lg-3 form-group mobileModelFieldDiv width-33">
            <!-- <select class="js-example-basic-first form-control form-control-lg modelSelect battModelSelect" id="modelSelect" name="models">
                <option  value="0" selected disabled>Model</option> 
                @isset($modelId)
                  <option id="model-{{$modelId}}" value="{{$modelId}}">{{$model}}</option>
                @endisset

            </select> -->
            <select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
              @if(session()->has('modelName'))
                <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>
              @else
                <option id="" value="">Select Model</option>
              @endif
            </select>
            <div class="d-none text-danger" id="requestModelError"></div>

          </div>
  				<div class="col-lg-3 col-12 form-group width-33">
            <select class="js-example-basic-second form-control form-control-lg fuelSelect battFuelSelect" id="fuelSelect">
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
            <!-- <select class="js-example-basic-second form-control form-control-lg fuelSelect battFuelSelect" id="fuelSelect" name="fuels">
                <option  value="0" selected disabled>Fuel</option> 
                @isset($fuelId)
                <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                @endisset
            </select> -->
            <div class="d-none text-danger" id="requestFuelError"></div>

          </div>

          <div class="col-lg-3 form-group width-100">
            <select class="form-control form-control-lg batteryPartSelect" id="batteryPartSelect" name="batteryPartSelect">
                <option value="" selected hidden>Battery OR Tyre</option>
                <option value="0">Battery</option>
                <option value="1">Tyre</option>
            </select>
            <div class="d-none text-danger" id="requestPartSelectError"></div>

          </div>

          <!-- <div class="col-lg-12 form-group multiple-select-height batteryPartSelectDiv">
            <select class="selectpicker selectParts form-control form-control-lg partSelect" multiple data-live-search="true" id="partSelect" name="partSelection[]">
                <option value="0">Select Part</option>                 
            </select>
            <div class="d-none text-danger" id="requestPartError"></div>
            <div class="PartNamePrice"></div>
          </div> -->

          <div class="col-lg-10 partCheckbox" >
            <!--<label class="">Didn't find the battery or tyre you are looking for? Click here to submit request: &nbsp;&nbsp;-->
            <!--<input name="batteryCheckbox" type="checkbox" id="batteryCheckbox"></label>-->
            
            <label class="">Please share additional details:</label>
          </div>
          
          <input type="hidden" name="serviceType" value="Battery and Tyres" id="serviceType">
          <input type="hidden" name="batteryPartFound" id="batteryPartFound" class="batteryPartFound" value="true" />

          <input type="hidden" name="savedBrandId" value="" id="savedBrandId">
          <input type="hidden" name="savedBrandName" value="" id="savedBrandName">

          
          <div class="col-lg-6 form-group">
            <!--  @if (Auth::check())
              <input type="tel" name="mobile1" class="form-control form-control-lg" id="mobile1" value="{{Auth::user()->mobile}}" disabled>
              <input type="hidden" name="mobile1" value="{{Auth::user()->mobile}}">

            @else
              <input type="tel" name="mobile1" class="form-control form-control-lg" id="mobile1" placeholder="Enter Mobile Number">
              <div class="d-none text-danger" id="requestMobileError"></div>
            @endif -->
            @if (Auth::check())
              <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="true" >
              <input type="hidden" name="mobile1" id="mobile1" value="{{ Auth::user()->mobile }}" >

            @else
              <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="false" >
            @endif
          </div>
           
                
          <div class="col-lg-12 form-group width-100">
            <textarea placeholder="Remark" rows="4" id="batteryRemark" name='batteryRemark' class="form-control form-control-lg batteryRemark" style="border:1px solid #121A7F"></textarea>
            <div class="d-none text-danger" id="requestBatteryRemarkError"></div>
          </div>
          <div class="col-lg-12 form-group d-none batteryQueryDiv width-100">
             @if (!Auth::check())
            <input type="text" name="mobile1" maxlength="10" pattern="[0-9]{10}" id="mobile1" class="form-control form-control-lg my-2" placeholder="Enter Mobile" onkeyup="nospaces(this)">
            <div class="d-none text-danger" id="requestMobileError"></div>
              
            @endif
            <!-- <textarea placeholder="Enter Your Query." rows="4" id="batteryQuery" name='batteryQuery' class="form-control form-control-lg batteryQuery" style="border:1px solid #121A7F"></textarea>
            <div class="d-none text-danger" id="requestBatteryQueryError"></div> -->
          </div>

  				<div class="col-lg-12 mt-3" style="display: flex; align-items: center;">
  					<div class="form-group m-0 col-lg-3 m-auto" style="padding-left: 0px;">
              <button type="submit" id="batteryTyreCheckout"  class="btn btn-md btn-block home-banner-button text-light batteryTyreCheckout font-weight-bold" style="padding:10px 0px;"> Submit </button>
  						<button type="submit" id="batterySubmitRequest"  class="btn btn-md btn-block home-banner-button text-light batterySubmitRequest d-none font-weight-bold" style="padding:10px 0px;">Submit</button>
  					</div>
  				</div>
  			</div>
      </form>
		</div>
	<!-- </div> -->

  <div class="modal fade" id="estimateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header blueButton"  id="authLoginTitle">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-light" aria-hidden="true">&times;</span>
        </button>
      </div>
        <form>
          <div class="modal-body">
            <div class="row mt-5">
              <div class="col-lg-6 px-5" id="estimateData">
                <div id="estimateAppendMake"></div><br/>
                <div id="estimateAppendModel"></div><br/>
                <div id="estimateAppendFuel"></div><br/>
              </div>
              <div class="col-lg-6 px-5 estimateDiv" id="selectedP">
                <h4 style="font-weight: bold;">Selected Parts: <span id="estimatePrice"></span></h4>
                <div id="message"></div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-lg-6 px-5 estimateDiv" id="estimatedTotalPrice">
              </div>
              <div class="col-lg-4"></div>
            <div class="col-lg-2">
              <button type="button" id="closeEstimate" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>    
  </div>
	

<h2 class="heading-text text-center pt-5 pb-3">Popular Services</h2>
    <div class="variable-width slider new-slider mt-3 addonSlider">
  @foreach($addons as $addon)
            <div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 addon-columns">
                    <div class="card  shadow-lg" style="width: 450px;height: 250px;border:0px;margin:10px 0px 10px 0px;">
                        <div class="card-image d-flex">
                            <img src="{{ URL::to('/') }}/images/addons/{{$addon->addon_icon}}" style="width:229px;height: 100% " alt="...">
                                <div class="card-content  p-4" style="width: 220px;">
                                 <h4 class="card-title blueColor" style="font-size:1.3rem;font-weight: bolder;text-transform: uppercase;"> {{$addon->addon_name}}</h4>
                                 <p style="font-size: 14px; display: block; display: -webkit-box; max-width: 100%; height: 60px; margin: 0 auto;-webkit-line-clamp: 3;-webkit-box-orient: vertical;  overflow: hidden; text-overflow: ellipsis;">{{$addon->addon_description}}</p>
                                 <div class="form-group px-1 pb-4 mb-0" style="/*position: absolute;bottom: 8px; width: 35%;*/">
                                     @if (Auth::check())
                                      <button type="submit" class="btn btn-block orangeButton AddonServices font-weight-bold" id="{{$addon->id}}"  data-addId="{{$addon->id}}" style="color:black; padding: 10px 0px;">Buy</button>
                                    @else
                                      <button type="submit" class="btn btn-block orangeButton AddNewUser font-weight-bold" id="{{$addon->id}}" data-addId="{{$addon->id}}" style="color:black; padding: 10px 0px;">Buy</button>
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

 <div class= "row w-100 testimonial-block testimonial-block-other pt-5 pb-5">
    <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 row" style="background-image: url({{ URL::to('/') }}/images/google-hangouts-logo.png); background-repeat: no-repeat; background-size: 120px; background-position: right top; align-items: center;margin: 20px 0px 0px 0px;">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <h1 style="font-weight: 1000;color:#121A7F;">CLIENT TESTIMONIAL</h1>
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
   


<!-- Modal for package details-->
<!-- <div class="modal fade" id="packModel" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form>
    	  <div class="modal-body">
        	<div class="row">
  					<div class="col-lg-12 my-2">
  						<div class="pt-4 px-3">
  							<div class="row">
  								<div class="col-lg-9 p-0">
  		  						<h6 style="font-size: 0.9rem;font-weight: bolder;color:#121A7F;" id="modalPackName"></h6>
                     <span class="d-none pack_id" id="pack_id"></span>
  								</div>
  								<div class="col-lg-3 text-right">
  									<h5  style="color:#121A7F;">$<span id="totalPrice" style="text-decoration-line: line-through; font-weight: 100;margin-left: 0px; font-size: 1rem;"></span>  $<span id="discountedPrice"></span></h5>
  								</div>
  							</div>
  			   			<h6 id="briefDesc" style="font-size: 0.7rem;" class="text-warning"></h6>
  						  <ul class="pl-0">
  						    <div class="row">
  								  <div class="col-lg-11">
  								    <div class="row" id="serviceLists">
  								    </div>
  								  </div>
  						    </div>
  						  </ul>
  						  <div class="row align-items-center">
  						    <div class="col-lg-2">
  								  <h6 class="bg-dark px-3 py-1 m-0 text-center text-light" style="font-size: 14px;"><span id="serviceTime">2</span> hours </h6>
  				        </div>
  				      </div>
  							<div class="border border-warning border-right-0 border-left-0 mt-3">
  								<h6 class="m-0 py-2 text-right" >TOTAL &nbsp;&nbsp;&nbsp;$<span id="packageTotalPrice"></span></h6>	
  							</div>
  				    </div>	
  				  </div>
  		    </div>
          <div id="allData">
            
          </div>
  		    <div class="modal-footer border-0 justify-content-between" id="NewPack">
  					<a style="font-weight: bold;font-size: 15px;color:#121A7F" href="javascript:void(0)" onclick="addNewPackage()">ADD PACKAGE</a>
  				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#checkout">CHECKOUT</button>
  				</div>
      	</div>
        </form>
  	</div>
	</div>
</div> -->

<!-- Add new package modal -->

<!-- <div class="modal fade" id="addNewPack" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-body">
            <div id="checkoutCart" style="max-height: 50vh;overflow-y: auto;">
              
            </div>
            <div class="modal-footer border-0 justify-content-between">
              <button type="button" class="btn text-light blueButton text-bold" onclick="checkout(this)">BOOK SERVICE</button>
              <a href="{{ url('services') }}" class="btn text-light blueButton text-bold" >ADD OTHER SERVICE</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->

<!-- Modal for checkout details-->
<!-- <div class="modal fade payment" id="payment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form id="registerSubmit"  action="/" name="checkoutForm">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 my-2">
              <div class="pt-4 px-3">
                <div class="row formResponsiveTabletandMobile">
                  <div class="col-lg-6 view_for_mobile1">
                    <div>
                      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  LOGIN/VERIFICATION</span>
                    </div>
                    <div class="form-group mb-4" id="mobileBlock" style="padding:0px 15px 0px 35px;">
                      <input type="tel" name="mobileVerification" id="mobileVerification" value="" class="form-control" >
                    </div>
                    @if (!Auth::check())
                      <div>
                        <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  NAME</span>
                      </div>
                      <div class="form-group mb-4" id="nameBlock" style="padding:0px 15px 0px 35px;">
                        <input type="text" name="name" id="name" value="" class="form-controlf form-control-lg" >
                      </div>
                    @endif

                    @if (Auth::check())
                      @if (!Auth::user()->email)
                        <div>
                          <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  EMAIL</span>
                        </div>
                        <div class="form-group mb-4" id="emailBlock"  style="padding:0px 15px 0px 35px;">
                          <input type="email" name="email" id="email"  class="form-control form-control-lg checkoutEmail" value="">
                        </div>
                      @else
                        <input class="hiddenEmail" type="hidden" name="hiddenEmail" id="hiddenEmail" value="{{Auth::user()->email}}">
                      @endif
                    @else
                      <div>
                        <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  EMAIL</span>
                      </div>
                      <div class="form-group mb-4" id="emailBlock"  style="padding:0px 15px 0px 35px;">
                        <input type="email" name="email" id="email"  class="form-control form-control-lg checkoutEmail" value="">
                      </div>
                    @endif

                    <div>
                      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  APPOINTMENT DATE</span>
                    </div>
                    <div class="form-group mb-2" style="padding:0px 15px 0px 35px;">
                      <input type="date" class="form-control form-control-lg" id="pickupDate" name="pickupDate" placeholder="Pickup Date">
                      <div class="d-none text-danger" id="pickupdate"></div>
                    </div>
                    <div class="form-group mb-4 mb-2" style="padding:0px 15px 0px 35px;">
                      <input type="time" class="form-control form-control-lg" id="pickupTime" name="pickupTime" placeholder="Time of Pickup" required>
                      <div class="d-none text-danger" id="pickuptime"></div>
                    </div>
                    <div>
                      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  VEHICLE NO.</span>
                    </div>
                    <div class="form-group mb-4 mb-2" style="padding:0px 15px 0px 35px;">
                      <input type="text" class="form-control form-control-lg" id="carNumber" name="carNumber" placeholder="Eg. MH12 A1234" required>
                    <div class="d-none text-danger" id="carNumberErr"></div>
                  </div>
                   <div>
                      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  PICKUP LOCATION/ADDRESS</span>
                    </div>
                    <div class="form-group green-border-focus" style="padding:0px 15px 0px 35px;">
                     @if (Auth::check())
                        @if(isset(Auth::user()->address))
                          <textarea class="form-control rounded-0" id="location" name="location" rows="3" required>{{ Auth::user()->address }}</textarea>
                        @else
                          <textarea class="form-control rounded-0" id="location" name="location" rows="3" required></textarea>
                        @endif
                      @else
                          <textarea class="form-control rounded-0" id="location" name="location" rows="3" required></textarea>
                      @endif
                    <div class="d-none text-danger" id="pickuplocation"></div>

                    </div>
                    <div>
                      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  SELECT PAYMENT OPTIONS</span>
                      <div class="d-none text-danger" id="paymentType"></div>

                    </div>
                    <div style="padding:0px 15px 0px 35px;">
                      <span class="btn btn-outline-dark" onclick="onlineCheckout()">Online</span>
                      <span class="btn btn-outline-dark" onclick="offlineCheckout()">At Garage</span>
                    </div>
                  </div>
                  <div class="col-lg-6 p-0 view_for_mobile2">
                    <div class="shadow px-4 pb-5">
                      <h4 class="text-center mb-5 mt-4">BILL DETAILS</h4>
                      <div class="row" id="packageCheckout" style="max-height: 20vh;overflow-y: auto;"></div>
                      <div class="row py-2">
                        <span class="col-lg-12 p-0">Promo Code</span> 
                        <div class="col-lg-7 col-md-7 col-7 p-0">
                          <input type="text" name="promo" id="promo" class="form-control" placeholder="eg. MCM20">
                        </div>
                        <div class="col-lg-5 col-md-5 col-5 pr-0">
                          <input type="button" class="btn btn-warning btn-block text-light"  name="verify" value="check"></div>
                        </div>
                      <div class="border border-warning border-right-0 border-left-0 mt-3" id="finalAmount"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> -->
<!-- Modal for checkout details Ends-->


<!-- Modal for checkout details-->
<!-- <div class="modal fade payment" id="payment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form id="registerSubmit"  action="/" name="checkoutForm">
        <div class="modal-body">
          <div class="row">
		        <div class="col-lg-12 my-2">
				      <div class="pt-4 px-3">
                <div class="row">
						      <div class="col-lg-6">
                    <div>
								      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  LOGIN/VERIFICATION</span>
                  	</div>
                    <div class="form-group mb-4" id="mobileBlock">
							    	  <input type="tel" name="mobileVerification" id="mobileVerification" value="" class="form-control">
                    </div>


                    @if (!Auth::check())
                      <div>
                        <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  NAME</span>
                      </div>
                      <div class="form-group mb-4" id="nameBlock">
                        <input type="text" name="name" id="name" value="" class="form-control">
                      </div>
                    @endif

                    @if (!Auth::check())
                      <div>
                        <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  EMAIL</span>
                      </div>
                      <div class="form-group mb-4" id="emailBlock">
                        <input type="text" name="email" id="email" value="" class="form-control">
                      </div>
                    @endif


                    @if (Auth::check())
                      <input type="hidden" name="hiddenEmail" id="hiddenEmail" value="{{Auth::user()->email}}">
                    @endif

                    <div>
								      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  APPOINTMENT DATE</span>
                    </div>
                    <div class="form-group mb-2">
							    	  <input type="date" class="form-control" id="pickupDate" name="pickupDate" placeholder="Pickup Date">
                      <div class="d-none text-danger" id="pickupdate"></div>
                    </div>
                    <div class="form-group mb-4">
							    	  <input type="time" class="form-control" id="pickupTime" name="pickupTime" placeholder="Time of Pickup" required>
                      <div class="d-none text-danger" id="pickuptime"></div>
                    </div>
                    <div>
								      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  PICKUP LOCATION/ADDRESS</span>
                    </div>
                    <div class="form-group green-border-focus">
                      <p class="text-right mb-0" style="color: #121A7F;"><i class="fas fa-circle"></i><a style="font-size: 12px; font-weight: bold;color: #121A7F;" href="#"> DELECT MY LOCATION</a></p>
                      <textarea class="form-control" id="location" name="location" rows="3" required></textarea>
                      <div class="d-none text-danger" id="pickuplocation"></div>
                    </div>
                    <div>
                      <i class="fas fa-square fa-2x text-warning"></i><span style="vertical-align: super;">  SELECT PAYMENT OPTIONS</span>
                      <div class="d-none text-danger" id="paymentType"></div>

                    </div>
                    <span class="btn btn-outline-dark online">Online</span>
                    <span class="btn btn-outline-dark garage" onclick="Garage()">At Garage</span>
                  </div>

                  <div class="col-lg-6 p-0">
                    <div class="shadow px-4 pb-5">
                      <h4 class="text-center mb-5 mt-4">BILL DETAILS</h4>
                      <div class="row" id="packageCheckout" style="max-height: 15vh;overflow-y: auto;"></div>
                      <div class="row py-2">
                        <span class="col-lg-12 p-0">Promo Code</span> 
                        <div class="col-lg-7 p-0">
                          <input type="text" name="promo" id="promo" class="form-control" placeholder="eg. MCM20">
                        </div>
                        <div class="col-lg-5 pr-0">
                          <input type="button" class="btn btn-warning btn-block text-light"  name="verify" value="check"></div>
                        </div>
                      <h6 class="m-0" style="font-size: 12px; font-weight: bold;">Any special remarks/suggetions..</h6>
                      <textarea class="form-control" id="specialRemark" name="specialRemark" rows="3"></textarea>
                      <div class="border border-warning border-right-0 border-left-0 mt-3" id="finalAmount">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0">
            <h2>
              <a href="javascript:void(0)" class="text-warning" style="font-weight:bolder;"  id="finalCheck"> CHECKOUT </a>
            </h2>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> -->


<!-- Addon Modal -->
@foreach($addons as $addon)
  <div class="modal fade" id="AddonModalData-{{$addon->id}}" tabindex="-1" role="dialog" aria-labelledby="AddonModalDataTime" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" id="AddonTitleBox">
          <h5 class="modal-title" id="AddonModalDataTime">{{$addon->addon_name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="AddonModalDescription">
          {{$addon->addon_description}}
                <span class="d-none addon_id" id="addon_id">{{$addon->id}}</span>   

        </div>
        <div class="modal-footer justify-content-between" id="PriceBox">
          <h5>$ <span id="addon_price">{{$addon->addon_price}}</span></h5>
          <button type="button" class="btn blueButton text-light" id="addons" onclick="addNewAddon(this)" data-id="{{$addon->id}}" data-price="{{$addon->addon_price}}">Add Package</button>
        </div>
      </div>
    </div>
  </div>
@endforeach


<!-- Modal -->
<div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="servicesModalTitle">Modal title</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="javascript:void(0)" id="servicesForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="column pr-5">
                        <div class="form-group pr-5">
                            <label>Select Make:*</label>
                            <div class=">
                                <select class="js-example-basic-single form-control-lg form-control" name="brands" id="brandSelection">
                                    <option value="">Make</option>
                                    @isset($brandId))
                                      <option selected class="brandCont" id="make-{{$brandId}}" value="{{$brandId}}">{{$brand}}</option>

                                      @foreach($brandData as $make)
                                        @if($make->id != $brandId)
                                          <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                        @endif
                                      @endforeach
                                    @else
                                      <option>Make</option>
                                      @foreach($brandData as $make)
                                        <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                      @endforeach
                                    @endisset
                                    
                                </select>
                                <div class="d-none" id="brandError"></div>
                            </div>
                            
                        </div>

                        <div class="form-group pr-5">
                            <label>Select Model:*</label>
                            <div class=">
                                <select name="models" class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelection">
                                    @isset($modelId)
                                      <option id="model-{{$modelId}}" value="{{$modelId}}">{{$model}}</option>
                                    @endisset
                                </select>
                                <div class="d-none" id="modelError"></div>
                            </div>
                        </div>

                        <div class="form-group pr-5">
                            <label>Select Fule Type:*</label>
                            <div class=">
                                <select name="fuels" class="js-example-basic-first form-control form-control-lg fuelSelect" id="fuelSelection">
                                    @isset($fuelId)
                                      <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                                    @endisset 
                                </select>
                              <div class="d-none" id="fuelError"></div>
                            </div>
                        </div>

                        <div class="form-group pr-5">
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
                            <div class="d-none" id="usernameError"></div>
                        </div>

                        <div class="form-group pr-5">
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
                            <div class="d-none" id="mobileError"></div>

                        </div>
                        <input name="selectedService" type="hidden" class="form-control" id="selectedService" value="Battery & Tyres" aria-describedby="selectedServiceHelp" >
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn text-light blueButton" id="submitServicesFormBtn2">Request Callback</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- <div class="modal fade" id="batteryLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mobile Verification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" method="post" id="estimate_form" action="javascript:void(0)">
        {{ csrf_field() }}
        <div class="row">
        <div class="col-lg-12 p-0">
          <div class="row">
            <div class="col-lg-12 bg-light py-4 px-4">
              <h4 class="text-center">LOG IN</h4>
                <hr class="orange-line">
                <div class="form-group mb-4 mt-3" id="outerLeadMobile"></div>
                  <div class="d-none text-light" id="requestMobiError"></div>
                  <div class="form-group mb-4">
                    <input type="text" class="form-control" placeholder="Enter OTP" id="estimateOtp" name="estimateOtp">
                  </div>
                  <div class="d-none text-light" id="requestOtpError"></div>

                  <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                      <a class="text-warning resendOtpText" id="resendOtpHome" style="font-weight:bolder;"> Resend OTP </a>
                      <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time2">01:00</span> </a>
                  </div>
                  <div class="form-group mb-3 otp-btn">
                    <button type="button" class="btn btn-secondary btn-block" id="verifyEstimate">Verify Number</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
 -->

<!-- Login Modal -->
  <div class="modal fade" id="accLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header blueButton">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Mobile Verification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="form2" class="" enctype="multipart/form-data" style="padding: 2em;">
          @csrf
          <h4 class="text-center">LOG IN</h4>
          <hr class="orange-line">
          <h5>Enter your Mobile Number</h5>
          <div class="form-group mb-4 mt-3">
            <input id="mobilenum1" type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" value="" name="mobile" required autofocus placeholder="Mobile Number" onkeyup="nospaces(this)">
          </div>
          <div class="hideData"></div>
          <div class="form-group mb-4 otp-block">
              <input id="otpVal" type="number" name="otp"class="form-control" value="" placeholder="Enter OTP">
          </div> 
          
          <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
            <a class="text-warning resendOtpText" onclick="reSendOtpBat()" style="font-weight:bolder;"> Resend OTP </a>
            <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="timeBat">01:00</span> </a>
          </div>

          <div class="form-group mb-3 login-btn" >
            <button type="button" id="loginBtn" onclick="checkOtpBat()" class="btn btn-secondary btn-block">LOG IN</button>
          </div>
          <div class="form-group mb-3 otp-btn">
              <button type="button" onclick="sendLeadOtpBat()" class="btn btn-secondary btn-block">SEND OTP</button>
            </div>

        </form>
    </div>
  </div>
</div>

<!-- Ends -->


<!-- Add new package modal -->

<!-- <div class="modal fade" id="addNewPack" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
           <div class="modal-header blueButton">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Mobile Verification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <div id="checkoutCart" style="max-height: 50vh;overflow-y: auto;">
          
        </div>
        <div class="modal-footer border-0 justify-content-between">
          <button type="button" class="btn text-light blueButton"onclick="checkout(this)">CHECKOUT</button>
        </div>
      </div>
    </div>
  </div>
</div>
 -->
<!-- Battery Tyre Modal -->
  
<div class="modal fade" id="batteryTyreModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
       <div class="modal-header blueButton">
        <h3 class="font-weight-bold text-white"></h3>
          <button type="button" class="close closePackage" data-battery="{{Auth::check() ? 'true':'false'}}" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <div id="batteryTyreDiv" style="/*max-height: 80vh;overflow-y: auto;*/">
          
        </div>
        <div class="modal-footer border-0 justify-content-between">
          <a href="{{ url('services') }}" class="btn text-light blueButton text-bold" >ADD OTHER SERVICE</a>
          <button class="btn text-light blueButton text-bold" data-dismiss="modal" aria-label="Close">Didn't find part</button>
          <button type="button" id="batteryCheckoutBtn" class="btn text-light blueButton" onclick="checkout(this)">CHECKOUT</button>

        </div>
      
        <div class="modal-footer border-0">
          <button type="button" class="btn text-light blueButton d-none hideBatteryModal" onclick="hideBatteryModal(this)">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>
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
<!-- <div class="modal fade" id="authLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header blueButton"  id="authLoginTitle">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
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
                  <a class="text-warning resendOtpText" onclick="reSendOtp3()" style="font-weight:bolder;"> Resend OTP </a>
                  <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time3">01:00</span> </a>
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
@stop

<!--  -->
<script>
  var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";

  function sendLeadOtpBat() {
    // console.log("Checii---"+$('#mobilenum1').val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax( {
        url:'leadOtp',
        type:'post',
        data: {'mobileNumber': $('#mobilenum1').val()},
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
              var display2 = document.querySelector('#timeBat');
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

  function checkOtpBat() {
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

  function reSendOtpBat() {
  $.ajax( {
    url:'leadOtp',
    type:'post',
    data: {'mobileNumber': $('#mobilenum1').val()},
    // alert(data);
    success:function(data,status,xhr) {
      if(xhr.status==200) {
        localStorage.setItem("otp", xhr.responseText);
          $('.otp-block').show();
          $('.login-btn').show();
          $('.otp-btn').hide();
          $('.resendOtpTextTimer').removeClass('d-none');
          $('.resendOtpDiv').removeClass('d-none');
          $('.resendOtpText').css('pointer-events','none');
          $('.resendOtpText').css('cursor','not-allowed');

          // var fiveMinutes = 60 * 1,
          var display2 = document.querySelector('#timeBat');
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
</script>