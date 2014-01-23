<?php
//include('db.php');
$path = "admin/user_uploaded_video/";

	//$valid_formats = array("mp4", "flv");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['upload_video_file']['name'];
			$size = $_FILES['upload_video_file']['size'];
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			
				list($txt, $ext) = explode(".", $name);
					//if(in_array($ext,$valid_formats))
					//{
							$cname=str_replace(" ","_",$name);
							$actual_image_name = $path.date("Y_m_d").'_'.time();
							$tmp = $_FILES['upload_video_file']['tmp_name'];
							if(move_uploaded_file($tmp,$actual_image_name))
							{
							$result =array();

								$flvvid = "video_upload_".date('Y_m_d_H_i_s');
								$fileFLV_path = "converted/".$flvvid.".mp4";
								$fileFLV = "converted/".$flvvid.".mp4";
								
								if(file_exists($actual_image_name) == 1){
								
								if($ext!='3gp'){
								$cmd = "/usr/bin/ffmpeg -i ".$actual_image_name." -b 1500k -vcodec libx264 -vpre slow -vpre baseline -g 30 -s 640x360 ".$fileFLV;
								$success = shell_exec($cmd);
								}else{
								$flvvid = "video_upload_".date('Y_m_d_H_i_s');
								$fileFLV_path = "converted/".$flvvid.".flv";
								$fileFLV = "converted/".$flvvid.".flv";
								
								$cmd = "/usr/bin/ffmpeg -i ".$actual_image_name." -ab 128k -ar 44100 -b 800k -r 25 -qscale 5 -s 480×360 -f flv -y ".$fileFLV;
								$success = shell_exec($cmd);
								
								$flvvid_ = "video_upload_".date('Y_m_d_H_i_s');
								$fileFLV_path_ = "converted/".$flvvid_.".mp4";
								$fileFLV_ = "converted/".$flvvid_.".mp4";
								
								$cmd = "/usr/bin/ffmpeg -i ".$fileFLV." -b 1500k -vcodec libx264 -vpre slow -vpre baseline -g 30 -s 640x360 ".$fileFLV_;
								$success = shell_exec($cmd);
								unlink($fileFLV);
								$flvvid = $flvvid_;
								$fileFLV_path = $fileFLV_path_;
								$fileFLV = $fileFLV_;
								}
								
								$img_path = 'converted/images/'.$flvvid.'.jpg';
								$img_path_ = 'converted/images/'.$flvvid.'.jpg';
								$suc = shell_exec("ffmpeg -y -i $fileFLV -f mjpeg -ss 10 -vframes 1 100x100 $img_path_");
		
								$arr = array('a' => $fileFLV, 'b' => $img_path_ ,'c'=>$actual_image_name);
								unlink($actual_image_name);
								echo json_encode($arr);
								}
							}
							else
							{
								echo "";  
							}
					
					/*}
						else{
						echo   "";	
					}*/
								
			
		}
?>