@extends('layouts.admin')
@section('content')

<div class="dashboard-booking dashboard">
  	<h3 class="m-0 text-dark px-4">Bookings</h3>
	<!-- <ul class="variable-width-booking slider mt-3 nav nav-pills mb-3" id="pills-tab" role="tablist" style="list-style: none;"> -->
	<ul class="row pt-4 px-3 nav nav-pills mb-3 "id="pills-tab" role="tablist" style="list-style: none;">
		@foreach($service as $serv)
			@if($serv->id == 1)
				<?php $regService = $serv->displayName  ?>
				<li class="nav-item tab1">
					<div class="row">
					  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<a class="nav-link act dashboard-linkive p-0" id="periodice-services" data-toggle="pill" href="#periodic-tab" role="tab" aria-controls="pills-home" aria-selected="true">
						        <div class="small-box" style="width: 200px;">
						            <div class="block-box px-4 py-3">
						            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
						                <h5>{{$serv->displayName}}</h5>
						                <h3>{{$periodicServiceCount}}</h3>
						            </div>
						    	</div>
						    </a>
					  	</div>
					</div>
				</li>
			@elseif($serv->id == 2)
				<?php $accService = $serv->displayName  ?>
				<li class="nav-item tab1">
				    <div class="row">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					      	<a class="nav-link p-0 dashboard-link" id="accidental-services" data-toggle="pill" href="#accidental-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
						        <div class="small-box" style="width: 200px;">
						            <div class="block-box px-4 py-3">
						            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
						                <h5>{{$serv->displayName}}</h5>
						                <h3>{{$accidentalRepairCount}}</h3>
						            </div>
						        </div>
					        </a>
				      	</div>
				    </div>
			  	</li>
			@elseif($serv->id == 3)
				<?php $mechService = $serv->displayName  ?>
				<li class="nav-item tab1">
				    <div class="row">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					      	<a class="nav-link p-0 dashboard-link" id="mechanical-services" data-toggle="pill" href="#mechanical-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
						        <div class="small-box" style="width: 200px;">
						            <div class="block-box px-4 py-3">
						            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
						                <h5>{{$serv->displayName}}</h5>
						                <h3>{{$mechRepairCount}}</h3>
						            </div>
						        </div>
					        </a>
				      	</div>
				    </div>
			  	</li>
			@elseif($serv->id == 4)
				<?php $acService = $serv->displayName  ?>
				<li class="nav-item tab1">
				    <div class="row">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					      	<a class="nav-link p-0 dashboard-link" id="ac-services" data-toggle="pill" href="#ac-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
						        <div class="small-box" style="width: 200px;">
						            <div class="block-box px-4 py-3">
						            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
						                <h5>{{$serv->displayName}}</h5>
						                <h3>{{$acRepairCount}}</h3>
						            </div>
						        </div>
					        </a>
				      	</div>
				    </div>
			  	</li>
			@elseif($serv->id == 5)
				<?php $batService = $serv->displayName  ?>
				<li class="nav-item tab1">
				    <div class="row">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					      	<a class="nav-link p-0 dashboard-link" id="batteryTyre-services" data-toggle="pill" href="#battery-tyre-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
						        <div class="small-box" style="width: 200px;">
						            <div class="block-box px-4 py-3">
						            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
						                <h5>{{$serv->displayName}}</h5>
						                <h3>{{$batteryTyreCount}}</h3>
						            </div>
						        </div>
					        </a>
				      	</div> 
				    </div>
			  	</li>
			@elseif($serv->id == 6)
				<?php $upkService = $serv->displayName  ?>
				<li class="nav-item">
				    <div class="row">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					      	<a class="nav-link p-0 dashboard-link" id="upkeep-services" data-toggle="pill" href="#upkeep-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
						        <div class="small-box" style="width: 200px;">
						            <div class="block-box px-4 py-3">
						            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
						                <h5>{{$serv->displayName}}</h5>
						                <h3>{{$upkeepServiceCount}}</h3>
						            </div>
						        </div>
					        </a>
				      	</div>
				    </div>
			  	</li> 
			@endif
		@endforeach
			<?php $addonService = "Addon Services"  ?>
				<li class="nav-item">
				    <div class="row">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					      	<a class="nav-link p-0 dashboard-link" id="addon-services" data-toggle="pill" href="#addon-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
						        <div class="small-box" style="width: 200px;">
						            <div class="block-box px-4 py-3">
						            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
						                <h5>Addon Services</h5>
						                <h3>{{$addonCount}}</h3>
						            </div>
						        </div>
					        </a>
				      	</div>
				    </div>
			  	</li> 
		<!-- <li class="nav-item tab1">
			<div class="row">
			  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a class="nav-link act dashboard-linkive p-0" id="periodice-services" data-toggle="pill" href="#periodic-tab" role="tab" aria-controls="pills-home" aria-selected="true">
				        <div class="small-box" style="width: 200px;">
				            <div class="block-box px-4 py-3">
				            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
				                <h5>Periodic Maintainance</h5>
				                <h3>{{$periodicServiceCount}}</h3>
				            </div>
				    	</div>
				    </a>
			  	</div>
			</div>
		</li>
		<li class="nav-item tab1">
		    <div class="row">
		      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		      	<a class="nav-link p-0 dashboard-link" id="accidental-services" data-toggle="pill" href="#accidental-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
		        <div class="small-box" style="width: 200px;">
		            <div class="block-box px-4 py-3">
		            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
		                <h5>Accidental Repair</h5>
		                <h3>{{$accidentalRepairCount}}</h3>
		            </div>
		        </div>
		        </a>
		      </div>
		    </div>
	  	</li>

	  	<li class="nav-item tab1">
		    <div class="row">
		      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		      	<a class="nav-link p-0 dashboard-link" id="mechanical-services" data-toggle="pill" href="#mechanical-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
		        <div class="small-box" style="width: 200px;">
		            <div class="block-box px-4 py-3">
		            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
		                <h5>Mechanical Repair</h5>
		                <h3>{{$mechRepairCount}}</h3>
		            </div>
		        </div>
		        </a>
		      </div>
		      
		    </div>

		  </li>
		  <li class="nav-item tab1">
		    <div class="row">
		      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		      	<a class="nav-link p-0 dashboard-link" id="ac-services" data-toggle="pill" href="#ac-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
		        <div class="small-box" style="width: 200px;">
		            <div class="block-box px-4 py-3">
		            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
		                <h5>AC Servicing</h5>
		                <h3>{{$acRepairCount}}</h3>
		            </div>
		        </div>
		        </a>
		      </div>
		      
		    </div>

		  </li>
		  <li class="nav-item">
		    <div class="row">
		      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		      	<a class="nav-link p-0 dashboard-link" id="batteryTyre-services" data-toggle="pill" href="#battery-tyre-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
		        <div class="small-box" style="width: 200px;">
		            <div class="block-box px-4 py-3">
		            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
		                <h5>Battery & Tyres</h5>
		                <h3>{{$batteryTyreCount}}</h3>
		            </div>
		        </div>
		        </a>
		      </div>
		    </div>
		  </li>
		  <li class="nav-item">
		    <div class="row">
		      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		      	<a class="nav-link p-0 dashboard-link" id="upkeep-services" data-toggle="pill" href="#upkeep-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
		        <div class="small-box" style="width: 200px;">
		            <div class="block-box px-4 py-3">
		            	<img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
		                <h5>Upkeep Services</h5>
		                <h3>{{$upkeepServiceCount}}</h3>
		            </div>
		        </div>
		        </a>
		      </div>
		    </div>
		  </li> -->

		</div>

