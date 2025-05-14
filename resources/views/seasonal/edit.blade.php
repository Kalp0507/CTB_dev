@extends('layouts.admin')
   
@section('content')
    <div class="row pl-5 pt-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/Dashboard/seasonal"> Back</a>
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
  
    <form action="{{ route('seasonal.update',$seasonal->id) }}" class="pl-5 pt-3" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>Seasonal Title : </strong>
                    <input type="text" name="seasonal_title" value="{{ $seasonal->seasonal_title }}" class="form-control" placeholder="Name">
                     <input type="hidden" name="id" value="{{ $seasonal->id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Select Seasonal Old Icon  :</strong>  
                    <img src="{{ URL::to('/') }}/images/seasonal/{{ $seasonal->seasonal_icon }}" style="width:80px; height: 80px;" alt="{{ $seasonal->seasonal_icon }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Select Seasonal Icon  :</strong>  
                    <input type="file" name="seasonal_icon" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Select Seasonal Old Background Image  :</strong>  
                    <img src="{{ URL::to('/') }}/images/seasonal/{{ $seasonal->seasonal_background_image }}" style="width:80px; height: 80px;" alt="{{ $seasonal->seasonal_background_image }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Select Seasonal Background Image  :</strong>  
                    <input type="file" name="seasonal_background_image" class="form-control form-control-lg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <strong>Seasonal Service Name : </strong>
                <select class="js-example-basic-second form-control form-control-lg" name="serviceToRedirectId">
                   
                   @foreach($services as $service)
                    @if( $service->id == $seasonal->serviceToRedirectId)
                        <option class="seasonal" name="{{$service->id}}" id="service-{{$service->id}}" value="{{$service->id}}" selected>{{$service->displayName}}</option>
                    @endif
                    @if( $service->id != $seasonal->serviceToRedirectId)
                        <option class="seasonal" name="{{$service->id}}" id="service-{{$service->id}}" value="{{$service->id}}">{{$service->displayName}}</option>
                    @endif
                     @endforeach 
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection