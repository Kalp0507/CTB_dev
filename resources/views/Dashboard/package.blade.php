 @extends('layouts.packages')
@section('content')
 <div class="row mt-5">
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-11 mx-auto">
          <div class="row" style="margin: 0px 10px;">
            <div class="col-lg-6 totalBookings">
              <a class="p-0">
                <div class="px-4 py-3 colorChange shadow rounded">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5>Total Bookings </h5>
                  <h3>15</h3>
                </div>
              </a>
            </div> 
            <div class="col-lg-6 totalGarages">
              <a class="p-0">
                <div class="px-4 py-3 colorChange shadow rounded">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5>Total Garages</h5>
                  <h3>15</h3>
                </div>
              </a>
            </div>
          </div>
        <div class="row">
          <div class="col-lg-11 mx-auto mt-4 shadow">
              <h4 class="px-4 pt-3">Statistics</h4>
            <div class="row bg-warning px-4 pt-3">
              <div class="col-lg-6 bg-light">
                <div class="card-body">
                  <div class="p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart" id="revenue-chart" style="position:relative;height:300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>                
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-lg-6 bg-light">
                <div class="card-body">
                  <div class="p-0">
                  <!-- Morris chart - Sales -->
                    <div class="chart" id="revenue-chart"style="position:relative;height:300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>                
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
 </div>
 <div class="col-lg-6">
     
      <div class="row d-flex justify-content-between">
        <div class="col-lg-11 shadow mx-auto packageScroll">
          <div class="row">
            <div class="col-lg-8 px-3">
              <p style="color: #182d54;font-size: 1.8rem">Scheduled Packages</p>
            </div>
          </div>
           @foreach ($users as $package)
       <div class="packagesBlocks px-4 py-3 mx-2">
            <div class="row">
              <div class="col-lg-8 p-0">
                <h6 style="font-size: 0.9rem;font-weight: bolder;color:#182d54;">{{ $package -> package_name }}</h6>
              </div>
              <div class="col-lg-4 text-right">
                <h5 style="color:#182d54;"><span style="text-decoration-line: line-through; font-weight: 100;margin-left: 10px; font-size: 1rem;">{{ $package -> total_price }}</span> {{ $package -> discounted_price }}</h5>
              </div>
            </div>
            <h6 style="font-size: 0.7rem;" class="text-warning">{{ $package -> package_description }}</h6>
            <div class="row">
              <div class="col-lg-4">
                <p>{{$package->make_id}}</p>
              </div>
              <div class="col-lg-4">
                <p>{{$package->model_id}}</p>
              </div>
              <div class="col-lg-4">
                <p>{{$package->fuel_id}}</p>
              </div>
            </div>
            <ul class="pl-0">
              <div class="row">
            @foreach($service as $services)
              @if( $package->id == $services->package_id)
                <div class="col-lg-6">
                  <span>
                    <li style="font-size: 0.7rem;">{{$services -> service_name}}</li>
                  </span>
                </div>
              @endif
            @endforeach
                <div id="loadMore" class="LoadMore" style="">
                      <a href="" style="font-size: 0.7rem;"><span>9</span> more</a>
                  </div>  
              </div>
            </ul>
            <div class="row align-items-center">
              <div class="col-lg-4">
                <h6 class="bg-warning px-3 py-1 m-0 text-center"> {{ $package -> service_time }} hours </h6>
              </div>
              <div class="col-lg-4"></div>
              <div class="col-lg-4">
                <form class="form-inline my-2 my-lg-0 justify-content-end">
                    <button class="btn my-4 my-sm-2 text-light btn-modals" style="font-weight: bolder; background-color: #192d54; padding: 0.5rem 3rem;" data-toggle="modal" data-target="#data-edit-{{ $package -> id }}" type="button" data-packages={{ $package }} data-service={{ $service }}> EDIT</button>
                  </form>
              </div>
            </div>  
          </div>
      @endforeach

        </div>
  
      </div>
    </div>
  </div>


@foreach ($users as $package)
  