<div class="tab-content px-4" id="pills-tabContent">
  	<div class="tab-pane fade show active" id="periodic-tab" role="tabpanel" aria-labelledby="accidental-services">
  		<div class="background-blue d-flex py-3 px-4 mb-2">
  			<div>
  				<h4 class="mb-0 text-light">{{$regService}} Bookings</h4>
  			</div>
  		</div>
		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <th scope="col">Contact Number</th>
		        <th scope="col">Pickup Address</th>
		        <th scope="col">Interested Service</th>
		        <th scope="col">Assigned Garage</th>
		        <th scope="col">Date</th>
		        <th scope="col"></th>
		      </tr>
		    </thead>
		    <tbody>
	      		@foreach ($ordersArray as $bookings)
	      			@foreach ($bookings->packageType as $idx => $pkType)
			      		@if($bookings->status =='pending' && $pkType ==1)
					      <tr>
					        <td>{{$bookings->id}}</td>
					        <td>{{$bookings->name}}</td>
					        <td>{{$bookings->contactNumber}}</td>
					        <td>{{$bookings->address}}</td>
					        
					        @if(count($bookings->interestedService)>1)
					        		<td>
					        			{{$bookings->interestedService[$idx]}}
					        			<!-- @foreach($bookings->interestedService as $key => $service)
					        			{{$service}},
					        			@endforeach -->
					        		</td>
					        @else
					        	<td>{{$bookings->interestedService[0]}}</td>

					        @endif

					        @foreach ($garageDataArray as $idx => $garageInfo)
					        	@if($garageInfo->orderId == $bookings->order_id) 
					        		<td>{{$garageInfo->garageName}}</td>
					        	@endif
					        @endforeach

					        <td>
					        	<?php
									$date=date_create($bookings->date);
									echo date_format($date,"d-m-Y ");
								?>
				        	</td>
					        <td> 
					        	@if($bookings->assignedGarageId != null) 
					        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block bookingsAssignGarageBtn">Unassign</button>
					        	@else
					        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#assignGarageModal" class=" btn button-color btn-block btn-block bookingsAssignGarageBtn">Assign</button>
					        	@endif
					        </td>
					      </tr>
				      	@endif
	      			@endforeach
		    	@endforeach
		    </tbody>
		</table>
 	</div>
  	<div class="tab-pane fade" id="accidental-tab" role="tabpanel" aria-labelledby="accidental-services">
  		<div class="background-blue d-flex py-3 px-4 mb-2">
	  		<div>
	  			<h4 class="mb-0 text-light">{{$accService}} Bookings</h4>
	  		</div>
  		
  		</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <th scope="col">Contact Number</th>
		        <th scope="col">Pickup Address</th>
		        <th scope="col">Parts To Repair</th>
		        <th scope="col">Assigned Garage</th>
		        <th scope="col">Date</th>
		        <th scope="col"></th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach ($ordersArray as $bookings)
		      	@foreach ($bookings->packageType as $idx => $pkType)
	          		@if($bookings->status =='pending' && $pkType ==2)
				      <tr>
				      	<td>{{$bookings->id}}</td>
				        <td>{{$bookings->name}}</td>
				        <td>{{$bookings->contactNumber}}</td>
				        <td>{{$bookings->address}}</td>
				        
				        @if(count($bookings->interestedService)>1)
				        		<td>
				        			{{$bookings->interestedService[$idx]}}
				        			<!-- @foreach($bookings->interestedService as $key => $service)
				        			{{$service}},
				        			@endforeach -->
				        		</td>
				        @else
				        	<td>{{$bookings->interestedService[0]}}</td>

				        @endif

				        @foreach ($garageDataArray as $idx => $garageInfo)
				        	@if($garageInfo->orderId == $bookings->order_id) 
				        		<td>{{$garageInfo->garageName}}</td>
				        	@endif
				        @endforeach

				        <td>
				        	<?php
								$date=date_create($bookings->date);
								echo date_format($date,"d-m-Y ");
							?>
				        </td>
				        <td> 
				        	@if($bookings->assignedGarageId != null) 
				        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block bookingsAssignGarageBtn">Unassign</button>
				        	@else
				        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#assignGarageModal" class=" btn button-color btn-block btn-block bookingsAssignGarageBtn">Assign</button>
				        	@endif
				        </td>
				      </tr>
			      	@endif
			    @endforeach
		    @endforeach
		      
		    </tbody>
	  	</table>
  </div>
  <div class="tab-pane fade" id="mechanical-tab" role="tabpanel" aria-labelledby="mechanical-services">
  	<div class="background-blue d-flex py-3 px-4 mb-2">
  		<div>
  			<h4 class="mb-0 text-light">{{$mechService}} Bookings</h4>
  		</div>
  		
  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <th scope="col">Contact Number</th>
		        <th scope="col">Pickup Address</th>
		        <th scope="col">Interested Service</th>
		        <th scope="col">Assigned Garage</th>
		        <th scope="col">Date</th>
		        <th scope="col"></th>
		      </tr>
		    </thead>
		    <tbody>
		      	@foreach ($ordersArray as $bookings)
		          	@foreach ($bookings->packageType as $idx => $pkType)
		          		@if($bookings->status =='pending' && $pkType ==3)
					      	<tr>
						        <td>{{$bookings->id}}</td>
						        <td>{{$bookings->name}}</td>
						        <td>{{$bookings->contactNumber}}</td>
						        <td>{{$bookings->address}}</td>
						        
						        @if(count($bookings->interestedService)>1)
						        		<td>
						        			{{$bookings->interestedService[$idx]}}
						        			<!-- @foreach($bookings->interestedService as $key => $service)
						        			{{$service}},
						        			@endforeach -->
						        		</td>
						        @else
						        	<td>{{$bookings->interestedService[0]}}</td>

						        @endif

						        @foreach ($garageDataArray as $idx => $garageInfo)
						        	@if($garageInfo->orderId == $bookings->order_id) 
						        		<td>{{$garageInfo->garageName}}</td>
						        	@endif
						        @endforeach

						        <td>
						        	<?php
										$date=date_create($bookings->date);
										echo date_format($date,"d-m-Y ");
									?>
						        </td>
						        <td> 
						        	@if($bookings->assignedGarageId != null) 
						        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block bookingsAssignGarageBtn">Unassign</button>
						        	@else
						        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#assignGarageModal" class=" btn button-color btn-block btn-block bookingsAssignGarageBtn">Assign</button>
						        	@endif
						        </td>
					      	</tr>
				      	@endif
			    	@endforeach
			    @endforeach
		    </tbody>
		  </table>
  </div>
  <div class="tab-pane fade" id="ac-tab" role="tabpanel" aria-labelledby="ac-services">
  	<div class="background-blue d-flex py-3 px-4 mb-2">
  		<div>
  			<h4 class="mb-0 text-light">{{$acService}} Bookings</h4>
  		</div>
  		
  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <th scope="col">Contact Number</th>
		        <th scope="col">Pickup Address</th>
		        <th scope="col">Interested Service</th>
		        <th scope="col">Assigned Garage</th>
		        <th scope="col">Date</th>
		        <th scope="col"></th>
		      </tr>
		    </thead>
		    <tbody>
		      	@foreach ($ordersArray as $bookings)
		      		@foreach ($bookings->packageType as $idx => $pkType)
		          		@if($bookings->status =='pending' && $pkType ==4)
					      	<tr>
						        <td>{{$bookings->id}}</td>
						        <td>{{$bookings->name}}</td>
						        <td>{{$bookings->contactNumber}}</td>
						        <td>{{$bookings->address}}</td>
						        
						        @if(count($bookings->interestedService)>1)
						        		<td>
						        			{{$bookings->interestedService[$idx]}}
						        			<!-- @foreach($bookings->interestedService as $key => $service)
						        			{{$service}},
						        			@endforeach -->
						        		</td>
						        @else
						        	<td>{{$bookings->interestedService[0]}}</td>
						        @endif

						        @foreach ($garageDataArray as $idx => $garageInfo)
						        	@if($garageInfo->orderId == $bookings->order_id) 
						        		<td>{{$garageInfo->garageName}}</td>
						        	@endif
						        @endforeach

						        <td>
						        	<?php
										$date=date_create($bookings->date);
										echo date_format($date,"d-m-Y ");
									?>
						        </td>
						       
						        <td> 
						        	@if($bookings->assignedGarageId != null) 
						        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block bookingsAssignGarageBtn">Unassign</button>
						        	@else
						        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#assignGarageModal" class=" btn button-color btn-block btn-block bookingsAssignGarageBtn">Assign</button>
						        	@endif
						        </td>
					      	</tr>
				      	@endif
			    	@endforeach
			    @endforeach
		      
		    </tbody>
		  </table>
  	</div> 
  	<div class="tab-pane fade" id="battery-tyre-tab" role="tabpanel" aria-labelledby="batteryTyre-services">
	  	<div class="background-blue d-flex py-3 px-4 mb-2">
	  		<div>
	  			<h4 class="mb-0 text-light">{{$batService}} Bokings</h4>
	  		</div>
	  		
	  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <th scope="col">Contact Number</th>
		        <th scope="col">Pickup Address</th>
		        <th scope="col">Interested Service</th>
		        <th scope="col">Assigned Garage</th>
		        <th scope="col">Date</th>
		        <th scope="col"></th>
		      </tr>
		    </thead>
		    <tbody>
		      	@foreach ($ordersArray as $bookings)
		      		@foreach ($bookings->packageType as $idx => $pkType)
		          		@if($bookings->status =='pending' && $pkType ==5)
					      	<tr>
						        <td>{{$bookings->id}}</td>
						        <td>{{$bookings->name}}</td>
						        <td>{{$bookings->contactNumber}}</td>
						        <td>{{$bookings->address}}</td>
						        
						        @if(count($bookings->interestedService)>1)
						        		<td>
						        			{{$bookings->interestedService[$idx]}}
						        			<!-- @foreach($bookings->interestedService as $key => $service)
						        			{{$service}},
						        			@endforeach -->
						        		</td>
						        @else
						        	<td>{{$bookings->interestedService[0]}}</td>

						        @endif

						        @foreach ($garageDataArray as $idx => $garageInfo)
						        	@if($garageInfo->orderId == $bookings->order_id) 
						        		<td>{{$garageInfo->garageName}}</td>
						        	@endif
						        @endforeach

						        <td>
						        	<?php
										$date=date_create($bookings->date);
										echo date_format($date,"d-m-Y ");
									?>
						        </td>

						        <td> 
						        	@if($bookings->assignedGarageId != null) 
						        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block bookingsAssignGarageBtn">Unassign</button>
						        	@else
						        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#assignGarageModal" class=" btn button-color btn-block btn-block bookingsAssignGarageBtn">Assign</button>
						        	@endif
						        </td>
					      	</tr>
				      	@endif
			    	@endforeach
			    @endforeach
		      
		    </tbody>
	  	</table>
  	</div>

  	<div class="tab-pane fade" id="upkeep-tab" role="tabpanel" aria-labelledby="upkeep-services">
	  	<div class="background-blue d-flex py-3 px-4 mb-2">
	  		<div>
	  			<h4 class="mb-0 text-light">{{$upkService}} Bokings</h4>
	  		</div>
	  		
	  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <th scope="col">Contact Number</th>
		        <th scope="col">Pickup Address</th>
		        <th scope="col">Interested Service</th>
		        <th scope="col">Assigned Garage</th>
		        <th scope="col">Date</th>
		        <th scope="col"></th>
		      </tr>
		    </thead>
		    <tbody>
	      		@foreach ($ordersArray as $bookings)
		      		@foreach ($bookings->packageType as $idx => $pkType)
		          		@if($bookings->status =='pending' && $pkType ==6)
					      	<tr>
						        <td>{{$bookings->id}}</td>
						        <td>{{$bookings->name}}</td>
						        <td>{{$bookings->contactNumber}}</td>
						        <td>{{$bookings->address}}</td>
						        
						        @if(count($bookings->interestedService)>1)
						        		<td>
						        			{{$bookings->interestedService[$idx]}}
						        			<!-- @foreach($bookings->interestedService as $key => $service)
						        			{{$service}},
						        			@endforeach -->
						        		</td>
						        @else
						        	<td>{{$bookings->interestedService[0]}}</td>

						        @endif

						        @foreach ($garageDataArray as $idx => $garageInfo)
						        	@if($garageInfo->orderId == $bookings->order_id) 
						        		<td>{{$garageInfo->garageName}}</td>
						        	@endif
						        @endforeach

						        <td>
						        	<?php
										$date=date_create($bookings->date);
										echo date_format($date,"d-m-Y ");
									?>
						        </td>

						        <td> 
						        	@if($bookings->assignedGarageId != null) 
						        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block bookingsAssignGarageBtn">Unassign</button>
						        	@else
						        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#assignGarageModal" class=" btn button-color btn-block btn-block bookingsAssignGarageBtn">Assign</button>
						        	@endif
						        </td>
					      	</tr>
				      	@endif
			    	@endforeach
			    @endforeach
		      
		    </tbody>
	  	</table>
  	</div>

  	<div class="tab-pane fade" id="addon-tab" role="tabpanel" aria-labelledby="addon-services">
	  	<div class="background-blue d-flex py-3 px-4 mb-2">
	  		<div>
	  			<h4 class="mb-0 text-light">{{$upkService}} Bokings</h4>
	  		</div>
	  		
	  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <th scope="col">Contact Number</th>
		        <th scope="col">Pickup Address</th>
		        <th scope="col">Interested Service</th>
		        <th scope="col">Assigned Garage</th>
		        <th scope="col">Date</th>
		        <th scope="col"></th>
		      </tr>
		    </thead>
		    <tbody>
	      		@foreach ($ordersArray as $bookings)
		      		@foreach ($bookings->packageType as $idx => $pkType)
		          		@if($bookings->status =='pending' && $pkType ==7)
					      	<tr>
						        <td>{{$bookings->id}}</td>
						        <td>{{$bookings->name}}</td>
						        <td>{{$bookings->contactNumber}}</td>
						        <td>{{$bookings->address}}</td>
						        
						        @if(count($bookings->interestedService)>1)
						        		<td>
						        			{{$bookings->interestedService[$idx]}}
						        			<!-- @foreach($bookings->interestedService as $key => $service)
						        			{{$service}},
						        			@endforeach -->
						        		</td>
						        @else
						        	<td>{{$bookings->interestedService[0]}}</td>

						        @endif

						        @foreach ($garageDataArray as $idx => $garageInfo)
						        	@if($garageInfo->orderId == $bookings->order_id) 
						        		<td>{{$garageInfo->garageName}}</td>
						        	@endif
						        @endforeach

						        <td>
						        	<?php
										$date=date_create($bookings->date);
										echo date_format($date,"d-m-Y ");
									?>
						        </td>
						        
						        <td> 
						        	@if($bookings->assignedGarageId != null) 
						        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block bookingsAssignGarageBtn">Unassign</button>
						        	@else
						        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#assignGarageModal" class=" btn button-color btn-block btn-block bookingsAssignGarageBtn">Assign</button>
						        	@endif
						        </td>
					      	</tr>
				      	@endif
			    	@endforeach
			    @endforeach
		      
		    </tbody>
	  	</table>
  	</div>

