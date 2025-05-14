@extends('layouts.default')
@section('content')
	<div class="row mt-5">
		<div class="col-lg-12 px-5 ServiceNamesBlock">
			<div class="row">
        @foreach($service as $serv)
          @if($serv->id == 1)
            <?php $currentService = $serv->displayName  ?>
            <div class="col-lg-2 col-md-4  col-sm-2 col-sm-2 pr-1 pl-2 ServiceNames">
              <a href="/PeriodicServices">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
                    <img src="{{ URL::to('/') }}/images/Group 959.png" style="width:50px;height: 50px" alt="...">
                    <h6 class="textYellow pt-3" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}}</h6>
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
            <div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
              <a href="/BatteryAndTyre" id="Battery and Tyres">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock">
                  <img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
                  <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
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
					<a href="/PeriodicServices">
					<div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
						<img src="{{ URL::to('/') }}/images/Group 959.png" style="width:50px;height: 50px" alt="...">
						<h6 class="textYellow pt-3" style="font-weight: bolder;font-size: 1rem;"> Periodic Maintainance </h6>
					</div>
					</a>
				</div>
				<div class="col-lg-2 col-md-4 px-1 ServiceNames">
          <a href="/accidentalRepair" id='linkToAccidentalRepair' >
  					<div class="text-center py-4 px-3 rounded shadow serviceBlock">
  						<img src="{{ URL::to('/') }}/images/Group 969.png" style="width:50px;height: 50px" alt="...">
  						<h6 class="blueColor pt-3 titleBlock" style=" font-weight: bolder;font-size: 1rem;"> Accidental Repair </h6>
  					</div>
					</a>
				</div>
				<div class="col-lg-2 col-md-4 px-1 ServiceNames">
					<a href="/mechanicalRepairServices" id="Mechanical Repair">
					<div class="text-center py-4 px-3 rounded shadow serviceBlock">
						<img src="{{ URL::to('/') }}/images/Group 977.png" style="width:50px;height: 50px" alt="...">
						<h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Mechanical Repair </h6>
					</div>
				</a>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
					<a href="/ACRepairServices"  id="AC Servicing">
					<div class="text-center py-4 px-3 rounded shadow serviceBlock">
						<img src="{{ URL::to('/') }}/images/Group 1000.png" style="width:50px;height: 50px" alt="...">
						<h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> AC Servicing </h6>
					</div>
				</a>
				</div>
				<div class="col-lg-2 col-md-4 px-1 ServiceNames">
					<a href="/BatteryAndTyre" id="Battery and Tyres">
					<div class="text-center py-4 px-3 rounded shadow serviceBlock">
						<img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
						<h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Battery and Tyres </h6>
					</div>
				</a>
				</div>
				<div class="col-lg-2 col-md-4 pr-2 pl-1 ServiceNames">
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
			<p style="font-weight: bolder;color:#121A7F;font-size: 1.8rem">Our Services  <i class="fas fa-angle-right textYellow mx-2"></i><span style="font-size: 1.5rem;">{{$currentService}}</span></p>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-lg-12 px-5">
      <form id="searchPackageForm" class="yellowBackground p-4" style="border-radius: 20px;" >
        @csrf
        <div class="row bg-light shadow-lg p-4" style="border-radius: 20px;">
          <div class="col-lg-10 p-0">
            <div class="row">
              @if(Auth::check())
                <div class="col-lg-4 form-group mb-0">
              @else
                <div class="col-lg-3  form-group  mb-0">
              @endif
              <select class="js-example-basic-single form-control form-control-lg mb-0" name="brands" id="brandSelect">
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
            <!-- <select class="js-example-basic-single form-control form-control-lg" name="brands" id="brandSelect">
              @isset($brandId))
                <option selected class="brandCont" id="make-{{$brandId}}" value="{{$brandId}}">{{$brand}}</option>

                @foreach($brandData as $make)
                  @if($make->id != $brandId)
                    <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                  @endif
                @endforeach
              @else
                <option>Brand</option>
                @foreach($brandData as $make)
                  <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                @endforeach
              @endisset
            </select> -->

            <div class="d-none text-danger" id="requestMakeError"></div>
          </div>
               @if(Auth::check())
                <div class="col-lg-4 form-group  mb-0">
              @else
                <div class="col-lg-3  form-group pl-0  mb-0">
              @endif
              <select class="js-example-basic-first form-control form-control-lg modelSelect mb-0" id="modelSelect">
              @if(session()->has('modelName'))
                <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>
              @else
                <option id="" value="" selected hidden>Select Model</option>
              @endif
            </select>
            <!-- <select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
                @if(isset($modelId))
                  <option id="model-{{$modelId}}" value="{{$modelId}}">{{$model}}</option>
                @else
                  <option id="" value="">Select Model</option>
                @endif
            </select> -->
            <div class="d-none text-danger" id="requestModelError"></div>
          </div>
              @if(Auth::check())
                <div class="col-lg-4 form-group  mb-0">
              @else
                <div class="col-lg-3  form-group pl-0  mb-0">
              @endif

              <select class="js-example-basic-second form-control form-control-lg fuelSelect battFuelSelect mb-0" id="fuelSelect">
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
            <!-- <select class="js-example-basic-second form-control form-control-lg fuelSelect" id="fuelSelect">
                @isset($fuelId)
                <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                @endisset
                <option>Fuel</option> 
            </select> -->
            <div class="d-none text-danger" id="requestFuelError"></div>
          </div>
          @if (Auth::check())
            <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="true" >
            <input type="hidden" name="mobile1" id="mobile1" value="{{Auth::user()->mobile}}">
          @else
            <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="false" >
            <div class="col-lg-3  form-group pl-0">
               <input type="tel" maxlength="10" pattern="[0-9]{10}" name="mobile1" id="mobile1" placeholder="Mobile Number" class="form-control form-control-lg" onkeyup="nospaces(this)">
               <div class="d-none text-danger" id="requestMobError"></div>
            </div>
          @endif
        </div>
          </div>
          <div class="col-lg-2 pl-0 searchPackageButton">
            <div class="form-group m-0">
              @if(Auth::check())
              <button type="button" id="searchPackage" class="btn btn-lg btn-block home-banner-button text-light searchPackage font-weight-bold form-control form-control-lg rounded">Search</button>
              @else
              <button type="button" class="btn btn-lg btn-block home-banner-button text-light searchPackage font-weight-bold form-control form-control-lg rounded-0">Search</button>
              @endif
            </div>

          </div>
          

        </div>
  	<!-- 		<div class="row  yellowBackground shadow rounded py-4">
  				<div class="col-lg-3">
            <select class="js-example-basic-single form-control form-control-lg" name="brands" id="brandSelect">
              @isset($brandId))
                <option selected class="brandCont" id="make-{{$brandId}}" value="{{$brandId}}">{{$brand}}</option>

                @foreach($brandData as $make)
                  @if($make->id != $brandId)
                    <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                  @endif
                @endforeach
              @else
                <option>Brand</option>
                @foreach($brandData as $make)
                  <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                @endforeach
              @endisset
            </select>
  				</div>
  			
  				<div class="col-lg-3">
            <select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
                @if(isset($modelId))
                  <option id="model-{{$modelId}}" value="{{$modelId}}">{{$model}}</option>
                @else
                  <option id="" value="">Select Model</option>
                @endif
            </select>
          </div>
  				<div class="col-lg-3">
            <select class="js-example-basic-second form-control form-control-lg fuelSelect" id="fuelSelect">
                @isset($fuelId)
                <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                @endisset
                <option>Fuel</option> 
            </select>
          </div>
  				<div class="col-lg-3">
  					<div class="form-group px-3 m-0">
  						<button type="button" class="btn btn-lg btn-block blueButton text-light searchPackage font-weight-bold">SEARCH</button>
  					</div>
  				</div>
  			</div> -->
      </form>
		</div>
	</div>

	<div class="row mt-5 compair-packages">
		<div class="col-lg-12 px-5" style="display: flex; flex-direction: row; justify-content: space-between;">
			<p style="font-weight: bolder;color:#121A7F;font-size: 1.8rem">Scheduled Packages</span></p>
      <div class="outerCheckoutBtnDiv" style="display: none;">
        <button type="button" class="btn btn-block blueButton text-light" style="font-weight: bolder;" onclick="onOuterCheckoutClick()" id="outerCheckoutBtn">CHECKOUT</button>
      </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header blueButton"  id="authLoginTitle">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-light" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-lg-12 px-5">
			<div class="row py-4 d-flex justify-content-between packData" id="packData"></div>
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
                                      <button type="submit" class="btn btn-block orangeButton AddonServices font-weight-bold " id="{{$addon->id}}"  data-addId="{{$addon->id}}" style="color:black; padding: 10px 0px;">Buy</button>
                                    @else
                                      <button type="submit" class="btn btn-block orangeButton AddNewUser font-weight-bold " id="{{$addon->id}}" data-addId="{{$addon->id}}" style="color:black; padding: 10px 0px;">Buy</button>
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
<div class="modal fade" id="packModel" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
            <div class="modal-header blueButton">
              <div class="text-light"> Package Details </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
    	  <div class="modal-body">
        	<div class="row">
  					<div class="col-lg-12 my-2">
  						<div class="pt-4 px-3">
  							<div class="row">
  								<div class="col-lg-9 col-md-7 col-sm-8 p-0">
  		  						<h6 style="font-size: 0.9rem;font-weight: boldercolor:#121A7F;" id="modalPackName"></h6>
                     <span class="d-none pack_id" id="pack_id"></span>
  								</div>
  								<div class="col-lg-3 col-md-5 col-sm-4 text-right" id="packagePrices">
  									<h5  style=color:#121A7F;">₹<span id="totalPrice" style="text-decoration-line: line-through; font-weight: 100;margin-left: 0px; font-size: 1rem;"></span>  ₹<span id="discountedPrice"></span></h5>
  								</div>
  							</div>
  			   			<h6 id="briefDesc" style="font-size: 0.8rem;font-weight: 600;" class="textYellow"></h6>
  						  <ul class="pl-0">
  						    <div class="row">
  								  <div class="col-lg-11 pl-0">
  								    <div class="row" id="serviceLists">
  								    </div>
  								  </div>
  						    </div>
  						  </ul>
  						  <div class="row align-items-center">
  						    <div class="col-lg-2 col-md-3 col-sm-3 pl-0">
  								  <!-- <h6 class="bg-dark px-3 py-1 m-0 text-center text-light" style="font-size: 14px;"><span id="serviceTime">2</span> hours </h6> -->
  				        </div>
  				      </div>
  							<div class="border border-warning border-right-0 border-left-0 mt-3">
  								<h6 class="m-0 py-2 text-right" style="font-weight: bold;font-size: 25px;" >TOTAL &nbsp;&nbsp;&nbsp;₹<span id="packageTotalPrice"></span></h6>	
  							</div>
  				    </div>	
  				  </div>
  		    </div>
          <div id="allData">
            
          </div>
  		    <div class="modal-footer border-0" style="padding:0px 30px;" id="NewPack">
  					<a style="font-weight: bold;font-size: 18pxcolor:#121A7F" href="javascript:void(0)" onclick="addNewPackage()">ADD PACKAGE</a>
  				  <button type="button" class="btn blueButton text-light" data-toggle="modal" data-target="#checkout">CHECKOUT</button>
  				</div>
      	</div>
        </form>
  	</div>
	</div>
