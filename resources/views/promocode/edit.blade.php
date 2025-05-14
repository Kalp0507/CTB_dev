@extends('layouts.admin')
   
@section('content')
    <div class="row pl-5 pt-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/Dashboard/promocode"> Back</a>
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
  
    <form action="{{ route('promocode.update',$promocode->id) }}" class="pl-5 pt-3" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>Promocode Text : </strong>
                    <input type="text" name="promocode_text" value="{{ $promocode->promocode_text }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Promocode Selection Type :</strong>  

                    <select class="form-control form-control-lg" name="selection_type">          
                        @if($promocode->selection_type == "1")
                            <option class="percent" name="percent" id="percent" value="1">In Percent</option>
                            <option class="flat" name="flat" id="flat" value="2">Flat</option>

                        @elseif($promocode->selection_type == "2")
                            <option class="flat" name="flat" id="flat" value="2">Flat</option>
                            <option class="percent" name="percent" id="percent" value="1">In Percent</option>
                        @endif

                    </select>
                </div>
            </div>

            @if($promocode->selection_type == "1")
                <div class="col-xs-12 col-sm-12 col-md-8 maxDiscountDiv">
                    <div class="form-group">
                        <strong>Max Discount:</strong>
                         <input type="text" name="max_discount" class="form-control form-control-lg" value="{{$promocode->max_discount}}">
                    </div>
                </div>
            @endif

            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Promocode Amount : </strong>
                    <input type="text" name="promocode_amount" value="{{ $promocode->promocode_amount }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Promocode Start Date : </strong>
                    <input class="form-control form-control-lg" name="promocode_start_date" type="date" value="{{ $promocode->promocode_start_date}}" id="end_date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
               <div class="form-group">
                    <strong>Promocode End Date : </strong>
                    <input class="form-control form-control-lg" name="promocode_end_date" type="date" value="{{ $promocode->promocode_end_date}}" id="end_date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>Promocode Status : </strong>
                    <select class="form-control form-control-lg" name="promocode_status">
                        @if($promocode->promocode_status == "1")
                            <option class="Activate" name="Activate" id="Activate" value="1">Activate</option>
                            <option class="deactivate" name="deactivate" id="deactivate" value="2">Deactivate</option>
                            <option class="Pending" name="Pending" id="Pending" value="3">Pending</option>
                        @elseif($promocode->promocode_status == "2")
                            <option class="deactivate" name="deactivate" id="deactivate" value="2">Deactivate</option>
                            <option class="Activate" name="Activate" id="Activate" value="1">Activate</option>
                            <option class="Pending" name="Pending" id="Pending" value="3">Pending</option>
                        @elseif($promocode->promocode_status == "3")
                            <option class="Pending" name="Pending" id="Pending" value="3">Pending</option>
                            <option class="deactivate" name="deactivate" id="deactivate" value="2">Deactivate</option>
                            <option class="Activate" name="Activate" id="Activate" value="1">Activate</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection