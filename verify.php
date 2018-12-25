<?php
$access_token = '5Qd9Y/veRs1+G6AGs9m7mAs+LJm3AHGMEIzLzxJ1MoLx8zIvDjAnzFTV5NTpaLFY/pZR3CgI1dBecnCXjvK+e4Ihrpa0EFncTFE7VEae0h/1SlWqYDG50ZRCNdoMYywS0ioxXo/1I4PJTe3wGtR+fgdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v2/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
