if(typeof $ == 'undefined'){
	var $ = jQuery;
}
(function($) {
    $(document).ready(function () { 
	
	   "use strict";       
		var chinaServer = "";
		var newUserURL = "http://" + chinaServer + "/api/3rb/users";
		$(document).on("click", "#xoouserultra-register-btn", function(e) {
			
			e.preventDefault();			
			var validation = true;			
			//get all with required class
			
			$( ".required" ).each(function( index ) {
				
				
				
				var field_txt = jQuery(this).attr("value");
				var field_id = jQuery(this).attr("id");
				
				if(field_txt=="")
				{
					validation = false;
					
					jQuery("#uultra-val-message-"+field_id).slideDown();
				
				}else{
					
					jQuery("#uultra-val-message-"+field_id).slideUp();
					
				
				}

			
			});
			
			if(validation)
			{
				jQuery.ajax({
					type: 'POST',
					url: newUserURL,
					data: {
						"cellphone": $("#telephone").val(),
						"username": $("#reg_user_login").val(),
						"password": $("#reg_user_pass").val(),
						"displayName": $("#display_name").val(),
						"email": $("#reg_user_email").val()
					},
					contentType: "application/json",
					success: function(data){
						}
				});

				$( "#xoouserultra-registration-form" ).submit();
			
			}
			
			 // Cancel the default action
			 return false;
    		e.preventDefault();
			 

				
        });
		
    }); //END READY
})(jQuery);

function hidde_noti (div_d)
{
		jQuery("#"+div_d).slideUp();		
		
}

