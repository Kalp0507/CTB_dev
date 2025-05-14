@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>{{$service->displayName}}</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success addServicesParts" id="Mechanical" href="/serviceParts/addServicePartView/3"> Add New Service</a>
            </div>
            <div class="pull-right mr-2">
                <button class="btn btn-success uploadServicesParts" id="Mechanical" data-toggle="modal" data-target="#uploadServicesCSVModal"  href="#"> Upload CSV</button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="pl-5 pr-5 pt-3">
	    <table class="table table-bordered servicesTable">
	    	<thead>
		        <tr>
		            <th>No</th>
		            <th>Part Name</th>
		            <th>Part Description</th>
		            <th>Make</th>
		            <th>Model</th>
		            <th>Fuel</th>
		            <th>Image</th>
		            <th>Price</th>
		            <th>Date</th>
		            <th width="280px">Action</th>
		        </tr>
	    	</thead>
	    	<tbody>
		        @foreach ($serviceParts as $parts)
				        <tr>
				            <td>#{{ $parts->id }}</td>
				            <td>{{ $parts->part_name }}</td>
				            <td>{{ $parts->part_description }}</td>
				            <td>{{ $parts->make }}</td>
				            <td>{{ $parts->model }}</td>
				            <td>{{ $parts->fuel }}</td>
				            <td>{{ $parts->part_image }}</td>
				            <td>{{ $parts->price }}</td>
				            <td>{{ $parts->created_at }}</td>
				            <td>
			                    <a class="btn btn-primary" href="/serviceParts/editServicePartsView/{{$parts->id}}">Edit</a>
			                    <button class="btn btn-danger deleteServicePart MechanicalService" id="{{$parts->id}}" >Delete</button>
			        		</td>       
				        </tr>
		        @endforeach
	    	</tbody>
	    </table>   	
   </div>

@stop
<div class="modal fade" id="uploadServicesCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/servicesPartsCSV" id="servicesForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="file" name="uploadCsv" />
                    <input type="hidden" class="uploadServiceSelected" service="" name="selectedService">
                    <br />
                    <button type="submit" class="btn btn-success btn-md mt-3 uploadBrandCsv">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="uploadCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/uploadServicePartPricing" id="servicesForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="file" name="uploadCsv" />
                    <br />
                    <button type="submit" class="btn btn-success btn-md mt-3 uploadBrandCsv">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->