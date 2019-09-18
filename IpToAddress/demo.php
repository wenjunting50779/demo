<?php
/**
 * Created by PhpStorm.
 * User: wenjunting1@me.com
 * Date: 2019/2/14
 * Time: 15:34
 * Class ${NAME}
 */
require_once 'IpSearch.php';
set_time_limit(0);
$f = fopen('ip.txt',"r");
$IpSearch = new IpSearch();
while ($ip = fgets($f,20480))
{
    $ip = trim($ip);
    $address = $IpSearch->get($ip);
    $addressData = explode('|',$address);
    $country = isset($addressData[1]) ? $addressData[1]:'未知';
    $province = isset($addressData[2]) ? $addressData[2]:'未知';
    $city = isset($addressData[3]) ? $addressData[3]:'未知';

    $str = $ip."\t".$country."\t".$province."\t".$city."\n";
    file_put_contents('ip2.txt',$str,FILE_APPEND);
}
fclose($f);