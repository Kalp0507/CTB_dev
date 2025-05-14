@extends('layouts.default')
@section('content')
	<div class="row mt-5">
		<div class="col-lg-12 px-5 ServiceNamesBlock">
			<!-- <div class="row">
				@foreach($service as $serv)
				<div class="col-lg-2 col-md-2 px-1">
                	<a href="#" class="changeBlock">
						<div class="text-center py-4 px-3 rounded shadow serviceBlock">
							<img src="{{ URL::to('/') }}/images/{{$serv->service_icon}}" style="width:50px;height: 50px" alt="...">
							<h6 class="textYellow pt-3 titleBlock" style="font-weight: bolder;font-size: 0.8rem;"> {{$serv->service_name}}</h6>
						</div>
					</a>
				</div>
                @endforeach
			</div> -->
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
					<?php $currentService = $serv->displayName  ?>
						<div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
		      				<a href="/accidentalRepair" id='linkToAccidentalRepair' >
			  					<div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
			  						<img src="{{ URL::to('/') }}/images/Group 969.png" style="width:50px;height: 50px" alt="...">
			  						<h6 class="textYellow pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> {{$serv->displayName}} </h6>
			  					</div>
							</a>
						</div>
					@elseif($serv->id == 3)
						<div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
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
				<!-- <div class="col-lg-2 col-md-4  col-sm-2 col-sm-2 pr-1 pl-2 ServiceNames">
					<a href="/PeriodicServices">
					<div class="text-center py-4 px-3 rounded shadow serviceBlock" >
						<img src="{{ URL::to('/') }}/images/Group 959.png" style="width:50px;height: 50px" alt="...">
						<h6 class="blueColor pt-3" style="font-weight: bolder;font-size: 1rem;"> Periodic Maintainance </h6>
					</div>
					</a>
				</div>
				<div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
      				<a href="/accidentalRepair" id='linkToAccidentalRepair' >
	  					<div class="text-center py-4 px-3 rounded shadow serviceBlock" style="background-image: linear-gradient(#2732A3, #121A7F);">
	  						<img src="{{ URL::to('/') }}/images/Group 969.png" style="width:50px;height: 50px" alt="...">
	  						<h6 class="textYellow pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Accidental Repair </h6>
	  					</div>
					</a>
				</div>
				<div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
					<a href="/mechanicalRepairServices" id="Mechanical Repair">
						<div class="text-center py-4 px-3 rounded shadow serviceBlock">
							<img src="{{ URL::to('/') }}/images/Group 977.png" style="width:50px;height: 50px" alt="...">
							<h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Mechanical Repair </h6>
						</div>
					</a>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-2 px-1 ServiceNames">
					<a href="/ACRepairServices" id="AC Servicing">
					<div class="text-center py-4 px-3 rounded shadow serviceBlock">
						<img src="{{ URL::to('/') }}/images/Group 1000.png" style="width:50px;height: 50px" alt="...">
						<h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> AC Servicing </h6>
					</div>
				</a>
				</div>
				<div class="col-lg-2 col-md-4  col-sm-2 px-1 ServiceNames">
					<a href="/BatteryAndTyre" id="Battery and Tyres">
						<div class="text-center py-4 px-3 rounded shadow serviceBlock">
							<img src="{{ URL::to('/') }}/images/Group 5789.png" style="width:50px;height: 50px" alt="...">
							<h6 class="blueColor pt-3 titleBlock" style="font-weight: bolder;font-size: 1rem;"> Battery and Tyres </h6>
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
			<p style="font-weight: bolder;color: #121A7F;font-size: 1.8rem">Our Services  <i class="fas fa-angle-right textYellow mx-2"></i><span style="font-size: 1.5rem;">{{$currentService}}</span></p>
		</div>
	</div>

	<div class="row mt-3 d-none">
		<div class="col-lg-12 px-5">
			<div class="row  shadow rounded yellowBackground py-4 px-5">
				<!-- <div class="col-lg-3 pr-2">
					<div>
						<div class="form-group m-0">
							<select class="js-example-basic-single form-control-lg form-control" name="brands" id="brandSelect">
								@isset($brandData)
									<option selected>Make</option>
									@foreach($brandData as $make)

										@isset($selectedBrand)
											@if($make->id == $selectedBrand)
												<option selected class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
											@else
			                					<option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
											@endif
										@endisset
									@endforeach
								@endisset
							</select>
						</div>
					</div>
				</div>
			
				<div class="col-lg-3 px-2">
					<div>
						<div class="form-group m-0">
							<select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
								@isset($modelData)
									@foreach($modelData as $model)
										@isset($selectedModel)
											@if($model->id == $selectedModel)
												<option id="model-{{$model->id}}" value="{{$model->id}}">{{$model->model_name}}</option>
											@endif
										@endisset
									@endforeach
								@endisset

							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-3 px-2">
					<div>
						<div class="form-group m-0">
							<select class="js-example-basic-second form-control form-control-lg fuelSelect" id="fuelSelect">
								@isset($fuelData)
									@foreach($fuelData as $fuel)
										@isset($selectedFuel)
											@if($fuel->id == $selectedFuel)
												<option id='fuel{{$selectedFuel}}' class='fuelsClass' value="{{$selectedFuel}}">{{$fuel->fuel_type}}</option>
											@endif
										@endisset
									@endforeach
								@endisset
							</select>
						</div>
					</div>
				</div> -->
				<div class="col-lg-3 pl-1">
					<div class="form-group px-1 m-0">
						<button type="submit" class="btn btn-lg btn-block blueButton text-light">SEARCH</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- 	<div class="row justify-content-center py-5">
		<div class="col-lg-4 col-md-5 col-sm-12">
			<h4 style="font-weight: bolder;color: #182d54;font-size: 1.8rem" class="my-4"> Accidental Repair </h4>
			<p style="color: #182d54;font-weight: bold;font-size: 18px;letter-spacing: 1px">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
		</div>
		<div class="col-lg-1 col-md-1"></div>
			<div class="col-lg-4 col-md-5">
                <div class="row w-100 py-4  rounded" style="background-color: #182d54">
                	<h5 class="text-light text-center my-2 px-5" style="font-weight: bold">HOW IT WORKS</h5>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 d-flex my-3 px-5">
			            <img src="{{ URL::to('/') }}/images/Group 959.png" class="mr-3" style="max-width:50px; height: 50px" alt="...">
			            <div class="inner-info-tabs" >
			                <h6 class="textYellow" style="font-weight: bolder;font-size: 20px">ENTER YOUR CAR DETAILS</h6>
			            </div>
			        </div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 d-flex my-3 px-5">
			            <img src="{{ URL::to('/') }}/images/Group 959.png" class="mr-3" style="max-width:50px; height: 50px" alt="...">
			            <div class="inner-info-tabs" >
			                <h6 class="textYellow" style="font-weight: bolder;font-size: 20px">SELECT THE PERFECT CAR SERVICE’S</h6>
			            </div>
			        </div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 d-flex my-3 px-5">
			            <img src="{{ URL::to('/') }}/images/Group 959.png" class="mr-3" style="max-width:50px; height: 50px" alt="...">
			            <div class="inner-info-tabs">
			                <h6 class="textYellow" style="font-weight: bolder;font-size: 20px">GET QUOTE / MAKE PAYMENT</h6>
			            </div>
			        </div>
			    </div>
			</div>
    	</div> -->

        <div class="row justify-content-center">
        	<div class="col-lg-8 mt-5 mobileServicesForm2" style="padding: 0px 10em;">
        		<div class="row p-4 formBackground formMobileContainer">
        			<div class="col-lg-12 py-3 shadow-lg">
        				@if(session()->has('message'))
						    <div class="alert alert-success">
						        <!-- {{ session()->get('message') }} -->
						        @if(session()->get('message') == 'Request Submitted')
						        	{{ session()->get('message') }}
						        @endif
						        
						        @if(session()->get('message') == 'Successfully Submitted')
						        	<input type="hidden" name="accSubmit" id="accSubmit" class="accSubmit" value="submitted">
						        @endif
						    </div>
						@endif
			  		 	<!-- <form id="accidentalForm"  enctype="multipart/form-data" > -->
		  		 		<form id="accidentalForm" enctype="multipart/form-data" >
								 {{ csrf_field() }}
						  	<div class="form-row  ">
						  		<h3 class="text-center" style="margin: 0 auto;font-weight: bold;">Fill Details</h3>

						  		<div class="form-group col-lg-12  col-12 my-4 MakeModelFuel" style="display: flex; flex-direction: row;">
							  		<div class="col-lg-4 col-md 4 col-12 pl-0" >
										<div>
											<div class="form-group m-0">
												<select class="js-example-basic-single form-control-lg form-control" name="brands" id="brandSelect">
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
													<!-- @isset($brandData)
														<option selected>Make</option>
														@foreach($brandData as $make)

															@isset($selectedBrand)
																@if($make->id == $selectedBrand)
																	<option selected class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
																@else
								                					<option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
																@endif
															@endisset
														@endforeach
													@endisset -->
												</select>
												  <div class="d-none text-danger" id="requestMakeError"></div>
											</div>
										</div>
									</div>
						  			
									<div class="col-lg-4  col-md 4 col-12 px-2">
										<div>
											<div class="form-group m-0">
												<!-- <select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
									              @if(session()->has('modelName'))
									                <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>

									                @foreach($modelData as $model)
									                  	@if($model->id != session()->get('modelId'))
									                    	<option class="brandCont" id="model-{{$make->id}}" value="{{$model->id}}">{{$model->model_name}}</option>
									                  	@endif
									                @endforeach

									              @else
									                <option id="" value="">Select Model</option>
									              @endif
									            </select> -->
									            <select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
										              @if(session()->has('modelName'))
										                <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>
										              @else
										                <option id="" value="" selected hidden>Select Model</option>
										              @endif
									            </select>
												<!-- <select class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
													@isset($modelData)
														@foreach($modelData as $model)
															@isset($selectedModel)
																@if($model->id == $selectedModel)
																	<option id="model-{{$model->id}}" value="{{$model->id}}">{{$model->model_name}}</option>
																@endif
															@endisset
														@endforeach
													@endisset

												</select> -->
												</select>
												  <div class="d-none text-danger" id="requestModelError"></div>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md 4 col-12 px-2">
										<div>
											<div class="form-group m-0 accidentalFuelDiv">
												<!-- <select class="js-example-basic-second form-control form-control-lg fuelSelect" id="fuelSelect">
													@isset($fuelData)
														@foreach($fuelData as $fuel)
															@isset($selectedFuel)
																@if($fuel->id == $selectedFuel)
																	<option id='fuel{{$selectedFuel}}' class='fuelsClass' value="{{$selectedFuel}}">{{$fuel->fuel_type}}</option>
																@endif
															@endisset
														@endforeach
													@endisset
												</select> -->
												<select class="js-example-basic-second form-control form-control-lg fuelSelect" id="fuelSelect">
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
												</select>
												  <div class="d-none text-danger" id="requestFuelError"></div>
											</div>
										</div>
									</div>
							  		<!-- <div class="col-lg-3 px-2">
										<div>
											<div class="form-group m-0 ">
												<select class="selectAccidentalPart form-control form-control-lg carTypeSelect" name="carType" id="carTypeSelect">
														<option value="" selected>Select Car Type</option>
														@foreach($carTypes as $carType)
																	<option value="{{$carType->type_name}}">{{$carType->type_name}}</option>
														@endforeach
												</select>
											</div>
										</div>
									</div> -->
						  		</div>

						  		@if (Auth::check())
					          <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="true" >
					        @else
					    		  <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="false" >
					        @endif
					        <div class="col-lg-12 checkboxHideDiv" style="border: 3px solid #F5E72E; padding: 15px;border-radius: 15px;margin-bottom: 10px;">
					       		<div class="row">
									  	<div class="form-group col-lg-6 pl-0 partsToRepairDiv mb-1">
									      	<select id="partsToRepair" class="form-control form-control-lg partsToRepair" name="partsToRepair[]" multiple>
									        	
									      	</select>
									      	<div class="d-none text-danger" id="servicePartError"></div>
									  	</div>
									  	<div class="form-group col-lg-6 pl-0 partColorDiv mb-1">
									      	<select id="partColor" class="form-control form-control-lg partColor" name="partColor">
								        		<option selected hidden>Select Color</option>
									        	<option value="solid">Solid</option>
									        	<option value="metallic">Metallic</option>
									        	<option value="pearl">Pearl</option>
									      	</select>
									      	<div class="d-none text-danger" id="partColorError"></div>
									  	</div>

					        		
					        	</div>
					        	
					        </div>
					        @if (Auth::check())
					          <input type="hidden" name="mobile1" id="mobile1" value="{{Auth::user()->mobile}}" >
					        @else
					        <div class="col-lg-12 checkboxMobileDiv d-none" style="border: 3px solid #F5E72E; padding-top: 12px;border-radius: 15px;padding-left: 15px;">
					        	<input type="text" name="mobile1" id="mobile1" pattern="[0-9]{10}" maxlength="10" class="form-control form-control-lg" placeholder="Enter Mobile" onkeyup="nospaces(this)">
							    	<div class="d-none text-danger" id="mobileError"></div>
					        </div>
					        @endif
					        <div class="col-lg-12 uploadImageDiv align-self-center">
					       		<div class="row pb-2">
									  	<div class="col-lg-12 text-center align-self-center checkboxHideDiv"><h4 class="mobMarginTop AndOrDiv" style="font-size: 16px;">And / Or</h4></div>
											<div class="col-lg-12 pl-3 ImageDiv" style="border: 3px solid #F5E72E;padding-top: 14px;padding-top: 5px;padding-bottom: 5px;border-radius: 15px;padding-right: 0px !important;">
												<label class="" style="font-size:16px;">Upload Images:</label>
										    	<input type="file" class=" mb-2 w-100" accept=".jpg,.jpeg,.png" multiple id="accidentalImage" enctype="multipart/form-data" name="accidentalImage[]">
										    	<div class="d-none text-danger" id="imageUploadError"></div>
											</div>

					       		</div>
					       	</div>

							  	<div class="col-lg-12 mt-2">
							  		<label class="mobMarginTop">Didn't find the part you want? Mention the issue in remark: &nbsp;&nbsp;<input name="accCheckbox" type="checkbox" id="accCheckbox"></label>
                  					
							  	</div>

							  	<input type="hidden" name="partFound" id="partFound" class="partFound" value="true" />

							  	<div class="form-group col-md-6  mb-4 d-none">
							  		@if (Auth::check())
							  			<input type="text" class="form-control form-control-lg" id="accMobileNo" name="accMobileNo" value="{{Auth::user()->mobile}}" readonly>
							  			<input type="text" id="mobile1" name="mobile1" value="{{Auth::user()->mobile}}" readonly>
							  		@else
							  			<input type="text" class="form-control form-control-lg" id="accMobileNo" name="accMobileNo" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" onkeyup="nospaces(this)">
							  		@endif
							    	
							    	<div class="d-none text-danger" id="accMobileNo"></div>
							    </div>
							    
							    <!-- <div class="form-group col-md-6  mb-4">
							    	<input type="text" class="form-control form-control-lg" id="vehicalNumber" name="Vnumber" placeholder="Vehical Number">
							    	<div class="d-none text-danger" id="vehicalNumberError"></div>
							    </div>
							    <div class="form-group col-md-6  mb-4">
							      	<input type="text" class="form-control form-control-lg" id="customerName" name = "Cname" placeholder="Customer Name">
							      	<div class="d-none text-danger" id="customerNameError"></div>
							    </div> -->
								 <!-- <div class="form-group col-lg-6  mb-4">
							    	<input type="email" class="form-control form-control-lg" id="accidentalEmail" name="accidentalEmail" placeholder="Email id">
							    	<div class="d-none text-danger" id="custEmailError"></div>
								</div> -->
					  		
								
								<!-- <div class="form-group col-lg-12  mb-4 pl-0 mt-1 d-none accidentalQueryDiv">
							    	<textarea placeholder="Enter Service Details You Want" rows="4" id="accidentalQuery" name='accidentalQuery' class="form-control form-control-lg accidentalQuery" style="border:1px solid #121A7F"></textarea>
							    	<div class="d-none text-danger" id="accidentalQueryError"></div>
								</div> -->

								<div class="form-group col-lg-6  mb-4 pl-0 financeType">
								    <select id="financeType" class="form-control form-control-lg" name="FinanceType" required>
								        <option selected hidden>Repair Expenses By</option>
								        <option value="1">Insurance</option>
								        <option value="2">Self</option>
							    	</select>
							    	<div class="d-none text-danger" id="financeError"></div>
								</div>
								<div class="form-group col-lg-6  mb-4 selectInsuranceCompanyDiv d-none">
								    <select id="insuranceCompany" class="form-control form-control-lg" name="insuranceCompany" required>
								        <option selected hidden>Select Your Insurance Company</option>
								        @foreach($insuranceCompanies as $company)
								        	<option>{{$company->insurance_company}}</option>
								        @endforeach
							    	</select>
							    	<div class="d-none text-danger" id="financeCompanyError"></div>
								</div>
								<div class="form-group col-lg-12  mb-4 pl-0 mt-2 accidentalRemarkDiv">
							    	<textarea placeholder="Remark" rows="4" id="accidentalRemark" name='accidentalRemark' class="form-control form-control-lg accidentalRemark" style="border:1px solid #121A7F"></textarea>
							    	<div class="d-none text-danger" id="accidentalRemarkError"></div>
								</div>
								
							  	<div id="hiddenFieldsDiv">
							  		<input type="hidden" name="hiddenBrand" id="hiddenBrand" value=""  />
							  		<input type="hidden" name="hiddenModel" id="hiddenModel" value=""  />
							  		<input type="hidden" name="hiddenFuel" id="hiddenFuel"  value="" />
							  		<input name="selectedService" type="hidden" class="form-control" id="selectedService" value="Accidental Repair" aria-describedby="selectedServiceHelp" >
							  	</div>
							  	<input type="hidden" name="carTypeHidden" id="carTypeHidden" class="carTypeHidden" />

							  	<div class="col-lg-12 text-center">
								  	<button type="button" id="conFirmAccidentalBooking" class="btn btn-md home-banner-button text-light" style="padding: 8px 25px;"> Submit</button>
							  	</div>
							  	<div class="text-center col-lg-12">
								  	<button type="button" id="submitAccidentalRequest" class="btn btn-md home-banner-button text-light d-none" style="padding: 8px 25px;"> Submit </button>
							  	</div>
					  		</div>
						</form>       				
    			</div>
    		</div>
    	</div>	
    </div>

