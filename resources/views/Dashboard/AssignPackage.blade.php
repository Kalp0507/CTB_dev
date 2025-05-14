@extends('layouts.admin')
@section('content')
<div class="row mt-5 pl-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Assign Package</h3>
        </div>
        <div class="pull-right">
            <a class="btn text-light blueButton" href="/Dashboard/AddNewPackages"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/AddNewPackages/assignPackage" method="POST" enctype="multipart/form-data" class="mt-3 pl-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Pacakge Name:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1" value="{{$packageData->package_name}}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Pacakge Description:</strong>
                <input type="text" name="packageDescription" class="form-control" value="{{$packageData->package_description}}" placeholder="e.g. Package Description" readonly>
            </div>
        </div>
                <input type="hidden" name="packageId" class="form-control" value="{{$packageData->id}}">

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Make:</strong>
                <select class="js-example-basic-first form-control" name="assignMake" id="assignMake">
                        <option value='0'>Select Car Make</option>
                    @foreach($brandData as $brand)
                        <option value="{{$brand->id}}">{{$brand->make_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Model:</strong>
                <select class="js-example-basic-first form-control" name="assignModel" id="assignModel">
                </select>
            </div>
        </div>

        <input type="hidden" id="selectedMake" name="selectedMake" value="" />
        <input type="hidden" id="selectedModel" name="selectedModel" value="" />
        <input type="hidden" id="selectedFuel" name="selectedFuel" value="" />

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Fuel:</strong>
                <select class="js-example-basic-first form-control" name="assignFuel" id="assignFuel">
                   
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Total Price:</strong>
                <input type="text" name="totalPrice" class="form-control" placeholder="e.g. 3000" value="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Discounted Price:</strong>
                <input type="text" name="discountedPrice" class="form-control" placeholder="e.g. 3000" value="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Service Time: (in Hours)</strong>
                <input type="text" name="serviceTime" class="form-control" placeholder="e.g. 1" value="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 text-center mt-2">
            <button type="submit" class="btn text-light blueButton">Assign</button>
        </div>
    </div>
   
</form>
@stop