@extends('layouts.admin')
@section('content')
	
	<div class="row pt-5 pr-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Reward Data</h3>
            </div>
            <div class="pull-right mr-2">
                <a class="btn btn-success" href="/Dashboard"> Back</a>
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
		            <th>Reward in percent</th>
		            <th>Minimum order price to get</th>
		            <th>Maximum reward per order</th>
		            <th>Max reward points to apply</th>
		            <th>Reward status</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	 @foreach ($reward as $rew)
		    	  <td>#{{ $rew->id}}</td>
		            <td class="text-center">{{ $rew->reward_in_percent }}</td>
		            <td  class="text-center">{{ $rew->min_order_price_to_get }}</td>
		            <td  class="text-center">{{ $rew->max_reward_per_order }}</td>
		            <td  class="text-center">{{ $rew->max_reward_point_to_apply }}</td>   
		            <td  class="text-center">{{ $rew->reward_status }}</td>   
		            <td  class="text-center">
	                	<a class="btn btn-primary" href="editUserReward/{{$rew->id}}">Edit</a>
	        		</td>    
		    	 @endforeach
		    </tbody>
	    </table>   	
   </div>

@stop