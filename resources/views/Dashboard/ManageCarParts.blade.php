@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>{{$service->displayName}}</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/carPartPricing/assignPartToType"> Assign Parts To Car Type</a>
                <a class="btn btn-success" href="/AddNewPart/viewParts"> View Parts</a>
                <a class="btn btn-success" href="/AddNewCarType/viewCarTypes"> View Car Types</a>
            </div>
            <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadCSVModal"  href="#"> Upload CSV</button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="pl-5 pr-5 pt-3">
	    <table class="table table-bordered accidentalServiceTable">
	    	<thead>
	        <tr>
	            <th>No</th>
	            <th>Part Name</th>
	            <th>Car Type</th>
	            <th>Solid</th>
	            <th>Metallic</th>
	            <th>Pearl</th>
	            <th>Date</th>
	            <th width="280px">Action</th>
	        </tr>
	        </thead>
	        <tbody>
	        @foreach ($partPriceData as $priceData)
	        <tr>
	            <td>#{{ $priceData->id }}</td>
	            <td>{{ $priceData->part_name }}</td>
	            <td>{{ $priceData->car_type }}</td>
	            <td>{{ $priceData->solid }}</td>
	            <td>{{ $priceData->metallic }}</td>
	            <td>{{ $priceData->pearl }}</td>
	            <td>{{ $priceData->created_at }}</td>
                <td>
                    <a class="btn btn-primary" href="/carPartPricing/accidentalPricingUpdateView/{{$priceData->id}}">Edit</a>
                    <button class="btn btn-danger deleteServicePart AccidentalService" id="{{$priceData->id}}" >Delete</button>
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
            <form method="POST" action="/accidentalPricingUpload" id="servicesForm" enctype="multipart/form-data">
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