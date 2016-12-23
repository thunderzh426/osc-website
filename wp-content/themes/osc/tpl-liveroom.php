<?php
/*
  Template Name: Live Room
 */
get_header();
$code = $_POST['code'];

$current_user = wp_get_current_user();
 $user_name = $current_user->user_login;
?>
<!-- blog title -->

<div class="clear"></div>
<!-- blog title ends -->
<div class="blog_pages_wrapper default_bg">
    <div class="container">
        <div class="row">
			<!-- sidebar -->
            <div class="col-md-12 iframePanel" style="height:500px">
			<iframe src="" id="iframepage" frameborder="0"  height="100%" width="100%" >
			
			</iframe>
	

            </div>
        </div>
        <div class="clear"></div>

    </div>
</div>
<script>
	var iObj = document.getElementById('iframepage');
	//消息处理函数
	var onmessage = function(e){
	    var data = e.data;
	    //提取参数
	    var height = /%([0-9]+)%/.exec(data)[1];
	    if(height == 0){
	        parent.parent.document.getElementById("iframePanel").style.display = "none";
	    }
	    else{
	        $(".iframePanel").css('height',height+'px')
	        $(".iframepage").css('height',height+'px' )
	    }
	}
	//监听postMessage消息事件
	if (typeof window.addEventListener != 'undefined') {
	    window.addEventListener('message', onmessage, false);
	} else if (typeof window.attachEvent != 'undefined') {
	    window.attachEvent('onmessage', onmessage);
	}


	var data = JSON.stringify({username:'<?php echo $current_user->user_login ?>'});
	function getLiveRoom(){
		$.ajax('http://120.55.160.225/api/3rb/sso-request',
			{	
				headers:{Authorization:'Basic b3NjZ2Njb21hcHB1c2VyOm9zY2djQ29tQXBwVXNlckAyMDE2'},
				timeout:10000,// ssoToken 10s expire
				type: 'POST',
				contentType: 'application/json',
				data: data,
				success: function(data,textStatus) {
					$("#iframepage").attr("src",'http://120.55.160.225/ts-sso?ssoToken='+data.id+'&next=/iframeContent/<?php echo $code ?>')
				},
				error:function(msg){
					alert(msg.responseJSON.errorMessage);
				},
				complete : function(XMLHttpRequest,status){
					if(status=='timeout'){//超时,status还有success,error等值的情况
			 　　　　　  getLiveRoom();
			　　　　}
				}
			}
        )
	}
	getLiveRoom();
</script>


<?php get_footer(); ?>

