 @extends('layouts.admin')
@section('content')
    <!-- Main content -->
    <section class="content">
      <h3 class="m-0 text-dark px-4">Garages</h3>

      <div class="container-fluid dashboard">
        <!-- Small boxes (Stat box) -->
        <ul class="row pt-4 px-3 nav nav-pills mb-3"id="pills-tab" role="tablist" style="list-style: none;">
          <li class="col-lg-4 col-6 px-3 nav-item ">
    		<a class="nav-link active p-0" id="garage-request" data-toggle="pill" href="#garage-request-tab" role="tab" aria-controls="pills-home" aria-selected="true">
            <!-- small box -->
            <div class="small-box">
              <div class="px-4 py-3">
                <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                <h5>Garage Requests</h5>
                <h3>{{$garageDataCount}}</h3>
              </div>
            </div>
            </a>
          </li>
          <li class="col-lg-4 col-6 px-3 nav-item">
    		<a class="nav-link p-0" id="active-garage" data-toggle="pill" href="#active-garage-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
            <!-- small box -->
            <div class="small-box">
              <div class="px-4 py-3">
                <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                <h5>Active Garages</h5>
                <h3>{{$activeGaragesCount}}</h3>
              </div>
            </div>
            </a>
          </li>
          <li class="col-lg-4 col-6 px-3 nav-item">
        <a class="nav-link p-0" id="inactive-garage"data-toggle="pill" href="#inactive-garage-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
            <!-- small box -->
            <div class="small-box">
              <div class="px-4 py-3">
                <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                <h5>Inactive Garages</h5>
                <h3>{{$inActiveGaragesCount}}</h3>
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
  <div class="tab-pane fade show active" id="garage-request-tab" role="tabpanel" aria-labelledby="garage-request">
    <div class="background-blue d-flex py-3 px-4 mb-3" style="justify-content: space-between;">
      <div>
        <h4 class="mb-0 text-light">Garage Requests</h4>
      </div> 
      <div>
        <a href="/Dashboard/AddGarages" class="btn btn-md yellowBackground">Add Garages</a>
      </div>     
    </div>
      <table class="table table-responsive-sm border">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <!-- <th scope="col">Address</th> -->
            <!-- <th scope="col">Package</th> -->
            <th scope="col">Date</th>
            <th scope="col">Contact</th>
            <th scope="col">Status</th>
            @if (Auth::check())
              @if(Auth::user()->id !== 26 && Auth::user()->id !== 27 )
                <th scope="col">Set Status</th>
              @endif
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($garageData as $garages)
            <tr>
            <td class="user-panel d-flex">
              {{$garages->name}}
            </td>
            <td>{{$garages->address}}</td>
            <!-- <td>Sample Address</td> -->
            <!-- <td>Basic Service</td> -->
            <td>{{$garages->created_at}}</td>
            <td>{{$garages->mobile}}</td>
            <td>{{$garages->status}}</td>
            @if (Auth::check())
              @if(Auth::user()->id !== 26 && Auth::user()->id !== 27 )
                <td>
                  <button data-toggle="modal" class="btn button-color btn-sm setGarageReqStatus" data-target="#setStatusModal" status="{{ $garages->status }}" garageId="{{ $garages->id }}" class=" btn button-color btn-block btn-block">Set Status</button>
                </td>
              @endif
            @endif
          </tr>
          @endforeach
          
        </tbody>
      </table>
  </div>
  <div class="tab-pane fade" id="active-garage-tab" role="tabpanel" aria-labelledby="active-garage">
    <div class="background-blue d-flex py-3 px-4 mb-3">
      <div>
        <h4 class="mb-0 text-light">Active Garages</h4>
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
            @if (Auth::check())
              @if(Auth::user()->id !== 26 || Auth::user()->id !== 27 )
                <th scope="col"></th>
              @endif
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($activeGarages as $activeGarage)
            <tr>
              <td>{{ $activeGarage->garage_name }}</td>
              <td>{{ $activeGarage->garage_location }}</td>
              <td>{{ $activeGarage->garage_contactNo }}</td>
              <td>{{ $activeGarage->garage_description }}</td>
              <td>{{ $activeGarage->mechanic_details }}</td>
              <td>{{ $activeGarage->other_details }}</td>
              <td>{{ $activeGarage->updated_at }}</td>
              @if (Auth::check())
                @if(Auth::user()->id !== 26 || Auth::user()->id !== 27 )
                  <td><button data-toggle="modal" class="editGarage btn-sm button-color" garageName="{{$activeGarage->garage_name}}" garageLocation="{{ $activeGarage->garage_location }}" garageContactNo="{{ $activeGarage->garage_contactNo }}" garageDescription="{{ $activeGarage->garage_description }}" mechanicDetails="{{ $activeGarage->mechanic_details }}" otherDetails="{{ $activeGarage->other_details }}" data-target="#garageModal" status="{{ $activeGarage->status }}" garageId="{{ $activeGarage->id }}" class=" btn button-color btn-block btn-block">Edit</button></td>
                @endif
              @endif
            </tr>
          @endforeach
          
        </tbody>
      </table>
  </div>
  <div class="tab-pane fade" id="inactive-garage-tab" role="tabpanel" aria-labelledby="inactive-garage">
    <div class="background-blue d-flex py-3 px-4 mb-3">
      <div>
        <h4 class="mb-0 text-light">Inactive Garages</h4>
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
            @if (Auth::check())
              @if(Auth::user()->id !== 26 || Auth::user()->id !== 27 )
                <th scope="col"></th>
              @endif
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($inActiveGarages as $inActiveGarage)
            <tr>
              <td>{{ $inActiveGarage->garage_name }}</td>
              <td>{{ $inActiveGarage->garage_location }}</td>
              <td>{{ $inActiveGarage->garage_contactNo }}</td>
              <td>{{ $inActiveGarage->garage_description }}</td>
              <td>{{ $inActiveGarage->mechanic_details }}</td>
              <td>{{ $inActiveGarage->other_details }}</td>
              <td>{{ $inActiveGarage->updated_at }}</td>
              @if (Auth::check())
                @if(Auth::user()->id !== 26 || Auth::user()->id !== 27 )
                  <td><button data-toggle="modal" class="editGarage btn-sm button-color" garageName="{{$inActiveGarage->garage_name}}" garageLocation="{{ $inActiveGarage->garage_location }}" garageContactNo="{{ $inActiveGarage->garage_contactNo }}" garageDescription="{{ $inActiveGarage->garage_description }}" mechanicDetails="{{ $inActiveGarage->mechanic_details }}" otherDetails="{{ $inActiveGarage->other_details }}" data-target="#garageModal" status="{{ $inActiveGarage->status }}" garageId="{{ $inActiveGarage->id }}" class=" btn button-color btn-block btn-block">Edit</button></td>
                @endif
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>

