<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = '5Qd9Y/veRs1+G6AGs9m7mAs+LJm3AHGMEIzLzxJ1MoLx8zIvDjAnzFTV5NTpaLFY/pZR3CgI1dBecnCXjvK+e4Ihrpa0EFncTFE7VEae0h/1SlWqYDG50ZRCNdoMYywS0ioxXo/1I4PJTe3wGtR+fgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			/*$text = "หัวข้อนัดหมาย: \nรายงานผลตรวจร่างกาย\n\nชื่อสัตว์เลี้ยง: \nมะยม\n\nชื่อสัตวแพทย์: \nบิ๊ก\n\nกำหนดการนัดหมาย: \nวันที่ 28 พฤศจิกายน 2561\nเวลา 17:00-18:00 น.";*/
			// Get replyToken
			$replyToken = "Uffa6b3fef1c10f8eaaf947188a01b687";

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
