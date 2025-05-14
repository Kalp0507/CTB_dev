<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Car Trust Buddy - Online Car Repair Service</title>
 <title> <!-- My Car Mech - @yield('title') --></title>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400&display=swap" rel="stylesheet">

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script src="{{ asset('js/script.js') }}"></script>

<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<script type="text/javascript">
            $(window).on("load", function(){
                $(".loader-wrapper").fadeOut('slow');
            });
           

            // function preloader() {
            //   var preloader = document.getElementById("preloader");
            //   preloader.style.opacity = "0";
            //   preloader.setAttribute("aria-busy", "false");
            //   document.getElementById("site").style.opacity = "1";
            // }
            // window.onload = preloader;


     var bodyData = '';
     var modelBody = '';
     var fuelBody = '';
     var Brand_id = '';
     var BrandName = '';
     var ModelName = '';
     var FuelType = '';
    $(document).ready(function(){   

         // $('.inner-info-tabs h6').effect("bounce", {
         //            times: 5,
         //            distance: 100
         //        }, 5000);

        // $('#carouselExampleIndicators1').bind('slide.bs.carousel', function (e) {
        //     console.log('slide event!');
        //     $(".info-tabs").hide().fadeIn(2000);
        // });

        $brandId = $('#brandSelect').val();
        var Brand_id = $('#brandSelect').val();
        $modelId = $('#modelSelect').val();
        var Model_id = $('#modelSelect').val();
        $fuelId = $('#fuelSelect').val();
        var Fuel_id = $('#fuelSelect').val();
            // console.log("Checking-----"+$('#mobile1').val());

        if($brandId != null && $modelId != null && $fuelId != null && $modelId != "") {

                    // console.log("Success----------------------------------------------------"+$modelId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/PServices/searchPackages',
                type:'post',
                data:{'Brand_id':$brandId,"Model_id":$modelId,"Fuel_id":$fuelId},
                success:function(data){
                    if(data.responseCode == 400) {

                        $("#packData").empty();
                        returnPacks = "";
                        returnPacks+='<div class="col-lg-6 my-2"><h6>No packages found!!!</h6></div>';
                        $("#packData").append(returnPacks);

                    } else{

                        $.ajax({
                            url:'getCartPackages',
                            type:'get',
                            data:{'model_id': Model_id},
                            success:function(data){
                                   // console.log("Data----"+JSON.stringify(data));
                                uniqueIdsArr = [... new Set(data.cartIdArr)]
                                uniqueIdsArr1 = [... new Set(data.checkData)]
                                $.each(uniqueIdsArr,function(idx,val){
                                   $('#pack-'+val).html("Added");
                                   $('#pack-'+val).prop('disabled', true);
                                   $('#remPack-'+val).css("display", "block");

                                    // console.log($('#pack-'+val).removeClass("bookPackageModel"));
                                    // console.log('++++++++++++++'+uniqueIdsArr1);

                                });
                                // console.log(uniqueIdsArr1);
                                if (uniqueIdsArr1.length != 0) {
                                $.each(uniqueIdsArr,function(idx,val){
                                    $('#pack-'+val).removeClass("bookPackageModel");
                                    $('.bookPackageModel').prop('disabled', true);

                                });

                                }
                                // $.each(data.checkData,function(keys,values){
                                //     alert(values);
                                // });
                             }
                        });

                        $("#packData").html("");
                        returnPacks = '';
                        returnServs = '';
                        $("#packData").append(returnPacks);
                        // console.log("data.categories"+data.categories);

                        $.each(data.categories,function(row,data1){
                            // console.log('brandSelect----'+JSON.stringify(data1.package_name.toUpperCase()));
                            var abc = JSON.stringify(data1);
                            var dataPackString = abc.replace('"', '"');
                            var packageName = data1.package_name.toUpperCase();
                           
                            returnPacks+='<div class="col-lg-4 my-2 tooltipContent headClass2"><div class=" blueButton py-4 px-3" id="tooltipContent" style="border:1px solid #F5E72E"><div class="row py-2"><div class="col-lg-7 col-6 p-0">';
                            returnPacks+='<h6 style="font-size: 1rem;font-weight: 1000;color:#fff;">'+packageName+'</h6>';
                            returnPacks+='</div>';


                            if(data1.discounted_price>0) {
                                returnPacks+='<div class="col-lg-5 col-6 text-right wordBreak"><h5 style="color:#fff; font-weight: 1000;"><span class="discontedPrice" style="text-decoration-line: line-through; margin-left: 10px;margin-right: 5px; font-size: 1rem;" >₹'+data1.total_price+'</span><span style="font-size: 1rem;">₹'+data1.discounted_price+'</span></h5></div>';
                            } else {
                                returnPacks+='<div class="col-lg-5 col-6 text-right wordBreak"><h5 style="color:#fff;"><span style="font-weight: 1000;margin-left: 10px;margin-right: 5px; font-size: 1rem;">₹'+data1.total_price+'</span></h5></div>';
                            }
                            returnPacks+='</div>';

                            var packageDescription = "";
                            if(data1.package_description !== null) {
                              packageDescription = data1.package_description.toUpperCase();
                            } else {
                              packageDescription = data1.package_description;
                            }

                            returnPacks+='<h6 style="font-size: 0.8rem;" class="text-white">'+packageDescription+'</h6>';
                            // returnPacks+='<ul class="pl-0" ><div class="row tooltip-data">';
                            // $.each(data1.has_services,function(ind,dat){
                            //     returnPacks+='<div class="col-lg-12"><span>';
                            //     returnPacks+='<li style="font-size: 0.8rem; color:#121A7F;">'+dat.service_name+'</li>';
                            //     returnPacks+='</span></div>';
                            // });
                            // returnPacks+='</div></ul>';
                            // console.log();
                            //       var extraServiceCount = 0;
                            //       var pacakgeName = JSON.stringify(data1.has_services.length);
                            //       if(data1.has_services.length>5) {
                            //         extraServiceCount = data1.has_services.length - 5;
                            //       }
                                  // console.log("Check services---"+pacakgeName);
                            //       if(ind<5) {
                            //         if(ind == 4 && extraServiceCount !== 0 ) {
                            //             returnPacks+='<div class="loadMore" style=""><a href="javascript:void(0)" class="loadMoreBtn" id="'+data1.package_name+'" style="font-size: 0.8rem;">+'+extraServiceCount+'more </a></div>';
                            //         }
                            //       }
                            //       if(ind >= 5) {
                            //         returnPacks+='<div class="col-lg-6 '+data1.package_name+'_hidden" style="display:none"><span>';
                            //         returnPacks+='<li style="font-size: 0.8rem;color:#121A7F;">'+dat.service_name+'</li>';
                            //         returnPacks+='</span></div>';
                            //         if(ind == data1.has_services.length-1) {
                            //             returnPacks+='<div class="hideLoadMore '+data1.package_name+'_hideBtn" style="display:none;"><a href="javascript:void(0)" class="hideLoadMoreBtn" id="'+data1.package_name+'" style="font-size: 0.7rem;"> Hide </a></div>';
                            //         }
                            //       }

                            // });

                            // // returnPacks+='<div id="loadMore" class="LoadMore" style=""><a href="" style="font-size: 0.7rem;">+9 more</a></div>';
                            returnPacks+='<div class="row py-2" style="align-items:flex-end;">';
                            if(data1.service_time != null){
                                    returnPacks+='<div class="col-lg-5 serviceTimeDiv"><h6 class="bg-white text-color px-3 py-1 m-0 text-center"> '+data1.service_time+' hours </h6></div>';
                                }else{
                                    returnPacks+='<div class="col-lg-5"><h6 class="px-3 py-1 m-0 text-center"></h6></div>';
                                }
                            // returnPacks+='<div class="col-lg-1"></div>';
                            returnPacks+='<div class="col-lg-3 col-12"><form class="form-inline my-2 my-lg-0 justify-content-end"><button class="btn my-4 my-sm-2 yellowBackground text-color packModel removePackageModel" id="remPack-'+data1.id+'" style="font-weight: bolder; display: none;" onclick = "removeModel('+data1.id+')" data-pack=\''+dataPackString+'\' type="button"> REMOVE </button></form></div>'; 
                            returnPacks+='<div class="col-lg-4 col-12"><form class="form-inline my-2 my-lg-0 justify-content-end"><button class="btn my-4 my-sm-2 yellowBackground text-color packModel bookPackageModel" id="pack-'+data1.id+'" style="font-weight: bolder" onclick = "checkoutPackage(this)" data-pack=\''+dataPackString+'\' type="button">Book Now</button></form></div>';
                                returnPacks+='</div></div>';
                            var noOfFeatures = data1.has_services.length;
                            console.log("No of features---"+noOfFeatures);
                            returnPacks+='<ul class="pl-0" ><div class="row tooltip-data">';
                            if(noOfFeatures > 0) {
                                $.each(data1.has_services,function(ind,dat){
                                    returnPacks+='<div class="col-lg-6"><span>';
                                    returnPacks+='<li style="font-size: 0.8rem; font-weight:bold; color:#121A7F;">'+dat.service_name+'</li>';
                                    returnPacks+='</span></div>';
                                });
                            }
                            returnPacks+='</div></ul> </div>';
                            

                        });
                        $("#packData").append(returnPacks);
                    }

                }
            });

            $.ajax({
                url:'/PServices/models',
                type:'post',
                data:{Brand_id},
                success:function(data){
                    // $(".modelSelect").html("");
                    // $("#modelSelect").select2("destroy").select2();
                    $("#modelSelect").empty();

                    // $("#modelSelection").select2("destroy").select2();
                    $("#modelSelection").empty();
                    // $("#MemModelSelect").select2("destroy").select2();
                    $("#MemModelSelect").empty();
                    
                    // console.log("Searchig Models........");
                    makeData = '';
                    $.each(data,function(index,row){
                        if(row.id == $modelId) {
                            $("#modelSelect").append("<option id=model-"+row.id+" value="+row.id+">"+row.model_name+"</option>");
                            // $("#modelSelect").select2({minimumResultsForSearch: Infinity});
                            $("#modelSelect").append('<option selcted hidden>Select Model</option>');
                            $("#modelSelection").append("<option id=model-"+row.id+" value="+row.id+">"+row.model_name+"</option>");
                            $("#modelSelection").append('<option selcted hidden>Select Model</option>');
                            // $("#modelSelection").select2({minimumResultsForSearch: Infinity});
                            $("#MemModelSelect").append("<option id=model-"+row.id+" value="+row.id+">"+row.model_name+"</option>");
                            $("#MemModelSelect").append('<option selcted hidden>Select Model</option>');
                            // $("#MemModelSelect").select2({minimumResultsForSearch: Infinity});
                        }
                    });

                    // $(".fuelSelect").html("");
                    // $("#fuelSelection").html("");
                    // fuelsData = '';
                    // $("#modelSelect").append('<option>Model</option>');
                    // $("#fuelSelect").append('<option>Fuel</option>');
                    // $("#fuelSelection").append('<option>Fuel</option>');
                    
                    $.each(data,function(index,row){
                        if(row.id != $modelId) {
                            makeData+="<option id=model-"+row.id+" value="+row.id+">"+row.model_name+"</option>";
                        }
                    });

                    $("#modelSelect").append(makeData);
                    $("#MemModelSelect").append(makeData);
                    $("#modelSelection").append(makeData);
                }
            });

            $.ajax({
                url:'/PServices/fuels',
                type:'post',
                data:{Model_id},
                success:function(data) {
                    fuelsData = '';
                    $(".fuelSelect").html("");
                    $("#MemFuelSelect").html("");

                    $.each(data,function(key,value){

                        if(value[0] == $fuelId) {


                            $("#fuelSelect").append("<option id='fuel"+key+"' class='fuelsClass' value="+value[0]+">"+value[1]+"</option>");
                            $("#fuelSelect").append('<option selcted hidden>Select Fuel</option>');
                            $("#MemFuelSelect").append("<option id='fuel"+key+"' class='fuelsClass' value="+value[0]+">"+value[1]+"</option>");
                            $("#MemFuelSelect").append('<option selcted hidden>Select Fuel</option>');

                        }
                        if(value[0] == $fuelId) {
                            // console.log("Fuelselectios-------");
                            $("#fuelSelection").append("<option id='fuel"+key+"' class='fuelsClass' value="+value[0]+">"+value[1]+"</option>");

                        }
                    });

                            $("#fuelSelect").append('<option selcted hidden>Select Fuel</option>');
                    $.each(data,function(key1,value1){
                        if(value1[0] !== JSON.parse($fuelId)) {
                            fuelsData+="<option id='fuel"+key1+"' class='fuelsClass' value="+value1[0]+">"+value1[1]+"</option>";
                        }
                    });

                    $("#fuelSelect").append(fuelsData);
                    $("#MemFuelSelect").append(fuelsData);
                    $("#fuelSelection").append(fuelsData);
                }
            });


            // $("body").delegate("#modelSelect", "change", function(event){
            // // $("#modelSelect").change(function(event){
            //     $("#modelSelect").select2();
            //    $("#fuelSelect").innerHTML = '';
            //    Model_id = $(this).val();
               // console.log("Model_id----"+Model_id);
            //    $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         url:'/PServices/fuels',
            //         type:'post',
            //         data:{Model_id},
            //         success:function(data) {
            //             // $(".fuelSelect").html("");
            //             $(".fuelSelect").select2("destroy").select2();
            //             $(".fuelSelect").empty();

            //             fuelsData = '';
            //             // $("#fuelSelect").append('<option id="" class="" value="">Models</option>');
            //             $.each(data,function(key,value){
            //                 if(value.id == $fuelId) {
            //                     $("#fuelSelect").append("<option id='fuel"+key+"' class='fuelsClass' value="+value[0]+">"+value[1]+"</option>");
                                // console.log("row----"+JSON.stringify(value));

            //                 }
            //             });

            //             $.each(data,function(key,value){
            //                 fuelsData+="<option id='fuel"+key+"' class='fuelsClass' value="+value[0]+">"+value[1]+"</option>";
            //             });
            //             $("#fuelSelect").append(fuelsData);
            //             $(".fuelSelect").select2();
                        
            //         }
            //     });
            // });

            // $("body").delegate("#fuelSelect", "change", function(event){
            //     $(".fuelSelect").select2();
            // });

            // Code for services modals.
            // $("body").delegate("#modelSelection", "change", function(event){
            //    $("#fuelSelection").innerHTML = '';
            //    Model_id = $(this).val();
               // console.log("Model_id----"+Model_id);
            //    $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         url:'/PServices/fuels',
            //         type:'post',
            //         data:{Model_id},
            //         success:function(data) {
            //             // $(".fuelSelection").html("");
            //             $("#fuelSelection").select2("destroy").select2();
            //             $("#fuelSelection").empty();

            //             fuelsData = '';

            //             $.each(data,function(key,value){
            //                 if(value.id == $fuelId) {
            //                     $("#fuelSelection").append("<option id='fuel"+key+"' class='fuelsClass' value="+value[0]+">"+value[1]+"</option>");
                                // console.log("row----"+JSON.stringify(value));

            //                 }
            //             });

            //             $.each(data,function(key,value){
            //                 fuelsData+="<option id='fuel"+key+"' class='fuelsClass' value="+value[0]+">"+value[1]+"</option>";
            //             });
            //             $("#fuelSelection").append(fuelsData);
            //             $("#fuelSelection").select2();
            //         }
            //     });
            // });

            //On Search btn click code
            // $('.searchPackage').click(function() {
            //      if(!$('#brandSelect').val() || $('#brandSelect').val() == 'Brand'){
            //           $('#requestMakeError').removeClass('d-none');
            //           $("#requestMakeError").html("Select Make");
            //           return false;
            //         }else{
            //           $('#requestMakeError').addClass('d-none');
            //         }
            //         if($('#modelSelect').val() == "Model" || $('#modelSelect').val() == "") {
            //           $('#requestModelError').removeClass('d-none');
            //           $('#requestModelError').text("Select Model.");
            //           return false;
            //         }else {
            //           $('#requestModelError').addClass('d-none');
            //         }

            //         if($('#fuelSelect').val() == "Fuel" || $('#fuelSelect').val() == "") {
            //           $('#requestFuelError').removeClass('d-none');
            //           $('#requestFuelError').text("Select fuel type.");
            //           return false;
            //         }else {
            //           $('#requestFuelError').addClass('d-none');
            //         }
            //         if(!$('#mobile1').val() || $('#mobile1').val() == "") {
            //           $('#requestMobError').removeClass('d-none');
            //           $('#requestMobError').text("Enter Mobile.");
            //           return false;
            //         }else {
            //           $('#requestMobError').addClass('d-none');
            //         }
            //     Brand_id = $('#brandSelect').val();
            //     Model_id = $('#modelSelect').val();
            //     Fuel_id = $('#fuelSelect').val();
            //     // emptyCart();
            //     $.ajax({
            //         url:'searchPackages',
            //         type:'post',
            //         data:{'Brand_id':Brand_id,"Model_id":Model_id,"Fuel_id":Fuel_id},
            //         success:function(data){
                        // console.log(data.categories);
            //             if(data.responseCode == 400) {
            //                 $("#packData").empty();
            //                 returnPacks = "";
            //                 returnPacks+='<div class="col-lg-4 my-2"><h6>No packages found!!!</h6></div>';
            //                 $("#packData").append(returnPacks);

            //             } else {
            //                 $("#packData").html("");
            //                 returnPacks = '';
            //                 returnServs = '';
            //                 $("#packData").append(returnPacks);

            //                 $.each(data.categories,function(row,data1){
            //                     var abc = JSON.stringify(data1);
            //                     var dataPackString = abc.replace('"', '"');

            //                     returnPacks+='<div class="col-lg-4 my-2"><div class="tooltipContent blueButton py-4 px-3" id="tooltipContent"><div class="row py-2"><div class="col-lg-9 p-0">';
            //                     returnPacks+='<h6 style="font-size: 1rem;font-weight: 1000;color:#fff;">'+data1.package_name.toUpperCase()+'</h6>';
            //                     returnPacks+='</div>';

            //                     if(data1.discounted_price>0) {
            //                         returnPacks+='<div class="col-lg-3 text-right"><h5 style="color:#fff;font-weight: 1000;"><span class="discontedPrice" style="text-decoration-line: line-through; margin-left: 10px;margin-right: 5px; font-size: 1rem;" >₹'+data1.total_price+'</span><span style="font-size: 1rem;">₹'+data1.discounted_price+'</span></h5></div>';
            //                     } else {
            //                         returnPacks+='<div class="col-lg-3 text-right"><h5 style="color:#fff;"><span style="font-weight: 1000;margin-left: 10px;margin-right: 5px; font-size: 1rem;">₹'+data1.total_price+'</h5></div>';
            //                     }

            //                     returnPacks+='</div>';

            //                     var packageDescription = "";
            //                     if(data1.package_description !== null) {
            //                       packageDescription = data1.package_description.toUpperCase();
            //                     } else {
            //                       packageDescription = data1.package_description;
            //                     }

            //                     returnPacks+='<h6 style="font-size: 0.8rem;" class="text-white">'+packageDescription+'</h6>';
            //                     // returnPacks+='<ul class="pl-0" ><div class="row">';

            //                     // var extraServiceCount = 0;
            //                     // var pacakgeName = JSON.stringify(data1.has_services.length);
            //                     // if(data1.has_services.length>5) {
            //                     //     extraServiceCount = data1.has_services.length - 5;
            //                     // }

            //                     // $.each(data1.has_services,function(ind,dat){
            //                     //       if(ind<5) {
            //                     //         returnPacks+='<div class="col-lg-6"><span>';
            //                     //         returnPacks+='<li style="font-size: 0.8rem; color:#121A7F;">'+dat.service_name+'</li>';
            //                     //         returnPacks+='</span></div>';
            //                     //         if(ind == 4 && extraServiceCount !== 0 ) {
            //                     //             returnPacks+='<div class="loadMore" style=""><a href="javascript:void(0)" class="loadMoreBtn" id="'+data1.package_name+'" style="font-size: 0.8rem;">+'+extraServiceCount+'more </a></div>';
            //                     //         }
            //                     //       }
            //                     //       if(ind >= 5) {
            //                     //         returnPacks+='<div class="col-lg-6 '+data1.package_name+'_hidden" style="display:none"><span>';
            //                     //         returnPacks+='<li style="font-size: 0.8rem;color:#121A7F;">'+dat.service_name+'</li>';
            //                     //         returnPacks+='</span></div>';
            //                     //         if(ind == data1.has_services.length-1) {
            //                     //             returnPacks+='<div class="hideLoadMore '+data1.package_name+'_hideBtn" style="display:none;"><a href="javascript:void(0)" class="hideLoadMoreBtn" id="'+data1.package_name+'" style="font-size: 0.7rem;"> Hide </a></div>';
            //                     //         }
            //                     //       }

            //                     // });

            //                     // returnPacks+='</div></ul>';
            //                     returnPacks+='<div class="row py-2 align-items-center">';
            //                     if(data1.service_time != null){
            //                         returnPacks+='<div class="col-lg-3"><h6 class="bg-white text-color px-3 py-1 m-0 text-center"> '+data1.service_time+' hours </h6></div>';
            //                     }else{
            //                         returnPacks+='<div class="col-lg-3"><h6 class="px-3 py-1 m-0 text-center"></h6></div>';
            //                     }
            //                     returnPacks+='<div class="col-lg-3"></div>';
            //                     returnPacks+='<div class="col-lg-3"><form class="form-inline my-2 my-lg-0 justify-content-end"><button class="btn my-4 my-sm-2 yellowBackground text-color packModel removePackageModel" id="remPack-'+data1.id+'" style="font-weight: bolder; display: none;" onclick = "removeModel('+data1.id+')" data-pack=\''+dataPackString+'\' type="button"> REMOVE </button></form></div>';
            //                     returnPacks+='<div class="col-lg-3"><form class="form-inline my-2 my-lg-0 justify-content-end"><button class="btn my-4 my-sm-2 yellowBackground text-color packModel bookPackageModel" id="pack-'+data1.id+'" style="font-weight: bolder" onclick = "checkoutPackage(this)" data-pack=\''+dataPackString+'\' type="button"> Book Now</button></form></div>';
            //                         returnPacks+='</div></div></div>';
                                
            //                     // $.each(data1.has_services,function(ind,dat){
            //                     //     returnPacks+='<div class="col-lg-6"><span>';
            //                     //     returnPacks+='<li style="font-size: 0.7rem;">'+dat.service_name+'</li>';
            //                     //     returnPacks+='</span></div>';
            //                     // });

            //                     // returnPacks+='<div id="loadMore" class="LoadMore" style=""><a href="" style="font-size: 0.7rem;">+9 more</a></div>';
            //                     // returnPacks+='</div></ul>';
            //                     // returnPacks+='<div class="row align-items-center">';
            //                     // returnPacks+='<div class="col-lg-3"><h6 class="bg-warning px-3 py-1 m-0 text-center"> '+data1.service_time+' hours </h6></div>';
            //                     // returnPacks+='<div class="col-lg-5"></div>';
            //                     // returnPacks+='<div class="col-lg-4"><form class="form-inline my-2 my-lg-0 justify-content-end"><button class="btn my-4 my-sm-2 blueButton text-light packModel" id="pack-'+data1.id+'" style="font-weight: bolder" onclick = "packModel(this)" data-pack=\''+dataPackString+'\' type="button"> Book Now</button></form></div>';
            //                     // returnPacks+='</div></div></div>';
            //                 });
            //                 $("#packData").append(returnPacks);

            //             }
            //         }
            //     });
            // });

            if($('#selectedService').val() == "Accidental Repair") {
                $makeName= $( "#brandSelect option:selected" ).text();
                $modelName= $( "#modelSelect option:selected" ).text();
                $fuelName= $( "#fuelSelect option:selected" ).text();

                $carMakeId= $( "#brandSelect option:selected" ).val();
                $carModelId= $( "#modelSelect option:selected" ).val();
                $carFuelId= $( "#fuelSelect option:selected" ).val();

                $modelId= $( "#modelSelect option:selected" ).val();
                $auth = $('#isUserEstimate').val();

                $('#hiddenBrand').val($makeName);
                $('#hiddenModel').val($modelName);
                $('#hiddenFuel').val($fuelName);

                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

              // console.log('Service is---'+$('#selectedService').val());
                
                  $.ajax({
                    url: "/partsToBeRepaired",
                    method: 'POST',
                    data:{'modelId':$modelId, 'carMakeId':$carMakeId, 'carModelId':$carModelId, 'carFuelId':$carFuelId},
                    success: function(data,status,xhr){
                      $partsData="";
                        $('#carTypeHidden').val(data.carType);
                      data.partPrices.map((val,index)=>{
                       $partsData+='<option value="'+val.id+'">'+val.part_name+'</option>';
                      });
                      $('#partsToRepair').html($partsData);

                    }
                });
            }

        }//If ends
        else {
            // console.log("Hello---Empty----");
            // $("#brandSelect").append("<option> Select Car Brand</option>");
            // $("#modelSelect").html("<option disabled selected> Model</option>");
            // $("#fuelSelect").html("<option disabled selected> Fuel</option>");
        }



        $("#packModelData").click(function(){
            // console.log('hello');
          });


        $(".car-dropdown").click(function(){
        // console.log($("#brandData").innerHTML);
            $("#brandData").html("");
            $(".car-form").css("display","none");
            $(".brand").css("display","block");
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'brands',
                type:'post',
                success:function(data) {
                    $("#brandData").innerHTML = '';
                    bodyData = '';
                    $("#brandData").append(bodyData);

                    $.each(data,function(index,row){
                        bodyData+='<div class="col-lg-4 col-md-4 col-sm-4 p-0 brandContainer" data-brandid="'+row.id+'" data-brandname="'+row.make_name+'">'
                        bodyData+='<img src="{{ URL::to('/') }}/images/brands/'+row.make_image+'" style="max-width:80px;" alt="..."><br /><span>'+row.make_name+'</span>';
                        bodyData+="</div>";
                    });
                
                    $("#brandData").append(bodyData);

                    $(".brandContainer").click( function(){
                        // $("#modelData").select2("destroy").select2();
                        $("#modelData").empty();
                        // $("#modelData").html("");
                        
                        $(".brand").css("display","none");
                        $(".models").css("display","block");
                        Brand_id = $(this).attr('data-brandid');
                        BrandName = $(this).attr('data-brandname');
                    
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url:'models',
                            type:'post',
                            data:{Brand_id},
                            success:function(data){
                                $("#modelData").innerHTML = '';
                                modelBody = '';
                                $("#modelData").append(modelBody);
                                $.each(data,function(index,row){
                                    modelBody+='<div class="col-lg-4 p-0 modelContainer" data-modelid="'+row.id+'" data-modelname="'+row.model_name+'">'
                                    modelBody+='<div class="row align-items-center" style="flex-direction:column;">'
                                    modelBody+='<img src="{{ URL::to('/') }}/images/models/'+row.model_image+'" style="max-width:80px;" alt="..."><span>'+row.model_name+'</span>';
                                    modelBody+='</div>'
                                    modelBody+="</div>";
                                });
                                $("#modelData").html(modelBody);
                                // $("#modelData").select2();


                                $(".modelContainer").click(function(){
                                    $("#fuelData").html("");
                                    $(".models").css("display","none");
                                    $(".fuel").css("display","block");
                                    Model_id = $(this).attr('data-modelid');
                                    ModelName = $(this).attr('data-modelname');

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url:'fuels',
                                        type:'post',
                                        data:{Model_id},
                                        success:function(data){
                                            $("#fuelData").innerHTML = '';
                                            fuelBody = '';
                                            $("#fuelData").append(fuelBody);
                                            $.each(data,function(index,row){
                                                // console.log(row[]);
                                                fuelBody+='<div class="col-lg-4 p-0 fuelContainer" data-fuelid="'+row[0]+'" data-fueltype="'+row[1]+'">'
                                                fuelBody+='<div class="row align-items-center" style="flex-direction:column;">'
                                                fuelBody+='<img src="{{ URL::to('/') }}/images/'+row[2]+'" style="max-width:80px;" alt="..."><span>'+row[1]+'</span>';
                                                fuelBody+="</div>";
                                                fuelBody+="</div>";
                                            });
                                            $("#fuelData").append(fuelBody);
                                            $(".fuelContainer").click(function(){   
                                                Fuel_id = $(this).attr('data-fuelid');   
                                                FuelType = $(this).attr('data-fueltype');
                                                // console.log(BrandName+', '+ModelName +', '+FuelType );
                                                $(".car-form").css("display","block");
                                                $(".fuel").css("display","none");
                                                $("#changeTextData").text( BrandName+','+ModelName +','+FuelType+',');
                                                $("#changeTextDataIds").val(Brand_id+','+Model_id +','+Fuel_id);
                                                $('#brand_id').val(Brand_id);
                                                $('#model_id').val(Model_id);
                                                $('#fuel_id').val(Fuel_id);

                                            });


                                        }

                                    });

                                });

                            }

                        });

                    });
                }
            });
        });
        
        function packModel(obj)
        {
           var servList = '';
           var id = obj.id;
           var button = document.getElementById(id);
           var dataPack = button.getAttribute('data-pack');
           var abc = JSON.parse(dataPack);
              // var xyz = abc.split("&").join(" ").toLowerCase();
              // console.log(abc);
              jQuery.noConflict();
            // $('#prizePopup').modal('toggle');
            $("#packModel").modal('toggle');
            // console.log(abc.package_name);
            $('#pack_id').html(abc.id);
            $('#modalPackName').html(abc.package_name);
            $('#discountedPrice').html(abc.discounted_price);
            $('#totalPrice').html(abc.total_price);
            $('#briefDesc').html(abc.package_description);
            $('#serviceTime').html(abc.service_time);
            $('#packageTotalPrice').html(abc.discounted_price);

            $.each(abc.has_services,function(key,idx5){
                // console.log(idx5.service_name);

                servList+='<div class="col-lg-3"><span>';
                servList+='<li style="font-size: 0.7rem;">'+idx5.service_name+'</li>';
                servList+='</span></div>';
             });
            $('#serviceLists').html(servList);
              // $('#allData').html('<input type="hidden" name="alldata" id="alldata" data-all=\''+dataPack+'\'>');      
              $('#NewPack').html('<a id="packModel" style="font-weight: bold;font-size: 15px;color:#121A7F" href="javascript:void(0)" onclick="addNewPackage(this)">ADD PACKAGE</a><button type="button" class="btn btn-primary" onclick="checkoutPackage()">CHECKOUT</button>');
        }

        function removeModel(obj){
           // console.log("Remove---"+JSON.stringify(obj));
           console('hue');
           $.ajax({
              url:'removeCartPackages',
              type:'post',
              data:{obj},
              success:function(data){
                 // console.log("data0000------"+JSON.stringify(data));
                 if(data.responseStatus == 200) {
                    $('#pack-'+obj).html("Book Now");
                    $('#pack-'+obj).prop('disabled', false);
                    $('#remPack-'+obj).css("display", "none");
                 }
              }
           });
        }

        // $('.js-example-basic-first').select2({
        //     minimumResultsForSearch: Infinity,
        // });
        // $('.js-example-basic-second').select2({
        //     minimumResultsForSearch: Infinity,
        // });
        // $('.js-example-basic-single').select2({
        //     placeholder:"Select Make",
        //     minimumResultsForSearch:Infinity,
        // });
        
        // $('.selectAccidentalPart').select2();

        // $(".js-example-basic-second").select2({
        //     // placeholder: "Select car part"
        // });

        // $(".selectParts").select2({
        //     placeholder: "Select Car Service",
        //     closeOnSelect: false,
        //     minimumResultsForSearch: Infinity,
        // });

        $(".partsToRepair").select2({
            placeholder: "Select Part",
            closeOnSelect: false,
            minimumResultsForSearch: Infinity,
        });

        // $("#partColor").select2({
        //     placeholder: "Select Color",
        //     // allowClear: true,
        //     minimumResultsForSearch: Infinity

        // });

        // $("#financeType").select2({
        //     placeholder: 'Repair expenses by',
        //     // allowClear: true,
        //     minimumResultsForSearch: Infinity,

        // });
        // $("#modelSelect").select2({
        //     placeholder: 'Select Model',
        //     minimumResultsForSearch: Infinity,
        // });
        // $("#fuelSelect").select2({
        //     placeholder: 'Select Fuel',
        //     minimumResultsForSearch: Infinity,
        // });
        //  $("#MemModelSelect").select2({
        //     placeholder: 'Select Model',
        //     minimumResultsForSearch: Infinity,
        // });
        // $("#MemFuelSelect").select2({
        //     placeholder: 'Select Fuel',
        //     minimumResultsForSearch: Infinity,
        // });
    });

