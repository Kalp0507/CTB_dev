@extends('layouts.admin')
   
@section('content')
    <div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Addon</h2>
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
  
    <form action="{{ route('addon.update',$addon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row" style="flex-direction: column;">
           <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
            <strong>Addon Name:</strong>
            <input type="hidden" name="id"  value="{{ $addon->id}}">
           <input type="text" name="addon_name" class="form-control form-control-lg" value="{{ $addon->addon_name}}" placeholder="e.g. Break Maintainance">
        </div>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Addon Description:</strong>
                 <textarea class="form-control" style="height:150px" name="addon_description" placeholder="Detail">{{ $addon->addon_description}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Addon Old Image : </strong>
                <img src="{{ URL::to('/') }}/images/addons/{{ $addon->addon_icon }}" style="width:300px; height: 150px;" alt="{{ $addon->addon_icon }}">
                <!-- <button type="submit" class="btn btn-primary"> < Delete</button> -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Addon Image (image format must be *png or *jpeg) :</strong>
                 <input type="file" name="addon_icon" class="form-control form-control-lg">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
            <strong>Addon Price:</strong>
           <input type="text" name="addon_price" class="form-control form-control-lg" value="{{ $addon->addon_price}}" placeholder="e.g. 2500">
        </div>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-10 mt-4 text-center ">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
             
    </form>
@endsection