@extends('layouts.admin')
@section('content')
	
	<section class="content pt-4">
		<div class="container-fluid">
			<div class="col-md-12">
				<form class="form-horizontal" id="form-edit-client">
					<fieldset>
						<div class="form-group">
					  		<label class="col-md-4 control-label" for="garage-name">Garage Name *</label>  
						  	<div class="col-md-4">
						  		<input id="garage-name" name="garage-name" type="text" placeholder="Enter garage's name" class="form-control input-md" required>
						  	</div>
						</div>

						<div class="form-group">
					  		<label class="col-md-4 control-label" for="garage-location">Garage Location *</label>  
						  	<div class="col-md-4">
						  		<input id="garage-location" name="garage-location" type="text" placeholder="Enter garage's location" class="form-control input-md" required>
						  	</div>
						</div>

						<div class="form-group">
					  		<label class="col-md-4 control-label" for="garage-contactNo">Garage Contact No. *</label>  
						  	<div class="col-md-4">
						  		<input id="garage-contactNo" name="garage-contactNo" type="text" placeholder="Enter garage's Contact No." class="form-control input-md" required>
						  	</div>
						</div>

						<div class="form-group">
					  		<label class="col-md-4 control-label" for="garage-description">Garage Description</label>  
						  	<div class="col-md-4">
						  		<textarea class="form-control" id="garage-description" name="garage-description" rows="3"></textarea>
						  	</div>
						</div>

						<div class="form-group">
					  		<label class="col-md-4 control-label" for="mechanic-details">Mechanic Details</label>  
						  	<div class="col-md-4">
						  		<textarea class="form-control" id="mechanic-details" name="mechanic-details" rows="3"></textarea>
						  	</div>
						</div>

						<div class="form-group">
					  		<label class="col-md-4 control-label" for="other-details">Other Details</label>  
						  	<div class="col-md-4">
						  		<textarea class="form-control" id="other-details" name="other-details" rows="3"></textarea>
						  	</div>
						</div>

						<!-- <div class="form-group">
					  		<label class="col-md-4 control-label" for="other-details">Status *</label>  
						  	<div class="col-md-4">
						  		<select class="garageSetStatus" id="garageSetStatus" required>
						  			<option selected value="1">Active</option>
						  			<option value="0">Inactive</option>
						  		</select>
						  	</div>
						</div> -->

						<div class="form-group">
							<div class="col-md-4">
								<button id="addGarage" class="btn blueButton text-light mb-2">Add Garage</button>	
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</section>
@stop