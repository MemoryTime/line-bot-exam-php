<?php



require "vendor/autoload.php";

$access_token = 'aE8HOVhLQoWV9xpqNJ3DSGbrfxKx6hO9JqDJJdcattHvuHMmVKZ9hh5qP5hZi/lE/pZR3CgI1dBecnCXjvK+e4Ihrpa0EFncTFE7VEae0h91CvY98tygjY4Nim6F/l2xaLBzKvYV2UxyQ/bmVePfAAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '0162088731225dccc737526d7290f829';

$pushID = 'Uffa6b3fef1c10f8eaaf947188a01b687';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







