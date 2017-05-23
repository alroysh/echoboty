<?php
/*
copyright @ medantechno.com
2017
Modified by Rangga Leo
*/
// Rangga Leo : untuk mengirim pesan ke Simsimi
function hajar($yuerel, $dataAing = null) {
    $cuih = curl_init();
    curl_setopt($cuih, CURLOPT_URL, $yuerel);
    if ($dataAing != null){
        curl_setopt($cuih, CURLOPT_POST, true);
        curl_setopt($cuih, CURLOPT_POSTFIELDS, $dataAing);
    }
    curl_setopt($cuih, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($cuih, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cuih, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($cuih, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($cuih, CURLOPT_COOKIEJAR, 'bot.txt');
    curl_setopt($cuih, CURLOPT_COOKIESESSION, true);
    $eks = curl_exec($cuih);
    curl_close($cuih);
    return $eks;
}
// Rangga Leo : untuk mengirim pesan ke Simsimi
require_once('./line_class.php');
$channelAccessToken = 'foHivR9RW1cwM7LwHhSBOPTAjGa8o8kbmomtLhC906UPPWoB1gIsMhCXh7oE9bGA4HcnU1iGygo06OflcHmU827yGqF3qGQtwPReKwcx+QTOKHKqRFcCDFysPvqeHESKUm4Ey4gPabfHkJeT5FzOdQdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = 'c1ab49d4f21251d9632f634a25605d24';//sesuaikan
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
//var_dump($client->parseEvents());
//$_SESSION['userId']=$client->parseEvents()[0]['source']['userId'];
/*
{
  "replyToken": "nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
  "type": "message",
  "timestamp": 1462629479859,
  "source": {
    "type": "user",
    "userId": "U206d25c2ea6bd87c17655609a1c37cb8"
  },
  "message": {
    "id": "325708",
    "type": "text",
    "text": "Hello, world"
  }
}
*/
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];
//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='1')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo '.$profil->displayName.', Anda memilih menu 1,'
									)
							)
						);
				
	}
	else
	if($pesan_datang=='2')
	{
		$get_sub = array();
		$aa =   array(
						'type' => 'image',									
						'originalContentUrl' => 'https://medantechno.com/line/images/bolt/1000.jpg',
						'previewImageUrl' => 'https://medantechno.com/line/images/bolt/240.jpg'	
						
					);
		array_push($get_sub,$aa);	
		$get_sub[] = array(
									'type' => 'text',									
									'text' => 'Halo '.$profil->displayName.', Anda memilih menu 2, harusnya gambar muncul.'
								);
		
		$balas = array(
					'replyToken' 	=> $replyToken,														
					'messages' 		=> $get_sub
				 );	
		/*
		$alt = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Anda memilih menu 2, harusnya gambar muncul.'
									)
							)
						);
		*/
		//$client->replyMessage($alt);
	}
	else
	if($pesan_datang=='3')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Fungsi PHP base64_encode planetapplication.com :'. base64_encode("planetapplication.com")
									)
							)
						);
				
	}
	else
	if($pesan_datang=='4')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Jam Server Saya : '. date('Y-m-d H:i:s')
									)
							)
						);
				
	}
	else
	if($pesan_datang=='6')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'location',					
										'title' => 'Lokasi Saya.. Klik Detail',					
										'address' => 'Indramayu',					
										'latitude' => '-6.394465',					
										'longitude' => '108.147386' 
									)
							)
						);
				
	}
	else
	if($pesan_datang=='7')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Testing PUSH pesan ke anda'
									)
							)
						);
						
		$push = array(
							'to' => $userId,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Pesan ini dari planetapplication.com'
									)
							)
						);
						
		
		$client->pushMessage($push);
				
	}
	else{
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo.. Selamat datang di planetapplication.com .        Untuk testing menu pilih 1,2,3,4,5 ... atau stiker'
									)
							)
						);
						
	}
}else if($message['type']=='sticker')
{	
	$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',									
										'text' => 'Terimakasih stikernya... '										
									
									)
							)
						);
						
}
// Rangga Leo
else {
    $simi = json_decode(hajar("http://www.simsimi.com/requestChat?lc=id&ft=1.0&req=" . urlencode($pesan_datang)), true); // mengirimkan pesan dari akun bot ke server SimSimi
    $balas = array(
                'type' => 'text',
                'text' => $profil->displayName.' :'.$simi['res'],
    )
}
// Rangga Leo
$result =  json_encode($balas);
//$result = ob_get_clean();
file_put_contents('./balasan.json',$result);
$client->replyMessage($balas);
