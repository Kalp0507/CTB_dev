@extends('layouts.admin')
   
@section('content')
    <div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit makes</h2>
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
  
    <form action="{{ route('car.update',$car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row" style="flex-direction: column;">
             <div class="col-lg-6 mt-1 form-group">
                    <strong>Make Name : </strong>
            <select class="js-example-basic-second form-control form-control-lg" name="make_id">
                 <option class="brandCont" name="{{$selectedBrand->id}}" id="make-{{$selectedBrand->id}}" value="{{$selectedBrand->id}}">{{$selectedBrand->make_name}}</option>
               @foreach($brands as $make)
               @if($make->id != $selectedBrand->id)
                  <option class="brandCont" name="{{$make->id}}" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                  @endif
                @endforeach 
            </select>
          </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-1">
                <div class="form-group">
                    <strong>Model Name : </strong>
                    <input type="text" name="model_name" value="{{ $car->model_name }}" class="form-control" placeholder="Name">
                    <input type="hidden" name="id" value="{{ $car->id }}">
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <strong>Fuel Type : </strong>
                <select class="js-example-basic-second form-control form-control-lg" name="fuel_id">
                     <option class="fuelSelect" name="{{$fuelSelect->id}}" id="fuel-{{$fuelSelect->id}}" value="{{$fuelSelect->id}}">{{$fuelSelect->fuel_type}}</option>
                    @foreach($fuels as $fuel)
                        @if($fuel->id != $fuelSelect->id)
                            <option class="fuelSelect" name="{{$fuel->id}}" id="fuel-{{$fuel->id}}" value="{{$fuel->id}}">{{$fuel->fuel_type}}</option>
                        @endif
                    @endforeach 
                </select>
            </div>

            <div class="col-lg-6 form-group">
                <strong>Car Type : </strong>
                <select class="js-example-basic-second form-control form-control-lg" name="car_type">
                     <option class="carTypeSelect" name="{{$selectedCarType->type_name}}" id="carType-{{$selectedCarType->id}}" value="{{$selectedCarType->type_name}}">{{$selectedCarType->type_name}}</option>
                    @foreach($carTypes as $carType)
                        @if($carType->id != $selectedCarType->id)
                            <option class="carTypeSelect" name="{{$carType->name}}" id="carType-{{$carType->id}}" value="{{$carType->type_name}}" >{{$carType->type_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Model Old Image : </strong>
                    <img src="{{ URL::to('/') }}/images/models/{{ $car->model_image }}" style="width:300px; height: 150px;" alt="{{ $car->model_image }}">
                    <!-- <button type="submit" class="btn btn-primary"> < Delete</button> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Model New Image (image format must be *png or *jpeg) :</strong>
                    <input type="file" name="model_image" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection