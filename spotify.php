<?php
error_reporting(0);
$m="\033[1;31m";
$k="\033[1;33m"; 
$h="\033[1;32m"; 
$b="\033[1;34m"; 
if($argv[1]){
	function cek($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
		$ex = curl_exec($ch);
		curl_close($ch);
		return($ex);
	}
	$list = explode("\r\n", file_get_contents($argv[1]));
	echo $b."====================================\n";
	$i = 1;
	foreach ($list as $mail) {
		$cek = cek("https://www.spotify.com/id/xhr/json/isEmailAvailable.php?email=".$mail."");
		if(preg_match("/true/i", $cek)){
			echo $b.$i++.") ".$k.$mail.$h." -> Registered\n";
		}else{
			echo $b.$i++.") ".$m.$mail." -> Not Registered\n";
		}
	}
	echo $b."====================================\n";
}else{
	echo "Usage : php ".$argv[0]." list.txt";
}
?>