<h2 class="heading-text text-center pt-5 pb-3">Other Services</h2>
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
                                      <button type="submit" class="btn btn-block orangeButton AddonServices font-weight-bold" id="{{$addon->id}} " data-addId="{{$addon->id}}" style="color:black;padding:10px 0px;">Buy</button>
                                    @else
                                      <button type="submit" class="btn btn-block orangeButton AddNewUser font-weight-bold" id="{{$addon->id}}" data-addId="{{$addon->id}}" style="color:black;padding:10px 0px;">Buy</button>
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
          <button type="button" class="btn blueButton text-light" id="addons{{$addon->id}}" data-id="{{$addon->id}}" data-price="{{$addon->addon_price}}" onclick="addNewAddon(this)">Add Package</button>
        </div>
      </div>
    </div>
  </div>
@endforeach


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
                    <div class="column pr-5 pl-5 pt-2" style="display: flex; flex-direction: column; align-items: center;">
                        <div class="form-group w-100">
                            <label>Select Make:*</label>
                            <div class="dropdown-icon-disable">
                                <select class="js-example-basic-single form-control-lg form-control" id="brandSelection">
                                    @isset($brandData)
										<option selected>Make</option>
										@foreach($brandData as $make)

											@isset($selectedBrand)
												@if($make->id == $selectedBrand)
													<option selected class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
												@else
				                					<option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
												@endif
											@endisset
										@endforeach
									@endisset
                                    
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-group w-100">
                            <label>Select Model:*</label>
                            <div class="dropdown-icon-disable">
                                <select name="models" class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelection">
                                    @isset($modelId)
                                      <option id="model-{{$modelId}}" value="{{$modelId}}">{{$model}}</option>
                                    @endisset
                                </select>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <label>Select Fule Type:*</label>
                            <div class="dropdown-icon-disable">
                                <select name="fuels" class="js-example-basic-first form-control form-control-lg fuelSelect" id="fuelSelection">
                                    @isset($fuelId)
                                      <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                                    @endisset 
                                </select>
                            </div>
                        </div>

                        <div class="form-group w-100">
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
                        </div>

                        <div class="form-group w-100">
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
                        </div>
                        <input name="selectedService" type="hidden" class="form-control" id="selectedService" value="Accidental Repair" aria-describedby="selectedServiceHelp" >
                    </div>
                </div>
                <div class="modal-footer modal-footer text-center" style="justify-content: center;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn textYellow blueButton serviceModalBtnSize" id="submitServicesFormBtn2">Request Callback</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Checkout modal -->
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
                    <div class="shadow px-4 pb-5 billingColumn" style="height: 100%;">
                      	<h4 class="text-center mb-5 mt-1 pt-4">BILL DETAILS</h4>
                      	<div class="row" id="packageCheckout" style="max-height: 20vh;overflow-y: auto;"></div>
                      	<div class="row py-4">
	                        <span class="col-lg-12 p-0" style="font-weight: bold;color: #182d54;">Promo Code</span> 
	                        <div class="col-lg-7 p-0">
	                          	<input type="text" name="promo" id="promo" class="form-control" placeholder="eg. MCM20">
	                        </div>
	                        <div class="col-lg-5 pr-0 mb-2 promoBtnDiv">
	                          	<button type="button" class="promocodeBtn btn btn-warning btn-block text-light">Apply</button>
	                        </div>
	                        <div class="col-lg-7 pl-0 row d-none promoAppliedMsgDiv" style="justify-content: space-between;">
	                          	<div>
	                            	<p style="font-size: 10px; color:red; cursor: pointer;">Promoco Code Applied</p>
	                          	</div>
	                          	<div>
	                            	<span class="removePromo" style="font-size: 10px; color:red;">x</span>
	                          	</div>
	                        </div>
	                    </div>
                      <div class="border border-warning border-right-0 border-left-0 mt-3 col-lg-10" id="finalAmount"></div>
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

<!-- Ends -->

<!-- Modal for checkout details-->
<!-- <div class="modal fade checkout" id="accCheckout" tabindex="-1" role="dialog" aria-hidden="true">
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
<div class="modal fade" id="accLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	 <div class="modal-header blueButton">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Mobile Verification</h5>
        <button type="button" class="close closePackage" data-dismiss="modal" aria-label="Close">
          <span class="text-light" aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form method="POST" id="accLoginForm" class="" enctype="multipart/form-data" style="padding: 2em;">
	        @csrf
	        <h4 class="text-center">LOG IN</h4>
	        <hr class="orange-line">
	        <h5>Enter your Mobile Number</h5>
	        <div class="form-group mb-4 mt-3">
	          <input id="mobilenum1" type="tel" class="form-control" pattern="[0-9]{10}" maxlength="10" value="" name="mobile" required autofocus placeholder="Mobile Number" onkeyup="nospaces(this)">
	        </div>
	        <div class="form-group mb-4 otp-block">
	            <input id="otpVal" type="number" name="otp"class="form-control" value="" placeholder="Enter OTP">
	        </div> 
	        <div class="hiddenData"></div>
	        
	        <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
	          <a class="text-warning resendOtpText" onclick="reSendOtpAcc()" style="font-weight:bolder;"> Resend OTP </a>
	          <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="timeAcc">01:00</span> </a>
	        </div>

	        <div class="form-group mb-3 login-btn" >
	          <button type="button" id="loginBtn" onclick="checkOtpAcc()" class="btn btn-secondary btn-block">LOG IN</button>
	        </div>
      		<div class="form-group mb-3 otp-btn">
              <button type="button" onclick="sendLeadOtpAcc()" class="btn btn-secondary btn-block">SEND OTP</button>
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
@stop

