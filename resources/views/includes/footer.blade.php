
  <section id="footer" class="w-100">
		<div class="container-fluid footer m-0">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<ul class="list-unstyled quick-links">
            
						<li><a href="/PeriodicServices">REGULAR SERVICE</a></li>
						<li><a href="/accidentalRepair">ACCIDENTAL REPAIR</a></li>
						<li><a href="/mechanicalRepairServices" name="redirect3" id="mechRepair">MECHANICAL REPAIR</a></li>
						<li><a href="/ACRepairServices" name="redirect1" id="acRepair">AC SERVICES</a></li>
						<li><a href="/BatteryAndTyre" name="redirect2" id="batteryTyre">BATTERY AND TYRES</a></li>
						<li><a href="/upkeepServ" name="redirect4" id="unpeakServ">DETAILING SERVICES</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<ul class="list-unstyled quick-links">
						<li><a href="about">ABOUT</a></li>
						<li><a href="services">SERVICES</a></li>
						<li><a href="about#Garage-Form">GARAGE</a></li>
						<li><a href="contact">CONTACT US</a></li>
						<li><a href="about#contactMap">LOCATION</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<ul class="list-unstyled quick-links">
						<li><a href="privacy">PRIVACY POLICY</a></li>
						<li><a href="terms">TERMS AND CONDITIONS</a></li>
						<li><a href="refund-cancellation">REFUND AND CANCELLATION</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<a class="navbar-brand" href="/"><img src="{{ URL::to('/') }}/images/Car Trust Buddy logo with glow BG.png" style="width:100px; margin-left: 20px;" alt="..."></a>
          <p class="mb-0 mt-2"><b>Reg office address :</b> B306, Bhoomi Spring Town, Undri, Pune 411060</p>
          <p> <b>Mob Number :</b> 703 000 2323</p>
					<!-- <p>We focus on providing our client the highest service and customer support.</p> -->

					<!-- <ul class="list-unstyled list-inline social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul> -->
				</div>
				<hr class="footer-hr">

        <div class="col-md-12" style="display: flex;justify-content: space-between;">
          <div>
            <span style="color: white;">©  2021 Car Trust Buddy. All Rights Reserved.</span>
          </div>
          <div>
            <span style="color: white;">Website designed and developed by <a style="font-size: 16px;" href="https://aasa.tech/">Aasa Technologies</a> </span>
          </div>
        </div>
			</div>
		
		</div>


			<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header blueButton">
		        		<h5 class="modal-title text-white">Mobile Verification</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span class="text-white" aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<form class="modal-body" method="post" id="lead_form" action="javascript:void(0)">
		      			{{ csrf_field() }}
		       			<div class="row">
    						<div class="col-lg-12 p-0">
    							<div class="row">
    								<div class="col-lg-12 bg-light py-4 px-4">
    									<h4 class="text-center">LOG IN</h4>
	        							<hr class="orange-line">
	        							<div class="form-group mb-4 mt-3" id="outerLeadMobile">
										</div>
										<div class="d-none text-light" id="requestMobiError"></div>
										<div class="form-group mb-4">
										   	<input type="text" class="form-control" placeholder="Enter OTP" id="leadOtp" name="leadOtp">
										</div>
										@if (Auth::check())
                                			<input type="hidden" name="isUserLoggedIn" class="form-control" id="isUserLoggedIn" value="true" >
                                		@else
                                			<input type="hidden" name="isUserLoggedIn" class="form-control" id="isUserLoggedIn" value="false" >
                                		@endif
										<div class="d-none text-light" id="requestOtpError"></div>

										<div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
						              		<a class="text-warning resendOtpText" id="resendOtpHome" style="font-weight:bolder;"> Resend OTP </a>
							              	<a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time2">01:00</span> </a>
							            </div>

										<div class="form-group mb-3 otp-btn">
											<button type="button" class="btn btn-secondary btn-block" id="verifyLead">Verify Number</button>
										</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
				     </form>
				</div>
			</div>
		</div>



