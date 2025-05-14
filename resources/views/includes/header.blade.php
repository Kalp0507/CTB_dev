 <!--  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>

</div> -->
<!-- <div id="preloader" aria-busy="true" aria-label="Loading, please wait." role="progressbar"><img class="icon" src="https://raziraz.github.io/codepen/img/bolt.svg">
</div> -->
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="/"><img src="{{ URL::to('/') }}/images/Car Trust Buddy logo with glow BG.png" style="width:100px; margin-left: 20px;" alt="..."></a>
  <button class="navbar-toggler mycarmakeMainNav" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background: #F5E72E;">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto pl-3 col-md-8">
      <li class="nav-item">
        <a class="nav-link p-0 " id="home" href="/">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-0" id="services" href="/services">SERVICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-0" id="about" href="/about">WHO WE ARE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-0" id="about1" href="/about/#contactMap">OUR NETWORK</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-0" id="about2" href="/about/#Garage-Form">BE OUR PARTNER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-0" id="mustKnow" href="/mustKnow">MUST KNOW</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-0" id="faq" href="/faq">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-0" id="contact" href="/contact">CONTACT</a>
      </li>
    </ul>

    <!-- <li class = "dropdown menu1">
      <a  class = "dropdown-toggle toggleDropdown">Javasss </a>
      <ul class = "dropdown-menu dropdownMenu" style="margin-top: 1px; list-style: none;color: white;">
        <li><a class="dropdown-item" href="account" id="accountBtn">Account</a></li>
        <li><a class="dropdown-item" href="logout" id="logoutBtn">Logout</a></li>
      </ul>
    </li> -->
      
    <form class="form-inline my-2 my-lg-0 col-md-4 navRightSection">
      @if (Auth::check())
        <li class = "dropdown menu1" style="margin-top: 1px; list-style: none;color: white;">
          @if(Auth::user()->username != null)
            <a class="dropdown-toggle toggleDropdown" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Hello, <span id="navUsername"><?php $navbarName = Auth::user()->username; $firstName = explode(" ", $navbarName); ?> {{$firstName[0]}}</span></a>
          @else
            <a class="dropdown-toggle toggleDropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Hello,{{Auth::user()->mobile}}</a>
          @endif
          <ul class = "dropdown-menu dropdownMenu" style="margin-top: -1px; list-style: none;color: white;">
            <li><a class="dropdown-item" href="account" id="accountBtn">Account</a></li>
            <li><a class="dropdown-item" href="logout" id="logoutBtn">Logout</a></li>
          </ul>
        </li>
        <li class="outerCheckoutBtnDiv outerCheckoutNavBtnDiv" style="display: none; margin-left: 15px;">
          <i class="fas fa-shopping-cart fa-2x" style="color:white; font-size: 21px;" id="outerCheckoutBtn" onclick="onOuterCheckoutClick()" ></i>
          <span class='badge badge-warning' id='lblCartCount'>0</span>
        </li>
      @else
        <a href="/login"><button class="btn yellowBackground my-4 my-sm-2 font-weight-bold" style="padding: 10px 30px; font-size: 14px;" type="button">Login/Sign-up</button></a>
        
        <!-- <button class="btn btn-warning my-4 my-sm-2" style="padding: 10px 30px; font-size: 14px;" data-toggle="modal" data-target="#loginWithUsername" type="button">Login/Sign-up</button> -->
      @endif
     <!-- <button class="btn btn-warning my-4 my-sm-2" style="padding: 10px 30px; font-size: 14px;" data-toggle="modal" data-target="#loginWithUsername" type="button">Login/Sign-up</button> -->
    </form>
    @if(Auth::check())
      <script>{{ 'var logged = true;' }}</script>
    @else
      <script>{{ 'var logged = false;' }}</script>
    @endif
  </div>
</nav>


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
                  <form method="POST" action="{{ url('Pages/register') }}" id="form1" enctype="multipart/form-data">
                  @csrf
                    <h4 class="text-center">SIGN UP</h4>
                    <hr class="orange-line">
                    <div class="form-group mb-4">
                      <input type="tel" name="mobile" id="mobile" placeholder="Enter Phone Number" class="form-control" pattern="[6-9]{1}[0-9]{9}" required>
                    </div>

                    <small class="text-danger">{{ $errors->first('phone') }}</small>
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
                      <button type="submit" class="btn btn-secondary btn-block">SIGN UP</button>
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
                <form method="POST" action="{{ url('login') }}" id="form2" enctype="multipart/form-data">
                  @csrf
                  <h4 class="text-center">LOG IN</h4>
                  <hr class="orange-line">
                  <h5>Enter your Mobile Number</h5>
                  <div class="form-group mb-4 mt-3">
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
                    <a href="#" class="text-warning" data-dismiss="modal" data-toggle="modal" data-target="#signup" style="font-weight:bolder;"> SIGN UP </a>
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
        <div class="row p-5">
          <div class="col-lg-12 p-0">
            <div class="row">
              <div class="col-lg-6 bg-light py-4 px-4 rounded-left">
                <form method="POST" action="{{ url('loginWithPass') }}" id="form3" enctype="multipart/form-data">
                  @csrf
                  <h4 class="text-center">LOG IN</h4>
                  <hr class="orange-line">
                  <div class="form-group mb-4 mt-3">
                    <input id="email" type="email" class="form-control" name="email" required autofocus placeholder="Email" oninvalid="this.setCustomValidity('Please Enter valid email')">
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
                    <a href="#" class="text-warning" data-dismiss="modal" data-toggle="modal" data-target="#signup" style="font-weight:bolder;"> SIGN UP </a>
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
  $( document ).ready(function() {
    if(logged==true) {
      console.log("User Logged in---"+logged);
      $.ajax({
        url: "/PServices/getCartCount",
        method: 'POST',
        success: function(response){
            if(response) {
              $countData =  JSON.parse(response);
              $count = $countData.count;
              $('#lblCartCount').html($count);
              console.log("Count is----"+$count);
            }  
        }
      });
    }
  });
  // var toggleFlag=true;
  // var toggleClicked=false;

    // function checkPasswordMatch() {
    //     var password = $("#txtNewPassword").val();
    //     var confirmPassword = $("#txtConfirmPassword").val();
    //     if (password != confirmPassword)
    //         $("#CheckPasswordMatch").html("Passwords does not match!");
    //     else
    //         $("#CheckPasswordMatch").html("Passwords match.");
    // }
    // $(document).ready(function () {
    //    $("#txtConfirmPassword").keyup(checkPasswordMatch);
    // });
  
// $('#signup').submit(function(e) {
//             e.preventDefault();
//             if(!$('#mobile').val().match('[0-9]{10}'))  {
//                 alert("Please put 10 digit mobile number");
//                 return;
//             }  

//         });

    //     @if (count($errors) > 0)
    //     $('#signup',this).modal('show');
    // @endif


     // $('.otp-block').hide();
     // $('.login-btn').hide();
     //    function sendOtp() {
     //        $.ajaxSetup({
     //            headers: {
     //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //            }
     //        });

     //        // alert($('#mobilenum').val());
     //        $.ajax( {
     //            url:'sendOtp',
     //            type:'post',
     //            data: {'mobile': $('#mobilenum').val()},
     //            // alert(data);
     //            success:function(data,status,xhr) {
     //                if(xhr.status==200) {
     //                    $('.otp-block').show();
     //                    $('.login-btn').show();
     //                    $('.otp-btn').hide();
     //                }

     //                if(xhr.status==250) {
     //                    alert('Mobile No not found');
     //                }

     //            },
     //            error:function () {
     //                console.log('error');
     //            }
     //        });
     //    }
    var menu = '';
        $('.mycarmakeMainNav').click(function(){
          // $('#navbarSupportedContent')toggle('');
          if(menu == '' || menu == false){
            $('#navbarSupportedContent').fadeIn('slow');
            menu = true;
           // console.log("if"+menu);
          }else{
            $('#navbarSupportedContent').fadeOut('slow');
            menu = false;
           // console.log("else"+menu);
          }
        });
        $('.toggleDropdown').hover(function(){
          $('.dropdownMenu').css('display','block');
        });


        $('.dropdownMenu').hover(function(){
          $('.dropdownMenu').css('display','block');
        }, function(){
          $('.dropdownMenu').css('display','none');
        });

        $( ".menu1" ).mouseleave(function() {
          $('.dropdownMenu').css('display','none');
        });

        $('.navbar').hover(function(){
          
        });

        $('.toggleDropdown').click(function() {
         // console.log("Test---"+toggleFlag);
          if(toggleFlag) {
            $('.dropdownMenu').css('display','block');
            toggleFlag=false;
            toggleClicked=true;
          }else {
            $('.dropdownMenu').css('display','none');
            toggleFlag=true;
          }

        });

          // $('body').on('click',function() {
          //   console.log("Body---"+toggleClicked);
          //   if(toggleClicked==true) {
          //     $('.dropdownMenu').css('display','none');
          //     toggleFlag=true;
          //   }
          // });


</script>
