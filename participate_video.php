<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Junior Superstars - Kotak</title>
<link rel="stylesheet" href="css/ezmark.css" media="all">
<?php include 'header.php' ?>
<script type="text/javascript" >
$(window).load(function() { 
		$('.loader_ajax_part').hide();		
}); 
</script>
<!--<script type="text/javascript" src="js/jquery.min.js"></script> -->
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" >
var documentwidth = $(document).width();
//alert(documentwidth); 
if(documentwidth <= 640) {
}
else
{
	
}
$(function() {
});
$(window).load(function() {
if(documentwidth <= 640) {
					//right menu
					$('.menu').click(function(){
						if($('header nav').is(":visible")){
							//	$('.right_menu').removeClass('active');
								$('header nav').hide();
							}
							else
							{				
								//$('.menu').addClass('active');
								//$('header nav').removeClass('active');
								//$('.phone_menu').removeClass('active');
								$('header nav').show();
								$(function(){
									$('header nav').hover(function(){
									
									},function(){
										$('header nav').hide();
									});
								});
							}
					});
					//$('.partci_vid_div iframe').live('click',function(){
						$('.partci_vid_div iframe').attr('width','100%');
						$('.partci_vid_div iframe').attr('height','100%');
						//window.location = "http://www.google.com";
					//});
}
else{
	
}
});
</script>
<script type="text/javascript">
	$(function(){
			 /*$(".fancybox").fancybox({
				'width' : 642,
				'height' : 460,
				'autoScale' : false,
				'transitionIn' : 'none',
				'transitionOut' : 'none',
				'type' : 'iframe',
				'titlePosition' : 'inside'
				});*/
				/*$(".img_cont a.fancybox").fancybox({
					'titleShow'     : false,
					'transitionIn'	: 'none',
					'transitionOut'	: 'none'
				});*/
				var el = $('.autoclear');
		el.focus(function(e) {
		if (e.target.value == e.target.defaultValue)
			e.target.value = '';
		});
		el.blur(function(e) {
			if (e.target.value == '')
				e.target.value = e.target.defaultValue;
		});
	});
</script>
<style type="text/css">
div.jp-video-360p {
    border: medium none;
    width: 536px;
}
</style>
<script type="text/javascript">
 $(document).ready(function() {
	$('#submit_video').click(function(){
		var parent_name = $('#parent_name').val();
		var email=$("#email").val();
		var mobile_no=$("#mobile_no").val();
		var address=$("#address").val();
		var kid_name=$("#kid_name").val();
		var kid_age=$("#kid_age").val();
		var upload_video = $('#upload_video_file_name').val();
		var upload_video_path = $('#upload_video_file_path').val();
		var term =  $('input[name="terms"]:checked').val(); 
		var contact =  $('input[name="contact"]:checked').val();
		
		var all_clear = '0';
		if(parent_name == '' || cgname_valiation('parent_name')==false){
		$('#parent_id_error').html("*Please Enter Parent Name");all_clear=1;
		}else{$('#parent_id_error').html('');}
		if(email == '' || validateEmail(email)==false){
		$('#email_error').html("*Please Enter Email Address");all_clear=1;
		}else{$('#email_error').html('');}
		if(mobile_no == '' || phonenumber(mobile_no)==false){
		$('#mobile_no_error').html("*Please Enter Mobile Number");all_clear=1;
		}else{$('#mobile_no_error').html('');}
		if(address == ''){
		$('#address_error').html("*Please Enter Address");all_clear=1;
		}else{ $('#address_error').html('');}
		if(kid_name == '' || cgname_valiation('kid_name')==false){
		$('#kid_name_error').html("*Please Enter Kids Name");all_clear=1;
		}else{ $('#kid_name_error').html('');}
		if(kid_age == '' || kid_age<=0 || kid_age>17 || Number(kid_age)!=kid_age){
		$('#kid_age_error').html("*Please Enter Kids Age");all_clear=1;
		}else{ $('#kid_age_error').html('');}
		if(upload_video == ''){
		$('#upload_video_error').html("*Please Upload Video");all_clear=1;
		}else{ $('#upload_video_error').html('');}
		if(term != 'yes'){
		$('#term_error').html("*Please Accept Terms & Conditions.");all_clear=1;
		}else{ $('#term_error').html('');}
		
		if(all_clear == 0){
		$('.loader_ajax_part').show();
		 $.ajax
			({
				type: "POST",
				url: "get_gallary.php",
				enctype: 'multipart/form-data',
				data: "action=save_video&parent_name="+parent_name+"&email="+email+"&mobile_no="+mobile_no+"&address="+address+"&kid_name="+kid_name+"&kid_age="+kid_age+"&upload_video="+upload_video+"&contact="+contact+"&upload_video_path="+upload_video_path,
				success: function(data1)
				{
					alert("Video Uploaded Successfully.");
					$('.loader_ajax_part').hide();
					$('#form_show').hide();
					$('#thank_you').show();
				//$('#all_video').html(data1);
				}
		});  
		}
		
		return false;
	});
	
	
	 $('#upload_video_file').live('change', function(){				
	 $('.loader_ajax_part').show();
			   //$("#preview").html('');
				//$("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
				$("#imageform").ajaxForm({
					//target: '#preview',
					success: function(data) 
					{	
						
						var obj = jQuery.parseJSON(data);
						
						$('.loader_ajax_part').hide();
						$('#upload_video_file_name').val(obj['a']);
						$('#upload_video_file_path').val(obj['b']);
						
												
					}
				}).submit();
		
	});
});

function phonenumber(id_data){
var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;  
  if(id_data.match(phoneno)) {  
      return true;  
    }else{  
       // alert("Please Enter Valid Mobile number");  
        return false;  
    }  
}
function cgname_valiation(id){
var cg_name = $("#"+id).val();
var regex = /^[a-zA-Z ]*$/;
	if(!cg_name.match(regex)){
		//alert('Please Enter Valid child or Guardian Name');
		return false;
	}else{
	return true;
	}
}

function validateEmail(id){
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
id = id.trim();  
   if(!emailReg.test(id)) {  
       // alert("Please enter valid email id");
		return false;
   }else{
   return true;
   }     
}
function age_validation(id){ alert($.isNumeric(id));
	if($.isNumeric(id) == true && id.length<3 && id>0){
		//return true;
	} else{ return false;}
}
</script>
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 

  ga('create', 'UA-46795296-1', 'junior-superstars.com');

  ga('send', 'pageview');
</script>
</head>
<body>
<section class="wrapper">
	<section class="wrap inner participate">
    
    <?php include "top_menu.php" ?>
    	<div class="body_mid inner step1">
            <h1 class="how_to">How to participate</h1>
            <div class="partic_mid">
            <div class="partci_vid_div">
            <iframe width="100%" height="100%" src="//www.youtube.com/embed/ADjslxr4-9c?wmode=opaque" frameborder="0" allowfullscreen></iframe>
            </div>
            	<!--<a href="video1.php" class="fancybox iframe partci_vid"><img src="images/participate_vid_thumb.jpg"></a> -->
                <div class="parti_right">
                <div class="steps">Step – 1</div>
                To participate ask your child to answer 7 simple questions: <br>
<br>

                <ul><li>1. What is your name?</li>
<li>2. What is money? What does it look like?</li>
<li>3. Where does money come from?</li>
<li>4.	What is a bank?</li>
<li>5.	What will you do with money that you save?</li>
<li>6.	When you grow up, how will you earn money?</li>
<li>7.	How much money does God have?</li>
</ul>
<br>
<div class="steps">Step - 2</div>
Film your child's natural answers<br>
<!--Child should say his name in the beginning of the video -->
                </div>
                <div class="send_cont">
                	<h2><div class="mid"><div class="steps">Step - 3</div><a href="javascript:void(0);" class="active" id="upload_tab">Upload <span class="for_wap_parti">video</span></a><div class="divider">Or</div><a href="javascript:void(0);" id="whatsapp_tab"><span class="for_wap_parti">Send on </span> Whatsapp</a></div></h2>
                    
                <script type="text/javascript">
                	$(function(){
						$('#whatsapp_tab').click(function(){
							$('#upload_tab').removeClass('active');
							$(this).addClass('active');
							$('#form_show').slideUp('fast');
							$('#send_whatsapp').slideDown(500);
							$('#thank_you').hide();
							$('.form_row .error').empty();
						});
						$('#upload_tab').click(function(){
							$('#whatsapp_tab').removeClass('active');
							$(this).addClass('active');
							$('#send_whatsapp').slideUp('fast');
							$('#form_show').slideDown(500);
						});
					});
                </script>
					<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
                   <div id="form_show">
                   <div class="loader_ajax_part" style="display:none;">
                        <div class="loader_ajax_inner"><img src="images/preloader_ajax.gif"></div>
                    </div>
				   <div class="upload_form">
                    	<div class="form_row">
	                        <label>Parent / Guardian’s Name</label>
                        	<input type="text" class="input" name="parent_name" id="parent_name">                            
	                        <label class="error" id="parent_id_error"></label>
                        </div>
                    	<div class="form_row">
	                        <label>Email</label>
                        	<input type="text" class="input" name="email" id="email">
							<label class="error" id="email_error"></label>
                        </div>
                    	<div class="form_row">
	                        <label>Mobile number</label>
                        	<input type="text" class="input" name="mobile_no" id="mobile_no" maxlength="10">
							<label class="error" id="mobile_no_error"></label>
                        </div>
                    	<div class="form_row">
	                        <label>Address</label>
                        	<textarea name="address" id="address"></textarea>
							<label class="error" id="address_error"></label>
                        </div>
                    </div>
                    <div class="upload_video">
                    
                    	<div class="form_row">
	                        <label>Child’s name</label>
                        	<input type="text" class="input" name="kid_name" id="kid_name">
							<label class="error" id="kid_name_error"></label>
                        </div>
                    	<div class="form_row">
	                        <label>Child’s age</label>
                        	<input type="text" class="input" name="kid_age" id="kid_age">
							<label class="error" id="kid_age_error"></label>
                        </div>
                    	<div class="form_row browse_row">
	                        <label>Select Video</label>
                        	<input type="file" class="input" name="upload_video_file" id="upload_video_file">
							<input type="hidden" class="input" name="upload_video_file_name" id="upload_video_file_name">
							<input type="hidden" class="input" name="upload_video_file_path" id="upload_video_file_path">
							<label class="error" id="upload_video_error"></label>
                        </div>
                    	<div class="form_row check_row">
                        	<input type="checkbox" name="contact" class="checkbox" value="yes"><label>Contact me with more details about Junior Account</label>
                        	<input type="checkbox" name="terms" class="checkbox" value="yes"><label>I Agree to the <a href="terms.php">terms and conditions</a></label>
							<label class="error" id="term_error"></label>
                        </div>
                    </div>
                    <div class="submit_row">
                    	<a id="submit_video"><input type="image" src="images/submit_btn.png" width="152" height="37"></a>
                    </div>
					</div>
                    <div id="thank_you" style="display:none;">Thank you for participating in Kotak’s Junior Superstars. <br>
You will be notified once we have deliberated over your entry. Good luck to you and your little one!</div>
					</form>
                    
                    <div id="send_whatsapp" style="display:none;">
                    <div class="parti_send">
                    	<img src="images/parti_number1.jpg" class="number">
                    	<img src="images/participate1.jpg">
                        <div class="text">On your mobile phone contacts, save the number 092272 56767 as KOTAK
</div>
                    </div>
                    <img src="images/parti_arrow.jpg" class="parti_arrow">
                    <div class="parti_send parti_send2">
                    	<img src="images/parti_number2.jpg" class="number">
                    	<img src="images/participate2.jpg">
                        <div class="text">Open Whatsapp, find Kotak in your Whatsapp contacts list</div>
                    </div>
                    <img src="images/parti_arrow.jpg" class="parti_arrow">
                    <div class="parti_send parti_send3">
                    	<img src="images/parti_number3.jpg" class="number">
                    	<img src="images/participate3.jpg">
                        <div class="text">Send <span class="part_bold">JUNIOR</span> as a message to this contact. On receiving a welcome message, send us your child's video through Whatsapp</div>
                    </div>
                    </div>
                </div>
                <div class="or">
                <h2 class="or_h2">
                <div class="text">Alternatively you can send the video as an attachment in an email to  
<script type="text/javascript">
//<![CDATA[
<!--
var x="function f(x){var i,o=\"\",l=x.length;for(i=0;i<l;i+=2) {if(i+1<l)o+=" +
"x.charAt(i+1);try{o+=x.charAt(i);}catch(e){}}return o;}f(\"ufcnitnof x({)av" +
" r,i=o\\\"\\\"o,=l.xelgnhtl,o=;lhwli(e.xhcraoCedtAl(1/)3=!84{)rt{y+xx=l;=+;" +
"lc}tahce({)}}of(r=i-l;1>i0=i;--{)+ox=c.ahAr(t)i};erutnro s.buts(r,0lo;)f}\\" +
"\"(1),8\\\"\\\\rxiz35\\\\00\\\\00\\\\\\\\\\\\\\\\\\\\\\\\23\\\\07\\\\00\\\\" +
"\\\\32\\\\01\\\\03\\\\\\\\XU3U03\\\\\\\\ZX\\\\S\\\\\\\\W\\\\]oM_Y_M[SWVVKLU" +
"O u@?F9}$b{`|030Mc/obf%i`ajwEcqsu14\\\\00\\\\03\\\\\\\\14\\\\06\\\\01\\\\\\" +
"\\\\\\t3\\\\01\\\\\\\\27\\\\06\\\\03\\\\\\\\30\\\\00\\\\00\\\\\\\\36\\\\0I\\"+
"\\35\\\\05\\\\00\\\\\\\\34\\\\06\\\\00\\\\\\\\17\\\\00\\\\00\\\\\\\\7N7W01\\"+
"\\\\\\\\\\r5\\\\02\\\\\\\\16\\\\0E\\\\05\\\\0_\\\\I@16\\\\03\\\\);)5w-9,830" +
"!5=\\\"\\\\f(;} ornture;}))++(y)^(iAtdeCoarchx.e(odrChamCro.fngriSt+=;o27=1" +
"y%){++;i<l;i=0(ior;fthnglex.l=\\\\,\\\\\\\"=\\\",o iar{vy)x,f(n ioctun\\\"f" +
")\")"                                                                        ;
while(x=eval(x));
//-->
//]]>
</script>



 <!--<img src="images/email_image.jpg" class="email_image">--></div></h2>
                </div>
            </div>
      </div>
<?php include "footer.php" ?>
    </section>
<div class="loader_ajax">
	<div class="loader_ajax_inner"><img src="images/preloader_ajax.gif"></div>
</div>
</section>
<script type="text/javascript" src="js/jquery.ezmark.min.js"></script>
<script type="text/javascript">
$(function() {
	$('.check_row .checkbox').ezMark();
});	
</script>	

<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>

<script type="text/javascript">

twttr.conversion.trackPid('l487g');

</script>

<noscript>

<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=l487g&p_id=Twitter" />

</noscript>
</body>
</html>