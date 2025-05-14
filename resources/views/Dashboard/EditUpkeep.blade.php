@extends('layouts.admin')
@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Edit New Upkeep</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/Dashboard/AddNewUpkeep"> Back</a>
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
   
<form action="/AddNewUpkeep/updateUpkeep" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Pacakge Name:</strong>
                <input type="text" name="upkeepName" class="form-control" placeholder="e.g. Upkeep 1" value="{{$upkeepData->package_name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Upkeep Description:</strong>
                <input type="text" name="upkeepDescription" class="form-control" value="{{$upkeepData->package_description}}" placeholder="e.g. Upkeep Description">
            </div>
        </div>
                <input type="hidden" name="upkeepId" class="form-control" value="{{$upkeepData->id}}">

        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                <button type="submit" class="btn blueButton text-light">Submit</button>
        </div>
    </div>
   
</form>
@stop