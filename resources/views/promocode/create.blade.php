@extends('layouts.admin')
  
@section('content')

<div class="row mt-5 pl-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Promocode</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('promocode.index') }}"> Back</a>
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
   
<form action="{{ route('promocode.store') }}" class="pl-5" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Promocode Text:</strong>
                <input type="text" name="promocode_text" class="form-control form-control-lg" placeholder="e.g. SUMMER50">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Promocode Selection Type :</strong>
                 <select class="form-control form-control-lg promocodeType" name="selection_type">
                  <option class="percent" name="percent" id="percent" value="1">In Percent</option>
                  <option class="flat" name="flat" id="flat" value="2">Flat</option>
            </select>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 maxDiscountDiv">
            <div class="form-group">
                <strong>Max Discount:</strong>
                 <input type="text" name="max_discount" class="form-control form-control-lg" placeholder="e.g. 200">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Promocode Amount :</strong>
                 <input type="text" name="promocode_amount" class="form-control form-control-lg" placeholder="e.g. 50">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Promocode Start Date :</strong>
                 <input class="form-control form-control-lg" id="promocodeStartDate" name="promocode_start_date" type="date" value="" id="start_date">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Promocode End Date :</strong>
                 <input class="form-control form-control-lg" name="promocode_end_date" type="date" value="" id="end_date">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>Promocode Status :</strong>
                 <select class="form-control form-control-lg" name="promocode_status">
                  <option class="activate" name="activate" id="activate" value="1" selected>Activate</option>
                  <option class="deactivate" name="deactivate" id="deactivate" value="2">Deactivate</option>
                  <option class="pending" name="pending" id="pending" value="3">Pending</option>
            </select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection

