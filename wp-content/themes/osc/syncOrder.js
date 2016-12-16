if(typeof $ == 'undefined'){
	var $ = jQuery;
}

function syncOrder(orderId, action, username, prodIds, total){
		var syncOrderURL = "http://120.55.160.225/api/3rb/traning-lesson-orders"
		if (action == "complete"){
			jQuery.ajax({
				type: 'POST',
				url: syncOrderURL,
				data: JSON.stringify({
					"orderNum": orderId,
					"username": username,
					"lessonCodes": prodIds,
					"totalPrice": total,
					"discount": 0,
					"totalPriceBeforeDiscount": total,
					"paymentType": "CREDIT_CARD",
					"paidAt": Date.now()
				}),
				contentType: "application/json",
				success: function(data){
					}
			});
		}
		
	}
(function($) {
	
    $(document).ready(function () { 
	
	});
	
})(jQuery);


