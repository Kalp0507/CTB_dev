@extends('layouts.default')
@section('content')
<div class="account">
   <div class="row justify-content-center">
      <div class="col-lg-11">
         <div class="row p-lg-5 rounded">
            <div class="col-lg-12 accountDiv">
               <h5 class="text-center mb-4" style="font-weight: bold;color: #182d54;">Your Account</h5>
               <form method="POST" id="accountForm">
                @csrf
                  <div class="form-row">
                     <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 editmode">
                        <input type="text" name="inputUsername" class="form-control" id="inputUsername" placeholder="Full Name" value="{{$userData->username}}" disabled="true" style="height: 50px; color:white;">
                     </div>
                     <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  mb-4">
                        <input type="text" name="inputMobile" class="form-control" id="inputMobile" placeholder="Phone Number" value="{{$userData->mobile}}" disabled="true" style="height: 50px; color:white;">
                        <input type="hidden" name="inputMobile" value="{{$userData->mobile}}">
                     </div>
                     <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  mb-4 editmode">
                        <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" pattern="^[^@\s]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" value="{{$userData->email}}" disabled="true" style="height: 50px; color:white;">
                     </div>
                     <!-- <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                        <input type="text" class="form-control text-light" id="inputPassword4" placeholder="Membership" value="" disabled="true">
                     </div> -->
                     <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 editmode">
                        <input type="text" name="inputAddress" class="form-control" id="inputAddress" placeholder="Address" value="{{$userData->address}}" disabled="true" style="height: 50px; color:white;">
                     </div>
                  </div>
                  <div class="text-center mb-4">
                     <button type="submit" id="accountEditBtn" class="btn text-light blueButton"> Edit Profile </button>
                     <button type="submit" id="accountSaveBtn" class="btn text-light blueButton d-none"> Update Profile </button>
                     <button type="button" id="changePassword" data-toggle="modal" data-target="#updatePasswordModal" class="btn text-light blueButton"> Change Password </button>
                  </div>
               </form>              
            </div>
         </div>
      </div>  
   </div>
</div>

<div>
  <h4 class="text-center" style="font-weight: 600; color: #182d54; margin-bottom: 2em;">Available Car Trust Buddy Money: <span>{{$userData->reward}}</span></h4>
</div>

 <div class="serviceHistory" style="padding: 0em 2em 5em 2em;">
   <h3 class="text-center" style="font-weight: 1000; color: #182d54;">Service History</h3>

   <table class="table accountTable table-bordered">
              <thead>
                <tr>
                    <th>Service History Details</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orderHistoryData as $key => $orderHistory)
                <tr>
                  <td>
                   <div class="row justify-content-center px-md-5 px-sm-3">
                      <div class="col-lg-11 py-4 my-2" style="border:2px solid black;">
                         <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1">
                               <img src="{{ URL::to('/') }}/images/Group 5779.png" style="width:100px;height: 100px" alt="...">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                               <div class="row">
                                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
                                     <h6><span style="color: #182d54; font-weight:900">ORDER NO :</span> {{$orderHistory->id}}</h6>
                                     <h6><span style="color: #182d54; font-weight:900">VEHICLE NO :</span>
                                      @foreach($arrayOfCarInfo as $carInfo)
                                      @if($carInfo->orderId == $orderHistory->id)
                                        {{$carInfo->vehical_number}}
                                      @endif
                                      @endforeach </h6>
                                     <h6>
                                        <span style="color: #182d54; font-weight:900">SERVICE TYPE :</span>
                                        @foreach($orderHistory->hasOrderInformation as $orderInfo)
                                              <span>{{$orderInfo->package_name}},</span>
                                        @endforeach 
                                     </h6>
                                     <h6><span style="color: #182d54; font-weight:900">REWARD POINTS USED :</span>{{$orderHistory->reward}}</h6>
                                     @if($orderHistory->tip != null)
                                      <h6><span style="color: #182d54; font-weight:900">TIP : </span>{{$orderHistory->tip}}</h6>
                                     @endif
                                      <h6>
                                     

                                  </div>
                                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
                                     <h6><span style="color: #182d54; font-weight:900">SERVICE DATE : </span>{{$orderHistory->created_at}}</h6>
                                     <h6>
                                     <span style="color: #182d54; font-weight:900">VEHICLE DETAILS : </span>
                                        @foreach($arrayOfCarInfo as $carInfo)
                                          @if($carInfo->orderId == $orderHistory->id)
                                            @if(isset($carInfo->brand))
                                                 <span>{{$carInfo->brand[0]}}, {{$carInfo->model[0]}}, {{$carInfo->fuel[0]}},</span><br /> 
                                              
                                            @endif
                                           @endif
                                        @endforeach
                                     </h6>
                                     @if($orderHistory->paymentType == "cod")
                                        <h6><span style="color: #182d54; font-weight:900">PAYMENT :</span> At Service Center</h6>  
                                    @else                  
                                       <h6><span style="color: #182d54; font-weight:900">TRANSACTION ID :</span> {{$orderHistory->paymentId}}</h6>             
                                     @endif
                                      <h6><span style="color: #182d54; font-weight:900">REWARD POINTS EARNED : </span>{{$orderHistory->reward_points_earned}}</h6>
                                       <h6>
                                      @if($orderHistory->note != null)
                                        <h6><span style="color: #182d54; font-weight:900">NOTE : </span>{{$orderHistory->note}}</h6>
                                        <h6>
                                      @endif

                                    </div>  
                               </div>                 
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                              @if($orderHistory->updated_cost == null)
                                <h2 class="text-lg-right text-md-right" style="color:#F5E72E; ">₹{{$orderHistory->final_cost}}</h2>
                              @else
                              <h2 class="text-lg-right text-md-right" style="color:#F5E72E; text-decoration: line-through; ">₹{{$orderHistory->final_cost}}</h2>
                                <h2 class="text-lg-right text-md-right" style="color:#F5E72E; ">
                                  ₹{{$orderHistory->updated_cost}}</h2>

                              @endif 
                           </div>
                         </div>
                      </div>
                   </div>
                 </td>
               </tr>
                @endforeach
                            
              </tbody>
            </table>
      

   <!--   <div class="row justify-content-center px-md-3 px-sm-3">
         <div class="col-lg-11 py-4 my-2" style="border:2px solid black;">
            <div class="row align-items-center">
               <div class="col-lg-2 col-md-2">
                  <img src="{{ URL::to('/') }}/images/mcm-logo.jpg" style="width:50px;height: 50px" alt="...">
               </div>
               <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <div class="row">
                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
                        <h6>ORDER NO :</h6>
                        <h6>SERVICE TYPE :</h6>
                        <h6>VEHICAL DETAILS :</h6>
                     </div>
         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
            <h6>SERVICE DATE :</h6>
            <h6>DELIVERY DATE :</h6>                  
         </div> 
      </div>                  
   </div>
   <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
     <h2 class="text-lg-right text-md-right">4500</h2>  
  </div>
</div>
</div>
</div>
<div class="row justify-content-center px-md-3 px-sm-3">
  <div class="col-lg-11 py-4 my-2" style="border:2px solid black;">
    <div class="row align-items-center">
      <div class="col-lg-2 col-md-2">
        <img src="{{ URL::to('/') }}/images/mcm-logo.jpg" style="width:50px;height: 50px" alt="...">
     </div>
     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
            <h6>ORDER NO :</h6>
            <h6>SERVICE TYPE :</h6>
            <h6>VEHICAL DETAILS :</h6>

         </div>
         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
            <h6>SERVICE DATE :</h6>
            <h6>DELIVERY DATE :</h6>                  
         </div> 
      </div>                  
   </div>
   <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
     <h2 class="text-lg-right text-md-right">4500</h2>  
  </div>
</div>
</div>
</div>
<div class="row justify-content-center px-md-3 px-sm-3">
  <div class="col-lg-11 py-4 my-2" style="border:2px solid black;">
    <div class="row align-items-center">
      <div class="col-lg-2 col-md-2">
        <img src="{{ URL::to('/') }}/images/mcm-logo.jpg" style="width:50px;height: 50px" alt="...">
     </div>
     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
            <h6>ORDER NO :</h6>
            <h6>SERVICE TYPE :</h6>
            <h6>VEHICAL DETAILS :</h6>

         </div>
         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0">
            <h6>SERVICE DATE :</h6>
            <h6>DELIVERY DATE :</h6>                  
         </div> 
      </div>                  
   </div>
   <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
     <h2 class="text-lg-right text-md-right">4500</h2>  
  </div>
</div>
</div>
</div> -->

</div>



<div class="modal fade" id="updatePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-footer border-0 justify-content-between">       
          <form>
            <div class="form-row" style="display: flex; justify-content: center;">
              <!-- <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
                <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Enter Old Password" value="" style="height: 50px;" />
                <div class="d-none text-danger" id="oldPassError"></div>
              </div> -->

              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
                <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Enter New Password" value="" style="height: 50px;" />
                <div class="d-none text-danger" id="newPassError"></div>

              </div>

              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password" value="" style="height: 50px;" />
                <div class="d-none text-danger" id="confirmPassError"></div>

              </div>

              <button type="button" class="btn text-light text-center blueButton text-bold updatePassword">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

<script type="text/javascript">
    var loadExternalScript = function(path) {
      var result = $.Deferred(),
          script = document.createElement("script");

      script.async = "async";
      script.type = "text/javascript";
      script.src = path;
      script.onload = script.onreadystatechange = function(_, isAbort) {
        if (!script.readyState || /loaded|complete/.test(script.readyState)) {
          if (isAbort) {

            result.reject();
          }
          else{

            result.resolve();
          }
        }
      };

      script.onerror = function() {
        result.reject();
      };

      $("head")[0].appendChild(script);

      return result.promise();
    };
</script>