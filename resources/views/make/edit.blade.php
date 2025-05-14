@extends('layouts.admin')
   
@section('content')
    <div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit makes</h2>
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
  
    <form action="{{ route('make.update',$make->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row" style="flex-direction: column;">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Make Name:</strong>
                    <input type="text" name="make_name" value="{{ $make->make_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <input type="hidden" name="id" value="{{$make->id}}" />
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Make Image:</strong>
                    <img src="{{ URL::to('/') }}/images/brands/{{ $make->make_image }}" style="max-width:200px;height:200px;" alt="...">
                     <input type="file" name="make_image" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection