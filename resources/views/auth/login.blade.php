@extends('layouts.default')
@section('content')

<div class="commonLoginDiv signup-modal" style="padding: 5% 20%;">
  <div class="row p-4 yellowBackground" style="border-radius: 20px;">
    <div class="col-lg-12 p-0">
      <div class="row">
        <div class="col-lg-6 bg-white py-4 px-5" style="border-radius: 20px 0px 0px 20px;">
          <form method="POST" id="form2" class="login-form" enctype="multipart/form-data">
            @csrf
            <h4 class="text-center garage-heading font-weight-bold">LOG IN</h4>
            <hr class="orange-line">
            <h5>Enter your Mobile Number</h5>
            <div class="form-group mb-4 mt-3">
              <input id="mobilenum1" type="tel" class="form-control form-control-lg" value="" name="mobile" required autofocus placeholder="Mobile Number"  pattern="[0-9]{10}" onkeyup="nospaces(this)" maxlength="10" >
            </div>
            <div class="form-group mb-4 otp-block">
                <input id="otpVal" type="number" name="otp"class="form-control form-control-lg" value="" placeholder="Enter OTP">
            </div> 
            
            <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
              <a class=" resendOtpText" onclick="reSendOtpLogin()" style="font-weight:bolder;color: #F5E72E;"> Resend OTP </a>
              <a class="resendOtpTextTimer" style="font-weight:bolder;color: #F5E72E"> in <span id="time2">01:00</span> </a>
            </div>

            <div class="form-group mb-3 login-btn" >
              <button type="button" id="loginBtn" onclick="checkOtp()" class="btn blueButton text-light btn-block font-weight-bold m-auto rounded" style=" padding: 10px 0px; font-size: 14px; width: 70%">Log In</button>
            </div>
          </form>

          <div class="form-group mb-3 otp-btn">
              <button type="button" style=" padding: 10px 0px; font-size: 14px; width: 70%" onclick="sendOtp()" class="btn blueButton text-light btn-block font-weight-bold m-auto rounded">Send OTP</button>
          </div>

          <div class="text-center">
            <h4>OR</h4>
          </div>

          <div class="text-center ">
            <a href="/loginWithPassword" style="font-weight:bolder; color: #F5E72E;" class="garage-heading">Login with password</a>
          </div>


          <div class="text-center p-2 login-msg">
            <h6>Want to setup your Account? 
              <a href="/register" class="garage-heading" style="font-weight:bolder;color:#F5E72E"> Sign Up </a>
            </h6>
          </div>

        </div>
        <div class="col-lg-6 p-0" style="border-radius: 20px 0px 0px 20px;">
          <div class="loginSignupBackground" style="border-radius: 0px 20px 20px 0px;background-image: linear-gradient(#2732A3, #121A7F);display: flex; align-items: center;justify-content: center;">
            <div>
            <!--<img src="{{ URL::to('/') }}/images/logoWithoutTagline.png" style="width:100%;" alt="...">-->
            
            <a class="navbar-brand" href="/"><img src="{{ URL::to('/') }}/images/Car Trust Buddy logo with glow BG.png" style="width:100px; margin-left: 20px;" alt="..."></a>
              
            </div>
          </div>   
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body bg-warning signup-modal">
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="row">
              <div class="col-lg-6 bg-light py-4 px-4 rounded-left">
                 @if ($errors->any())
                              <div class="alert alert-danger" style="margin-bottom: 0rem;">
                                  <ul style="margin-bottom: 0rem">
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                  <form method="POST" action="{{ url('Pages/register') }}" id="form" enctype="multipart/form-data">
                  @csrf
                    <h4 class="text-center">SIGN UP</h4>
                    <hr class="orange-line">
                    <div class="form-group mb-4">
                      <input type="tel" name="phone" id="mobile" placeholder="Enter Phone Number" class="form-control" pattern="[6-9]{1}[0-9]{9}" required>
                    </div>

                    <div class="form-group mb-4">
                      <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                    </div>
                    <div class="form-group mb-4">
                      <input type="password" name="password" placeholder="Set Password" class="form-control" id="txtNewPassword" required>
                    </div>
                    <div class="form-group mb-2">
                      <input type="password" name="confirmpassword" placeholder="Password Confirmation" class="form-control" id="txtConfirmPassword" required>
                    </div>
                      <div class="registrationFormAlert mb-4" style="color:green;" id="CheckPasswordMatch"></div>
                    <div class="form-group mb-3">
                      <button type="submit" class="btn btn-secondary btn-block">SIGN IN</button>
                    </div>
                  </form>
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
</div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body bg-warning signup-modal">
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="row">
              <div class="col-lg-6 bg-light py-4 px-4 rounded-left">
                <form method="POST" action="{{ url('login') }}" id="form" enctype="multipart/form-data">
                  @csrf
                  <h4 class="text-center">LOG IN</h4>
                  <hr class="orange-line">
                  <h5>Enter your Mobile Number</h5>
                  <div class="form-group mb-4 mt-3">
                    <input type="text" id="" name="">
                    <input id="mobilenum" type="tel" class="form-control" name="mobile" required autofocus placeholder="Mobile Number">
                  </div>
                  <div class="form-group mb-4 otp-block">
                      <input id="otp" type="number" name="otp"class="form-control" placeholder="Enter OTP">
                  </div> 
                  <div class="form-group mb-3 login-btn">
                    <button type="submit" class="btn btn-secondary btn-block">LOG IN</button>
                  </div>
                </form>
                <div class="form-group mb-3 otp-btn">
                    <button type="button" onclick="sendOtp()" class="btn btn-secondary btn-block">SEND OTP</button>
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
</div> -->

