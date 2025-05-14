@extends('make.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show makes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('car.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Name:</strong>
                {{ $car->model_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Image Name :</strong>
                {{ $car->model_image }}
            </div>
        </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Image :</strong>
        <img src="{{ URL::to('/') }}/images/models/{{ $car->model_image }}" style="max-width:20%;" alt="...">
            </div>
        </div>
    </div>
@endsection