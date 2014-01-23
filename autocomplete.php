<?php
	include_once 'config.php';
	include_once 'includes/database.class.php';
	
	$dbh = new Database_class();
	$q=$_GET['q'];
	//$my_data=mysql_real_escape_string($q);
	$my_data = $q;
	$qry=$dbh->prepare("SELECT DISTINCT kid_name FROM participate_info WHERE video_status = 'yes' AND kid_name LIKE '%$q%' ORDER BY kid_name");
	//$qry->bindParam(':my_data', '%'.$my_data.'%');
	$qry->execute();
	$fetch = $qry->fetchAll(PDO::FETCH_ASSOC);
	
	if($fetch)
	{
		foreach($fetch as $val)
		{
			echo $val['kid_name']."\n";
		}
	}
?>
