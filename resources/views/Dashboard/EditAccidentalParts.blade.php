@extends('layouts.admin')
@section('content')

<div class="row mt-5 pl-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Assign Car Part to Car Type</h3>
        </div>
        <div class="pull-right">
            <a class="btn text-light blueButton" href="/Dashboard/carPartPricing"> Back</a>
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

<form action="/carPartPricing/accidentalPricingUpdate" method="POST" enctype="multipart/form-data" class="mt-3 pl-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        
        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Selectd Car Part:</strong>
                <input type="text" class="form-control" name="selectCarParts" value="{{$accidentalPartData->part_name}}" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Selectd Car Type:</strong>
                <input type="text" class="form-control" name="selectCarType" value="{{$accidentalPartData->car_type}}" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Solid: </strong>
                <input type="number" name="solidMaterial" class="form-control" value="{{$accidentalPartData->solid}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Metallic: </strong>
                <input type="number" name="metallicMaterial" class="form-control" value="{{$accidentalPartData->metallic}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Pearl: </strong>
                <input type="number" name="pearlMaterial" class="form-control" value="{{$accidentalPartData->pearl}}" required>
            </div>
        </div>

        <input type="hidden" name="part_id" value="{{$accidentalPartData->id}}">

        <div class="col-xs-12 col-sm-12 col-md-5 text-center mt-2">
            <button type="submit" class="btn text-light blueButton">Update</button>
        </div>
    </div>
   
</form>

@stop