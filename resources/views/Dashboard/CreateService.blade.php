@extends('layouts.admin')
@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Add New Service</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('make.index') }}"> Back</a>
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
   
<form action="/AddNewServices/createService" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Service Name:</strong>
                <input type="text" name="serviceName" class="form-control" placeholder="e.g. Washing">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Assign To Package:</strong>
                <select name="packageId" class="js-example-basic-first form-control">
                    @foreach($packageData as $package)
                        <option value="{{$package->id}}">{{$package->package_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                <button type="submit" class="btn text-light blueButton">Submit</button>
        </div>
    </div>
   
</form>
@stop