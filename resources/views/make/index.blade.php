@extends('layouts.admin')
 
@section('content')
    <div class="row pt-3 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Make</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('make.create') }}"> Create New Make</a>
            </div>
            <div class="pull-right mr-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#uploadCSVModal"  href="#"> Upload CSV</button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <div class="pl-5 pr-5 pt-3 pb-5">
        <table class="table table-bordered makeTable">
            <thead>
            <tr>
                <th>No</th>
                <th>Make Name</th>
                <th>Make Image Name</th>
                <!-- <th>Make Image</th> -->
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($make as $makes)
            <tr>
                <td>{{ $makes->id }}</td>
                <td>{{ $makes->make_name }}</td>
                <!-- <td>{{ $makes->make_image }}</td> -->
                <td> <img src="{{ URL::to('/') }}/images/brands/{{ $makes->make_image }}" style="max-width:80px;" alt="..."></td>
                <td>
                    <form action="{{ route('make.destroy',$makes->id) }}" method="POST">
       
                        <!-- <a class="btn btn-info" href="{{ route('make.show',$makes->id) }}">Show</a> -->
        
                        <a class="btn btn-primary" href="{{ route('make.edit',$makes->id) }}">Edit</a>
       
                        @csrf
          
                        <button type="button" class="btn btn-danger deleteMake" id="{{$makes->id}}">Delete</button>
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
            <form method="POST" action="/uploadBrands" id="servicesForm" enctype="multipart/form-data">
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