<script type="text/javascript">
	function check() {
		alert("Hello");
	}

	function sendLeadOtpAcc() {
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
              var display2 = document.querySelector('#timeAcc');
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

  function checkOtpAcc() {
    // window.location()
    // console.log("Chicking OTP");
    $mobileNumber = $('#mobilenum1').val();
    $isUserEstimate = $('#isUserEstimate').val();
    $partsToRepair = $('#partsToRepair').val();
    $partColor = $('#partColor').val();
    $partFound = $('#partFound').val();
    $accidentalRemark = $('#accidentalRemark').val();
    $accidentalQuery = $('#accidentalQuery').val();
    $FinanceType = $('#FinanceType').val();
    $insuranceCompany = $('#insuranceCompany').val();
    $hiddenBrand = $('#hiddenBrand').val();
    $hiddenModel = $('#hiddenModel').val();
    $hiddenFuel = $('#hiddenFuel').val();
    $carTypeHidden = $('#carTypeHidden').val();
    var enteredOtp = $('#otpVal').val();
    // console.log("Chicking Ent OTP0---"+ enteredOtp );

	$storedOTP = localStorage.getItem('otp');
    // console.log("Chicking Stored OTP0---"+ $storedOTP );

	if($storedOTP == enteredOtp) {
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	    $.ajax({
	      url:'/sendemail/send',
	      type:'post',
	      data: {'mobile': $mobileNumber ,'isUserEstimate':$isUserEstimate,'partsToRepair':$partsToRepair,'partColor':$partColor,'partFound':$partFound,'accidentalRemark':$accidentalRemark,'accidentalQuery':$accidentalQuery,'FinanceType':$FinanceType,'insuranceCompany':$insuranceCompany,'hiddenBrand':$hiddenBrand,'hiddenBrand':$hiddenBrand,'hiddenModel':$hiddenModel,'hiddenFuel':$hiddenFuel,'carTypeHidden':$carTypeHidden},
	      // alert(data);
	      success:function(data,status,xhr) {

	        // console.log("Data--"+JSON.stringify(xhr));
	        // if(xhr.status==250) {
	        //   alert(xhr.responseText);
	        // }
	        if(xhr.status==200) {
	        	 $('#accLogin').modal('hide');
	          // window.location.href="/accidentalRepair";
	          $('.close').addClass('closePackage');
	            onOuterCheckoutClick();
	        }
	      }
	    });
	}
	else {
		alert("Invalid OTP");
	}
    
  }


  function reSendOtpAcc() {
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
          var display2 = document.querySelector('#timeAcc');
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
 

</script>