</div>

<!-- Add new package modal -->
<!-- <div class="modal fade" id="addNewPack" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-body">
            <div id="checkoutCart" style="max-height: 50vh;overflow-y: auto;">
              
            </div>
            <div class="modal-footer border-0 justify-content-between">
              <a href="{{ url('services') }}" class="btn text-light blueButton text-bold" >ADD OTHER SERVICE</a>
              <button type="button" class="btn text-light blueButton text-bold" onclick="checkout(this)">BOOK SERVICE</button>
            </div>
          </div>
        </div>
      </div>
    </div> -->
<!-- Modal for checkout details-->
<!-- <div class="modal fade checkout" id="checkout" tabindex="-1" role="dialog" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    		<div class="modal-content">
      			<div class="modal-body">
        			<div class="row">
						<div class="col-lg-12 my-2">
							<div class="pt-4 px-3">
								<div class="row">
									<div class="col-lg-6 align-self-center">
									<h6>PAYMENT</h6>
										<div class="custom-control custom-radio p-2">
										    <input type="radio" class="custom-control-input" name="radio-stacked">
										    <label class="custom-control-label" for=""> CASH ON DELIVERY (COD)</label>
										</div>
										<div class="custom-control custom-radio p-2">
										    <input type="radio" class="custom-control-input" name="radio-stacked">
										    <label class="custom-control-label" for=""> UPI PAYMENT</label>
										  </div>
										<div class="form-group mb-4">
										    	<input type="text" class="form-control" placeholder="upi@id">
										</div>
										<div class="custom-control custom-radio  p-2">
										    <input type="radio" class="custom-control-input" name="radio-stacked">
										    <label class="custom-control-label" for=""> CREDIT / DEBIT CARDS</label>
										</div>
										<div class="form-group mb-2">
										   	<input type="text" class="form-control" placeholder="Card Number">
										</div>
										<div class="row">
											<div class="form-group mb-4 col-lg-6 pr-1 pl-0">
											   	<input type="text" class="form-control" placeholder="Exp Date">
											</div>				
											<div class="form-group mb-4 col-lg-6 pl-1 pr-0">
											   	<input type="text" class="form-control" placeholder="CVV">
											</div>								
										</div>
									</div>
									<div class="col-lg-6 p-0">
										<div class="shadow px-4 pb-5">
											<h4 class="text-center mb-5 mt-4">BILL DETAILS</h4>
											<div class="row">
												<div class="col-lg-6 p-0">
													<h6 class="m-0">PACKAGE NAME</h6>
												</div>
												<div class="col-lg-6 p-0">
													<h6 class="text-right m-0">$4500</h6>
												</div>
												<div class="form-group mb-4 briefDescription col-lg-12 p-0">
										      		<input type="text" class="form-control textYellow col-lg-12" placeholder="BRIEF DETAIL/DESCRIPTION">
										    	</div>
											</div>
											<div class="row">
												<div class="col-lg-6 p-0">
													<h6 class="m-0">PACKAGE NAME</h6>
												</div>
												<div class="col-lg-6 p-0">
													<h6 class="text-right  m-0">$4500</h6>
												</div>
												<div class="form-group mb-4 briefDescription col-lg-12 p-0">
										      		<input type="text" class="form-control textYellow" id="briefdescription col-lg-12" placeholder="BRIEF DETAIL/DESCRIPTION">
										    	</div>
											</div>
											<h6 class="m-0" style="font-size: 12px; font-weight: bold;">Any special remarks/suggetions..</h6>
											<textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
											<div class="border border-warning border-right-0 border-left-0 mt-3">
												<h6 class="m-0 py-2 text-right">TOTAL &nbsp;&nbsp;&nbsp;$9000</h6>
												
											</div>
										</div>
										
									</div>
									
								</div>
	
							</div>	
						</div>
			      	</div>
			      	<div class="modal-footer border-0">
			        	<h2> <a href="#" class="textYellow" style="font-weight:bolder;" data-toggle="modal" data-target="#payment"> MAKE PAYMENT </a> </h2>
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
<!--  -->

<!--  New User Authentication -->
<!-- <div class="modal fade" id="authLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header blueButton"  id="authLoginTitle">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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

    <div class="modal fade" id="checkServiceLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mobile Verification</h5>
                <button type="button" class="close closePack" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="modal-body" method="post" id="checkServiceLoginForm" action="javascript:void(0)">
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
                              <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time2">01:00</span> </a>
                          </div>

                    <div class="form-group mb-3 otp-btn ">
                      <button type="button" class="btn btn-secondary btn-block" id="verifyCheckService">Verify Number</button>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
             </form>
        </div>
      </div>
    </div>


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
</script>
@stop