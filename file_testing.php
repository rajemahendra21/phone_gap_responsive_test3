<?php
/*if(file_exists('videos/test.flv')){


/**/
//$cmd = "ffmpeg -i videos/test.flv -ab 128 -b 1200 -bt 200000000 -vcodec mpeg4 -top -1 videos/movie19.mp4";
/*working*/
$cmd = "ffmpeg -i videos/movie1.flv -b 1500k -vcodec libx264 -vpre slow -vpre baseline -g 30 -s 640x360 videos/movie34.mp4";
/*3gp to flv*/
//$cmd = "ffmpeg -i videos/avtoshow.3gp -ab 128k -ar 44100 -b 800k -r 25 -qscale 5 -s 480×360 -f flv -y videos/movie1.flv";
/*testing asf to avi */
//$cmd = "ffmpeg -i videos/Video_1.asf -vcodec copy -acodec copy videos/movie33.avi";
$return = shell_exec($cmd);
if($return){
echo "Error:".$return;
}
/*}
else{
echo "File Not Found";
}*/

?>


<?php
/*ini_set('display_errors', 1);

require_once 'CloudConvert.class.php';

// insert your API key here
$apikey="357y1MDaGFp6Xpt7RAq6Qgdiop7a70XDYAuh9HoF4524fXbfrTTX12ZPTTb_V3N3DCBK06cXVhKlBihAw9SwxQ";

$process = CloudConvert::createProcess("wmv", "mp4", $apikey);

// set some options here...
// $process -> setOption("email", "1");

$process-> upload("videos/TerrificIllusion.wmv", "mp4" );

if ($process-> waitForConversion()) {
   $process -> download("videos/movie6.mp4");
    echo "Conversion done :-)";

    ?>
<br>
<a href="videos/color-shine.flv">input.png</a></br>
<a href="videos/movie1.mp4">output.pdf</a></br>
<?
} else {
    echo "Something went wrong :-(";
}*/
?>