@extends('layouts.admin')
@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Add New Package</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/Dashboard/AddNewPackages"> Back</a>
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
   
<form action="/AddNewPackages/createPackage" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Pacakge Name:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Pacakge Description:</strong>
                <input type="text" name="packageDescription" class="form-control" placeholder="e.g. Package Description">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Total Price:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Discounted Price:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Service Time:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Make:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Model:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1">
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Fuel:</strong>
                <input type="text" name="packageName" class="form-control" placeholder="e.g. Package 1">
            </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                <button type="submit" class="btn blueButton text-light">Submit</button>
        </div>
    </div>
   
</form>
@stop