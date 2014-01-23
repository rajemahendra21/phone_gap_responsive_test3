<?php 
	include_once 'config.php';
	include_once 'includes/database.class.php';
	include_once 'includes/function.class.php';

	$dbh 			= new Database_class();
	$function 		= new Base_function();
	$length = 10;
	
	if($_GET['search'])
	{
		$search = $_GET['search'];
		$search = str_replace("'","",$search);
		$search = str_replace("\"","",$search);
		$search=$function->sanitise_input($search);
	}else{
		$search = '';
	}
	$where_condition = '';
	if($search!=''){
	$where_condition = " AND kid_name LIKE '%".$search."%'";
	}
	
	if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1;	}; 
	$start_from = ($page-1) * $length; 
	$limit_cond = "LIMIT $start_from, $length";
	
	$statement = $dbh->prepare("SELECT `user_id`,`video_path`,`kid_name`,`image_path` FROM `participate_info` WHERE `featured_video` = 1 order by `create_on_date` DESC");		
	$statement->execute();
	$fetch = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$approved_statement = $dbh->prepare("SELECT `user_id`,`video_path`,`kid_name`,`image_path` FROM `participate_info` WHERE `video_status` = 'yes' $where_condition order by `create_on_date` DESC $limit_cond");	
	$approved_statement->execute();
	$approved = $approved_statement->fetchAll(PDO::FETCH_ASSOC);
	
	$approved_statement1 = $dbh->prepare("SELECT `user_id`,`video_path`,`kid_name`,`image_path` FROM `participate_info` WHERE `video_status` = 'yes' $where_condition order by `create_on_date` DESC");	
	$approved_statement1->execute();
	$approved1 = $approved_statement1->fetchAll(PDO::FETCH_ASSOC);
	
	
	$total_pages = ceil(count($approved1) / $length);

?>
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
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<link rel="stylesheet" href="css/jquery.autocomplete.css" type="text/css" />
<link rel="stylesheet" media="all" type="text/css" href="js/datepicker/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="js/datepicker/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="js/datepicker/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/datepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="js/datepicker/jquery-ui-sliderAccess.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
   $( ".datepicker" ).datepicker();
$("#search").autocomplete(
      "autocomplete.php",
      {
  			delay:10,
  			minChars:2,
  			matchSubset:1,
  			matchContains:1,
  			//cacheLength:10,
  			//onItemSelect:selectItem,
  			//onFindValue:findValue,
  			//formatItem:formatItem,
  			autoFill:true
  		}
    );
	
		/*$( "#search" ).blur(function() {
		advance_seach();
		});*/
		
	});
	function get_all_video(search){
	$('#all_video').html();
	  $.ajax
			({
				type: "POST",
				url: "get_gallary.php",
				data: "action=all_video&kid_name="+search,
				success: function(data1)
				{			 
				$('#all_video').html(data1);
				}
			});  
	
	}
	function advance_seach()
	{
	var search=document.getElementById('search').value;
	window.location="search.php?search="+search;
	}
</script>
</head>
<body>
<section class="wrapper">
	<section class="wrap inner participate">
    
    <?php include "top_menu.php" ?>
    	<div class="body_mid inner gallery">
            <h1 class="how_to">Featured contest entries</h1>
            <div class="gallery_mid">
			<!--Sort by date:<input type='text' name='sort_by_date' id='sort_by_date' class='datepicker'><br/-->
            <div class="video_container_btm" id="featured_video">
                <ul>
                <?php 
				$i = 1;$li_class = '';
				foreach($fetch as $val) { 
				//if(2 == $i || 4 == $i){
				if(2 == $i){
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
                	<li <?php echo $li_class; ?>><a href="gallery_inside.php?video_id=<?php echo $val['user_id'];?>"><img src="<?php echo $fdp_image; ?>" alt="<?php //echo $val['kid_name']; ?>" width="221" height="124"><span class="kid_name"><?php echo $val['kid_name']; ?></span></a></li>
				<?php 
				$i++;
				} 
				?>
                </ul>
            </div>
            <div class="all_videos">
            <h2><span>All videos</span><div class="search_box"><span>
			Search By Name:</span><input type='text' name='search' id='search' >
			<input type="button" class="search_btn" value="" onclick="advance_seach();"></div></h2>
            <div class="video_container_btm" id="all_video">
                <ul>
                 <?php 
				$i = 1;$li_class = '';
				foreach($approved as $val) {  
				if(6 == $i){ $i = 1; $li_class = '';}
				if(2 == $i || 4 == $i){
				$li_class = "class='last320'";
				}else if(3 == $i){
				$li_class = "class='last desk_third'";
				}else if(5 == $i){
				$li_class = "class='last'";
				}
				if(file_exists($val['image_path']) == 1){
					$dp_image = $val['image_path'];
				}else{
					$dp_image = 'images/video_thumb.png';
				}
				?>
                	<li <?php echo $li_class; ?>><a href="gallery_inside.php?video_id=<?php echo $val['user_id'];?>" ><img src="<?php echo $dp_image; ?>" alt="<?php //echo $val['kid_name']; ?>" width="221" height="124"><span class="kid_name"><?php echo $val['kid_name']; ?></span></a></li>
				<?php 
				$i++;
				} 
				?>
                </ul>
            </div>
			
			
			<?php
			if($total_pages>1){ ?>
			<div class="pagination">
			<div class="pagination_inner">

				<?php if($page > 1)
					{
						$prev=$page-1;
						echo "<div class='prev'><a href='gallery.php?page=$prev'>Prev</a></div>";
					}		?>
					<?php for ($i=1; $i<=$total_pages; $i++) {
						if($page == $i){ $active = 'active';} else { $active = ''; }
						echo "<a class='page_list $active' href='gallery.php?page=".$i."'>".$i."</a> ";
						
					}
			
					if($page < $total_pages)
					{
						$next=$page+1;
						echo  "<div class='next'><a href='gallery.php?page=$next' >Next</a></div>";
					}
			?>
			</div>
			</div>
			<?php }
			?>
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