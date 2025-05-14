@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Membership Packages</h3>
            </div>
            <!-- <div class="pull-right">
                <a class="btn btn-success" href="/AddNewPackages/create"> Create New Package</a>
            </div> -->
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="pl-5 pr-5 pt-3">
	    <table class="table table-bordered">
	    	<thead>
		        <tr>
		            <th>No</th>
		            <th>Package Name</th>
		            <th>Package Description</th>
		            <!-- <th>Total Price</th>
		            <th>Discounted Price</th>
		            <th>Service Time</th>
		            <th>Package Type</th>
		            <th>Make</th>
		            <th>Model</th>
		            <th>Fuel</th> -->
		            <th width="280px">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		        @foreach ($packageData as $package)
		        <tr>
		            <td>#{{ $package->id }}</td>
		            <td>{{ $package->package_name }}</td>
		            <td>{{ $package->package_description }}</td>
		            <!-- <td>{{ $package->total_price }}</td>
		            <td>{{ $package->discounted_price }}</td>
		            <td>{{ $package->service_time }}</td>
		            <td>{{ $package->package_type }}</td>
		            <td>{{ $package->make_id }}</td>
		            <td>{{ $package->model_id }}</td>
		            <td>{{ $package->fuel_id }}</td>   --> 
		            <td>
	                    <a class="btn btn-info" href="/AddNewPackages/assignMembershipPackageView/{{$package->id}}">Assign</a>
	                    <a class="btn btn-primary" href="/AddNewPackages/editMembershipPackageView/{{$package->id}}">Edit</a>
	                    <!-- <button class="btn btn-danger deletePackage" id="{{$package->id}}" >Delete</button> -->
	        		</td>       
		        </tr>
		        @endforeach
		    </tbody>
	    </table>   	
   </div>

@stop

<script type="text/javascript">
</script>