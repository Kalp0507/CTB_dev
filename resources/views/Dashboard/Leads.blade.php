 @extends('layouts.admin')
 @section('content')
 <!-- Main content -->
 <section class="content">
  <h3 class="m-0 text-dark px-4">Leads</h3>
  <div class="container-fluid dashboard">
    <!-- Small boxes (Stat box) -->
    <ul class="slider mt-3 nav nav-pills mb-3" id="pills-tab" role="tablist" style="list-style: none;">
      
      <!-- <li class="nav-item tab1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="nav-link act dashboard-link p-0" id="general-leads" data-toggle="pill" href="#general-leads-tab" role="tab" aria-controls="pills-home" aria-selected="true">
              <div class="small-box" style="width: 200px;">
                <div class="block-box px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;">General Leads</h5>
                  <h3>{{$generalLeadsCount}}</h3>
                </div>
              </div>
            </a>
          </div>
      </li> -->
      <li class="nav-item tab1">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a class="nav-link act dashboard-link p-0 active" id="periodice-leads" data-toggle="pill" href="#periodic-leads-tab" role="tab" aria-controls="pills-home" aria-selected="true">
                  <div class="small-box" style="width: 200px;">
                    <div class="block-box px-4 py-3">
                      <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                      <h5 style="white-space: break-spaces;">General Leads</h5>
                      <h3>{{$generalLeadsCount}}</h3>
                    </div>
                  </div>
                </a>
              </div>
          </li>
      @foreach($services as $key => $serv)
        @if($key != 0)
          @if($serv->id == 2)
            <?php $accService = $serv->displayName  ?>
            <li class="nav-item tab1">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a class="nav-link p-0 dashboard-link" id="accidental-leads" data-toggle="pill" href="#accidental-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <div class="small-box" style="width: 200px;">
                      <div class="px-4 py-3">
                        <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                        <h5 style="white-space: break-spaces;">{{$serv->displayName}}</h5>
                        <h3>{{$accidentalNewLeadsCount}}</h3>
                      </div>
                    </div>
                  </a>
                </div>
            </li>
          @elseif($serv->id == 3)
            <?php $mechService = $serv->displayName  ?>
            <li class="nav-item tab1">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a class="nav-link p-0 dashboard-link" id="mechanical-leads" data-toggle="pill" href="#mechanical-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <div class="small-box" style="width: 200px;">
                      <div class="px-4 py-3">
                        <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                        <h5 style="white-space: break-spaces;">{{$serv->displayName}}</h5>
                        <h3>{{$mechanicalRepairCount}}</h3>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </li>
          @elseif($serv->id == 4)
            <?php $acService = $serv->displayName  ?>
            <li class="nav-item tab1">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a class="nav-link p-0 dashboard-link" id="ac-leads" data-toggle="pill" href="#acRepair-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <div class="small-box" style="width: 200px;">
                      <div class="px-4 py-3">
                        <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                        <h5 style="white-space: break-spaces;">{{$serv->displayName}}</h5>
                        <h3>{{$acRepairCount}}</h3>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </li>
          @elseif($serv->id == 5)
            <?php $batService = $serv->displayName  ?>
            <li class="nav-item tab1">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a class="nav-link p-0 dashboard-link" id="battery-leads" data-toggle="pill" href="#battery-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <div class="small-box" style="width: 200px;">
                      <div class="px-4 py-3">
                        <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                        <h5 style="white-space: break-spaces;">{{$serv->displayName}}</h5>
                        <h3>{{$batteryTyresCount}}</h3>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </li>
          @elseif($serv->id == 6)
            <?php $upkService = $serv->displayName  ?>
            <li class="nav-item tab1">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a class="nav-link p-0 dashboard-link" id="unpeak-leads" data-toggle="pill" href="#unpeak-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <div class="small-box" style="width: 200px;">
                      <div class="px-4 py-3">
                        <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                        <h5 style="white-space: break-spaces;">{{$serv->displayName}}</h5>
                        <h3>{{$unpeakServicesCount}}</h3>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </li>

          @endif
        @endif
      @endforeach
      <!-- <li class="nav-item tab1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="nav-link act dashboard-link p-0 active" id="periodice-leads" data-toggle="pill" href="#periodic-leads-tab" role="tab" aria-controls="pills-home" aria-selected="true">
              <div class="small-box" style="width: 200px;">
                <div class="block-box px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;">General Leads</h5>
                  <h3>{{$generalLeadsCount}}</h3>
                </div>
              </div>
            </a>
          </div>
      </li>

      <li class="nav-item tab1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="nav-link p-0 dashboard-link" id="accidental-leads" data-toggle="pill" href="#accidental-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
              <div class="small-box" style="width: 200px;">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;">Accidental Repair</h5>
                  <h3>{{$accidentalNewLeadsCount}}</h3>
                </div>
              </div>
            </a>
          </div>
      </li>

      <li class="nav-item tab1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="nav-link p-0 dashboard-link" id="unpeak-leads" data-toggle="pill" href="#unpeak-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
              <div class="small-box" style="width: 200px;">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;">Upkeep Services</h5>
                  <h3>{{$unpeakServicesCount}}</h3>
                </div>
              </div>
            </a>
          </div>
        </div>
      </li>

      <li class="nav-item tab1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="nav-link p-0 dashboard-link" id="battery-leads" data-toggle="pill" href="#battery-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
              <div class="small-box" style="width: 200px;">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;">Battery and Tyres</h5>
                  <h3>{{$batteryTyresCount}}</h3>
                </div>
              </div>
            </a>
          </div>
        </div>
      </li>

      <li class="nav-item tab1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="nav-link p-0 dashboard-link" id="mechanical-leads" data-toggle="pill" href="#mechanical-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
              <div class="small-box" style="width: 200px;">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;">Mechanical Repair</h5>
                  <h3>{{$mechanicalRepairCount}}</h3>
                </div>
              </div>
            </a>
          </div>
        </div>
      </li>

      <li class="nav-item tab1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="nav-link p-0 dashboard-link" id="ac-leads" data-toggle="pill" href="#acRepair-leads-tab" role="tab" aria-controls="pills-profile" aria-selected="false">
              <div class="small-box" style="width: 200px;">
                <div class="px-4 py-3">
                  <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 50px" class="elevation-2 mb-2 " alt="User Image">
                  <h5 style="white-space: break-spaces;">AC Servicing</h5>
                  <h3>{{$acRepairCount}}</h3>
                </div>
              </div>
            </a>
          </div>
        </div>
      </li> -->

    </ul>
    <!-- /.row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
  <div class="tab-content px-4" id="pills-tabContent">
    <div class="tab-pane fade show active" id="periodic-leads-tab" role="tabpanel" aria-labelledby="periodice-services">
      <div class="background-blue d-flex py-3 px-4">
        <div>
          <h4 class="mb-0 text-light">General Leads</h4>
        </div>
      </div>
      
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="periodic-mature">
            <table class="table table-responsive-sm border">
              <table class="table table-responsive-sm border">
                <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Lead Status</th>
                        <th scope="col">Date</th>
                      </tr>
                </thead>
                <tbody>

                  @foreach($generalLeadsUserData as $userData)
                      <tr>
                        <td>{{ $userData->id }}</td>
                        <td>{{$userData->mobile}}</td>
                        <td>{{$userData->email}}</td>
                        <td>{{$userData->username}}</td>
                        <td>{{$userData->address}}</td>
                        @if($userData->mature_status == 1)
                          <td>Matured Lead</td>
                        @else
                          <td>Immature Lead</td>
                        @endif
                        <td>{{$userData->created_at}}</td> 
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </table>
          </div>
        </div>    
      </div>

  <!-- General Leads Tab  -->
  <div class="tab-pane fade" id="general-leads-tab" role="tabpanel" aria-labelledby="general-services">
    <div class="background-blue d-flex py-3 px-4">
      <div>
        <h4 class="mb-0 text-light">General Leads</h4>
      </div>
    </div>
    
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="general-mature" role="tabpanel" aria-selected="true" aria-labelledby="general-mature-tab">
        <table class="table table-responsive-sm border">
          <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Contact No.</th>
                  <th scope="col">Email</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Date</th>
                </tr>
          </thead>
          <tbody>
            @foreach($generalLeadsUserData as $userData )
                <tr>
                  <td>{{$userData->id}}</td>
                  <td>{{$userData->mobile}}</td>
                  <td>{{$userData->email}}</td>
                  <td>{{$userData->username}}</td>
                  <td>{{$userData->address}}</td>
                  
                  <td>{{$userData->created_at}}</td> 
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- <div class="tab-pane fade" id="accidental-immature" role="tabpanel" aria-selected="true" aria-labelledby="accidental-immature-tab">
        <table class="table table-responsive-sm border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Contact No.</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Fuel</th>
              <th scope="col">Car Type</th>
              <th scope="col">Query</th>
              
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($accidentalNewLeads as $accidentLead )
              @if($accidentLead->leadType==0)
                <tr>
                  <td>{{$accidentLead->id}}</td>
                  <td>{{$accidentLead->mobile}}</td>
                  <td>{{$accidentLead->make}}</td>
                  <td>{{$accidentLead->model}}</td>
                  <td>{{$accidentLead->fuel}}</td>
                  <td>{{$accidentLead->car_type}}</td>
                  <td>{{$accidentLead->query}}</td>
                  <td>{{$accidentLead->created_at}}</td> 
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div> -->
    </div>
  </div>
  <!-- General Leads Tab Ends-->


  <!-- Accidental Repairs Table -->
  <div class="tab-pane fade" id="accidental-leads-tab" role="tabpanel" aria-labelledby="accidental-services">
    <div class="background-blue d-flex py-3 px-4">
      <div>
        <h4 class="mb-0 text-light">{{$accService}} Leads</h4>
      </div>
    </div>
   
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="accidental-mature" role="tabpanel" aria-selected="true" aria-labelledby="accidental-mature-tab">
        <table class="table table-responsive-sm border">
          <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Contact No.</th>
                  <th scope="col">Make</th>
                  <th scope="col">Model</th>
                  <th scope="col">Fuel</th>
                  <th scope="col">Car Type</th>
                  <th scope="col">Query</th>
                  <th scope="col">Images</th>
                  <th scope="col">Date</th>
                </tr>
          </thead>
          <tbody>
            @foreach($accidentalNewLeads as $accidentLead )
                <tr>
                  <td>{{$accidentLead->id}}</td>
                  <td>{{$accidentLead->mobile}}</td>
                  <td>{{$accidentLead->make}}</td>
                  <td>{{$accidentLead->model}}</td>
                  <td>{{$accidentLead->fuel}}</td>
                  <td>{{$accidentLead->car_type}}</td>
                  <td>{{$accidentLead->query}}</td>  
                  @if(isset($accidentLead->image))
                    <td>
                    @foreach (json_decode($accidentLead->image) as $key => $images)
                      <a href="/images/accidentalImages/{{$images}}" target="#">{{$images}}</a>,
                    @endforeach
                    </td>
                  @else
                    <td>No Image</td>
                  @endif
                  <td>{{$accidentLead->created_at}}</td> 
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Accidental Repairs Table Ends -->

  <!-- Unpeak Repairs Table -->
  <div class="tab-pane fade" id="unpeak-leads-tab" role="tabpanel" aria-labelledby="unpeak-services">
    <div class="background-blue d-flex py-3 px-4">
      <div>
        <h4 class="mb-0 text-light">{{$upkService}} Leads</h4>
      </div>
    </div>
  
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="unpeak-mature" role="tabpanel" aria-labelledby="unpeak-mature-tab">
        <table class="table table-responsive-sm border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Mobile No.</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Fuel</th>
              <th scope="col">Query</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($unpeakServicesData as $unpeakService)
                <tr>
                  <td>{{$unpeakService->id}}</td>
                  <td>{{$unpeakService->mobile}}</td>
                  <td>{{$unpeakService->make_name}}</td>
                  <td>{{$unpeakService->model_name}}</td>
                  <td>{{$unpeakService->fuel_name}}</td>
                  <td>{{$unpeakService->remark}}</td>
                  <td>{{$unpeakService->created_at}}</td>
                </tr>
            @endforeach          
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Unpeak Repairs Table Ends -->

  <!-- battery Table -->
  <div class="tab-pane fade" id="battery-leads-tab" role="tabpanel" aria-labelledby="battery-services">
    <div class="background-blue d-flex py-3 px-4">
      <div>
        <h4 class="mb-0 text-light">{{$batService}} Leads</h4>
      </div>
    </div>
   
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="battery-mature" role="tabpanel" aria-labelledby="battery-mature-tab">
        <table class="table table-responsive-sm border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Mobile No.</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Fuel</th>
              <th scope="col">Query</th>
              <th scope="col">Battery OR Tyre</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($batteryTyresData as $batteryService)
                <tr>
                  <td>{{$batteryService->id}}</td>
                  <td>{{$batteryService->mobile}}</td>
                  <td>{{$batteryService->make}}</td>
                  <td>{{$batteryService->model}}</td>
                  <td>{{$batteryService->fuel}}</td>
                  <td>{{$batteryService->query}}</td>
                  @if($batteryService->battery_or_tyre == "0")
                    <td>Battery</td>
                  @else
                    <td>Tyre</td>
                  @endif
                  <td>{{$batteryService->created_at}}</td>
                </tr>
            @endforeach          
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- battery Repairs Table Ends -->

  <!-- mechanical Table -->
  <div class="tab-pane fade" id="mechanical-leads-tab" role="tabpanel" aria-labelledby="mechanical-services">
    <div class="background-blue d-flex py-3 px-4">
      <div>
        <h4 class="mb-0 text-light">{{$mechService}} Leads</h4>
      </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="mechanical-mature" role="tabpanel" aria-labelledby="mechanical-mature-tab">
        <table class="table table-responsive-sm border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Mobile No.</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Fuel</th>
              <th scope="col">Query</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mechanicalRepairData as $mechanicalService)
                <tr>
                  <td>{{$mechanicalService->id}}</td>
                  <td>{{$mechanicalService->mobile}}</td>
                  <td>{{$mechanicalService->make_name}}</td>
                  <td>{{$mechanicalService->model_name}}</td>
                  <td>{{$mechanicalService->fuel_name}}</td>
                  <td>{{$mechanicalService->remark}}</td>
                  <td>{{$mechanicalService->created_at}}</td>
                </tr>
            @endforeach          
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- battery Repairs Table Ends -->

  <!-- mechanical Table -->
  <div class="tab-pane fade" id="acRepair-leads-tab" role="tabpanel" aria-labelledby="acRepair-services">
    <div class="background-blue d-flex py-3 px-4">
      <div>
        <h4 class="mb-0 text-light">{{$acService}} Leads</h4>
      </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="acRepair-mature" role="tabpanel" aria-labelledby="acRepair-mature-tab">
        <table class="table table-responsive-sm border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Mobile No.</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Fuel</th>
              <th scope="col">Query</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($acRepairData as $acRepairService)
                <tr>
                  <td>{{$acRepairService->id}}</td>
                  <td>{{$acRepairService->mobile}}</td>
                  <td>{{$acRepairService->make_name}}</td>
                  <td>{{$acRepairService->model_name}}</td>
                  <td>{{$acRepairService->fuel_name}}</td>
                  <td>{{$acRepairService->remark}}</td>
                  <td>{{$acRepairService->created_at}}</td>
                </tr>
            @endforeach          
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- battery Repairs Table Ends -->



</div>
@stop