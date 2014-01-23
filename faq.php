<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Junior Superstars - Kotak</title>
<?php include 'header.php' ?>
<script type="text/javascript" >
$(window).load(function() { 
				
}); 
</script>
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
		});
</script>
<style type="text/css">
div.jp-video-360p {
    border: medium none;
    width: 536px;
}
</style>
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
            <h1 class="how_to faq_head">FAQ's</h1>
            <div class="faq_cont">
            <script type="text/javascript">
            	$(function(){
					$('.faq_row h1').click(function(){
						$('.faq_row .desc').hide();
						$(this).next().slideDown(400);
					});
				});
            </script>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>1. What is the Kotak Junior Superstars?</h1>
                    <div class="desc">The Kotak Junior Superstars is a contest organized by Kotak Mahindra Bank Ltd.  It is a video based contest where parent(s) or legal guardian will submit video of their child. We are inviting entries for videos of children while they answer simple money related questions. <br>
<br>
Three (3) videos from the submitted entries will be selected as final winners by a panel of judges. The final winners will feature in Kotak Mahindra Bank’s internet commercials. 
</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>2. Who is eligible to enter the Kotak Junior Superstars?</h1>
                    <div class="desc" style="display:none;">In order to submit entry to the contest, you must be an Indian citizen, and of age 18 years and above (as on 27th December 2013).
</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>3. Who can submit the video entry of the child?</h1>
                    <div class="desc" style="display:none;">Entry submission must be done by either a parent or legal guardian of the child.</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>4. Is there any restriction on the age of the child?</h1>
                    <div class="desc" style="display:none;">The child featured in the video should be between ages 3 to 10 years old.</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>5. Why should I participate in the contest?</h1>
                    <div class="desc" style="display:none;">Kotak Junior Superstars will be a very good opportunity for your child to showcase his/her abilities. By taking part in the contest, your child will get a chance to be featured on Kotak Mahindra Bank’s internet commercial. </div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>6. What is considered as entry to the contest?</h1>
                    <div class="desc" style="display:none;">A video file of 60 seconds must be submitted and it should comply with our Official terms and conditions.</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>7. How many entries can I submit?</h1>
                    <div class="desc" style="display:none;">A participant can submit one entry per child.</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>8. How do I submit entry for the contest?</h1>
                    <div class="desc" style="display:none;">If you’re eligible, follow the steps below to submit an entry:<br><br>
<ul>
	<li>Make sure you have a video recording equipment to shoot video of your child.</li>
	<li>Create a max 1 minute length video featuring your child answering questions about money.</li>
	<li>Here are sample questions, you can chose 2 or more:
    	<ul>
        	<li>What is money? What does it look like?</li>
        	<li>Where does money come from?</li>
        	<li>What is a bank / what do you do in a bank?</li>
        	<li>What do you think you should save money for / what will you do with money that you save?</li>
        	<li>When you grow up, how will you earn money?</li>
        </ul>
    </li>
    <li>Submit your video entry either on our site, through Whatsapp or email</li>
</ul></div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>9. Is there a limit for sending entries via email?</h1>
                    <div class="desc" style="display:none;">Entries which are being sent to us via email should be of size 25MB or less.
</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>10. Must I use a particular camera to shoot the video?</h1>
                    <div class="desc" style="display:none;">You may submit videos captured from ANY digital or film cameras or even mobile phones.</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>11. What language can the video be in?</h1>
                    <div class="desc" style="display:none;">You can submit your video in either Hindi or English language. If you are providing entry in a language other than Hindi or English, you must supply English captions or subtitles with it.</div>
                </div>
            <!-- row starts -->
            	<div class="faq_row">
                	<h1>12. How will the winners be declared?</h1>
                    <div class="desc" style="display:none;">The winners will be declared on our site <a href="http://www.junior-superstars.com/" target="_blank">www.junior-superstars.com</a></div>
                </div>
                
            </div>
      </div>
<?php include "footer.php" ?>
    </section>
<div class="loader_ajax">
	<div class="loader_ajax_inner"><img src="images/preloader_ajax.gif"></div>
</div>
</section>
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>

<script type="text/javascript">

twttr.conversion.trackPid('l487g');

</script>

<noscript>

<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=l487g&p_id=Twitter" />

</noscript>
</body>
</html>