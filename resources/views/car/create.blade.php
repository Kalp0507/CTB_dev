@extends('layouts.admin')
  
@section('content')
<div class="row pt-5 pr-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Model</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('car.index') }}"> Back</a>
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
   
<form action="{{ route('car.store') }}" class="pl-3 mt-3" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
            <strong>Make Name:</strong>
            <select class="js-example-basic-second form-control form-control-lg" name="make_id">
               @foreach($brands as $make)
                  <option class="brandCont" name="{{$make->id}}" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                @endforeach 
            </select>
        </div>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Model Name:</strong>
                <input type="text" name="model_name" class="form-control form-control-lg" placeholder="e.g. MARUTI SUZUKI">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <strong>Fuel Type:</strong>
                <select class="js-example-basic-second form-control form-control-lg" name="fuel_id">
                   @foreach($fuels as $fuel)
                      <option class="brandCont" name="{{$fuel->id}}" id="fuel-{{$fuel->id}}" value="{{$fuel->id}}">{{$fuel->fuel_type}}</option>
                    @endforeach 
                </select>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="form-group">
                <strong>Car Type:</strong>
                <select class="js-example-basic-second form-control form-control-lg" name="car_type">
                   @foreach($carTypes as $carType)
                      <option class="carType" name="{{$carType->id}}" id="carType-{{$carType->id}}" value="{{$carType->type_name}}">{{$carType->type_name}}</option>
                    @endforeach 
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Model Image Name:</strong>
                 <input type="file" name="model_image" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 mt-4 text-center ">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection