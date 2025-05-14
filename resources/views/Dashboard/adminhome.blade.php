 @extends('layouts.admin')
@section('content')

    <!-- Main content -->
    <section class="content">
      <h3 class="m-0 text-dark px-4">Dashboard</h3>
      <div class="container-fluid dashboard">
        <!-- Small boxes (Stat box) -->
        <ul class="row pt-4 px-3 nav nav-pills mb-3 "id="pills-tab" role="tablist" style="list-style: none;">
          <li class="col-lg-3 col-6 px-3 nav-item ">
        		<a class="nav-link active p-0" id="new-booking" data-toggle="pill" href="#booking" role="tab" aria-controls="pills-home" aria-selected="true">
              <!-- small box -->
              <div class="small-box">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;overflow: unset;">New Bookings</h5>
                  <h3>{{$unassignedGarageCount}}</h3>
                </div>
              </div>
            </a>
          </li>
          <li class="col-lg-3 col-6 px-3 nav-item">
        		<a class="nav-link p-0" id="new-leads" data-toggle="pill" href="#leads" role="tab" aria-controls="pills-profile" aria-selected="false">
              <!-- small box -->
              <div class="small-box">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;overflow: unset;">RequestCallback Leads</h5>
                  <h3>{{$requestCallbackLeadCount}}</h3>
                </div>
              </div>
            </a>
          </li>
          <li class="col-lg-3 col-6 px-3 nav-item">
            <a class="nav-link p-0" id="new-immatureLeads" data-toggle="pill" href="#immatureLeads" role="tab" aria-controls="pills-profile" aria-selected="false">
              <!-- small box -->
              <div class="small-box">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;overflow: unset;">Immature Leads</h5>
                  <h3>{{$generalLeadsCount}}</h3>
                </div>
              </div>
            </a>
          </li>
          <li class="col-lg-3 col-6 px-3 nav-item">
    		    <a class="nav-link p-0" id="new-garage" data-toggle="pill" href="#garage" role="tab" aria-controls="pills-contact" aria-selected="false">
              <!-- small box -->
              <div class="small-box">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;overflow: unset;">Total Garages</h5>
                  <h3>{{$garageCount}}</h3>
                </div>
              </div>
            </a>
          </li>
          <li class="col-lg-3 col-6 px-3 nav-item">
    		<a class="nav-link p-0" id="new-garage-request" data-toggle="pill" href="#garage-request" role="tab" aria-controls="pills-contact" aria-selected="false">
            <!-- small box -->
            <div class="small-box">
              <div class="px-4 py-3">
                <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                <h5 style="white-space: break-spaces;overflow: unset;">Garage Requests</h5>
                <h3>{{$garageRequestCount}}</h3>
              </div>
            </div>
            </a>
          </li>
        </ul>
        <!-- /.row -->
  
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<div class="tab-content px-4" id="pills-tabContent">
  <div class="tab-pane fade show active" id="booking" role="tabpanel" aria-labelledby="new-booking">
  	<div class="background-blue d-flex py-3 px-4 mb-3">
  		<div>
  			<h4 class="mb-0 text-light">Booking Entries</h4>
  		</div>
  		<!-- <div style="margin-left: auto;">
  			<h4 class="mb-0 text-light">Booking Entries</h4>
  		</div> -->
  		
  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">Name</th>
		        <th scope="col">Address</th>
		        <th scope="col">Package</th>
		        <th scope="col">Date</th>
		        <th scope="col">Action</th>
		        <!-- <th scope="col"></th> -->
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach ($ordersArray as $bookings)
			      <tr>
			        <td>{{$bookings->name}}</td>
			        <td>{{$bookings->address}}</td>
			        <td>{{$bookings->interestedService}}</td>
			        <td>
                <?php
                  $date=date_create($bookings->date);
                  echo date_format($date,"d/m/Y ");
                ?>
              </td>
			        <td>
				        @if($bookings->assignedGarageId != null) 
			        		<button type="button" data-bookingId="{{$bookings->order_id}}" class="unassignGarage btn button-color btn-block btn-block">Unassign</button>
			        	@else
			        		<button data-toggle="modal" data-bookingId="{{$bookings->order_id}}" id="{{$bookings->order_id}}"  data-target="#signup" class=" btn button-color btn-block btn-block">Assign</button>
			        	@endif
			        </td>

			       	

		        	<!-- <td><a href="#" data-toggle="modal" data-target="#signup">...</a></td> -->
			      </tr>
			    @endforeach
		      
		    </tbody>
		  </table>
  </div>
  <div class="tab-pane fade" id="leads" role="tabpanel" aria-labelledby="new-leads">
  	<div class="background-blue d-flex py-3 px-4 mb-3">
  		<div>
  			<h4 class="mb-0 text-light">New Leads</h4>
  		</div>
  		<div style="margin-left: auto;">
  			<h4 class="mb-0 text-light">New Leads</h4>
  		</div>
  		
  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
            <th scope="col">#</th>
		        <th scope="col">Name</th>
		        <!-- <th scope="col">Address</th> -->
		        <th scope="col">Contact</th>
		        <th scope="col">Lead Type</th>
		        <th scope="col">Date</th>
		        <!-- <th scope="col">Action</th>
		        <th scope="col"></th> -->
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($leadsData as $leads)
			      <tr>
              <td>{{$leads->id}}</td>
			        <td>{{$leads->name}}</td>
			        <td>{{$leads->mobile}}</td>
			        @if($leads->leadType == 1) 
			        	<td>Mature Lead</td>
			        @else
			        	<td>Immature Lead</td>
			        @endif  

			        <td>
                <?php
                  $date=date_create($leads->created_at);
                  echo date_format($date,"d-m-Y H:i:s");
                ?>
              </td>
			      </tr>
		    	@endforeach
		    </tbody>
		  </table>
  </div>
  <div class="tab-pane fade" id="immatureLeads" role="tabpanel" aria-labelledby="new-immatureLeads">
    <div class="background-blue d-flex py-3 px-4 mb-3">
      <div>
        <h4 class="mb-0 text-light">Immature Leads</h4>
      </div>
      <div style="margin-left: auto;">
        <h4 class="mb-0 text-light">Immature Leads</h4>
      </div>
      
    </div>
      <table class="table table-responsive-sm border">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Contact No.</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($generalLeadsUserData as $userData )
            <tr>
              <td>{{$userData->id}}</td>
              <td>{{$userData->mobile}}</td>
              <td>{{$userData->email}}</td>
              <td>{{$userData->username}}</td>
              <td>{{$userData->address}}</td>
              
              <td>
                <?php
                  $date=date_create($userData->created_at);
                  echo date_format($date,"d-m-Y H:i:s");
                ?>
              </td> 
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  <div class="tab-pane fade" id="garage" role="tabpanel" aria-labelledby="new-garage">
  	<div class="background-blue d-flex py-3 px-4 mb-3">
  		<div>
  			<h4 class="mb-0 text-light">New Garages</h4>
  		</div>
  		<div style="margin-left: auto;">
  			<h4 class="mb-0 text-light">New Garages</h4>
  		</div>
  		
  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
		        <th scope="col">Garage Name</th>
	            <th scope="col">Address</th>
	            <th scope="col">Contact</th>
	            <th scope="col">Description</th>
	            <th scope="col">Mechanic Details</th>
	            <th scope="col">Other Details</th>
	            <th scope="col">Date</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach ($garageData as $garages)
            <tr>
	            <td>{{ $garages->garage_name }}</td>
    					<td>{{ $garages->garage_location }}</td>
    					<td>{{ $garages->garage_contactNo }}</td>
    					<td>{{ $garages->garage_description }}</td>
    					<td>{{ $garages->mechanic_details }}</td>
    					<td>{{ $garages->other_details }}</td>
    					<td>
                <?php
                  $date=date_create($garages->updated_at);
                  echo date_format($date,"d-m-Y H:i:s");
                ?>
              </td>
          	</tr>
        	@endforeach
		      <!-- <tr>
		        <td>Name</td>
		        <td>Sample Address</td>
		        <td>Basic Service</td>
		        <td>23-11-2020</td>
		        <td><button class=" btn button-color btn-block">Assign</button></td>
		        <td> ...</td>
		      </tr>
		      <tr>
		        <td>Name</td>
		        <td>Sample Address</td>
		        <td>Basic Service</td>
		        <td>23-11-2020</td>
		        <td><button class=" btn button-color btn-block">Assign</button></td>
		        <td> ...</td>
		      </tr>
		      <tr>
		        <td>Name</td>
		        <td>Sample Address</td>
		        <td>Basic Service</td>
		        <td>23-11-2020</td>
		        <td><button class=" btn button-color btn-block">Assign</button></td>
		        <td> ...</td>
		      </tr> -->
		      
		    </tbody>
		  </table>
  </div>
  <div class="tab-pane fade" id="garage-request" role="tabpanel" aria-labelledby="new-garage-request">
  	<div class="background-blue d-flex py-3 px-4 mb-3">
  		<div>
  			<h4 class="mb-0 text-light">Garage Requests</h4>
  		</div>
  		<div style="margin-left: auto;">
  			<h4 class="mb-0 text-light">Garage Requests</h4>
  		</div>
  		
  	</div>
  		<table class="table table-responsive-sm border">
		    <thead>
		      <tr>
            <th scope="col">#</th>
		        <th scope="col">Name</th>
            <!-- <th scope="col">Address</th> -->
            <!-- <th scope="col">Package</th> -->
            <th scope="col">Date</th>
            <th scope="col">Contact</th>
            <th scope="col">Status</th>
            <th scope="col">Set Status</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach ($garageRequestsData as $garages)
		            <tr>
                <td>{{$garages->id}}</td>
		            <td class="user-panel d-flex">
		              {{$garages->name}}
		            </td>
		            <!-- <td>Sample Address</td> -->
		            <!-- <td>Basic Service</td> -->
		            <td>
                  <?php
                    $date=date_create($garages->created_at);
                    echo date_format($date,"d-m-Y H:i:s");
                  ?>
                </td>
		            <td>{{$garages->mobile}}</td>
		            <td>{{$garages->status}}</td>
		            <td>
		              <button data-toggle="modal" class="btn button-color btn-sm setGarageReqStatus" data-target="#setStatusModal" status="{{ $garages->status }}" garageId="{{ $garages->id }}" class=" btn button-color btn-block btn-block">Set Status</button>
		            </td>
		          </tr>
	          	@endforeach
		    	
		      
		    </tbody>
		  </table>
  </div> 
