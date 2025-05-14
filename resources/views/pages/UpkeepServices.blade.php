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
            <div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
              <a href="/BatteryAndTyre" id="Battery and Tyres">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock">
                  <img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
                  <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
                </div>
              </a>
            </div>
          @elseif($serv->id == 6)
            <?php $currentService = $serv->displayName  ?>
            <div class="col-lg-2 col-md-4 col-sm-2 pr-2 pl-1 ServiceNames">
              <a href="/upkeepServ" id="AC Servicing">
                <div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
                  <img src="{{ URL::to('/') }}/images/Group 1013.png" style="width:50px;height: 50px" alt="...">
                  <h6 class="pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;color:#F5E72E;"> {{$serv->displayName}} </h6>
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

        <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
          <a href="/ACRepairServices" id="Battery and Tyres">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock">
            <img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
            <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> AC Servicing </h6>
          </div>
        </a>
        </div>


        <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
          <a href="/BatteryAndTyre" id="Battery and Tyres">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock">
            <img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
            <h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Battery and Tyres </h6>
          </div>
        </a>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
          <a href="/upkeepServ" id="AC Servicing">
          <div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
            <img src="{{ URL::to('/') }}/images/Group 1013.png" style="width:50px;height: 50px" alt="...">
            <h6 class="pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;color:#F5E72E;"> Upkeep Services </h6>
          </div>
        </a>
        </div> -->
        
      </div>
    </div>
  </div>

  <div>
  <div class="row mt-5">
    <div class="col-lg-12 px-5">
      <p style="font-weight: bolder;color: #121A7F;font-size: 1.8rem">Our Services  <i class="fas fa-angle-right text-warning mx-2"></i><span style="font-size: 1.5rem;">{{$currentService}}</span></p>
    </div>
  </div>


    <div class="col-lg-12 col-md-12 col-12 mobileServicesForm servicesParentDiv2 " style="padding: 0px 8em;">
      <form method="post" id="acEstimateForm" action="javascript:void(0)" class="formBackground p-4">
        @csrf
        <div class="row shadow-lg p-4 serviceForms">
            <div class="col-lg-4 form-group mb-4">
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
              
        
            <div class="col-lg-4  form-group mb-4">
            <!-- <select class="js-example-basic-first form-control form-control-lg modelSelect newModelSelect" id="modelSelect" name="models">
                <option  value="0" selected disabled>Model</option> 

                @isset($modelId)
                  <option id="model-{{$modelId}}" value="{{$modelId}}">{{$model}}</option>
                @endisset

            </select> -->
            <select class="js-example-basic-first form-control form-control-lg modelSelect newModelSelect" name="models" id="modelSelect">
              @if(session()->has('modelName'))
                <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>
              @else
                <option id="" value="" selected hidden>Select Model</option>
              @endif
            </select>
            <div class="d-none text-danger" id="requestModelError"></div>

          </div>
            <div class="col-lg-4  form-group mb-4">
            <select class="js-example-basic-second form-control form-control-lg fuelSelect newFuelSelect" name="fuels" id="fuelSelect">
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
            <!-- <select class="js-example-basic-second form-control form-control-lg fuelSelect newFuelSelect" id="fuelSelect" name="fuels">
                <option  value="0" selected disabled>Fuel</option> 
                @isset($fuelId)
                <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                @endisset
            </select> -->
            <div class="d-none text-danger" id="requestFuelError"></div>
          </div>

             @if (Auth::check())
              <input type="hidden" name="mobile1" id="mobile1" value="{{Auth::user()->mobile}}">
              <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="true" >
            @else
              <div class="col-lg-12 col-md-12 col-12 form-group">
              <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="false" >
                <input type="tel" name="mobile1" maxlength="10" pattern="[0-9]{10}" class="form-control form-control-lg" id="mobile1" placeholder="Enter Mobile Number" onkeyup="nospaces(this)">
                <div class="d-none text-danger" id="requestMobileError"></div>
              </div>
            @endif
            <input type="hidden" name="serviceType" value="Upkeep Services" id="serviceType">
            <input type="hidden" name="serviceId" value="6" id="serviceId">

          <div class="col-lg-12 form-group multiple-select-height mb-4">

            <select class="selectpicker form-control form-control-lg partSelect estimateServiceSelect" multiple data-live-search="true" id="partSelect" name="partSelection[]">
            </select>
            <div class="d-none text-danger" id="requestPartError"></div>
            <!-- <div class="PartNamePrice"></div> -->
          </div>
            <div class="col-lg-12 partCheckbox form-group mt-2">
              <!--<label class="">Didn't find your Service ? Click here:&nbsp;&nbsp; <input type="checkbox" name="acRepairCheckbox" id="acRepairCheckbox"></label>-->
              
              <label class="">Please share additional details:</label>
              <!-- <input name="chkbox" type="checkbox" id="checkbox" value="FALSE"> -->
              
            </div>
          <div class="col-lg-12 RemarkBlock">
            <textarea class="form-control" id="remark" name="remark" rows="3" placeholder="Remark" style="border:1px solid #121A7F"></textarea>
              <div class="d-none text-danger" id="requestRemarkError"></div>
          </div>
          
            <div class="col-lg-12 form-group partNotFoundBlock">
              <!-- <input type="text" name="partNotFound" id="partNotFound" class="form-control form-control-lg" placeholder="Service Not Found"> -->
              <textarea name="partNotFound" id="partNotFound" class="form-control form-control-lg" style="display: none; border:1px solid #121A7F" placeholder="Entery you query" rows="4"></textarea>
              <div class="d-none text-danger" id="requestpartNotFoundError"></div>
            </div>

           <input type="hidden" name="acPartFound" id="acPartFound" class="acPartFound" value="true" />
          <div class="col-lg-12" style="display: flex; align-items: center;justify-content: center;">
            <div class="form-group m-0 col-lg-4 col-md-10" style="padding-left: 0px;">
              <button type="submit" id="acEstimateSubmit"  class="btn btn-md btn-block home-banner-button text-light getEstimate">Submit</button>
              <button type="submit" id="acEstimateRequest"  class="btn btn-lg btn-block home-banner-button text-light getEstimateRequest" style="display: none;">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- Col-lg-8 ends -->
  <!-- </div> -->
</div>

  <div class="modal fade" id="estimateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header blueButton" >
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
                                      <button type="submit" class="btn btn-block orangeButton AddonServices font-weight-bold" id="{{$addon->id}}"  data-addId="{{$addon->id}}" style="color:black;padding: 10px 0px;">Buy</button>
                                    @else
                                      <button type="submit" class="btn btn-block orangeButton AddNewUser font-weight-bold" id="{{$addon->id}}" data-addId="{{$addon->id}}" style="color:black;padding: 10px 0px;">Buy</button>
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
<!-- <div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input name="selectedService" type="hidden" class="form-control" id="selectedService" value="Upkeep Services" aria-describedby="selectedServiceHelp" >
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn text-light blueButton" id="submitServicesFormBtn2">Request Callback</button>
                </div>
            </form>
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
<div class="modal fade" id="EstimateLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header blueButton">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Mobile Verification</h5>
                <button type="button" class="close closePack" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
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
                              <a class="text-warning resendOtpText" onclick="reSendOtp4()" style="font-weight:bolder;"> Resend OTP </a>
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
@stop

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
</script>