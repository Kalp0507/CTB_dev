<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body bg-warning signup-modal">
        <div class="row">
        	<div class="col-lg-12 p-0">
        		<div class="row">
        			<div class="col-lg-6 bg-light py-4 px-4">
        				<h4 class="text-center">SIGN IN</h4>
        				<hr class="orange-line">
        				<div class="form-group mb-4">
						   	<input type="text" class="form-control" placeholder="Mobile Number">
						</div>
						<div class="form-group mb-4">
						   	<input type="text" class="form-control" placeholder="Enter Email id">
						</div>
						<div class="form-group mb-4">
						   	<input type="text" class="form-control" placeholder="Set Password">
						</div>
						<div class="form-group mb-4">
						   	<input type="text" class="form-control" placeholder="Confirm Password">
						</div>
						<div class="form-group mb-3">
							<button type="button" class="btn btn-secondary btn-block">SIGN IN</button>
						</div>
						<div class="text-center p-2">
					    	<h6>Already have an Account? 
					    		<a href="#" class="text-warning" data-dismiss="modal" data-toggle="modal" data-target="#login" style="font-weight:bolder;"> LOG IN </a>
					    	</h6>
					    </div>
        			</div>
        			<div class="col-lg-6 p-0">
        				<div class="loginSignupBackground"></div>
        			</div>
        		</div>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body bg-warning signup-modal">
        <div class="row">
        	<div class="col-lg-12 p-0">
        		<div class="row">
        			<div class="col-lg-6 bg-light py-4 px-4">
        				<h4 class="text-center">LOG IN</h4>
        				<hr class="orange-line">
        				<h5>Enter your Mobile Number</h5>
        				<div class="form-group mb-4 mt-3">
						   	<input type="text" class="form-control" placeholder="Mobile Number">
						</div>
						<div class="form-group mb-4 otp-block d-none" style="display: none;">
						   	<input type="text" class="form-control" placeholder="Enter OTP">
						</div>
						<div class="form-group mb-3 otp-btn">
							<button type="button" class="btn btn-secondary btn-block">SEND OTP</button>
						</div>
						<div class="form-group mb-3 signup-btn" style="display: none;">
							<button type="button" class="btn btn-secondary btn-block">LOG IN</button>
						</div>

						<div class="text-center p-2 login-msg">
					    	<h6>Want to setup your Account? 
					    		<a href="#" class="text-warning" data-dismiss="modal" data-toggle="modal" data-target="#signup" style="font-weight:bolder;"> SIGN IN </a>
					    	</h6>
					    </div>
        			</div>
        			<div class="col-lg-6 p-0">
        				<div class="loginSignupBackground"></div>		
        			</div>
        		</div>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
