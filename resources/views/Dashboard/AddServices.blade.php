@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Package Features</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/AddNewServices/createSeriviceView"> Add New Service</a>
            </div>
            <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadCSVModal"  href="#"> Package Uptadation CSV</button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="pl-5 pr-5 pt-3">
	    <table class="table table-bordered table-responsive-sm" id="pacakageFeaturesTable">
	        <thead>
	            <th>Service Id</th>
	            <th>Service Name</th>
	            <th>Assigned To Package</th>
	            <th>Date</th>
	            <!-- <th>Total Price</th>
	            <th>Discounted Price</th>
	            <th>Service Time</th>
	            <th>Package Type</th>
	            <th>Make</th>
	            <th>Model</th>
	            <th>Fuel</th> -->
	            <th width="280px">Action</th>
	        </thead>
	        <tbody>
	        @foreach ($serviceData as $key => $service)
	        <tr>
	            <td>#{{ $service->id }}</td>
	            <td>{{ $service->service_name }}</td>
	            <td>{{ $pacakegNameData[$key]->pacakageName }}</td>
	            <td>{{ $service->created_at }}</td>
	            <!-- <td>{{ $service->total_price }}</td>
	            <td>{{ $service->discounted_price }}</td>
	            <td>{{ $service->service_time }}</td>
	            <td>{{ $service->service_type }}</td>
	            <td>{{ $service->make_id }}</td>
	            <td>{{ $service->model_id }}</td>
	            <td>{{ $service->fuel_id }}</td>   --> 
	            <td>
                    <!-- <a class="btn btn-info" href="/AddNewServices/assignPackageView/{{$service->id}}">Assign</a> -->
                    <a class="btn btn-primary" href="/AddNewServices/editServiceView/{{$service->id}}">Edit</a>
                    <button class="btn btn-danger deleteService" id="{{$service->id}}" >Delete</button>
        		</td>       
	        </tr>
	        @endforeach
	        </tbody>
	    </table>   	
   </div>

@stop

<div class="modal fade" id="uploadCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/uploadServices" id="servicesForm" enctype="multipart/form-data">
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