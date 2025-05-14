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

<form action="/carPartPricing/setPartPrice" method="POST" enctype="multipart/form-data" class="mt-3 pl-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Select Car Part:</strong>
                <select class="js-example-basic-first form-control" name="selectCarParts" id="selectCarParts">
                    @foreach($partsData as $part)
                        <option value="{{$part->id}}">{{$part->part_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Select Car Type:</strong>
                <select class="js-example-basic-first form-control" name="selectCarType" id="selectCarType">
                    @foreach($carTypeData as $carType)
                        <option value="{{$carType->id}}">{{$carType->type_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Solid: </strong>
                <input type="number" name="solidMaterial" class="form-control" placeholder="e.g. 1000" value="" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Metallic: </strong>
                <input type="number" name="metallicMaterial" class="form-control" placeholder="e.g. 2500" value="" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Pearl: </strong>
                <input type="number" name="pearlMaterial" class="form-control" placeholder="e.g. 4000" value="" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5 text-center mt-2">
            <button type="submit" class="btn text-light blueButton">SET</button>
        </div>
    </div>
   
</form>

@stop