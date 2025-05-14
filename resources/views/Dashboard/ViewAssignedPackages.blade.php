@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Package Data</h3>
            </div>
            <div class="pull-right mr-2">
                <a class="btn btn-success" href="/Dashboard/AddNewPackages"> Back</a>
            </div>
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
		            <!-- <th>Package Description</th> -->
		            <!-- <th>Package Id</th> -->
		            <!-- <th>Package Type</th> -->
		            <th>Make</th>
		            <th>Model</th>
		            <th>Fuel</th>
		            <th>Total Price</th>
		            <th>Discounted Price</th>
		            <th>Service Time</th>
		            <th>Status</th>
		            <th width="280px">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		        @foreach ($packageData as $package)
		        <tr>
		            <td>#{{ $package->id }}</td>
		            <td>{{ $package->package_name }}</td>
		            <!-- @if($package->package_description != null)
		            	<td>{{ $package->package_description }}</td>
		            @else
		            	<td>Null</td>
		            @endif -->
		            <!-- <td>{{ $package->package_id }}</td> -->
		            <!-- <td>{{ $package->package_type }}</td> -->
		            <td>{{ $package->make }}</td>
		            <td>{{ $package->model }}</td>
		            <td>{{ $package->fuel }}</td>   
		            <td>{{ $package->total_price }}</td>
		            <td>{{ $package->discounted_price }}</td>
		           	@if($package->service_time != null)
		           		<td>{{ $package->service_time }}</td>
		            @else
		            	<td>Null</td>
		            @endif
		            <td>{{ $package->status }}</td>
		         
		            <td>
	                    <a class="btn btn-primary" href="editAssignedPackageView/{{$package->id}}">Edit</a>
                        <form method="POST" action="/deleteAssignedPackageView/{{$package->id}}" id="servicesForm" enctype="multipart/form-data">
                			{{ csrf_field() }}
            	            <button type="submit" class="btn btn-danger btn-md mt-3">Delete</button>
			            </form>
	        		</td>       
		        </tr>
		        @endforeach
		    </tbody>
	    </table>   	
   </div>

@stop