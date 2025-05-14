@extends('layouts.admin')
@section('content')

	<div class="row pt-5 pr-5">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h4>Upload CSV's</h4>
	        </div>
	    </div>
	</div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   	<div class="pl-5 pr-5 pt-3" style="display: flex; flex-direction: column;">
   		<div class="mb-4" style="display: flex;flex-direction: column;">
   			<label>Upload Accidental Repair Parts</label>
            <button class="btn btn-sm btn-success uploadServicesParts" id="Accidental" data-toggle="modal" data-target="#uploadServicesCSVModal" style="width: 10%"  href="#"> Upload CSV</button>
   		</div>

   		<div class="mb-4" style="display: flex;flex-direction: column;">
   			<label>Upload Mechanical Repair Services</label>
   			<button class="btn btn-sm btn-success uploadServicesParts" id="Mechanical" data-toggle="modal" data-target="#uploadServicesCSVModal" style="width: 10%"  href="#"> Upload CSV</button>
   		</div>

   		<div class="mb-4" style="display: flex;flex-direction: column;">
   			<label>Upload AC Repair Services</label>
   			<button class="btn btn-sm btn-success uploadServicesParts" id="AC" data-toggle="modal" data-target="#uploadServicesCSVModal" style="width: 10%"  href="#"> Upload CSV</button>
   		</div>

		<div class="mb-4" style="display: flex;flex-direction: column;">
   			<label>Upload Battery & Tyre Services</label>
   			<button class="btn btn-sm btn-success uploadServicesParts" id="BatteryTyres" data-toggle="modal" data-target="#uploadServicesCSVModal" style="width: 10%"  href="#"> Upload CSV</button>
   		</div>

   		<div class="mb-4" style="display: flex;flex-direction: column;">
   			<label>Upload Upkeep Services</label>
   			<button class="btn btn-sm btn-success uploadServicesParts" id="Upkeep" data-toggle="modal" data-target="#uploadServicesCSVModal" style="width: 10%"  href="#"> Upload CSV</button>
   		</div>

	</div>

@stop

<div class="modal fade" id="uploadServicesCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title textYellow" id="">Upload CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="textYellow" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/servicesPartsCSV" id="servicesForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="file" name="uploadCsv" />
                    <input type="hidden" class="uploadServiceSelected" service="" name="selectedService">
                    <br />
                    <button type="submit" class="btn btn-success btn-md mt-3 uploadBrandCsv">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>