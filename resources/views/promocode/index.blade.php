@extends('layouts.admin')
 
@section('content')
    <div class="row pr-5 pt-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Promocodes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('promocode.create') }}"> Create New Promocode</a>
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

    <div class="pt-3 px-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Promocode Text</th>
                    <th>Discount Type</th>
                    <th>Promocode_amount</th>
                    <th>Max Discount</th>
                    <th>Promocode_start_date</th>
                    <th>Promocode_end_date</th>
                    <th>Promocode Status</th>
                    <th>Created Date</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promocodes as $promocode)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $promocode->promocode_text }}</td>
                    <td>{{ $promocode->selection_type =="1" ? 'In Percent' : 'Flat' }}</td>
                    <td>{{ $promocode->promocode_amount }}</td>
                    <td>{{ $promocode->max_discount }}</td>
                    <td>{{ $promocode->promocode_start_date }}</td>
                    <td>{{ $promocode->promocode_end_date }}</td>
                         
                    @if( $promocode->promocode_status == "1")
                        <td>Activated</td>
                    @elseif( $promocode->promocode_status == "2")
                        <td>Deactivated</td>
                    @else
                        <td>Pending</td>       
                    @endif
                    <td>{{ $promocode->created_at }}</td>
                    <td>
                        <form action="{{ route('promocode.destroy',$promocode->id) }}" method="POST">
            
                            <a class="btn btn-primary" name ="{{ $promocode->id}}" href="{{ route('promocode.edit',$promocode->id) }}">Edit</a>
           
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
            <form method="POST" action="/uploadPromocodes" id="servicesForm" enctype="multipart/form-data">
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