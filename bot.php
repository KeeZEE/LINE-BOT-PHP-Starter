<?php
$access_token = 'pHjOVvc0zTnnyLhYtOE5g1GfgXvx6AE3jLmf7AnK/lYogZDykPRQxp+1CjcfGJXAT9I7LZQIRPpJ/B8cejE4xHNPUkk47qQodwxRKmDEp4D1nJhcOW3CQ0VkfSZ3sIhU67hs0Im6LD/HwlKds9KMXQdB04t89/1O/w1cDnyilFU=';
$proxy = 'http://fixie:7RQBS3KxVGbKHKs@velodrome.usefixie.com:80';
$proxyauth = 'kornkrit.leel@gmail.com:Kornkrit1234';

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
            $text = $event['message']['text'];
            // Get replyToken
            $replyToken = $event['replyToken'];

            $text = return_message(strtolower($text));

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
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
            $result = curl_exec($ch);
            curl_close($ch);

            echo $result . "\r\n";
        }
    }
}

function return_message($message){

    $text = 'หากคุณกำลังมองหามอร์เตอร์ไซค์มือสอง สามารถทำการค้นหาได้จากลิงก์ https://www.smokybike.com ได้เลยนะครับ';

    if (strpos($message, 'สวัสดี') !== false || strpos($message, 'มิน') !== false ){
        $text = 'สวัสดีคับ เราคือ Bot Smokybike.com ยินดีรับใช้คับ';
    }

    if (strpos($message, 'honda')!== false || strpos($message, 'ฮอนด้า') !== false ){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/Honda';
    }

    if (strpos($message, 'bmw') !== false || strpos($message, 'บีเอ็ม') !== false ){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/bmw';
    }

    if (strpos($message, 'ktm') !== false || strpos($message, 'เคที') !== false ){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/KTM';
    }

    if (strpos($message, 'kawasaki') !== false || strpos($message, 'คาวา') !== false ){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/kawasaki';
    }

    if (strpos($message, 'ducati') !== false || strpos($message, 'ดูคา') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/ducati';
    }

    if (strpos($message, 'suzuki') !== false || strpos($message, 'ซูซู') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/Suzuki';
    }

    if (strpos($message, 'yamaha') !== false || strpos($message, 'ยามา') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/yamaha';
    }

    if (strpos($message, 'benelli') !== false || strpos($message, 'เบเนล') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/benelli';
    }

    if (strpos($message, 'gpx') !== false || strpos($message, 'จีพี') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/yamaha';
    }

    if (strpos($message, 'triumph') !== false || strpos($message, 'ไทรอัม') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/?search%5Bmake_id%5D=16&search%5Bmodel_id%5D=&search%5Blocation_id%5D=&search%5Bprice_range%5D=0%3B2000000';
    }

    if (strpos($message, 'harley') !== false || strpos($message, 'ฮาร์') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/?search%5Bmake_id%5D=5&search%5Bmodel_id%5D=&search%5Blocation_id%5D=&search%5Bprice_range%5D=0%3B2000000';
    }

    if (strpos($message, 'stallion') !== false || strpos($message, 'สตา') !== false){
        $text = 'มีครับ !! เข้ามาที่ https://www.smokybike.com/?search%5Bmake_id%5D=14&search%5Bmodel_id%5D=&search%5Blocation_id%5D=&search%5Bprice_range%5D=0%3B2000000';
    }

    return $text;
}

echo "OK";