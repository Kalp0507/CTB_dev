$( document ).ready(function () {
		// $(".blogBox",this).slice(0, 1).show();
		// if ($(".blogBox:hidden").length != 0) {
		// 	$(".LoadMore").show();
		// }		
		// $(".LoadMore",this).click( function (e) {
		// 	e.preventDefault();
		// 	$(".moreBox:hidden").slice(0).slideDown();
		// 	if ($(".moreBox:hidden").length == 0) {
		// 		$(".LoadMore").fadeOut('slow');
		// 	}
		// });
		  $(".blogBox",this).slice(0, 5).show();
		   if ($(".blogBox:hidden").length != 0) {
			$(".LoadMore").show();
		}	
		    $(".LoadMore",this).on('click', function (e) {
		        e.preventDefault();
		        $(".moreBox:hidden").slice(0).slideDown();
		        if ($(".moreBox:hidden").length == 0) {
		            $("#load").fadeOut('slow');
		        }
		});

		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		});
    

	});


    $(document).ready(function(){
        $(".changeBlock").mouseover(function(){
        	// alert("hello");
            $(".titleBlock",this).css({"color":"black"});
            $(".serviceBlock", this).css({"background-color":"#F5E72E"});
        });    
        
        $(".changeBlock").mouseout(function(){
         $(".titleBlock", this).css({"color":"darkblue"});
            $(".serviceBlock", this).css({"background-color":"#fff"});

        });


    });


