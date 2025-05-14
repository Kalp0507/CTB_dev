@extends('layouts.admin')

 
@section('content')
    <div class="row pt-3 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Car Models</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('car.create') }}"> Create New Model</a>
            </div>
            <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadCSVModal"  href="#"> Model Updation CSV</button>
            </div>
           <!--  <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadFuelCSVModal"  href="#"> Upload Assign Fuels To Models CSV</button>
            </div> -->
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
       @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="pl-5 pr-5 pt-3 pb-5">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Model Name</th>
                <th>Car Type</th>
                <!-- <th>Model Image Name</th> -->
                <th>Model Image</th>
                <th>Make Id</th>
                <th>Date</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
             @foreach ($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->model_name }}</td>
                <td>{{ $car->car_type }}</td>
                <!-- <td>{{ $car->model_image }}</td> -->
                <td> <img src="{{ URL::to('/') }}/images/models/{{ $car->model_image }}" style="max-width:80px;" alt="..."></td>
                <td>{{ $car->make_id }}</td>
                <td>{{ $car->created_at }}</td>
                <td>
                    <form action="{{ route('car.destroy',$car->id) }}" method="POST">
                        <!-- <a class="btn btn-info" href="{{ route('car.show',$car->id) }}" id="{{$car->id}}">Show</a> -->
                        <a class="btn btn-primary" href="{{ route('car.edit',$car->id) }}" id="{{$car->id}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
        
    </div>
      
@endsection

<div class="modal fade" id="uploadCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/uploadAssignModels" id="servicesForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="file" name="uploadCsv" />
                    <br />
                    <button type="submit" class="btn btn-success btn-md mt-3 uploadBrandCsv">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadFuelCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/uploadFuelAssign" id="servicesForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="file" name="uploadCsv" />
                    <br />
                    <button type="submit" class="btn btn-success btn-md mt-3 uploadBrandCsv">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>