@extends('layouts.default')
@section('content')
    	<div class="row align-content-center about-banner" style="background-image: linear-gradient(#2732A3, #121A7F);">
    		<div class=" col-lg-7 col-md-12 col-sm-12 pr-4 pt-4 pl-0">
    			<div class="about-heading">
    				<h1 class="" style="font-weight: bolder;color: #F5E72E;">What We Do...</h1>
    				<h1 class="" style="font-weight: bolder;color: #F5E72E;">Who We Are</h1>
    			</div>
    			<div class="my-3">
    				<p class="text-light" style="font-size: 16px;font-weight: bold; line-height: 2">
    					Car Trust Buddy is one of India’s leading chain of multi-brand car Service Center offering a huge spectrum of automobile services. We at Car Trust Buddy, understand the problems related with car servicing and came up with a convenient solution by building a network of well-equipped and trusted Service Center on a single platform. We’ve partnered with multiple Service Center all over India, ready to serve your car’s needs within a short time frame and at affordable pricing. Our Service Center accept multi-brand cars like Honda, Toyota, Maruti Suzuki, Hyundai, Mahindra, Tata Motors, Volkswagen, BMW, Audi, Mercedes, Ford & other car manufacturers.
    				</p>
    			</div>
    			<!-- <button class="btn orangeButton  pl-4 pr-4">Read More</button> -->
    		</div>
    			<div class="col-lg-5 col-md-12 col-sm-12 ImageBox pr-0">
    				<img src="{{ URL::to('/') }}/images/aaron-huber.png" alt="...">
    			</div>
    	</div>

    	<div class="row justify-content-center p-5 about-why" id="Garage-Form">
    		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 pb-4 titleText align-self-center">
    			<h2 style="font-weight: bolder;   margin-bottom: 35px;" class="garage-heading"> Why Join Us? </h2>
    			<p style="line-height: 2; font-weight: bold">Are you a Garage Owner? Partner with Car Trust Buddy today and become a part of one of the largest Car Servicing Network’s in India. Joining us will boost your business by helping you get more customers and earn greater revenue and profits. Send in your garage details today and we will get in touch with you.</p>
    			   <!-- <hr> -->
    			 <!--   <a href="#" class="learn-more-text" style="font-weight: bold">Learn more about us<span><i class="fas fa-arrow-right ml-3 arrow-color"></i></span></a> -->
    		</div>
    		<div class="col-lg-1 displaytab"></div>
    		
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 garage-form yellowBackground p-4" style="border-radius: 20px;">
                    <div class="bg-white p-4" style="border-radius: 20px;">

                    <h2 class="text-center garage-heading" style="font-weight: 1000; font-size: 24px;margin: 20px 0px"> FILL DETAILS </h2>
                    <form method="post" id="garage_form" action="javascript:void(0)">
                        @csrf
                        <div class="alert alert-success d-none" id="msg_div">
                            <span id="res_message"></span>
                        </div>

                        <div class="form-group px-4">
                            <input type="text" class="form-control" name="name" id="garagename" placeholder="Enter Garage Name" required>
                            <div class="d-none text-danger" id="NameError"></div>
                        </div>

					  <div class="form-group px-4">
					    <input type="mobile" class="form-control" pattern="[0-9]{10}" maxlength="10" name="mobile" id="garagemobile" placeholder="Phone Number" onkeyup="nospaces(this)" required>
                        <div class="d-none text-danger" id="MobileError"></div>
					  </div>

					  <div class="form-group px-4">
					    <input type="email" class="form-control" name="email" id="garageemail" placeholder="Email" required>
                        <div class="d-none text-danger" id="EmailError"></div>
					  </div>
                       <div class="form-group px-4">
                            <textarea class="form-control" name="address" id="garageAddress" placeholder="Enter Garage Address" required></textarea>
                            <div class="d-none text-danger" id="AddressError"></div>
                        </div>

					  <div class="form-group px-4 pb-4 mb-0">
					  
                      <button type="submit" id="garage_submit" class="btn btn-lg btn-block blueButton text-light m-auto" style="font-weight: bold; font-size: 14px; padding: 10px 0px; width:70%;">SUBMIT</button>
					</div>
					</form>
                </div>
            </div>
        </div>
