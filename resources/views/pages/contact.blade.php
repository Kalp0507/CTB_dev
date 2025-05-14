@extends('layouts.default')
@section('content')
<section class="border ContactPageSection" style="">
  <div class="card p-4" style="background-color: #F5E72E; border-radius: 20px;">
      <form id="contact-form" method="POST" action="javascript:void(0)" class="text-center p-4 bg-white" enctype="multipart/form-data" style=" border-radius: 20px;">
        @csrf
        <!-- @if(session()->has('message'))
          @if(session()->get('message') == 'Please enter a valid message.')
            <div class="alert alert-danger col-md-12">
                  {{ session()->get('message') }}                
            </div>
          @elseif(session()->get('message') == 'Please enter a valid name.')
            <div class="alert alert-danger col-md-12">
                  {{ session()->get('message') }}                
            </div>
          @else
            <div class="alert alert-success col-md-12">
                  {{ session()->get('message') }}                
            </div>
          @endif  
        @endif -->
        <h2 class="text-light mt-2 mb-5 garage-heading" style="font-weight: bold;">CONTACT US</h2>

        <!-- Name input -->
        <div class="row mb-3">
           @if ($message = Session::get('success'))
          
            @endif
            <div class="m-auto">
               <div class="alert alert-success d-none" id="msg_div">
                  <span id="res_message"></span>
                </div>
              
            </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
            <div class="row mb-3">
              <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 pl-md-0">
                <div class="form-outline mb-4">
                  @if(Auth::check())
                      @if (!Auth::user()->username)
                        <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="NAME">
                      @else
                        <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="NAME" value="{{Auth::user()->username}}">
                      @endif
                  @else
                        <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="NAME">

                  @endif
                  <!-- <label class="form-label" for="name" style="margin-left: 0px;">Name</label> -->
                <div class="d-none text-danger text-left" id="requestNameError"></div>
                  <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 42.4px;"></div>
                    <div class="form-notch-trailing"></div>
                  </div>
                </div>
                
              </div>
              <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 pr-md-0">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  @if(Auth::check())
                    @if (!Auth::user()->mobile)
                      <input type="tel" pattern="[0-9]{10}" maxlength="10" id="number" name="number" class="form-control form-control-lg" placeholder="MOBILE NUMBER" required onkeyup="nospaces(this)">
                    @else
                      <input type="tel" pattern="[0-9]{10}" maxlength="10" id="number" name="number" class="form-control form-control-lg" placeholder="MOBILE NUMBER" value="{{Auth::user()->mobile}}" required onkeyup="nospaces(this)">
                    @endif
                  @else
                    <input type="tel" pattern="[0-9]{10}" maxlength="10" id="number" name="number" class="form-control form-control-lg" placeholder="MOBILE NUMBER" required onkeyup="nospaces(this)">
                  @endif
                  <!-- <label class="form-label" for="email" style="margin-left: 0px;">Number</label> -->
                <div class="d-none text-danger text-left" id="requestMobileError"></div>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 88.8px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
                
              </div>
              
            </div>
            
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-md-0">
        <!-- Message input -->
            <div class="form-outline mb-4">
              <textarea class="form-control form-control-lg" id="message" name="message" rows="4" placeholder="MESSAGE" style="border: 1px solid #121A7F"></textarea>
              <!-- <label class="form-label" for="message" style="margin-left: 0px;">Message</label> -->
              <div class="d-none text-danger text-left" id="requestMessageError"></div>
              <div class="form-notch">
                <div class="form-notch-leading" style="width: 9px;"></div>
                <div class="form-notch-middle" style="width: 60px;"></div>
                <div class="form-notch-trailing"></div>
              </div>
            </div>
          
          </div>
        </div>
       <!-- Submit button -->
        <button class="btn btn-block blueButton mb-4 text-light contactSubmit m-auto" style="padding: 10px 0px; font-size: 14px; width: 30%;" type="submit">Send</button>
      </form>
    
  </div>
    </section>
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