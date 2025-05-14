@extends('layouts.admin')
@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Edit Car Part</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/AddNewPart/viewParts"> Back</a>
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
<form action="/AddNewPart/updatePart" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Part Name:</strong>
                <input type="text" name="partName" class="form-control" value="{{ $partsData->part_name }}" placeholder="e.g. Hood, Dicky Door ">

                <input type="hidden" name="partId" value="{{ $partsData->id }}">
            </div>
        </div>     

        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                <button type="submit" class="btn text-light blueButton">Update</button>
        </div>
    </div>
</form>
@stop