<!-- 
        <div class="row about-membership mb-5 pb-3">
        	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center; align-items: center;">
        		<div class="row" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                    <div class="row justify-content-around">
                        @foreach($membershipPackages as $member)
                            <div class="col-lg-12 col-md-5 col-sm-12 col-xs-12 py-3 my-2 shadow-lg bg-white about-{{$member->membership_name}} membershipDiv" style="border-radius: 10px;">
                                <div>
                                     <h5 class="px-4" style="font-size: 30px; font-weight: bold;text-transform: uppercase;color: #F5E72E;">{{$member->package_name}}</h5>
                                     <p class="mx-4" style="font-size:20px;font-weight: bold;">{{$member->package_description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        	</div>
        	<div class="col-lg-6 col-md-11 col-sm-12 col-xs-12 about-video pr-0">
        		<div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px;">
				  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
				</div>
        	</div>
        </div> -->
        <div class="membership-package-block mb-5">
    <div class="row package-block">
        <div class="col-lg-6 d-none">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-around">
                        @foreach($membershipPackages as $key => $package)
                            <div class="col-lg-12 col-md-5 my-1 px-3 py-3 membership-package-one membershipPackage" id="{{$package->id}}" data-toggle="modal" data-target="#membershipModal" style="border-radius: 8px">
                                <div>
                                    <h4 class="" style=" font-weight: bold; align-self: center; padding: 5px 10px 0px 10px; text-transform: uppercase; font-size: 16px;color:#F5E72E">{{ $package->package_name}}</h4>
                                    <p class="font-weight-bold" style="font-size: 12px; color:#fff">{{$package->package_description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-6">
            <div class="embed-responsive embed-responsive-4by3" style="border-radius: 10px; border:2px solid #F5E72E">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
        </div>
        
    </div>

</div>



        <div class="row justify-content-center p-5 why-choose-us" style="background-image: linear-gradient(#2732A3, #121A7F);align-items: center;">
    		<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
    			<h2 class="" style="font-weight: bolder; font-size:44px;color: #F5E72E;"> Why Choose Us? </h2>
    			<p class="text-light" style="line-height: 2">Car Trust Buddy’s ultimate aim is to ensure every car owner gets hassle free car servicing experience at affordable price sitting at home. Our team of experts strives together every day to fulfill needs of our customers by providing a wide range of automobile servicing packages that are designed to offer you great savings.</p>
    			  <!--  <hr class="text-light" style="border-top: 1px solid rgb(255 255 255 / 53%);">
    			   <a href="#" class="text-warning" style="font-weight: bold">Learn more<span><i class="fas fa-arrow-right text-light ml-2"></i></span></a> -->
    		</div>
    		<div class="col-lg-1 displaytab"></div>
    			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
	                <div class="row w-100">
				        
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs my-4">
				            <div id="carouselExampleIndicators1" class="carousel slide w-100 pb-5 pt-3 carousel-fade" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>
                                <li data-target="#carouselExampleIndicators1" data-slide-to="4"></li>
                              </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                                    <div class="d-flex mt-1 mb-4">
                                        <img src="{{ URL::to('/') }}/images/usp1.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">One stop solution for your vehicle</h6>
                                        </div>
                                    </div>
                                    

                                    <div class="d-flex mt-1">
                                        <img src="{{ URL::to('/') }}/images/usp2.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Affordable and Reliable service & repair</h6>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                                    <div class="d-flex mt-1 mb-4">
                                        <img src="{{ URL::to('/') }}/images/usp8.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Assurance and warranty</h6>
                                        </div>
                                    </div>
                                    

                                    <div class="d-flex mt-1">
                                        <img src="{{ URL::to('/') }}/images/usp4.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Genuine OEM/OES spare parts</h6>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                                    <div class="d-flex mt-1 mb-4">
                                        <img src="{{ URL::to('/') }}/images/usp5.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Support in insurance claim process</h6>
                                        </div>
                                    </div>
                                    

                                    <div class="d-flex mt-1">
                                        <img src="{{ URL::to('/') }}/images/usp6.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Personalise tips for your vehicle maintenance</h6>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                                    <div class="d-flex mt-1 mb-4">
                                        <img src="{{ URL::to('/') }}/images/usp7.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">History of vehicle parts repair and replacement</h6>
                                        </div>
                                    </div>
                                    

                                    <div class="d-flex mt-1">
                                        <img src="{{ URL::to('/') }}/images/usp3.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Wide spread network of garages</h6>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 h-100 info-tabs" style="display: flex;justify-content: center; flex-direction: column;">
                                    <div class="d-flex mt-1 mb-4">
                                        <img src="{{ URL::to('/') }}/images/usp5.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Doorstep Check-up, estimate and minor repair</h6>
                                        </div>
                                    </div>
                                    

                                    <div class="d-flex mt-1">
                                        <img src="{{ URL::to('/') }}/images/usp9.png" style="max-width:40px; height: 40px;" alt="...">
                                        <div class="inner-info-tabs ml-2">
                                            <h6 class="" style="font-weight: bolder; font-size: 18px;color: #F5E72E;">Free pick up and drop facility</h6>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                          </div>
                           <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a> -->
                          <!-- <a class="carousel-control-next uspNextSlideBtn" href="#carouselExampleIndicators1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a> -->
                        </div>
				        </div>
				    </div>
    			</div>
        </div>

         <!-- how it works block start  -->

       <div class="how-it-works w-100 pt-5">
        <h2 class="heading-text text-center">How It Works</h2>
        <div class= "row w-100 d-flex justify-content-center">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
                <img src="{{ URL::to('/') }}/images/Group1026.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
                <div>
                    <p class="font-weight-bold" style="font-size: 18px;">ENTER YOUR  CAR  DETAILS</p>
                    <p style="font-size: 14px; font-weight: 600;">Select the Make, Model and Fuel Type of your car. This helps us serve you better by displaying all the services curated specially for your car.</p>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 text-center p-0 align-self-center" style="margin-top: -30px">
                <img src="{{ URL::to('/') }}/images/linking.png" class="linking-lines" style="max-width:100px;margin:0px auto;" alt="...">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
                <img src="{{ URL::to('/') }}/images/Group1027.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
                <div>
                    <p class="font-weight-bold" style="font-size: 18px;">SELECT THE PERFECT CAR SERVICE’S</p>
                    <p style="font-size: 14px ;font-weight: 600;">Select one or more services from Car Trust Buddy’s broad selection of services available. You can also select other services from our special seasonal services and offers.  </p>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12  text-center p-0 align-self-center" style="margin-top: -30px">
                <img src="{{ URL::to('/') }}/images/linking2.png" class="linking-lines" style="max-width:100px;margin:0px auto;" alt="...">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
                <img src="{{ URL::to('/') }}/images/Group1028.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
                <div>
                    <p class="font-weight-bold" style="font-size: 18px;">GET QUOTE / MAKE PAYMENT</p>
                    <p style="font-size: 14px; font-weight: 600;">Tell us what your  car needs and we will perform diagnostics and provide you with a fair & transparent price quote. </p>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12  text-center p-0 align-self-center" style="margin-top: -30px">
                <img src="{{ URL::to('/') }}/images/linking.png" class="linking-lines" style="max-width:100px;margin:0px auto;" alt="...">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center p-4">
                <img src="{{ URL::to('/') }}/images/Group1029.png" style="max-width:100px;margin:0px auto;" class="mb-4" alt="...">
                <div>
                    <p class="font-weight-bold" style="font-size: 18px;">GET YOUR CAR FIXED</p>
                    <p style="font-size: 14px; font-weight: 600;">No more trips to garages, just tell us when and where to come and we get the garage to you doorstep. </p>
                </div>
            </div>
        </div>

    </div> 

    <!-- how it works block end  -->


<div class= "row w-100 testimonial-block pt-5">
    <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 row" style="background-image: url({{ URL::to('/') }}/images/google-hangouts-logo.png); background-repeat: no-repeat; background-size: 120px; background-position: right top; align-items: center;margin: 20px 0px 0px 0px;">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <h1 style="font-weight: 1000; color:#182d54;">CLIENT TESTIMONIAL</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 pl-5 testimonials">
        <div class="variable slider testimonial-slider">
            @foreach($testimonials as $key=>$testimonial)
                <div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
                            <div class="card shadow-lg px-4 pt-5" style="width: 300px; min-height: 230px;border:0px; margin:10px 0px 10px 10px;">
                                <div class="card-image" style="display: flex;">
                                    <img src="{{ URL::to('/') }}/images/{{$testimonial->client_photo}}" style="max-width:30px;height: 30px;" alt="...">
                                    <h5  style="font-size: 14px;font-weight: 600;margin-left:10px;">{{$testimonial->client_name}} <br><span class="pt-2">{{$testimonial->client_location}}</span></h5>
                                
                                </div>
                                <div>
                                    <p style="font-size: 14px;" class="pt-3">{{$testimonial->client_testimonial}}</p>
                                    <div style="position: absolute;bottom: 15px; padding-bottom: 1rem;">
                                         @for($i=0;$i<$rating[$key][0];$i++)
                                            <span class="fa fa-star checked" style="color: #F5E72E;"></span>
                                        @endfor
                                         @for($i=0;$i<$unrating[$key][0];$i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="contact-us w-100 pt-5" style="height: 375px;">
        <div class="row w-100 contact-us-inner h-100 " style="border-radius: 1.25rem">
            <div class="col-lg-4 col-md-7 col-sm-12 col-xs-12 text-center">
                <h1 class= "text-white"style="font-size: 35px; font-weight: bolder">CONTACT US TODAY</h1>
                <p class="" style="font-size: 26px;font-weight: bolder;color: #F5E72E;">CALL US AT +91 000 000 0000</p>
            </div>
            <div class="col-lg-5 col-md-1 col-sm-12 col-xs-12"></div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pr-md-5 pl-md-0">
                <a href="/contact"><button class="btn blueButton my-4 my-sm-2 w-100 text-light" style="padding: 0.7rem; font-size:14px;">Mail Us</button></a>
                <!-- <button class="btn orangeButton my-4 my-sm-2 w-100" style="padding:0.7rem; font-size:14px;">Get A Quote</button> -->
            </div>
            
        </div>
    </div>

<div class="row contactMap" id="contactMap">
	<div class="col-lg-6 col-md-6" style="margin:auto 0;">
		<div class="row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0 locations">
                <h5  class="contact-title garage-heading font-weight-bold pb-4" style="color:#F5E72E;font-size: 30px;">OUR SERVICE LOCATIONS</h5>
                    @foreach($cities as $city)
                        <div class="mt-4">
                        <h5 class="location-title">{{$city->city_name}}</h5>
                        </div>
                        <hr class="location-line">
                    @endforeach
            </div>
        
        </div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px;height: 400px;">
		    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15063.404138240336!2d74.72302877165009!3d19.288843244720006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdcbd84f867eac7%3A0xb1060cbe2cd29c5e!2sVambori%2C%20Maharashtra%20413704!5e0!3m2!1sen!2sin!4v1604063316675!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1eP71FNgW5uh0PsvPYonLx8gMFL9NJLfJ" width="640" height="480"></iframe>
		</div>
	</div>
</div>
<!--  Membership Modal -->


   <div class="modal fade" id="membershipModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header backgroundBlue noBorderRadius">
                <h3 class="modal-title text-white membershipPackTitle" id="membershipPackTitle">Membership Package Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-light" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="javascript:void(0)" id="membershipPackForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="column pr-5 pl-5 pt-2" style="display: flex; flex-direction: row; align-items: center;">
                        <div class="form-group w-100 pr-2">
                            <!-- <label>Select Make:*</label> -->
                            <div class="">
                                <!-- <select class="js-example-basic-single form-control-lg form-control" name="brands" id="brandSelect">
                                    <option value="">Make</option>
                                    @foreach($brandData as $make)
                                        <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                    @endforeach
                                </select> -->
                                 <select class="js-example-basic-single form-control form-control-lg" name="brands" id="MemBrandSelect">
                                  @if(session()->has('brandName'))
                                    <option selected class="brandCont" id="make-{{session()->get('brandId')}}" value="{{session()->get('brandId')}}">{{session()->get('brandName')}}</option>

                                    @foreach($brandData as $make)
                                      @if($make->id != session()->get('brandId'))
                                        <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                      @endif
                                    @endforeach
                                  @else
                                    <option selected hidden>Select Make</option>
                                    @foreach($brandData as $make)
                                      <option class="brandCont" id="make-{{$make->id}}" value="{{$make->id}}">{{$make->make_name}}</option>
                                    @endforeach
                                  @endisset
                                </select>
                                <div class="d-none" style="color:red;" id="brandError"></div>
                            </div>
                        </div>

                        <div class="form-group w-100 pr-2">
                            <!-- <label>Select Model:*</label> -->
                            <div class="">
                                <select class="js-example-basic-first form-control form-control-lg modelSelect" id="MemModelSelect">
                                  @if(session()->has('modelName'))
                                    <option selected id="make-{{session()->get('modelId')}}" value="{{session()->get('modelId')}}">{{session()->get('modelName')}}</option>
                                  @else
                                    <option id="" value="" selected hidden>Select Model</option>
                                  @endif
                                </select>
                                <!-- <select name="models" class="js-example-basic-first form-control form-control-lg modelSelect" id="modelSelect">
                                    <option value="">Model</option> 
                                </select> -->
                                <div class="d-none" style="color:red;" id="modelError"></div>
                            </div>
                        </div>
                        <div class="form-group w-100 pr-2">
                            <!-- <label>Select Fule Type:*</label> -->
                            <div class="">
                                <!-- <select name="fuels" class="js-example-basic-first form-control form-control-lg fuelSelect" id="fuelSelect">
                                    <option value="">Fuel</option> 
                                </select> -->
                                <select class="js-example-basic-second form-control form-control-lg fuelSelect" id="MemFuelSelect">
                                  @if(session()->has('fuelType'))
                                    <option id="fuel-{{session()->get('fuelId')}}" value="{{session()->get('fuelId')}}">{{session()->get('fuelType')}}</option> 
                                  @else
                                    <option selected hidden>Select Fuel</option>
                                  @endif

                                    <!-- @isset($fuelId)
                                    <option id="fuel-{{$fuelId}}" value="{{$fuelId}}">{{$fuel}}</option> 
                                    @endisset
                                    <option>Fuel</option>  -->
                                </select>
                                <div class="d-none" style="color:red;" id="fuelError"></div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="true" >
                        <input type="hidden" name="mobile1" id="mobile1" value="{{Auth::user()->mobile}}">
                    @else
                        <input type="hidden" name="isUserEstimate" id="isUserEstimate" value="false" >
                    @endif
                    <div class="packageInfo">
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  

   <div class="modal fade" id="accLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #182d54;">
        <h5 class="modal-title text-light" id="exampleModalLongTitle">Mobile Verification</h5>
          <button type="button" class="close closePack" data-dismiss="modal" aria-label="Close">
            <span class="text-light" aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="membeshipLoginForm" class="" enctype="multipart/form-data" style="padding: 2em;">
          @csrf
          <h4 class="text-center">LOG IN</h4>
          <hr class="orange-line">
          <h5>Enter your Mobile Number</h5>
          <div class="form-group mb-4 mt-3">
            <input id="mobile1" type="tel" class="form-control" maxlength="10" pattern="[0-9]{10}" name="mobile1" required autofocus placeholder="Mobile Number">
          </div>
          <div class="hideData"></div>
          <div class="form-group mb-4 otp-block">
              <input id="otpVal" type="number" name="otp"class="form-control" value="" placeholder="Enter OTP">
          </div> 
          
          <div class="pb-3 resendOtpDiv d-none" style="text-align: end;">
            <a class="text-warning resendOtpText" onclick="reSendOtp6()" style="font-weight:bolder;"> Resend OTP </a>
            <a class="text-warning resendOtpTextTimer" style="font-weight:bolder;"> in <span id="time6">01:00</span> </a>
          </div>

          <div class="form-group mb-3 login-btn" >
            <button type="button" id="membershipPackageCheck" class="btn btn-secondary btn-block">LOG IN</button>
          </div>
          <div class="form-group mb-3 otp-btn">
              <button type="button" onclick="sendLeadOtpAbout()" class="btn btn-secondary btn-block">SEND OTP</button>
            </div>

        </form>
    </div>
  </div>
</div>

@stop
<script>

    function sendLeadOtpAbout() {
    // console.log("Checii---"+$('#mobile1').val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax( {
        url:'leadOtp',
        type:'post',
        data: {'mobileNumber': $('#mobile1').val()},
        // alert(data);
        success:function(data,status,xhr) {
          if(xhr.status==200) {
          localStorage.setItem("otp", xhr.responseText);
              $('.otp-block').show();
              $('.login-btn').show();
              $('.otp-btn').hide();
              $('.resendOtpDiv').removeClass('d-none');
              $('.resendOtpText').css('cursor','not-allowed');
              $('.resendOtpText').css('pointer-events','none');
              // var fiveMinutes = 60 * 1,
              var display2 = document.querySelector('#time6');
              var timer2 = new CountDownTimer(30);
              timer2.onTick(format(display2)).start();

              function format(display) {
                return function (minutes, seconds) {
                  minutes = minutes < 10 ? "0" + minutes : minutes;
                  seconds = seconds < 10 ? "0" + seconds : seconds;
                  display.textContent = minutes + ':' + seconds;
                  // console.log("Check---"+seconds);
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
            // console.log('error');
        }
    });
  }

   var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";

  // Function to lazy load a script
  // -----------------------------------------------
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

   function checkOtpAbout() {
    // window.location()
    // console.log("Chicking OTP");
    $mobileNumber = $('#mobilenum1').val();
    var enteredOtp = $('#otpVal').val();
    // console.log("Chicking Ent OTP0---"+ enteredOtp );

  $storedOTP = localStorage.getItem('otp');
    // console.log("Chicking Stored OTP0---"+ $storedOTP );

  if($storedOTP == enteredOtp) {
    $('#accLogin').modal('hide');
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
     var base_url = window.location.origin;
      $serviceType = $( "#serviceType" ).val();
      $.ajax({
        url: "/BatteryTyreService/getBatteryParts",
        method: 'POST',
        data:{'brandId':$makeId, 'modelId':$modelId, 'fuelId':$fuelId, 'serviceType':$serviceType, 'batteryOrTyre':$batteryORTyre,'mobile':$mobileNumber},
        success: function(data,status,xhr){
          // console.log("XHRData---"+JSON.stringify(data.serviceParts));
          $('#batteryTyreDiv').html('');
          var partSelectOptions='';
          if(data !== []) {
            partSelectOptions+='<div class="col-lg-12">';
            if(data.serviceParts.length >=1) {
              data.serviceParts.map((partData,idx)=>{

                partSelectOptions+='<div class="col-lg-12 mb-3 pt-3" style="display:flex; flex-direction:row;">';

                partSelectOptions+='<div class="col-lg-4">';
                partSelectOptions+='<div class=""><img src="'+base_url+'/images/carParts/'+partData.part_image+'" style="width:100px;height: 100px" /></div>';
                partSelectOptions+='</div>';

                partSelectOptions+='<div class="col-lg-5">';
                partSelectOptions+='<div class"col-lg-12"><h4 class="pt-2">'+partData.part_name+'<h4></div>';
                partSelectOptions+='<div class"col-lg-12"><h5 class="">₹'+partData.price+'<h5></div>';
                // partSelectOptions+='<div class"col-lg-12"><button class="btn text-light blueButton mr-1 addAccPart" id="part-'+partData.id+'" onclick="addAccidentalPart('+partData.id+')">ADD</button><button class="btn text-light blueButton mr-1 d-none removeAccPart" id="remPart-'+partData.id+'" onclick="removePartFromCart('+partData.id+')">REMOVE</button></div>';
                // partSelectOptions+='<div class"col-lg-12"><button class="btn text-light blueButton mr-1 addAccPart" id="part-'+partData.id+'" onclick="addAccidentalPart('+partData.id+')">ADD</button><button class="btn text-light blueButton mr-1 d-none removeAccPart" id="remPart-'+partData.id+'" onclick="removePartFromCart('+partData.id+')">REMOVE</button></div>';
                partSelectOptions+='</div>';


                partSelectOptions+='<div class="col-lg-3" style="display: flex;align-items: center;">';

                    var count =0;
                if(data.existingParts.length > 1) {
                  // data.existingParts.map((existingPart,key)=>{
                  for (var i = 0; i < data.existingParts.length; i++) {
                    if(data.existingParts[i].partId == partData.id) {
                      partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="'+data.existingParts[i].qty+'" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';
                      count = 1;
                    }
                  }

                  if(count != 1) {
                    partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="0" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';
                  }
                } else {
                  partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="0" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';
                }
                // partSelectOptions+='<div style="display:flex; flex-direction:row;"><button class="btn decQty" id="decQty-'+partData.id+'" onclick="decrementPartQty('+partData.id+')" >-</button><input type="number" class="partQty text-center" readonly id="partQty-'+partData.id+'" value="0" min="0" style="width:30%;" /><button class="incQty btn" onclick="incrementPartQty('+partData.id+')" id="incQty-'+partData.id+'">+</button></div>';

                partSelectOptions+='</div>';
                partSelectOptions+='</div>';

                partSelectOptions+='<hr />';

              });

            } else {
              // console.log("No products---");
              partSelectOptions+='<div class="p-3"><h4>No products available for the selected Make, Model & Fuel</h4></div>';
              $('#batteryCheckoutBtn').addClass('d-none');
            }

            partSelectOptions+='</div>';
          }

          $('#batteryTyreDiv').append(partSelectOptions);
        }
      });
 $('#batteryTyreModal').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true
      });
  }
  else {
    alert("Invalid OTP");
  }
    
  }
  
</script>