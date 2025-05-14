@extends('layouts.admin')
 
@section('content')
    <div class="row pr-5 pt-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Seasonal Offer Update</h2>
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
            <tr>
                <th>No</th>
                <th>Seasonal Offer Title</th>
                <th>Seasonal Offer Icon</th>
                <th>Seasonal Offer Backaground</th>
                <th>Seasonal Offer Redirection Page</th>

                <th width="280px">Action</th>
            </tr>
            @foreach ($seasonals as $seasonal)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $seasonal->seasonal_title }}</td>
                <td><img src="{{ URL::to('/') }}/images/seasonal/{{ $seasonal->seasonal_icon }}" style="width:80px; height: 80px;" alt="{{ $seasonal->seasonal_icon }}"></td>
                <td><img src="{{ URL::to('/') }}/images/seasonal/{{ $seasonal->seasonal_background_image }}" style="width:80px; height: 80px;" alt="{{ $seasonal->seasonal_background_image }}"></td>
                <td>{{ $seasonal->service_name }}</td> 
                <td>
                    <form action="{{ route('seasonal.destroy',$seasonal->id) }}" method="POST">
        
                        <a class="btn btn-primary" name ="{{ $seasonal->id}}" href="{{ route('seasonal.edit',$seasonal->id) }}">Edit</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
  
    {!! $seasonals->links() !!}
      
@endsection