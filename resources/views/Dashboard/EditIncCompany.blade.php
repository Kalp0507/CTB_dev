@extends('layouts.admin')
@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Edit Insurance Company</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/Dashboard/insuranceCompanies"> Back</a>
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
   
<form action="/Dashboard/insuranceCompanies/updateIncCompany" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
     <div class="row" style="flex-direction: column;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Insurance Company Name:</strong>
                <input type="text" name="companyName" class="form-control" value="{{$companyData->insurance_company}}" />
                <input type="hidden" name="companyId" class="form-control" value="{{$companyData->id}}" />
            </div>
        </div>     

        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
            <button type="submit" class="btn blueButton text-light">Update</button>
        </div>
    </div>
   
</form>
@stop