<div class="modal fade all-packages" id="data-edit-{{ $package -> id }}" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
  <form method="post" action="{{ url('Dashboard/package/edit') }}" id="form" enctype="multipart/form-data">
  @csrf
    <!-- @method('PUT') -->
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close closePackage btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="row mx-3 py-2">
              <div class="col-lg-6">
                <h3 class="text-dark" style="font-weight: bolder;">
                  <input class="d-none" type="hidden" name="pid" id="pid" value="{{$package->id}}">
<!--                   <input class="d-none" type="hidden" name="Makeid" id="Makeid" value="{{$package->make_id}}">
                  <input class="d-none" type="hidden" name="Modelid" id="Modelid" value="{{$package->model_id}}">
                  <input class="d-none" type="hidden" name="Fuelid" id="Fuelid" value="{{$package->fuel_id}}"> -->
                  <input class="d-none" type="hidden" name="PackType" id="PackType" value="{{$package->package_type}}">
                  <input  type="text" style="border:0px; width: 100%;background-color: transparent;" name="Pname" value="{{$package->package_name}}" id="package-name">
                </h3>
                <h6 class="text-warning m-0">
                  <input type="text" style="border:0px; width: 100%;background-color: transparent;" name="Description" value="{{ $package -> package_description }}" id="package-desc-one">
                </h6>
              </div>
              <div class="col-lg-6 text-right">
                <h4>Original Price  <span class="px-3 py-1 bg-warning" style="font-weight: bolder; ">
                  <input type="text" style="border:0px; width: 25%;background-color: transparent;" name="OriginalPrice" value="{{ $package -> total_price }}" id="original-price">
                  </span>
                </h4>
                <h4>Discount Price  <span class="px-3 py-1 bg-warning" style="font-weight: bolder;">
                  <input type="text" style="border:0px; width: 25%;background-color: transparent;" name="DiscountedPrice" value= "{{$package->discounted_price}}" id="discount-price" ></span>
                </h4>
              </div>
            </div>
            <div class="row mx-3 py-2 mt-4">
              <div class="col-lg-12">
                <h4>
                  <span class="px-3 py-1 bg-info" style="font-weight: bolder;">Service Time : </span>
                  <span class="px-3 py-1 bg-warning" style="font-weight: bolder;">
                    <input type="text" style="border:0px; width: 5%;background-color: transparent;" name="ServiceTime" value="{{ $package -> service_time }}" id="service-hours" > hours</span>
                  </h4>
              </div>
            </div>
            <div class="row mx-3 py-2 mt-4">
              <div class="col-lg-12 d-flex justify-content-between">
                <h6>
                  <span class="px-3 py-1 bg-info" style="font-weight: bolder;">Service Listing</span>
                </h6>
                <input class="btn blueButton text-light" type="button" value="+ Add" onclick="new_element('data-edit-{{ $package -> id }}','{{$services}}')" />
              </div>
              <div class="col-lg-9">
                <ul class="pl-0">
                  <div class="row serviceList">
                    @foreach($service as $services)
                      @if( $package->id == $services->package_id)
                        <div class="col-lg-4 blogBox">
                          <span>
                            <li style="font-size: 1rem; display: flex;">
                              <input type="text" style="border:0px; width: 80%;" name={{ "service[]"}}  value={{ $services -> service_name}} /> 
                              <button  class="closeButton" type="button" style="border:0px; background-color: transparent;padding: 0px;" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </li>
                          </span>
                        </div>
                      @endif
                    @endforeach
                  </div>
                </ul> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button type="submit" class="btn blueButton rounded-0 text-light" style="padding: 0.5rem 3rem;">Save</button>
      </div>
    </div>
  </div>
  </form>
</div>
@endforeach
<!--  <script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/chempionleague') }}",
                  method: 'post',
                  data: {
                     name: jQuery('#name').val(),
                     club: jQuery('#club').val(),
                     country: jQuery('#country').val(),
                     score: jQuery('#score').val(),
                  },
                  success: function(result){
                    if(result.errors)
                    {
                      jQuery('.alert-danger').html('');

                      jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                      });
                    }
                    else
                    {
                      jQuery('.alert-danger').hide();
                      $('#open').hide();
                      $('#myModal').modal('hide');
                    }
                  }});
               });
            });
      </script> -->
    @stop
 