</div>

<div class="modal fade setStatus-modal" id="setStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row mt-2">
          <form class="form-horizontal" id="form-edit-client" style="width: 100%;">
            <fieldset>
              
              <div class="form-group mb-1">
                <label class="col-md-6 control-label" for="selectGarageReqStatus">Set Status</label>
                <select id="selectGarageReqStatus">
                  <option value="approved">Approved</option>
                  <option value="rejected">Rejected</option>
                  <option value="pending">Pending</option>
                  <option value="hold">Hold</option>
                </select>
              </div>

              <div class="form-group">
                  <label class="col-md-6 control-label" for="extraNote">Note:</label>  
                  <div class="col-md-12">
                    <textarea class="form-control" id="extraNote" name="other-details" rows="3"></textarea>
                  </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <button id="updateGarageReqStatus" class="btn btn-primary mb-2">Update Status</button>
                </div>
              </div>

              <input type="hidden" id="hiddenGarageRequestId" name="hiddenGarageRequestId" value="" />

            </fieldset>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

    @stop


<!-- 


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>
</ul>
 -->
<!-- Modal -->
<div class="modal fade dashboard-modal assignGarageModal" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            	<div class="col-lg-8">
	            <form class="mb-0 mx-2">
			    	<!-- <div class="input-group">
			    		<input class="form-control" type="search" placeholder="Search" aria-label="Search">
		        </div> -->
			    </form>
            	</div>
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
                            <button type="submit" class="assignServiceHome btn text-light" class="assignService" id="{{$garages->id}}" data-id="{{$garages->id}}" style="padding: 10px 18px; background-color:#182d54;">Assign Garage</button>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                @endforeach
                            
              </tbody>
            </table>

            <!-- <div class="row my-3">
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
	            					<button type="submit" class="assignServiceHome btn text-light" class="assignService" id="{{$garages->id}}" data-id="{{$garages->id}}" style="padding: 10px 18px; background-color:#182d54;">Assign Garage</button>
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