$(document).ready(function(){
    $(".searchPackage").click(function(){
                           if(!$('#brandSelect').val() || $('#brandSelect').val() == 'Brand'){
                      $('#requestMakeError').removeClass('d-none');
                      $("#requestMakeError").html("Select Make");
                      return false;
                    }else{
                      $('#requestMakeError').addClass('d-none');
                    }
                    if($('#modelSelect').val() == "Model" || $('#modelSelect').val() == "") {
                      $('#requestModelError').removeClass('d-none');
                      $('#requestModelError').text("Select Model.");
                      return false;
                    }else {
                      $('#requestModelError').addClass('d-none');
                    }

                    if($('#fuelSelect').val() == "Fuel" || $('#fuelSelect').val() == "") {
                      $('#requestFuelError').removeClass('d-none');
                      $('#requestFuelError').text("Select fuel type.");
                      return false;
                    }else {
                      $('#requestFuelError').addClass('d-none');
                    }
                    if(!$('#mobile1').val() || $('#mobile1').val() == "") {
                      $('#requestMobError').removeClass('d-none');
                      $('#requestMobError').text("Enter Mobile.");
                      return false;
                    }else {
                      $('#requestMobError').addClass('d-none');
                    }
                            emptyCart();
                           $("#packData").innerHTML = '';
                        $('.loader-wrapper').css('display','flex');

                           // Fuel_id = $(this).val();
                           var auth_check = $('#isUserEstimate').val();
                           Brand_id = $('#brandSelect').val();
                           Model_id = $('#modelSelect').val();
                           Fuel_id = $('#fuelSelect').val();
                           var mobile1 = $('#mobile1').val();
                           // console.log("Checkingg searchPackage--"+JSON.stringify($('#fuelSelect').val()));  
                           // console.log('ddddddddddd'+$('#mobile1').val());
                           // console.log('hellooooooooooooo'+$('#isUserEstimate').val());
                           // alert(Brand_id);
                           // alert(Model_id);
                           // alert(Fuel_id);
                           var mobile1 = $('#mobile1').val();
                           $('#outerLeadMobile').html('');
                          if(auth_check == "true"){
                            $.ajaxSetup({
                               headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                               }
                            });

                          $.ajax({
                           url:'searchPackages',
                           type:'post',
                           data:{'Brand_id':Brand_id,"Model_id":Model_id,"Fuel_id":Fuel_id, "mobile1": mobile1},
                           success:function(data){
                              // console.log("CheckData2---------"+JSON.stringify(data.categories));
                              // console.log(data.categories);
                              $.ajax({
                                 url:'getCartPackages',
                                 type:'get',
                                 data:{Model_id},
                                 success:function(data){
                                    uniqueIdsArr = [... new Set(data.cartIdArr)]
                                    $.each(uniqueIdsArr,function(idx,val){
                                       // console.log("Data----"+JSON.stringify(val));
                                      $('#pack-'+val).html("Added");
                                      $('#pack-'+val).removeClass("bookPackageModel");
                                      $('.bookPackageModel').prop('disabled', true);
                                       $('#pack-'+val).prop('disabled', true);
                                       $('#remPack-'+val).css("display", "block");

                                    });
                                 }
                              });

                              $("#packData").html("");
                              returnPacks = '';
                              returnServs = '';
                              $("#packData").append(returnPacks);

                                        $('.loader-wrapper').css('display','none');
                              $.each(data.categories,function(row,data1){
                                 var abc = JSON.stringify(data1);
                                 var dataPackString = abc.replace('"', '"');
                                 // console.log(dataPackString);
                                 // var xyz = abc.split(" ").join("&").toLowerCase();
                                 // const string4 = new String("A String object");
                                 // console.log(xyz);
                                    // console.log("Val00---"+uniqueIdsArr);
                                 returnPacks+='<div class="col-lg-4 my-2 tooltipContent headClass"><div class="blueButton py-4 px-3" id ="tooltipContent"style="border:1px solid #F5E72E"><div class="row"><div class="col-lg-9 p-0">';
                                 returnPacks+='<h6 style="font-size: 0.9rem;font-weight: bolder;color:#fff;text-transform:uppercase">'+data1.package_name+'</h6>';
                                 returnPacks+='</div>';
                                 if(data1.discounted_price>0) {
                                      returnPacks+='<div class="col-lg-3 text-right"><h5 style="color:#fff; font-weight: 1000;"><span class="discontedPrice" style="text-decoration-line: line-through; margin-left: 10px;margin-right: 5px; font-size: 1rem;" >₹'+data1.total_price+'</span><span style="font-size: 1rem;">₹'+data1.discounted_price+'</span></h5></div>';
                                  } else {
                                      returnPacks+='<div class="col-lg-3 text-right"><h5 style="color:#fff;"><span style="font-weight: 1000;margin-left: 10px;margin-right: 5px; font-size: 1rem;">₹'+data1.total_price+'</h5></div>';
                                  }
                                 returnPacks+='</div>';
                                 returnPacks+='<h6 style="font-size: 0.8rem; text-transform:uppercase; " class="text-white">'+data1.package_description+'</h6>';
                                 // returnPacks+='<h6 style="font-size: 0.8rem; text-transform:uppercase; " class="text-white">'+data1.package_description+'</h6>';
                            //      returnPacks+='<ul class="pl-0" ><div class="row tooltip-data">';
                            // $.each(data1.has_services,function(ind,dat){
                            //     returnPacks+='<div class="col-lg-12"><span>';
                            //     returnPacks+='<li style="font-size: 0.8rem; color:#121A7F;">'+dat.service_name+'</li>';
                            //     returnPacks+='</span></div>';
                            // });
                            // returnPacks+='</div></ul>';
                                 // var extraServiceCount = 0;
                                 //  var pacakgeName = JSON.stringify(data1.has_services.length);
                                 //  if(data1.has_services.length>5) {
                                 //    extraServiceCount = data1.has_services.length - 5;
                                 //  }
                                 //  console.log("Check services---"+pacakgeName);
                                 //  $.each(data1.has_services,function(ind,dat){
                                 //        if(ind<5) {
                                 //          if(ind == 4 && extraServiceCount !== 0 ) {
                                 //              returnPacks+='<div class="loadMore" style=""><a href="javascript:void(0)" class="loadMoreBtn" id="'+data1.package_name+'" style="font-size: 0.8rem;">+'+extraServiceCount+'more </a></div>';
                                 //          }
                                 //        }
                                 //        if(ind >= 5) {
                                 //          returnPacks+='<div class="col-lg-6 '+data1.package_name+'_hidden" style="display:none"><span>';
                                 //          returnPacks+='<li style="font-size: 0.8rem;color:#121A7F;">'+dat.service_name+'</li>';
                                 //          returnPacks+='</span></div>';
                                 //          if(ind == data1.has_services.length-1) {
                                 //              returnPacks+='<div class="hideLoadMore '+data1.package_name+'_hideBtn" style="display:none;"><a href="javascript:void(0)" class="hideLoadMoreBtn" id="'+data1.package_name+'" style="font-size: 0.7rem;"> Hide </a></div>';
                                 //          }
                                 //        }

                                 //  });
                                 // returnPacks+='</div></ul>';
                                 returnPacks+='<div class="row" style="align-items:flex-end;">';
                                 if(data1.service_time != null){
                                    returnPacks+='<div class="col-lg-3"><h6 class="bg-white text-color px-3 py-1 m-0 text-center"> '+data1.service_time+' hours </h6></div>';
                                }else{
                                    returnPacks+='<div class="col-lg-3"><h6 class="px-3 py-1 m-0 text-center"></h6></div>';
                                }
                                 returnPacks+='<div class="col-lg-5"></div>';
                                 returnPacks+='<div class="col-lg-2"><form class="form-inline my-2 my-lg-0 justify-content-end"><button class="btn my-4 my-sm-2 yellowBackground text-color packModel removePackageModel" id="remPack-'+data1.id+'" style="font-weight: bolder; display: none;" onclick = "removeModel('+data1.id+')" data-pack=\''+dataPackString+'\' type="button"> REMOVE </button></form></div>';
                                 returnPacks+='<div class="col-lg-2"><form class="form-inline my-2 my-lg-0 justify-content-end"><button class="btn my-4 my-sm-2 yellowBackground text-color packModel bookPackageModel" id="pack-'+data1.id+'" style="font-weight: bolder" onclick = "checkoutPackage(this)" data-pack=\''+dataPackString+'\' type="button"> Book Now</button></form></div>';
                                 returnPacks+='</div></div>';
                                returnPacks+='<ul class="pl-0" ><div class="row tooltip-data">';
                            $.each(data1.has_services,function(ind,dat){
                                returnPacks+='<div class="col-lg-6"><span>';
                                returnPacks+='<li style="font-size: 0.8rem; font-weight:bold; color:#121A7F;">'+dat.service_name+'</li>';
                                returnPacks+='</span></div>';
                            });
                            returnPacks+='</div></ul> </div>';
                              });
                              $("#packData").append(returnPacks);
                           }
                        });

                           }else{
                            var mobileNumber = {'mobileNumber':mobile1}
                              $('#outerLeadMobile').append('<input type="text" class="form-control" maxlength="10" name="mobile1" id="mobile1" placeholder="Mobile Number" value="'+mobile1+'" readonly>');
                              $('#outerLeadMobile').append('<input type="hidden" name="Brand_id" id="Brand_id" value="'+Brand_id+'">');
                              $('#outerLeadMobile').append('<input type="hidden" name="Model_id" id="Model_id" value="'+Model_id+'">');
                              $('#outerLeadMobile').append('<input type="hidden" name="Fuel_id" id="Fuel_id" value="'+Fuel_id+'">');
                              $('#outerLeadMobile').append('<input type="hidden" name="authCheck" id="authCheck" value="'+auth_check+'">');

                              // $("#checkServiceLogin").modal('toggle');
                                    $('#checkServiceLogin').modal({
                                    backdrop: 'static',
                                    keyboard: true, 
                                    show: true
                                  }); 

                              $.ajaxSetup({
                                headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                              });
                              // console.log('hello');
                              $.ajax({
                                url: "leadOtp",
                                method: 'post',
                                data: mobileNumber,
                                success:function(data,status,xhr) {
                                  // console.log("OTP Test4---"+JSON.stringify(xhr));
                                  if(xhr.status==200) {
                                    localStorage.setItem("otp", xhr.responseText);
                                    $('.otpText').show();
                                    $('.loginUserBtn').show();
                                    $('.sendOtpBtn').hide();
                                     // Resend OTP Code ---------------------------------------------
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
                                    // console.log("Check---"+seconds);
                                    if(seconds == 0) {
                                      $('.resendOtpTextTimer').addClass('d-none');
                                      $('.resendOtpText').css('pointer-events','auto');
                                      $('.resendOtpText').css('cursor','pointer');
                                    }
                                  };
                                } 
                        // Resend OTP Code Ends ---------------------------------------------
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
                          

                     });

});
 


</script>