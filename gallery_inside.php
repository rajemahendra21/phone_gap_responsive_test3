<?php
include_once 'config.php';
include_once 'includes/database.class.php';
$dbh 			= new Database_class();
$video_id =$_GET['video_id'];
$statement = $dbh->prepare("SELECT `user_id`,`video_path`,`kid_name`,`image_path`,`user_id` FROM `participate_info` WHERE `user_id`=".$video_id);		
$statement->execute();
$fetch = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($fetch as $val) { 
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 $long_url = $pageURL;
 return $long_url;
}
?>
<!DOCTYPE HTML>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8">
<title>Junior Superstars - Kotak</title>
<link href="skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="js/jquery.jplayer.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				m4v: "<?php echo $val['video_path']; ?>",
				//ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
				//webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
				poster: "<?php echo $val['image_path']; ?>"
			});
		},
		swfPath: "js",
		//supplied: "webmv, ogv, m4v",
		supplied: "m4v",
		size: {
			width: "100%",
			height: "auto",
			cssClass: "jp-video-360p"
		},
		smoothPlayBar: true,
		keyEnabled: true
	});

});
//]]>
</script>
<style type="text/css">
div.jp-video-360p {
    border: medium none;
    width: 100%;margin: 25px auto 0;
}div.jp-type-single div.jp-title {
    display: none;
}div.jp-video-360p div.jp-video-play {
    height: 360px;
    margin-top: -360px;
}a.jp-video-play-icon {
    margin-top: -150px;
}.fb_edge_widget_with_comment {
    float: left;
    position: relative;
    width: 95px;
}
.addthis_button_tweet.at300b {
    width: 89px;
}div.jp-jplayer {
     position: relative;
    /*z-index: 1;*/
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=1451595655068485";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<section class="wrapper">
	<section class="wrap inner participate">
    
    <?php include "top_menu.php" ?>
    	<div class="body_mid inner gallery_inside">
            <h1 class="how_to"><?php echo $val['kid_name'];?><a href="gallery.php" class="back_gallery"> &lt; Back to video gallery</a></h1>
            <div class="gallery_inside_mid">
            	<div id="jp_container_1" class="jp-video jp-video-360p">
			<div class="jp-type-single">
				<div id="jquery_jplayer_1" class="jp-jplayer"></div>
				<div class="jp-gui">
					<div class="jp-video-play">
						<a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
					</div>
					<div class="jp-interface">
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>
						<div class="jp-controls-holder">
							<ul class="jp-controls">
								<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
								<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
								<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
								<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
								<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
								<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
							</ul>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
							<ul class="jp-toggles">
								<li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
								<li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
								<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
								<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
							</ul>
						</div>
						<div class="jp-title">
							<ul>
								<li>Big Buck Bunny Trailer</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
		</div>
        <!-- social code starts -->
        <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style">
<!--<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> -->
<div class="fb-like addthis_button_facebook_like" data-href="<?php echo curPageURL(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
<!--a class="addthis_button_tweet"></a-->
<?php
 $long_url = curPageURL();
 $bitly_login = 'o_pb4egpd13';
 $bitly_apikey = 'R_08e23a901b3efa1f194cd3b39593055f';

 $bitly_response = json_decode(file_get_contents("http://api.bit.ly/v3/shorten?login={$bitly_login}&apiKey={$bitly_apikey}&longUrl={$long_url}&format=json"));

 $short_url = $bitly_response->data->url;
 
?>
<?php $twitter_text = 'Watch this adorable little kid tell you what he thinks about money #KotakJuniorSuperstars'.'&url='.$short_url; ?>
<a href="https://twitter.com/share?text=<?php echo $twitter_text; ?>" class="addthis_button_tweet twitter-share-button" data-lang="en"></a>
<a class="addthis_counter addthis_pill_style"></a>
<!--script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script-->
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52ce9dd060d1f9a3"></script>
<!-- AddThis Button END -->

            </div>
            <div class="gallery_inside_btm">
	
                <a class="view_gallery_btn" href="participate_video.php">SUBMIT YOUR OWN</a>
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
<?php } ?>
</html>