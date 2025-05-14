@extends('layouts.admin')
@section('content')
<div class="row mt-5 pl-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Add Service/Part</h3>
        </div>
        <div class="pull-right">
            <!-- <a class="btn text-light blueButton" href="/Dashboard/serviceParts"> Back</a> -->
            @if($serviceTypeId == "3")
                <a class="btn text-light blueButton" href="/Dashboard/mechanicalServices"> Back</a>
            @elseif($serviceTypeId == "4")
                <a class="btn text-light blueButton" href="/Dashboard/acServices"> Back</a>
            @elseif($serviceTypeId == "5")
                <a class="btn text-light blueButton" href="/Dashboard/batteryTyres"> Back</a>
            @elseif($serviceTypeId == "6")
                <a class="btn text-light blueButton" href="/Dashboard/upkeepServices"> Back</a>    
            @endif
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

<form action="/serviceParts/addServicePart" method="POST" enctype="multipart/form-data" class="mt-3 pl-3">
    @csrf
     <div class="row" style="flex-direction: column;">

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Make:</strong>
                <select class="js-example-basic-first form-control" name="assignMake" id="assignMake" required>
                        <option value='0'>Select Car Make</option>
                    @foreach($brandData as $brand)
                        <option value="{{$brand->id}}">{{$brand->make_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Model:</strong>
                <select class="js-example-basic-first form-control" name="assignModel" id="assignModel" required>
                </select>
            </div>
        </div>
        <input type="hidden" id="selectedMake" name="selectedMake" value="" />
        <input type="hidden" id="selectedModel" name="selectedModel" value="" />
        <input type="hidden" id="selectedFuel" name="selectedFuel" value="" />

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Fuel:</strong>
                <select class="js-example-basic-first form-control" name="assignFuel" id="assignFuel" required>
                   
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Service Type:</strong>
                <select class="js-example-basic-first form-control servicePartserviceType" name="serviceType" id="serviceType" required>
                        <option value='0' disabled>Select Service Type</option>
                    @foreach($servicesData as $service)
                        @if($service->service_name !== 'Accidental Repair' && $service->service_name !== 'Periodic Maintainance' )
                            <option value="{{$service->service_name}}">{{$service->service_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 batteryTyreSelectDiv d-none">
            <div class="form-group">
                <strong>Battery OR Tyre:</strong>
                <select class="js-example-basic-first form-control" name="batteryTyreSelect" id="batteryTyreSelect" required>
                    <option disabled selected value="null">Select Battery OR Tyre</option>
                    <option value="2">Battery</option>
                    <option value="1">Tyre</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Service/Part Name:</strong>
                <input type="text" name="partName" class="form-control" placeholder="e.g. Hood, Dicky Door" required />
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Part Description:</strong>
                <textarea name="partDescription" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <strong>Model Image Name:</strong>
                 <input type="file" name="part_image" class="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="price" class="form-control" placeholder="e.g. 3000" value="" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 text-center mt-2">
            <button type="submit" class="btn text-light blueButton">Add</button>
        </div>
    </div>
   
</form>
@stop