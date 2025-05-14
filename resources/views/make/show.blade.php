@extends('make.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show makes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('make.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Make Name :  </strong>
                {{ $make->make_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Make Image Name :  </strong>
                {{ $make->make_image }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Make Image :  </strong>
        <img src="{{ URL::to('/') }}/images/brands/{{ $make->make_image }}" style="max-width:200px;height:200px;" alt="...">
            </div>
        </div>
    </div>
@endsection