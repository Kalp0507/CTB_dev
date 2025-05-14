@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Package Data</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/ViewAssignedPackages"> View Assigned Package</a>
            </div>
            <div class="pull-right mr-2">
                <a class="btn btn-success" href="/AddNewPackages/create"> Create New Package</a>
            </div>
            

            <!-- <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadCSVModal"  href="#"> Upload CSV</button>
            </div> -->

            <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadGlobalCSVModal"  href="#"> Package Assign CSV</button>
            </div>

            <!-- <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadGlobalCSVModal"  href="#"> Upload Global CSV</button>
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
		            <th>Date</th>
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
		            <td>{{ $package->created_id }}</td>
		            <!-- <td>{{ $package->total_price }}</td>
		            <td>{{ $package->discounted_price }}</td>
		            <td>{{ $package->service_time }}</td>
		            <td>{{ $package->package_type }}</td>
		            <td>{{ $package->make_id }}</td>
		            <td>{{ $package->model_id }}</td>
		            <td>{{ $package->fuel_id }}</td>   --> 
		            <td>
	                    <a class="btn btn-info" href="/AddNewPackages/assignPackageView/{{$package->id}}">Assign</a>
	                    <a class="btn btn-primary" href="/AddNewPackages/editPackageView/{{$package->id}}">Edit</a>
	                    @if($package->id == 5 || $package->id == 6)
                            
                        @else
                            <button class="btn btn-danger deletePackage" id="{{$package->id}}" >Delete</button>

                        @endif
	        		</td>       
		        </tr>
		        @endforeach
		    </tbody>
	    </table>   	
   </div>

@stop

<div class="modal fade" id="uploadGlobalCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/uploadPeriodicCSV" id="servicesForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="file" name="uploadCsv" />
                    <br />
                    <button type="submit" class="btn btn-success btn-md mt-3 uploadBrandCsv">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/uploadPackages" id="servicesForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="file" name="uploadCsv" />
                    <br />
                    <button type="submit" class="btn btn-success btn-md mt-3 uploadBrandCsv">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
	
	// function deletePackage($id) {
	// 	swal({
 //            title: "Are you sure you want to delete this package?",
 //            text: "",
 //            icon: "warning",
 //            buttons: [true, "Yes!"],
 //            showCancelButton: true,
 //            confirmButtonColor: '#DD6B55',
 //            confirmButtonText: 'Okay',
 //            cancelButtonText: 'Cancel',
 //            closeOnConfirm: true,
 //            closeOnClickOutside: false
 //          }).then(function(isConfirm) {
 //            if (isConfirm) {
	// 			console.log("Confirmed"+$(this).attr('data-id'));              
 //            }
 //      	});
	// }


</script>