<!--  New User Authentication -->
<div class="modal fade" id="authLogin" tabindex="-1" role="dialog" aria-labelledby="authLogin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header blueButton"  id="authLoginTitle">
        <button type="button" class="close closePack" data-dismiss="modal" aria-label="Close">
          <span class="text-light" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="row">
          <div class="col-lg-12 bg-light py-4 px-4 rounded-left">
            <form method="POST" id="AuthFor" enctype="multipart/form-data">
              @csrf
                <h4 class="text-center">LOG IN</h4>
                <hr class="orange-line">
                <h5>Enter your Mobile Number</h5>
                <div class="form-group mb-4 mt-3">
                  <input id="authMobile" type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control" name="mobile" placeholder="Mobile Number" onkeyup="nospaces(this)">
                </div>
                <div class="form-group mb-4 otpText">
                  <input id="mOtp" type="number" name="mOtp"class="form-control" placeholder="Enter OTP">
                </div> 
                <div id="addonIds"></div>
                <div class="d-none text-light" id="requestOtpError"></div>
                <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                  <a class="text-warning resendOtpText" id="resendOtpHome" onclick="reSendOtp3()" style="font-weight:bolder;"> Resend OTP </a>
                  <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;" > in <span id="time3">01:00</span> </a>
                </div>
                <div class="form-group mb-3 loginUserBtn">
                  <button type="button" class="btn btn-secondary btn-block" id="aLogin">LOG IN</button>
                </div>
            </form>
            <div class="form-group mb-3 sendOtpBtn">
              <button type="button" id="AuthOtp" class="btn btn-secondary btn-block">SEND OTP</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" id="model-footer"></div>
    </div>
  </div>
</div>

<!--   addon model -->
<div class="modal fade addonServ" id="addonServ" tabindex="-1" role="dialog" aria-labelledby="addonServ" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header blueButton">
        <div id="addonServTitle"></div>
      <button type="button" class="close btn-close closePackage" data-addoncheck="{{Auth::check() ? 'true':'false'}}" aria-label="Close"><span class="text-light" aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body" >
        <div id="addonServDesc">  </div>
        <div id="addonServPrice"> </div>
        <div id="model-button" class="text-right">   </div>
      </div>
    </div>
  </div>
</div>
<!-- addon modal end -->

<!-- Add new package modal -->
<div class="modal fade" id="addNewPack" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content ">

        <div class="modal-header blueButton">
        <h4 class=" text-white m-0"> My Cart</h4>

          <button type="button" class="close closePackage" data-user="{{Auth::check() ? 'true':'false'}}" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="checkoutCart" style="max-height: 50vh;overflow-y: auto;"></div>
          <div class="modal-footer border-0 justify-content-between">
            <a href="{{ url('services') }}" class="btn text-light blueButton text-bold" >ADD OTHER SERVICE</a>
            <button type="button" class="btn text-light blueButton text-bold bookServiceBtn" onclick="checkout(this)">BOOK SERVICE</button>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal for checkout details-->
