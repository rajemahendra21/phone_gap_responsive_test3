<?php
	include_once 'config.php';
	include_once 'includes/database.class.php';
	include_once 'includes/function.class.php';
	
	$dbh = new Database_class();
	$function = new Base_function();
	if($_POST['action'] == 'featured_video'){
	$query_string = '';
	$result = Array();
	$search_data = $_POST['kid_name'];
	$qry=$dbh->prepare("SELECT DISTINCT kid_name,video_path FROM participate_info WHERE featured_video = 1 AND kid_name LIKE '%$search_data%' ORDER BY kid_name");
	
	$qry->execute();
	$fetch = $qry->fetchAll(PDO::FETCH_ASSOC);
	$query_string = $query_string.'<ul>';
	 
				$i = 1;$li_class = '';
				foreach($fetch as $val) { 
				if(2 == $i || 4 == $i){
				$li_class = 'class="last320"';
				}else if(3 == $i){
				$li_class = 'class="last desk_third"';
				}else if(5 == $i){
				$li_class = 'class="last"';
				}
				
    $query_string = $query_string.'<li '.$li_class.'><a href="gallery_inside.php?video_link=admin/'.$val["video_path"].' class="fancybox iframe"><img src="images/video_small1.jpg"></a></li>';
				 
				$i++;
				}
    $query_string = $query_string.'</ul>';
	
	echo $query_string;
	}
	else if($_POST['action'] == 'all_video'){
	$query_string = '';
	$result = Array();
	$search_data = $_POST['kid_name'];
	$qry=$dbh->prepare("SELECT DISTINCT kid_name,video_path FROM participate_info WHERE  video_status= 'yes' AND featured_video = 0 AND kid_name LIKE '%$search_data%' ORDER BY kid_name");
	
	$qry->execute();
	$fetch = $qry->fetchAll(PDO::FETCH_ASSOC);
	$query_string = $query_string.'<ul>';
	 
				$i = 1;$li_class = '';
				foreach($fetch as $val) { 
				if(2 == $i || 4 == $i){
				$li_class = 'class="last320"';
				}else if(3 == $i){
				$li_class = 'class="last desk_third"';
				}else if(5 == $i){
				$li_class = 'class="last"';
				}
				
    //$query_string = $query_string.'<li '.$li_class.'><a href="gallery_inside.php?video_link=admin/'.$val["video_path"].'&kid_name='.$val["kid_name"].'><img src="images/video_small1.jpg"></a></li>';
	$query_string = $query_string."<li".$li_class."><a href='gallery_inside.php?video_link=admin/".$val["video_path"]."&kid_name=".$val['kid_name']."'><img src='images/video_small1.jpg'></a></li>";
				 
				$i++;
				}
    $query_string = $query_string.'</ul>';
	
	echo $query_string;
	}else 	if($_POST['action'] == 'featured_video_date'){
	$query_string = '';
	$result = Array();
	$search_data = $_POST['sort_by_date'];
	$search_data = date("Y-m-d", strtotime($search_data));
	$qry=$dbh->prepare("SELECT DISTINCT kid_name,video_path FROM participate_info WHERE featured_video = 1 AND create_on_date LIKE '%$search_data%' ORDER BY create_on_date");
	
	$qry->execute();
	$fetch = $qry->fetchAll(PDO::FETCH_ASSOC);
	$query_string = $query_string.'<ul>';
	 
				$i = 1;$li_class = '';
				foreach($fetch as $val) { 
				if(2 == $i || 4 == $i){
				$li_class = 'class="last320"';
				}else if(3 == $i){
				$li_class = 'class="last desk_third"';
				}else if(5 == $i){
				$li_class = 'class="last"';
				}
				
    $query_string = $query_string.'<li '.$li_class.'><a href="gallery_inside.php?video_link=admin/'.$val["video_path"].' class="fancybox iframe"><img src="images/video_small1.jpg"></a></li>';
				 
				$i++;
				}
    $query_string = $query_string.'</ul>';
	
	echo $query_string;
	}else if($_POST['action'] == 'save_video'){
	$parent_name = $_POST['parent_name'];
	$email = $_POST['email'];
	$mobile_number = $_POST['mobile_no'];
	$address = $_POST['address'];
	$kid_name = $_POST['kid_name'];
	$kid_age = $_POST['kid_age'];
	$upload_video = $_POST['upload_video'];
	$upload_video_path = $_POST['upload_video_path'];
	$contact_more = $_POST['contact']; if($contact_more == 'undefined'){ $contact_more = 'no';}
	 $video_form = '0';
	
	$parent_name	= $function->sanitise_input($parent_name);
	$email	= $function->sanitise_input($email);
	$mobile_no	= $function->sanitise_input($mobile_no);
	$address	= $function->sanitise_input($address);
	$kid_name	= $function->sanitise_input($kid_name);
	$kid_age	= $function->sanitise_input($kid_age);
	$upload_video= $function->sanitise_input($upload_video);
	$upload_video_path = $function->sanitise_input($upload_video_path);
	
		$qry=$dbh->prepare("insert into participate_info (`parent_name`,`email`,`mobile_number`,`kid_name`,kid_age,address,video_from,video_path,contact_more,image_path) 	values(:parent_name,:email,:mobile_number,:kid_name,:kid_age,:address,:video_from,:video_path,:contact_more,:image_path)");
		$qry->bindParam(':parent_name', $parent_name);
		$qry->bindParam(':email', $email);
		$qry->bindParam(':mobile_number', $mobile_number);
		$qry->bindParam(':kid_name', $kid_name);
		$qry->bindParam(':kid_age', $kid_age);
		$qry->bindParam(':address', $address);
		$qry->bindParam(':video_from', $video_form);
		$qry->bindParam(':video_path', $upload_video);
		$qry->bindParam(':contact_more', $contact_more);
		$qry->bindParam(':image_path', $upload_video_path);
		
		$qry->execute();			
	}
	
?>