@stop

<div class="modal fade garage-modal" id="garageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
          <form class="form-horizontal" id="form-edit-client" style="width: 100%;">
            <fieldset>

              <div class="form-group mb-1">
                <div class="col-md-4">
                  <label>Id: #<span id="garageUpdateId">1</span></label>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-md-10 control-label" for="update-garage-name">Garage Name *</label>  
                  <div class="col-md-10">
                    <input id="update-garage-name" value="" name="garage-name" type="text" placeholder="Enter garage's name" class="form-control input-md" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-10 control-label" for="update-garage-location">Garage Location *</label>  
                  <div class="col-md-10">
                    <input id="update-garage-location" name="garage-location" type="text" placeholder="Enter garage's location" class="form-control input-md" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-10 control-label" for="update-garage-contactNo">Garage Contact No. *</label>  
                  <div class="col-md-10">
                    <input id="update-garage-contactNo" name="garage-contactNo" type="text" placeholder="Enter garage's Contact No." class="form-control input-md" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-10 control-label" for="update-garage-description">Garage Description</label>  
                  <div class="col-md-10">
                    <textarea class="form-control" id="update-garage-description" name="garage-description" rows="3"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-10 control-label" for="update-mechanic-details">Mechanic Details</label>  
                  <div class="col-md-10">
                    <textarea class="form-control" id="update-mechanic-details" name="mechanic-details" rows="3"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-10 control-label" for="update-other-details">Other Details</label>  
                  <div class="col-md-10">
                    <textarea class="form-control" id="update-other-details" name="other-details" rows="3"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-10 control-label" for="update-other-details">Status *</label>  
                  <div class="col-md-10">
                    <select class="garageSetStatus" id="update-garageSetStatus" required>
                      <option selected value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <button id="updateGarage" class="btn blueButton text-warning mb-2">Update Garage</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
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


