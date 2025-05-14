@extends('layouts.admin')
   
@section('content')
    <div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit makes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/ViewAssignedPackages"> Back</a>
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
  
    <form action="/updateAssignedPackageView" method="POST" enctype="multipart/form-data">
        @csrf
   
         <div class="row" style="flex-direction: column;">
             <div class="col-lg-6 mt-1 form-group">
                <strong>Package Name : </strong>
                    <select class="js-example-basic-second form-control form-control-lg" name="package_id" readonly disabled>
                        <option class="brandCont" name="{{$packageData->package_id}}" value={{$packageData->package_id}}>{{$packageData->package_name}}</option>
                    </select>
            </div>
             <div class="col-lg-6 mt-1 form-group">
                    <strong>Make Name : </strong>
            <select class="js-example-basic-second form-control form-control-lg" name="make_id" readonly disabled>
                 <option class="brandCont" name="{{$selectedBrand->id}}" id="make-{{$selectedBrand->id}}" value="{{$selectedBrand->id}}">{{$selectedBrand->make_name}}</option>
            </select>
          </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-1">
                <div class="form-group">
                    <strong>Model Name : </strong>
                    <select class="js-example-basic-second form-control form-control-lg" name="model_id" readonly disabled>
                         <option class="modelCont" name="{{$selectedFuel->id}}" id="make-{{$selectedFuel->id}}" value="{{$selectedFuel->id}}">{{$selectedFuel->model_name}}</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <strong>Fuel Type : </strong>
                <select class="js-example-basic-second form-control form-control-lg" name="fuel_id" readonly disabled>
                     <option class="fuelSelect" name="{{$fuelSelect->id}}" id="fuel-{{$fuelSelect->id}}" value="{{$fuelSelect->id}}">{{$fuelSelect->fuel_type}}</option>
                </select>
                <input type="hidden" name="package_name" value="{{$packageData->package_name}}">
                <input type="hidden" name="make" value="{{$packageData->make}}">
                <input type="hidden" name="model" value="{{$packageData->model}}">
                <input type="hidden" name="fuel" value="{{$packageData->fuel}}">
                <input type="hidden" name="make_id" value="{{$packageData->make_id}}">
                <input type="hidden" name="model_id" value="{{$packageData->model_id}}">
                <input type="hidden" name="fuel_id" value="{{$packageData->fuel_id}}">
                <input type="hidden" name="id" value="{{$packageData->id}}">
            </div>
            <div class="col-lg-6 form-group">
                <strong>Package Description : </strong><br>
                <textarea class="form-control form-control-lg" rows="3" disabled>
                    {{ $packageData->package_description }}
                </textarea>
            </div>
            <div class="col-lg-6 form-group">
                <strong>Total Price : </strong><br>
                <input class="form-control form-control-lg" type="text" name="total_price" value="{{$packageData->total_price}}">
            </div>
            <div class="col-lg-6 form-group">
                <strong>Discounted Price : </strong><br>
                <input  class="form-control form-control-lg" type="text" name="discounted_price" value="{{$packageData->discounted_price}}">
                </div>
            <div class="col-lg-6 form-group">
                <strong>Service Time : </strong><br>
                <input  class="form-control form-control-lg" type="text" name="servie_time" value="{{$packageData->service_time}}">
            </div>
            <div class="col-lg-6 form-group">
                <select class="form-control form-control-lg" name="status">
                    <option value="active">active</option>
                    <option value="deactive">De-active</option>
                </select>
                
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection