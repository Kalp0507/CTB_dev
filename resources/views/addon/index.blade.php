@extends('layouts.admin')

 
@section('content')
    <div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Popular Services</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addon.create') }}"> Create New Addon</a>
                
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="pl-5 pr-5 pt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Addon Name</th>
                    <th>Addon Description</th>
                    <th>Addon Image</th>
                    <th>Addon Price</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addons as $addon)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $addon->addon_name }}</td>
                    <td>{{ $addon->addon_description }}</td>
                    <td> <img src="{{ URL::to('/') }}/images/addons/{{ $addon->addon_icon }}" style="max-width:80px;" alt="..."></td>
                    <td>{{ $addon->addon_price }}</td>
                    <td>
                        <form action="{{ route('addon.destroy',$addon->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('addon.edit',$addon->id) }}" id="{{$addon->id}}">Edit</a>
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