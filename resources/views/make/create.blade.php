@extends('layouts.admin')
  
@section('content')
<div class="row pt-5 pr-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New make</h2>
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
   
<form action="{{ route('make.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row" style="flex-direction: column;">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Make Name:</strong>
                <input type="text" name="make_name" class="form-control" placeholder="e.g. MARUTI SUZUKI">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Make Image Name:</strong>
                 <input type="file" name="make_image" class="form-control" placeholder="e.g. SUZUKI.png" />

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection