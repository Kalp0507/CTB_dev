@extends('layouts.default')
@section('content')

<div class=" signup-modal commonLoginDiv" >
    <div class="row yellowBackground p-4" style="border-radius: 20px;">
        <div class="col-lg-12 p-0">
            <div class="row">
                <div class="col-lg-6 bg-white py-4 px-4 " style="border-radius: 20px 0px 0px 20px;">


                    @if ($errors->any())
                    <div class="alert alert-danger" style="margin-bottom: 0rem;">
                        <ul style="margin-bottom: 0rem">
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  <!-- <form method="POST" action="{{ url('Pages/register') }}" id="form" class="p-3" enctype="multipart/form-data"> -->
                  <form method="POST" id="form" class="p-3 login-form" enctype="multipart/form-data">
                      @csrf
                      

                      <h4 class="text-center garage-heading font-weight-bold">SIGN UP</h4>
                      <div class="alert alert-danger displayError d-none mb-2" style="margin-bottom: 0rem;">
                        <p style="margin-bottom: 0rem" class="errorList"></p>
                      </div>
                      <hr class="orange-line">
                      <div class="form-group mb-4">
                        <input type="text" name="username" id="username" placeholder="Enter Full Name" class="form-control form-control-lg" required>
                      </div>
                      <div class="form-group mb-4">
                          <input type="tel" name="mobile" id="mobile" placeholder="Enter Phone Number" class="form-control form-control-lg"  pattern="[0-9]{10}" maxlength="10" onkeyup="nospaces(this)" required>
                      </div>

                      <div class="form-group mb-4">
                          <input type="email" id="signupemail" name="email" placeholder="Enter Email" pattern="^[^@\s]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" class="form-control form-control-lg" required>
                      </div>
                      <div class="form-group mb-4">
                          <input type="password" name="password" placeholder="Set Password" class="form-control form-control-lg" id="txtNewPassword" required>
                      </div>
                      <div class="form-group mb-2">
                          <input type="password" name="confirmpassword" placeholder="Password Confirmation" class="form-control form-control-lg" id="txtConfirmPassword" required>
                      </div>
                      <div class="registrationFormAlert mb-4" style="color:green;" id="CheckPasswordMatch"></div>
                      <!-- <div class="form-group mb-3">
                          <button type="submit" class="btn btn-secondary btn-block">SIGN IN</button>
                      </div> -->
                      <div class="form-group mb-3">
                        <button class="btn my-4 my-sm-2 signUpBtn blueButton btn-block text-light font-weight-bold m-auto" style="padding: 10px 30px; font-size: 14px;width: 70%" type="button">Sign Up</button>
                        
                      </div>
                  </form>
                  <div class="text-center p-2">
                      <h6>Already have an Account? 
                        <a href="/login" class="garage-heading" style="font-weight:bolder;"> Log In </a>
                    </h6>
                </div>
            </div>
        <div class="col-lg-6 p-0" style="border-radius: 20px 0px 0px 20px;">
          <div class="loginSignupBackground" style="border-radius: 0px 20px 20px 0px;background-image: linear-gradient(#2732A3, #121A7F);display: flex; align-items: center;justify-content: center;">
            <div>
              <!--<img src="{{ URL::to('/') }}/images/logoWithoutTagline.png" style="width:100%;" alt="...">-->
              
              <img src="{{ URL::to('/') }}/images/Car Trust Buddy logo with glow BG.png" style="width:100px; margin-left: 20px;" alt="...">
              
            </div>
          </div>   
        </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="loginWithOTPModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
       
      <div class="yellowBackground p-4" style="border-radius: 20px;">
        <button type="button" class="close closePackage" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="row">
              <div class="col-lg-6 bg-light py-4 px-4"  style="border-radius: 20px 0px 0px 20px;">
                <form method="POST" action="{{ url('login') }}" id="form2" class="login-form" enctype="multipart/form-data">
                  @csrf
                  <h4 class="text-center">Mobile Verification</h4>
                  <hr class="orange-line">
                  <h5> Your entered mobile </h5>
                  <div class="form-group mb-4 mt-3">
                    <input id="mobilenum" type="tel" maxlength="10" pattern="[0-9]{10}" class="form-control form-control-lg" name="mobile" required autofocus placeholder="Mobile Number" disabled>
                  </div>
                  <div class="form-group mb-4 otp-block">
                      <input id="otp" type="number" name="otp"class="form-control form-control-lg" placeholder="Enter OTP">
                  </div> 

                  <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
                    <a class="resendOtpText" onclick="reSendOtp()" style="font-weight:bolder;color: #F5E72E;"> Resend OTP </a>
                    <a class="resendOtpTextTimer" style="font-weight:bolder;color: #F5E72E;"> in <span id="time2">01:00</span> </a>
                  </div>
                  
                  <!--Check Box For Agreement-->
                  <div class="form-check mt-3">
                   <input class="form-check-input" type="checkbox" id="agree" name="agree" required>
                   <label class="form-check-label" for="agree">
                    By clicking this, you agree to the 
                   <a href="/terms" target="_blank">Terms and Conditions</a>, 
                   <a href="/privacy" target="_blank">Privacy Policy</a>, and 
                   <a href="/refund-cancellation" target="_blank">Refund & Cancellation Policy</a>.
                   </label>
                  </div>
                  <!---->

                  <div class="form-group mb-3 login-btn">
                    <button type="submit" id="registerAfterOtpBtn" class="btn yellowBackground btn-block">Register</button>
                  </div>
                </form>
                <div class="form-group mb-3 otp-btn">
                  <button type="button" onclick="sendOtpAtRegistartion()" class="btn blueButton text-light m-auto btn-block" style="width: 70%; padding: 10px 0px;">Send OTP</button>
                </div>
                <!-- <div class="text-center p-2 login-msg">
                  <h6>Want to setup your Account? 
                    <a href="#" class="text-warning" data-dismiss="modal" data-toggle="modal" data-target="#signup" style="font-weight:bolder;"> SIGN UP </a>
                  </h6>
                </div> -->
              </div>
              <div class="col-lg-6 p-0">
                <div class="loginSignupBackground" style="border-radius: 0px 20px 20px 0px;background-image: linear-gradient(#2732A3, #121A7F);display: flex; align-items: center;justify-content: center;">
                  <div>
                    <!--<img src="{{ URL::to('/') }}/images/logoWithoutTagline.png" style="width:100%;" alt="...">-->
                    <img src="{{ URL::to('/') }}/images/Car Trust Buddy logo with glow BG.png" style="width:100px; margin-left: 20px;" alt="...">
                  </div>
                </div> 
                <!-- <div class="loginSignupBackground" style="border-radius: 0px 20px 20px 0px;"></div>  -->  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

