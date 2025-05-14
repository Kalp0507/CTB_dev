@extends('layouts.admin')
@section('content')
<div class="row mt-5 pl-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Edit Service/Part</h3>
        </div>
        <div class="pull-right">
            @if($selectedServicePartData->serviceType == "Mechanical Repair")
                <a class="btn text-light blueButton" href="/Dashboard/mechanicalServices"> Back</a>
            @elseif($selectedServicePartData->serviceType == "AC Servicing")
                <a class="btn text-light blueButton" href="/Dashboard/acServices"> Back</a>
            @elseif($selectedServicePartData->serviceType == "Battery and Tyres")
                <a class="btn text-light blueButton" href="/Dashboard/batteryTyres"> Back</a>
            @elseif($selectedServicePartData->serviceType == "Upkeep Services")
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

<form action="/serviceParts/updateServicePart" method="POST" enctype="multipart/form-data" class="mt-3 pl-3">
    @csrf
     <div class="row" style="flex-direction: column;">

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Make:</strong>
                <select class="js-example-basic-first form-control" name="assignMake" id="assignMake">
                    @foreach($brandData as $brand)
                        @if($brand->id == $selectedBrandData->id)
                            <option selected value="{{$brand->id}}">{{$brand->make_name}}</option>
                        @endif
                    @endforeach
                    @foreach($brandData as $brand)
                        @if($brand->id !== $selectedBrandData->id)
                            <option value="{{$brand->id}}">{{$brand->make_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Model:</strong>
                <select class="js-example-basic-first form-control" name="assignModel" id="assignModel">
                    @foreach($modelData as $model)
                        @if($model->id == $selectedModelData->id)
                            <option selected value="{{$model->id}}">{{$model->model_name}}</option>
                        @endif
                    @endforeach
                    @foreach($modelData as $model)
                        @if($model->id !== $selectedModelData->id)
                            <option value="{{$model->id}}">{{$model->model_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>


        <input type="hidden" id="selectedMake" name="selectedMake" value="{{$selectedServicePartData->make}}" />
        <input type="hidden" id="selectedModel" name="selectedModel" value="{{$selectedServicePartData->model}}" />
        <input type="hidden" id="selectedFuel" name="selectedFuel" value="{{$selectedServicePartData->fuel}}" />
        <input type="hidden" id="selectedServicePart" name="selectedServicePart" value="{{$selectedServicePartData->id}}" />

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Fuel:</strong>
                <select class="js-example-basic-first form-control" name="assignFuel" id="assignFuel">
                   @foreach($fuels as $key => $fuel)
                        @if($key == $selectedFuelData->id)
                            <option selected value="{{$selectedFuelData->id}}">{{$fuel}}</option>
                        @endif
                    @endforeach
                    @foreach($fuels as $key => $fuel)
                        @if($key !== $selectedFuelData->id)
                            <option selected value="{{$selectedFuelData->id}}">{{$fuel}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Service Type:</strong>
                <select class="js-example-basic-first form-control" name="serviceType" id="serviceType" readonly>
                        @foreach($servicesData as $service)
                            @if($selectedServicePartData->serviceType == $service->service_name)
                                <option selected value="{{$service->service_name}}">{{$service->service_name}}</option>
                            @endif
                        @endforeach
                    @foreach($servicesData as $service)
                        @if($selectedServicePartData->serviceType !== $service->service_name)
                            <option disabled value="{{$service->service_name}}">{{$service->service_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Part Name:</strong>
                <input type="text" name="partName" class="form-control" value="{{ $selectedServicePartData->part_name}}" placeholder="e.g. Hood, Dicky Door" />
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Part Description:</strong>
                <textarea name="partDescription" class="form-control">{{ $selectedServicePartData->part_description}}</textarea>
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
                <input type="text" name="price" value="{{ $selectedServicePartData->price}}" class="form-control" placeholder="e.g. 3000" value="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 text-center mt-2">
            <button type="submit" class="btn text-light blueButton">Update</button>
        </div>
    </div>
   
</form>
@stop