<div class="modal fade payment" id="payment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header blueButton" style="display: flex;align-items: center;">
        <h4 class="font-weight-bold text-white m-0"> Payment</h4>
        <button type="button" class="close closePackage" data-use="{{Auth::check() ? 'false':'false'}}" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="registerSubmit"  action="/" name="checkoutForm">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 my-2">
              <div class="pt-4 px-3">
                <div class="row formResponsiveTabletandMobile">
                  <div class="col-lg-6 view_for_mobile1">
                    <div>
                      <i class="fas fa-square icon-checkout"></i><span style="font-size: 12px;">  LOGIN/VERIFICATION</span>
                    </div>
                    <div class="form-group mb-2" id="mobileBlock" style="padding:0px 15px 0px 25px;">
                      <input type="tel" name="mobileVerification" id="mobileVerification" value="" class="form-control" >
                    </div>
                    @if(Auth::check())
	                    @if (!Auth::user()->username)
	                    	<div>
	                        	<i class="fas fa-square icon-checkout"></i><span style="font-size: 12px;">  NAME</span>
	                    	</div>
	                     	<div class="form-group mb-2" id="nameBlock" style="padding:0px 15px 0px 25px;">
	                        	<input type="text" name="checkoutName" id="checkoutName" value="" class="form-control" >
	                        	<input type="hidden" id="nameFound" name="nameFound" value="false">
                      		<div class="d-none text-danger" id="chekcoutNameError"></div>
	                    	</div>
	                      @else
	                        <input class="hiddenName" type="hidden" name="hiddenName" id="hiddenName" value="{{Auth::user()->username}}">
	                        <input type="hidden" id="nameFound" name="nameFound" value="true">
	                        <input type="hidden" id="checkoutName" name="checkoutName" value="">

	                    @endif
                    @else
                    	<div>
                        	<i class="fas fa-square icon-checkout"></i><span style="font-size: 12px;">  NAME</span>
                      	</div>
                      	<div class="form-group mb-2" id="nameBlock" style="padding:0px 15px 0px 25px;">
                        	<input type="text" name="checkoutName" id="checkoutName" value="" class="form-control" >
                        	<input type="hidden" id="nameFound" name="nameFound" value="false">
                      		<div class="d-none text-danger" id="chekcoutNameError"></div>
                      	</div>
                    @endif

                    @if (Auth::check())
                     	@if (!Auth::user()->email)
                        	<div>
                          		<i class="fas fa-square icon-checkout"></i><span style="font-size: 12px;">  EMAIL</span>
                        	</div>
                        	<div class="form-group mb-2" id="emailBlock"  style="padding:0px 15px 0px 25px;">
                        		<input type="email" name="email" id="email"  class="form-control checkoutEmail" value="">
                        	<input type="hidden" id="emailFound" name="emailFound" value="false">
                     		 <div class="d-none text-danger" id="chekcoutEmailError"></div>

                        	</div>
                      	@else
                        	<input class="hiddenEmail" type="hidden" name="hiddenEmail" id="hiddenEmail" value="{{Auth::user()->email}}">
                        	<input type="hidden" id="emailFound" name="emailFound" value="true">
                      	@endif
                    @else
                      	<div>
                        	<i class="fas fa-square icon-checkout"></i><span style="font-size: 12px">  EMAIL</span>
                      	</div>
                      	<div class="form-group mb-2" id="emailBlock"  style="padding:0px 15px 0px 25px;">
                        	<input type="email" name="email" id="email"  class="form-control checkoutEmail" value="">
                        	<input type="hidden" id="emailFound" name="emailFound" value="false">
                      		<div class="d-none text-danger" id="chekcoutEmailError"></div>

                      	</div>
                    @endif

                    <div>
                      <i class="fas fa-square icon-checkout"></i><span style="font-size: 12px">  APPOINTMENT DATE</span>
                    </div>
                    <div class="d-flex">
                      <div class="form-group mb-2" style="padding:0px 0px 0px 25px; width: 65%;">
                        <input type="date" class="form-control" id="pickupDate" name="pickupDate" placeholder="Pickup Date" min="{{ date('Y-m-d') }}">
                        <div class="d-none text-danger" id="pickupdate"></div>
                      </div>
                      <div class="form-group mb-2 mb-2" style="padding:0px 15px 0px 5px;width: 35%;">
                        <input class="form-control time" id="pickupTime" name="pickupTime" placeholder="--:--" required>
                        <div class="d-none text-danger" id="pickuptime"></div>
                      </div>
                    </div>
                    <div>
                      <i class="fas fa-square icon-checkout"></i><span style="font-size: 12px;">  VEHICLE NO.</span>
                    </div>
                    <div class="form-group mb-2" style="padding:0px 15px 0px 25px;">
                      <input type="text" class="form-control" style="text-transform:uppercase" onkeyup="onlyNoSpaces(this)" id="carNumber" name="carNumber" placeholder="Eg. MH12 A1234" required>
                    <div class="d-none text-danger" id="carNumberErr"></div>
                  </div>
                   <div>
                      <i class="fas fa-square icon-checkout"></i><span style="font-size: 12px;">  PICKUP LOCATION/ADDRESS</span>
                    </div>
                    <div class="form-group green-border-focus" style="padding:0px 15px 0px 25px;">
                      <!-- <p class="text-right mb-0" style="color: #182d54;"><i class="fas fa-circle"></i><a style="font-size: 12px; font-weight: bold;color: #182d54;" href="#"> DELECT MY LOCATION</a></p> -->
                      <!-- <textarea class="form-control" id="location" name="location" rows="3" required></textarea>
                      <div class="d-none text-danger" id="pickuplocation"></div> -->
                      @if (Auth::check())
                        @if(isset(Auth::user()->address))
                          <textarea class="form-control rounded-0" id="location" name="location" rows="3" required>{{ Auth::user()->address }}</textarea>
                        @else
                          <textarea class="form-control rounded-0" id="location" name="location" rows="3" required></textarea>
                        @endif
                      @else
                          <textarea class="form-control rounded-0" id="location" name="location" rows="3" required></textarea>
                      @endif
                    <div class="d-none text-danger" id="pickuplocation"></div>

                    </div>
                    <div>
                      <i class="fas fa-square icon-checkout"></i><span style="font-size: 12px;">  SELECT PAYMENT OPTIONS</span>
                      <div class="d-none text-danger" id="paymentType"></div>

                    </div>
                    <div style="padding:0px 10px 0px 25px;">
                      <span class="btn btn-outline-dark blueButton text-light my-1" style="font-size: 14px;padding: 10px 15px;" onclick="onlineCheckout()">Pay Now</span>
                      <span class="btn btn-outline-dark blueButton text-light my-1 codBtn" style="font-size: 14px;padding: 10px 15px;" onclick="offlineCheckout()">Pay at Service Center</span>
                    </div>
                    <span style="color: red; font-size: 13px;">*MyCarMech money can only used for online payments.</span>
                  </div>
                  <div class="col-lg-6 p-0 view_for_mobile2">
                    <div class="shadow px-4 pb-5 billingColumn" style="height: 100%;">
                      	<h4 class="text-center mb-5 mt-1 pt-4 font-weight-bold">BILL DETAILS</h4>
                      	<div class="row" id="packageCheckout" style="max-height: 20vh;overflow-y: auto;"></div>
                      	<div class="row py-4">
	                        <span class="col-lg-12 p-0" style="font-weight: bold;color: #182d54;">Promo Code</span> 
	                        <div class="col-lg-7 p-0">
	                          	<input type="text" name="promo" id="promo" class="form-control" placeholder="eg. MCM20">
	                        </div>
                          <div class="d-none text-danger" id="promoCodeError"></div>
	                        <div class="col-lg-5 pr-0 mb-2 promoBtnDiv">
	                          	<button type="button" class="promocodeBtn btn yellowBackground btn-block text-color">Apply</button>
	                        </div>
	                        <div class="col-lg-7 pl-0 row d-none promoAppliedMsgDiv" style="justify-content: space-between;">
	                          	<div>
	                            	<p style="font-size: 10px; color:red; cursor: pointer;">Promoco Code Applied</p>
	                          	</div>
	                          	<div>
	                            	<span class="removePromo" style="font-size: 10px; color:red;">x</span>
	                          	</div>
	                        </div>

                          <div>
                              <input type="hidden" id="couponType" name="couponType" value="" />
                              <input type="hidden" id="couponAmt" name="couponAmt" value="" />

                          </div>
	                    </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div id="rewardPoint">
                            
                          </div>
                        </div>
                        
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div id="rewardPoint">
                            
                          </div>
                        </div>
                        
                      </div>

                      	<!-- <div class="row py-2">
                    		<span class="col-lg-12 p-0">Promo Code</span> 
                        	<div class="col-lg-7 col-md-7 col-7 p-0">
                          		<input type="text" name="promo" id="promo" class="form-control" placeholder="eg. MCM20">
                        	</div>
                        	<div class="col-lg-5 col-md-5 col-5 pr-0">
                          		<input type="button" class="btn btn-warning btn-block text-light"  name="verify" value="check">
                          	</div>
                    	</div> -->
                     <!--  <h6 class="m-0" style="font-size: 12px; font-weight: bold;">Any special remarks/suggetions..</h6>
                      <textarea class="form-control" id="specialRemark" name="specialRemark" rows="3"></textarea> -->
                      <div class="border border-warning border-right-0 border-left-0 mt-3 col-lg-10" id="finalAmount"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal for checkout details Ends-->

