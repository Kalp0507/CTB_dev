@extends('layouts.admin')
@section('content')

<div class="dashboard-booking dashboard">
	<h3 class="m-0 text-dark px-4">Edit Order</h3>

	<br />
	<div class="pl-5 pr-5 pt-3">
		<form method="POST" action="/updateOrderAmount" id="orderUpdateForm" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group col-md-4">
    			<label>Order Id :</label>
    			<span>{{$orderInformationData->id}}</span>
    			<input type="hidden" name="orderId" value={{$orderInformationData->id}} />
    		</div>

    		<div class="form-group col-md-4">
    			<label>Ordered Services :</label>
    			<span>
    				@foreach($orderInformationData->hasOrderInformation as $servicesOrdered)
    				{{$servicesOrdered->package_name}},
    				@endforeach
    			</span>
    		</div>
    		<div class="form-group col-md-4">
    			<label>Total Amount</label>
    			<input type="text" class="form-control" name="totalAmount" value={{$orderInformationData->final_cost}}>
    		</div>

    		<div class="form-group col-md-4">
    			<label>Note</label>
    			<textarea class="form-control" name="note">{{$orderInformationData->note}}</textarea>
    		</div>

    		<div class="form-group col-md-4">
    			<label>Tip</label>
    			<textarea class="form-control" name="tip">{{$orderInformationData->tip}}</textarea>
    		</div>

    		<div class="form-group col-md-4 text-center">
    			<input type="submit" class="btn text-light blueButton" value="Update">
    		</div>

		</form>
	</div>
</div>

@stop