<script type="text/javascript">
  function sendOtpAtRegistartion() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // alert($('#mobilenum').val());
    $.ajax( {
        url:'sendOtpAtRegistartion',
        type:'post',
        data: {'mobile': $('#form2').find('input[name="mobile"]').val()},
        // alert(data);
        success:function(data,status,xhr) {
    console.log("OTP Test---"+JSON.stringify(xhr));
          if(xhr.status==200) {
              localStorage.setItem("otp", xhr.responseText);
              $('.otp-block').show();
              $('.login-btn').show();
              $('.otp-btn').hide();
              $('.resendOtpDiv').removeClass('d-none');
              $('.resendOtpText').css('cursor','not-allowed');
              $('.resendOtpText').css('pointer-events','none');
              // var fiveMinutes = 60 * 1,
              var display2 = document.querySelector('#time2');
              var timer2 = new CountDownTimer(30);
              timer2.onTick(format(display2)).start();

              function format(display) {
                return function (minutes, seconds) {
                  minutes = minutes < 10 ? "0" + minutes : minutes;
                  seconds = seconds < 10 ? "0" + seconds : seconds;
                  display.textContent = minutes + ':' + seconds;
                  console.log("Check---"+seconds);
                  if(seconds == 0) {
                    $('.resendOtpTextTimer').addClass('d-none');
                    $('.resendOtpText').css('pointer-events','auto');
                    $('.resendOtpText').css('cursor','pointer');
                  }
                };
              }   
          }

          if(xhr.status==250) {
            swal(xhr.responseText, "", "warning");
          }
        },
        error:function () {
            console.log('error');
        }
    });
  }

  function reSendOtp() {
  $.ajax( {
    url:'sendOtpAtRegistartion',
    type:'post',
    data: {'mobile': $('#form2').find('input[name="mobile"]').val()},
    // alert(data);
    success:function(data,status,xhr) {
      localStorage.setItem("otp", xhr.responseText);
      if(xhr.status==200) {
          $('.otp-block').show();
          $('.login-btn').show();
          $('.otp-btn').hide();
          $('.resendOtpTextTimer').removeClass('d-none');
          $('.resendOtpDiv').removeClass('d-none');
          $('.resendOtpText').css('pointer-events','none');
          $('.resendOtpText').css('cursor','not-allowed');

          // var fiveMinutes = 60 * 1,
          var display2 = document.querySelector('#time2');
          var timer2 = new CountDownTimer(30);
          timer2.onTick(format(display2)).start();

          function format(display) {
            return function (minutes, seconds) {
              minutes = minutes < 10 ? "0" + minutes : minutes;
              seconds = seconds < 10 ? "0" + seconds : seconds;
              display.textContent = minutes + ':' + seconds;
              console.log("Check---"+seconds);
              if(seconds == 0) {
                $('.resendOtpTextTimer').addClass('d-none');
                $('.resendOtpText').css('pointer-events','auto');
                $('.resendOtpText').css('cursor','pointer');
              }
            };
          }   
      }
      if(xhr.status==250) {
        swal(xhr.responseText, "", "warning");
      }
    },
    error:function () {
        console.log('error');
    }
});
}


  // CountDown Timer Code-------------------------------

  function CountDownTimer(duration, granularity) {
    this.duration = duration;
    this.granularity = granularity || 1000;
    this.tickFtns = [];
    this.running = false;
  }

  CountDownTimer.prototype.start = function() {
    if (this.running) {
      return;
    }
    this.running = true;
    var start = Date.now(),
        that = this,
        diff, obj;

    (function timer() {
      diff = that.duration - (((Date.now() - start) / 1000) | 0);
      
      if (diff > 0) {
        setTimeout(timer, that.granularity);
      } else {
        diff = 0;
        that.running = false;
      }

      obj = CountDownTimer.parse(diff);
      that.tickFtns.forEach(function(ftn) {
        ftn.call(this, obj.minutes, obj.seconds);
      }, that);
    }());
  };

  CountDownTimer.prototype.onTick = function(ftn) {
    if (typeof ftn === 'function') {
      this.tickFtns.push(ftn);
    }
    return this;
  };

  CountDownTimer.prototype.expired = function() {
    return !this.running;
  };

  CountDownTimer.parse = function(seconds) {
    return {
      'minutes': (seconds / 60) | 0,
      'seconds': (seconds % 60) | 0
    };
  };
  // CountDown Timer Code End-------------------------------

</script>


