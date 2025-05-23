@extends('layouts.admin')
  
@section('content')
<div class="row pt-5 pr-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Addon</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('addon.index') }}"> Back</a>
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
   
<form action="{{ route('addon.store') }}" class="pl-3 mt-3" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
            <strong>Addon Name:</strong>
           <input type="text" name="addon_name" class="form-control form-control-lg" placeholder="e.g. Break Maintainance">
        </div>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Addon Description:</strong>
                 <textarea class="form-control" style="height:150px" name="addon_description" placeholder="Detail"></textarea>
            </div>
        </div>
        <input type="hidden" name="category" value="1" />
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Addon Image :</strong>
                 <input type="file" name="addon_icon" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
            <strong>Addon Price:</strong>
           <input type="text" name="addon_price" class="form-control form-control-lg" placeholder="e.g. 2500">
        </div>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-10 mt-4 text-center ">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection