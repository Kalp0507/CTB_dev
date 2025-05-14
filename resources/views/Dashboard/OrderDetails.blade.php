@extends('layouts.admin')
@section('content')

<div class="dashboard-booking dashboard">
	<h3 class="m-0 text-dark px-4">Order Details</h3>
	
	<div class="pl-5 pr-5 pt-3">
	    <table class="table-bordered servicesTable" id="servicesTable">
	    	<thead>
		        <tr>
		            <th>OrderId</th>
		            <th>Service Name</th>
		            <th>Transaction Type</th>
		            <th>Transaction Id</th>
		            <th>Quoted price</th>
		            <th>Final price</th>
		            <th>Note</th>
		            <th>Tip</th>
		            <th>User Id</th>
		            <th>Customer Name</th>
		            <th width="80px">Email</th>
		            <th>Contact</th>
		            <th>Address</th>
		            <th>Make</th>
		            <th>Model</th>
		            <th>Fuel</th>
		            <th>Vehical No.</th>
		            <th>Assigned Garage</th>
		            <th>Date Of Booking</th>
		            <th>Date Of Pickup</th>
		            <th>Time Of Pickup</th>
		            <th>Promocode Used</th>
		            <th>Promocode Discount</th>
		            <th>Reward Points Earned</th>
		            <th>Reward Points Used</th>
		            <th>Actions</th>
		        </tr>
	    	</thead>
	    	<tbody>
		        @foreach ($orderInformationData as $orders)
		        <tr>
		        	<td>{{$orders->id}}</td>
	        		<td>
	        			@foreach ($orders->hasOrderInformation as $servicesOrdered)
	        				{{$servicesOrdered->package_name}} - {{$servicesOrdered->total_price}} <br />
	        			@endforeach
	        		</td>
		        	<td>{{$orders->paymentType}}</td>
		        	<td>{{$orders->paymentId}}</td>
		        	<td>{{$orders->final_cost}}</td>
		        	<td>{{$orders->updated_cost}}</td>
		        	<td>{{$orders->note}}</td>
		        	<td>{{$orders->tip}}</td>
		        	<td>{{$orders->user_id}}</td>
		        	@foreach ($userData as $users)
		        		@if($users->id == $orders->user_id)
		        			<td>{{$users->username}}</td>
		        			<td>{{$users->email}}</td>
		        			<td>{{$users->mobile}}</td>
		        			<td>{{$users->address}}</td>
		        		@endif
		        	@endforeach
		        	<td>
		        		@foreach($brands as $brand)
		        			@if($brand->id == $orders->hasOrderInformation[0]->make_id)
		        				{{ $brand->make_name }}
		        			@endif
		        		@endforeach
		        	</td>
		        	<td>
		        		@foreach($models as $model)
		        			@if($model->id == $orders->hasOrderInformation[0]->model_id)
		        				{{ $model->model_name }}
		        			@endif
		        		@endforeach
		        	</td>
		        	<td>
	        			@if($orders->hasOrderInformation[0]->fuel_id == 1)
		        			Petrol
		        		@elseif($orders->hasOrderInformation[0]->fuel_id == 2)
		        			Diesel
		        		@elseif($orders->hasOrderInformation[0]->fuel_id == 3)
		        			CNG
		        		@endif
		        	</td>
		        	<td>{{$orders->hasOrderInformation[0]->vehical_number}}</td>
		        	<td>
		        		@foreach($garages as $garage)
		        			@if($garage->id == $orders->assignedGarageId)
		        				{{$garage->garage_name}}
		        			@endif
		        		@endforeach
		        	</td>
		        	<td>
		        		<?php
		                  $date=date_create($orders->hasOrderInformation[0]->created_at);
		                  echo date_format($date,"d-m-Y H:i:s");
		                ?>
		        	</td>
		        	<td>
		        		<?php
		                  $date=date_create($orders->hasOrderInformation[0]->pickup_date);
		                  echo date_format($date,"d-m-Y");
		                ?>
		        	</td>
		        	<td>
		        		{{$orders->hasOrderInformation[0]->time_of_pickup}}
		        	</td>
		        	<td>
		        		{{$orders->promo_code}}
		        	</td>
		        	<td>
		        		{{$orders->discount_cost}}
		        	</td>
		        	<td>
		        		{{$orders->reward_points_earned}}
		        	</td>
		        	<td>
		        		{{$orders->reward}}
		        	</td>
		        	<td>
	                    <a class="btn btn-primary w-100" href="/Dashboard/Orders/EditOrder/{{$orders->id}}">Edit</a>
		        	</td>
		        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
</div>

@stop