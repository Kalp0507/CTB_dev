@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Upkeep Data</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/AddNewUpkeep/create"> Create New Package</a>
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
		            <th>Upkeep Name</th>
		            <th>Upkeep Description</th>
		            <th>Date</th>
		            <th width="280px">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		        @foreach ($upkeepData as $upkeep)
		        <tr>
		            <td>#{{ $upkeep->id }}</td>
		            <td>{{ $upkeep->package_name }}</td>
		            <td>{{ $upkeep->package_description }}</td>
		            <td>{{ $upkeep->created_id }}</td>
		            <td>
	                    <a class="btn btn-info" href="/AddNewUpkeep/assignUpkeepView/{{$upkeep->id}}">Assign</a>
	                    <a class="btn btn-primary" href="/AddNewPackages/editUpkeepView/{{$upkeep->id}}">Edit</a>
	                    <button class="btn btn-danger deleteUpkeep" id="{{$upkeep->id}}" >Delete</button>
	        		</td>       
		        </tr>
		        @endforeach
		    </tbody>
	    </table>   	
   </div>

@stop

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