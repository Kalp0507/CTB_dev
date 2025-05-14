@extends('layouts.admin')
   
@section('content')
    <div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Reward</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/ViewUserReward"> Back</a>
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
  
    <form action="/updateUserReward" method="POST" enctype="multipart/form-data">
        @csrf
   
         <div class="row" style="flex-direction: column;">
                    <input type="hidden" name="id" value="{{$rewardData->id}}">
             <div class="col-lg-6 mt-1 form-group">
                <strong>Reward In Percent : </strong>
                    <input type="text" class="form-control form-control-lg" name="reward_in_percent" value="{{$rewardData->reward_in_percent}}">
            </div>
             <div class="col-lg-6 mt-1 form-group">
                    <strong>Minimun order price to get : </strong>
                  <input type="text" class="form-control form-control-lg" name="min_order_price_to_get" value="{{$rewardData->min_order_price_to_get}}">
          </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-1">
                <div class="form-group">
                    <strong>Maximum reward per order : </strong>
                     <input type="text" class="form-control form-control-lg" name="max_reward_per_order" value="{{$rewardData->max_reward_per_order}}">
                </div>
            </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 mt-1">
                <div class="form-group">
                    <strong>Maximum reward points to apply : </strong>
                     <input type="text" class="form-control form-control-lg" name="max_reward_point_to_apply" value="{{$rewardData->max_reward_point_to_apply}}">
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <strong>Reward status : </strong>
                <select class="form-control form-control-lg" name="status">
                    <option value="active">active</option>
                    <option value="deactive">De-active</option>
                </select>
                
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection