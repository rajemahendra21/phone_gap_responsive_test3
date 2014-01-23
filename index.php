<?php 
	include_once 'config.php';
	include_once 'includes/database.class.php';
	include_once 'includes/function.class.php';

	$dbh 			= new Database_class();
	$function 		= new Base_function();
	
	$statement = $dbh->prepare("SELECT `user_id`,`video_path`,`kid_name`,`image_path`,`user_id` FROM `participate_info` WHERE `featured_video` = 1 order by `create_on_date` DESC");		
	$statement->execute();
	$fetch = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html><head>
<meta charset="utf-8">
<title>Junior Superstars - Kotak</title>
<?php include 'header.php' ?>
<script type="text/javascript" >
var documentwidth = $(document).width();
 
if(documentwidth <= 640) {
}
else
{
	document.write("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/jquery.fancybox-1.3.4.css\"/>");
	document.write("<script language=\"javascript\" src=\"js/jquery.fancybox-1.3.4.min.js\"/>");
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
					$('.video_thumbs a,.video_container_btm li a').live('click',function(){
						$(this).attr('target','_blank')
						//window.location = "http://www.google.com";
					});
}
else{
	$(".fancybox").fancybox({
		'width' : 642,
		'height' : 460,
		'autoScale' : false,
		'transitionIn' : 'none',
		'transitionOut' : 'none',
		'type' : 'iframe',
		'titlePosition' : 'inside'
	});
}
});
</script>
<!--<link href="css/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/jquery.fancybox-1.3.4.js"></script> -->
<script type="text/javascript">
	$(function(){
			 
				/*$(".img_cont a.fancybox").fancybox({
					'titleShow'     : false,
					'transitionIn'	: 'none',
					'transitionOut'	: 'none'
				});*/
				//var documentwidth = $(document).width();
				if(documentwidth <= 640) {
					
				}
		});
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
	<section class="wrap inner">
    
    <?php include "top_menu.php" ?>
    	<div class="body_mid inner step1" style="min-height: 200px;">
            <div class="banner"><span class="text">Make your child a 'Superstar’ <span class="small">Your child could be the new face of Kotak’s internet commercial</span></span><a href="participate_video.php"><img src="images/banner.jpg" class="banner_img"></a></div>
            <div class="video_container_top">
            	<h1>See what our Juniors have to say about money</h1>
                <div class="video_thumbs">
                <!--<div class="video_thumbs" style="width:333px;"> -->
                	<a href="//www.youtube.com/embed/KNwR0CDpQIc" class="fancybox iframe"><img src="images/home_yt_thumb.jpg"><img class="play_btn" src="images/play_btn.png"></a>
                    <a href="//www.youtube.com/embed/KNwR0CDpQIc" class="fancybox iframe"><img src="images/home_yt_thumb.jpg"><img class="play_btn" src="images/play_btn.png"></a>
                	<!--<a href="//www.youtube.com/embed/KNwR0CDpQIc" class="fancybox iframe"><img src="http://img.youtube.com/vi/KNwR0CDpQIc/0.jpg"><img class="play_btn" src="images/play_btn.png"></a>
                    <a href="video1.php" class="fancybox iframe second_vid"><img src="images/video1.jpg"></a> -->
                </div>
            </div>
            <!----><div class="video_container_btm">
            	<h2>Featured contest entries</h2>
                <ul>
				<?php 
				$i = 1;$li_class = '';
				foreach($fetch as $val) { 
				if(2 == $i || 4 == $i){
				$li_class = 'class="last320"';
				}else if(3 == $i){
				$li_class = 'class="last desk_third"';
				}else if(4 == $i){
				$li_class = 'class="last320 featu_3rd"';
				}else if(5 == $i){
				$li_class = 'class="last featu_last"';
				}
				if(file_exists($val['image_path']) == 1){
					$fdp_image = $val['image_path'];
				}else{
					$fdp_image = 'images/video_thumb.png';
				}
				?>
                	<!--li <?php //echo $li_class; ?>><a href="gallery_inside.php?video_link=<?php //echo $val['video_path'].'&kid_name='.$val['kid_name']; ?>&img_path=<?php //echo $val['image_path']; ?>" class=""><img src="<?php //echo $fdp_image; ?>" alt="<?php //echo $val['image_path']; ?>" width="221" height="124"></a></li-->
					
					<li <?php echo $li_class; ?>><a href="gallery_inside.php?video_id=<?php echo $val['user_id'];?>"><img src="<?php echo $fdp_image; ?>" alt="<?php echo $val['image_path']; ?>" width="221" height="124"></a></li>
				<?php 
				$i++;
				} 
				?>
                
                </ul>
                <a class="view_gallery_btn" href="gallery.php">VIEW FULL GALLERY</a>
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