</div>
<div class="modal fade dashboard-modal assignGarageModal" id="assignGarageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-body">
      	<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="row bg-dark mx-3 py-2">
            	<div class="col-lg-6">
            		<!-- <h6 class="text-light">Customer Name : Customer Name</h6> -->
            		<h6 class="text-light">Customer Contact : <span id="customerContact">Customer Contact</span></h6>
            		<h6 class="text-light">Customer Address : <span id="customerAddress">Customer Address</span></h6>
            		<h6 class="text-light">Package Booked : <span id="packageBooked">Package Booked</span></h6>
            	</div>
            	<div class="col-lg-6">
            		<h6 class="text-light">Car Details : Car Details</h6>
            		<!-- <h6 class="text-light">Service Type : Service Type</h6> -->
            		<!-- <h6 class="text-light">Remarks : Remarks</h6> -->
            		<h6 class="text-light">Pickup Date : <span id="pickupDate">Date</span></h6>
            	</div>
            </div>
            <div class="row mt-3">
            	<div class="col-lg-1"><h4>Garages</h4> </div>
            	<!-- <div class="col-lg-8">
	            <form class="mb-0 mx-2">
			    	<div class="input-group">
			    		<input class="form-control" type="search" placeholder="Search" aria-label="Search">
			        </div>
			    </form>
            	</div> -->
            	<!-- <div class="col-lg-3" style="margin:auto;">
            		 <span class="badge badge-info right cityname">pune</span>
            		 <span class="badge badge-info right cityname">pune</span>
            		 <span><i class="far fa-address-book fa-2x" style="vertical-align: bottom;"></i></span>
            	</div> -->
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>Assign Garages</th>
                    
                </tr>
              </thead>
              <tbody>
                @foreach ($garageData as $garages)
                  <tr>
                    <td>
                      <div class="py-3" style="border: 1px solid #ffc107;margin:10px 0px">
                        <div class="row">
                          <div class="col-lg-5 align-self-center">
                            <h5>{{$garages->garage_name}}</h5>
                            <p class="mb-1">{{$garages->garage_description}}</p>
                            <p class="mb-1">{{$garages->mechanic_details}}</p>
                            
                          </div>
                          <div class="col-lg-5 align-self-center">
                            <p class="mb-1">{{$garages->garage_location}}</p>
                            <p class="mb-1">{{$garages->other_details}}</p>
                            
                          </div>
                            <div class="col-lg-2 text-center align-self-center">
                            <button type="submit" class="btn text-light assignService" id="{{$garages->id}}" data-id="{{$garages->id}}" style="padding: 10px 18px; background-color:#182d54;">Assign Garage</button>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                @endforeach
                            
              </tbody>
            </table>

           <!--  <div class="row my-3">
            	<div class="col-lg-12">
            		@foreach ($garageData as $garages)
            			<div class="py-3" style="border: 1px solid #ffc107;margin:10px 0px">
	            			<div class="row">
	            				<div class="col-lg-5 align-self-center">
	            					<h5>{{$garages->garage_name}}</h5>
	            					<p class="mb-1">{{$garages->garage_description}}</p>
	            					<p class="mb-1">{{$garages->mechanic_details}}</p>
	            					
	            				</div>
	            				<div class="col-lg-5 align-self-center">
	            					<p class="mb-1">{{$garages->garage_location}}</p>
	            					<p class="mb-1">{{$garages->other_details}}</p>
	            					
	            				</div>
	               				<div class="col-lg-2 text-center align-self-center">
	            					<button type="submit" class="assignService btn text-light" class="assignService" id="{{$garages->id}}" data-id="{{$garages->id}}" style="padding: 10px 18px; background-color:#182d54;">Assign Service</button>
	            				</div>
	            			</div>
	            		</div>
            		@endforeach
            		<input type="hidden" id="hiddenOrderId" name="hiddenOrderId" value="" />       		
            		
            	</div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
