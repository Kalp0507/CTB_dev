@extends('layouts.default')
@section('content')
<div>
	<div class="commonLoginDiv">
          <div class="col-lg-12 p-4 yellowBackground"  style="border-radius: 20px;">
            <div class="row">
              <div class="col-lg-6 bg-light py-4 px-4" style="border-radius: 20px 0px 0px 20px;">
                <form method="POST" action="{{ url('loginWithPass') }}" class="login-form" id="form" enctype="multipart/form-data">
                  @csrf
                  @if(session()->get('message'))
                    <div class="alert alert-success">
                      <!-- {{ session()->get('message') }} -->
                        {{ session()->get('message') }}
                    </div>
                  @endif
                  
                  <h4 class="text-center garage-heading font-weight-bold">LOG IN</h4>
                  <hr class="orange-line">
                  <div class="form-group mb-4 mt-3">
                    <input id="email" type="email" class="form-control form-control-lg" name="email" required autofocus placeholder="Email">
                  </div>
                   <div class="form-group mb-4 mt-3">
                    <input id="password" type="password" class="form-control form-control-lg" name="password" required autofocus placeholder="Password">
                  </div>
                  <div class="form-group mb-3">
                    <button type="submit" class="btn blueButton text-light btn-block m-auto" style="width: 70%; padding: 10px 0px;">Log In</button>
                  </div>

                  <div class="text-center ">
                    <a href="/login" style="font-weight:bolder; color: #F5E72E;" class="garage-heading">Login with OTP</a>
                  </div>

                </form>
                <div class="text-center p-2 login-msg">
		            <h6>Want to setup your Account? 
		              <a href="/register" class="garage-heading font-weight-bold"> Sign Up </a>
		            </h6>
		          </div>
              	</div>
              	        <div class="col-lg-6 p-0" style="border-radius: 20px 0px 0px 20px;">
          <div class="loginSignupBackground" style="border-radius: 0px 20px 20px 0px;background-image: linear-gradient(#2732A3, #121A7F);display: flex; align-items: center;justify-content: center;">
            <div>
            <!--<img src="{{ URL::to('/') }}/images/logoWithoutTagline.png" style="width:100%;" alt="...">-->
            
            <a class="navbar-brand" href="/"><img src="{{ URL::to('/') }}/images/Car Trust Buddy logo with glow BG.png" style="width:100px; margin-left: 20px;" alt="..."></a>
              
            </div>
          </div>   
        </div>
            </div>
      	</div>
    </div>
	
</div>
@stop