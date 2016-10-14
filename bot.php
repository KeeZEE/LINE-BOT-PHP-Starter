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

            $text = return_message($text);

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
    if (strpos($message, 'honda') || strpos($message, 'ฮอนด้า')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/Honda';
    }

    if (strpos($message, 'bmw') || strpos($message, 'บีเอ็ม')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/bmw';
    }

    if (strpos($message, 'ktm') || strpos($message, 'เคที')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/KTM';
    }

    if (strpos($message, 'kawasaki') || strpos($message, 'คาวา')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/kawasaki';
    }

    if (strpos($message, 'ducati') || strpos($message, 'ดูคา')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/ducati';
    }

    if (strpos($message, 'suzuki') || strpos($message, 'ซูซู')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/Suzuki';
    }

    if (strpos($message, 'yamaha') || strpos($message, 'ยามา')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/yamaha';
    }

    if (strpos($message, 'benelli') || strpos($message, 'เบเนล')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/benelli';
    }

    if (strpos($message, 'gpx') || strpos($message, 'จีพี')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/มอเตอร์ไซค์มือสอง/yamaha';
    }

    if (strpos($message, 'triumph') || strpos($message, 'ไทรอัม')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/?search%5Bmake_id%5D=16&search%5Bmodel_id%5D=&search%5Blocation_id%5D=&search%5Bprice_range%5D=0%3B2000000';
    }

    if (strpos($message, 'harley') || strpos($message, 'ฮาร์')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/?search%5Bmake_id%5D=5&search%5Bmodel_id%5D=&search%5Blocation_id%5D=&search%5Bprice_range%5D=0%3B2000000';
    }

    if (strpos($message, 'stallion') || strpos($message, 'สตา')){
        return 'มีครับ !! เข้ามาที่ https://www.smokybike.com/?search%5Bmake_id%5D=14&search%5Bmodel_id%5D=&search%5Blocation_id%5D=&search%5Bprice_range%5D=0%3B2000000';
    }

    return 'ขอโทดนะคับ ขณะนี้ค้นหาได้เเต่ยี่ห้อ มอเตอร์ไซค์มือสอง หรือเข้ามาดูได้ใน https://www.smokybike.com นะคับ :)';

}

echo "OK";