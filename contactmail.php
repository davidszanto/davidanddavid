<?php

$subject = 'Weblap - Üzenet';
$message = "\r\n\r\n".$_GET['name']."\r\n\r\n".$_GET['message']."\r\n".$_GET['mail']."\r\n"."WEBLAP ÜZENET!\r\n";
$headers = 'From: '.$_GET['mail']."\r\n";
$headers .= "Content-Type: text/plain;charset=utf-8\r\n";

if(mail("david@davidanddavid.hu",$subject,$message,$headers)){

}else{
	saveEmail($message);
}

function saveEmail($msg){
	$myfile = fopen("offlinemail.txt", "a") or die("Unable to open file!");
	$txt = date("now")."\r\n".$msg."\r\n\r\n-------------------\r\n\r\n";
	fwrite($myfile, $txt);
	fclose($myfile);
}

return header('Location: thankyou.html');
?>