<!-- Modal Login with Username and Password -->
<!-- <div class="modal fade" id="loginWithUsername" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body bg-warning user-modal">
        <div class="row">
          <div class="col-lg-12 p-0">
            <div class="row">
              <div class="col-lg-6 bg-light py-4 px-4 rounded-left">
                <form method="POST" action="{{ url('loginWithPass') }}" id="form" enctype="multipart/form-data">
                  @csrf
                  <h4 class="text-center">LOG IN</h4>
                  <hr class="orange-line">
                  <div class="form-group mb-4 mt-3">
                    <input id="email" type="email" class="form-control" name="email" required autofocus placeholder="Email">
                  </div>
                   <div class="form-group mb-4 mt-3">
                    <input id="password" type="password" class="form-control" name="password" required autofocus placeholder="Password">
                  </div>
                  <div class="form-group mb-3">
                    <button type="submit" class="btn btn-secondary btn-block">LOG IN</button>
                  </div>
                </form>
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
</div> -->

<script type="text/javascript">
  function checkPasswordMatch() {
      var password = $("#txtNewPassword").val();
      var confirmPassword = $("#txtConfirmPassword").val();
      if (password != confirmPassword)
          $("#CheckPasswordMatch").html("Passwords does not match!");
      else
          $("#CheckPasswordMatch").html("Passwords match.");
  }
  $(document).ready(function () {
     $("#txtConfirmPassword").keyup(checkPasswordMatch);
  });



  @if (count($errors) > 0)
    $('#signup').modal('show');
  @endif

  function checkOtp() {
    // window.location()
    $mobileNumber = $('#mobilenum1').val();
    $otp = $('#otpVal').val();
        console.log("OTP-----"+$otp);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url:'/afterLogin',
      type:'get',
      data: {'mobile': $mobileNumber, 'otp':$otp },
      // alert(data);
      success:function(data,status,xhr) {
        console.log("Data--"+JSON.stringify(xhr));
        if(xhr.status==250) {
          alert(xhr.responseText);
        }
        if(xhr.status==200) {
          window.location.href="/";
        }
        if(xhr.status==210) {
          window.location.href="/Dashboard";
        }

      }
    });
  }

  // $('#loginBtn').click(function() {


  // });

  $('.otp-block').hide();
  $('.login-btn').hide();
  function sendOtp() {
    console.log("Checii---"+$('#mobilenum1').val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax( {
        url:'sendOtp',
        type:'post',
        data: {'mobile': $('#mobilenum1').val()},
        // alert(data);
        success:function(data,status,xhr) {
          if(xhr.status==200) {
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
              console.log(data);
              console.log(xhr);
              console.log(status);
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

function reSendOtpLogin() {
  $.ajax( {
    url:'sendOtp',
    type:'post',
    data: {'mobile': $('#mobilenum1').val()},
    // alert(data);
    success:function(data,status,xhr) {
      if(xhr.status==200) {
          $('.otp-block').show();
          $('.login-btn').show();
          $('.otp-btn').hide();
          $('.resendOtpTextTimer').removeClass('d-none');
          $('.resendOtpDiv').removeClass('d-none');
          $('.resendOtpText').css('pointer-events','none');
          $('.resendOtpText').css('cursor','not-allowed');
          console.log(xhr);
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
@stop