<div class="modal fade" id="data-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-body">
      	<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="row mx-3 py-2">
            	<div class="col-lg-6">
            		<h3 class="text-dark" style="font-weight: bolder;">PACKAGE NAME</h3>
            		<h6 class="text-warning m-0">BRIEF DETAIL/DESCRIPTION</h6>
            		<h6 class="text-warning m-0">BRIEF DETAIL/DESCRIPTION</h6>
            	</div>
            	<div class="col-lg-6 text-right">
            		<h4>Original Price  <span class="px-3 py-1 bg-warning" style="font-weight: bolder;">$4500</span></h4>
            		<h4>Discount Price  <span class="px-3 py-1 bg-warning" style="font-weight: bolder;">$4500</span></h4>
            	</div>
            </div>
            <div class="row mx-3 py-2 mt-4">
            	<div class="col-lg-12">
            		<h4><span class="px-3 py-1 bg-info" style="font-weight: bolder;">Service Time : </span><span class="px-3 py-1 bg-warning" style="font-weight: bolder;"> 2 hours</span></h4>
            	</div>
            </div>
            <div class="row mx-3 py-2 mt-4">
            	<div class="col-lg-12">
            		<h6><span class="px-3 py-1 bg-info" style="font-weight: bolder;">Service Listing</span></h6>
            	</div>
            	<div class="col-lg-12">
            		<ul class="pl-0">
							<div class="row">
								<div class="col-lg-4 blogBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

								</div>
								<div class="col-lg-4 blogBox moreBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

									
								</div>
								<div class="col-lg-4 blogBox moreBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

									
								</div>
								<div class="col-lg-4 blogBox moreBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

									
								</div>
								<div class="col-lg-4 blogBox moreBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

								</div>
								<div class="col-lg-4 blogBox moreBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

								</div>
								<div class="col-lg-4 blogBox moreBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

								</div>
								<div class="col-lg-4 blogBox moreBox">
									<span>
										<li style="font-size: 1rem;">Lorem Ipsum <button type="button" class="close delete-list-item ml-1" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button></li>
									</span>

								</div>
							</div>
						</ul>	
            	</div>
            </div>
          </div>
        </div>
      </div>
       <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-primary rounded-0" style="padding: 0.5rem 3rem;">Save</button>
      </div>
    </div>
  </div>
</div>