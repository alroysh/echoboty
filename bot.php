<?php
		date_default_timezone_set('Asia/Singapore');
		$wita= date('H.i.s');
		date_default_timezone_set('Asia/Jakarta');
		$wib= date('H.i.s');
		date_default_timezone_set('Asia/Jayapura');
		$wit= date('H.i.s');
		$kemarin = date('d-m-Y', strtotime('-1 day'));
		require_once('./line_class.php');
		$channelAccessToken = 'bxcs67UsXL4dg6qSR4Nojg1djzE2QaP3RvedqZ2nY/2b+U6ypsmuoDr4j74SqKBQS2S8nFXRiOyfieRMLU2CEcqz570pODeTjUk8H4Y+AyhcO5qiEEj95HWSwIk23KR1AEIQjnUOw/JG+vdvTeVn1AdB04t89/1O/w1cDnyilFU=';
		$channelSecret = '2ad35467614230c7a6dfe8e158e95988';
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
		$pesan_datang = strtolower($message['text']);
		$jam = date("H.i.s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser= $_SERVER['HTTP_USER_AGENT'];
		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		$owner = "Owner";
	//sticker
		$t[0] = 'https://line.me/S/sticker/7451';
		$t[1] = 'https://line.me/S/sticker/7451';
		for ($x = 0; $x <= 10; $x++);
		$random1 = (rand()%100);
		$random2 = (rand()%200);
		$random3 = (rand()%300);
		$userx = $message['text'];
		$data = explode(":", $userx);
		$datac = "/ig:".$data[1]."";
		$datab = "/wiki:".$data[1]."";

function CallLineGetName($access_token,$userId)
{

  $url = 'https://api.line.me/v2/bot/profile/'.$userId;
  $headers = array('Authorization: Bearer ' .$access_token);
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
$result = CallLineGetName($access_token,$userId);
$json = json_decode($result,TRUE); // CallLineGetName();

if(!is_null($json['displayName']))
{

  foreach ($json as $type => $value)
  {
     if($type == 'displayName')
     {
        $name = $value; // send reply text name
     }
  }
}


// Call DataBase
if (!is_null($datas['id'])) 
{
    foreach ($datas as $type => $value) 
    {
        
        if($type == 'id')
        {
          $id = $value;
        }
        elseif($type == 'humidity')
        {
          $humidity = $value;
        }
        elseif($type == 'tempC') 
        {
          $tempC = $value;
        }
        elseif($type == 'tempF') 
        {
          $tempF = $value;          
        }
        elseif($type == 'heatIndexC') 
        {
          $heatIndexC = $value;         
        }
        elseif($type == 'heatIndexF') 
        {
          $heatIndexF = $value;        
        }
        elseif($type == 'datetime') 
        {
          $datetime = $value;       
        }   
    } 
}



	if($message['type']=='text')
		{
			if($pesan_datang=='Halo')
			{


				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Halo ' .$profil->displayName.''
											)
									)
								);

			}
			else
					if($pesan_datang=='link fotoku')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Link Foto Kamu : ' .$profil->pictureUrl.''
											)
									)
								);
			}
		else
					if($pesan_datang=='userid')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'userIdmu : ' .$profil->userId.''
											)
									)
								);
			}
		else
		if($pesan_datang=='/info')
			{
				$balas = array(
				'replyToken' => $replyToken,														
				'messages' => array(
						array(
						'type' => 'text',					
						'text' => 'IP : ' . $ip. ', Browser : ' . $browser .', Hostname : '. $hostname
											)
									)
								);
			}
			else
					if($pesan_datang=='status')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Status Message Kamu : ' .$profil->statusMessage.''
											)
									)
								);
			}
		else
					if($pesan_datang=='status')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Kemarin Tanggal $kemarin'
											)
									)
								);
			}
		else
					if($pesan_datang=='/random100')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => $random1
											)
									)
								);
			}
		else
					if($pesan_datang=='/random200')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => $random2
											)
									)
								);
			}
		else
					if($pesan_datang=='/random300')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => $random3
											)
									)
								);
			}
			else
					if($pesan_datang=='stickernya mana?')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'sticker',					
												'packageId'=> '1',
												'stickerId'=> '5'
											)
									)
								);
			}
			else
			if ($pesan_datang=='ggwp')
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
												'text' => '[*] '.join(str(f) for f in dataResult).'
											)
									)
								);
				*/
				//$client->replyMessage($alt);
			}
		else
			if($pesan_datang == strtolower('/jam'))
			{
				$get_sub = array();
				$aa =   array(
								'type' => 'text',									
								'text' => 'Wib :'. $wib
							);
				array_push($get_sub,$aa);	
				$get_sub[] = array(
								'type' => 'text',									
								'text' => 'Wita : '. $wita
										);
				array_push($get_sub);
				$get_sub[] = array(
								'type' => 'text',									
								'text' => 'Wit  : '. $wit
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
												'text' => '[*] '.join(str(f) for f in dataResult).'
											)
									)
								);
				*/
				//$client->replyMessage($alt);
			}
			else
			if($pesan_datang=='5444')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Fungsi PHP base64_encode velicious :'. base64_encode("velicious")
											)
									)
								);
			}
		else
			if($pesan_datang=='/tanggal')
			{
				$balas = array(
				'replyToken' => $replyToken,														
				'messages' => array(
					      array(
						  'type' => 'text',					
						   'text' => 'Now '. date('l, d-m-Y')
											)
									)
								);
			}
				else
			if($pesan_datang=='/perkalian')
			{
				$balas = array(
				'replyToken' => $replyToken,														
				'messages' => array(
					      array(
						  'type' => 'text',					
						   'text' => $t
											)
									)
								);
			}
					else
				if($pesan_datang=='/about')
			{
				$balas = array(
				'replyToken' => $replyToken,														
				'messages' => array(
					      array(
						   'type' => 'template',	
						   'altText' => 'Creator Bot',
						   'template' =>[
						   'type' => 'buttons',	
						   'thumbnailImageUrl' => 'https://s-media-cache-ak0.pinimg.com/600x315/9e/e4/a6/9ee4a64469336c1109775f11f25363ff.jpg',
							'title' => 'Bot Creator',
							'text' => 'Created by alroysh_',
							'actions' => [
							[
							    'type' => 'uri',
							    'label' => 'Add Line',
							    'uri' => 'http://line.me/ti/p/~alroysh'
							],
							[
							    'type' => 'uri',
							    'label' => 'Follow Instagram',
							    'uri' => 'https://www.instagram.com/alroysh_/'
							]	
							]
									]
									)
									)
								);
			}

		else 
			if($pesan_datang==$datab)
		{
		$api_wiki = file_get_contents("https://id.wikipedia.org/wiki/".$data[1]."/?__a=1");
		$jss = json_decode($api_wiki);
		$text3 = "Harga ".$data[1].
		$balas = array(
		'replyToken' => $replyToken,														
		'messages' => array(
				array(
					'type' => 'text',					
					'text' => $text3
					)
					)
					);
		}
		else if($pesan_datang==$datac)
				{
				 $api_ig = file_get_contents("https://www.instagram.com/".$data[1]."/?__a=1");
				 $jss = json_decode($api_ig);
				 $profile_pic_url_hd = $jss->user->profile_pic_url_hd;

				 $text1 = "Profil Instagram ".$data[1]."
Username : ".$data[1]."
ID : ".$jss->user->id."
Followers : ".$jss->user->followed_by->count."
Following : ".$jss->user->follows->count."
Post : ".$jss->user->media->count."
Bio : ".$jss->user->biography."
Website : ".$jss->user->external_url."
Verified : ".$jss->user->is_verified."";
				$balas = array(
					'replyToken' => $replyToken,
					'messages' => array(
					array(
					'type' => 'text',
					'text' => $text1					
					),
					array(
					'type' => 'image',
					'originalContentUrl' => $profile_pic_url_hd,
					'previewImageUrl' => $profile_pic_url_hd, 					
					)
					)
					);				
				}
		else if($pesan_datang=='/nomorvelda')
		{
		$balas = array(
			'replyToken' => $replyToken,														
			'messages' => array(
				      	array(
					'type' => 'template',	
					'altText' => 'Nomor Velda',
					'template' =>[
						'type' => 'confirm',
					'text' => 'Nomor Velda',
					'actions' => [
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545' 
							],
							[
							'type' => 'message',
							    'label' => 'XL',
							    'text' => '085921483878'
							]	
							]
									]
				  )
				)
			     );
		}
		
		else if($pesan_datang=='/test')
		{
		$balas = array(
			'replyToken' => $replyToken,														
			'messages' => array(
				      	array(
					'type' => 'template',	
					'altText' => 'Nomor Velda',
					'template' =>[
					'type' => 'corusel',
					"columns"=> [
         					 [
            					"title" => "this is menu",
            					"text" => "description",
						"actions" => [
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							],
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							],
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							]
							]
						 ],
						   [
            					"title" => "this is menu",
            					"text" => "description",
						"actions" => [
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							],
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							],
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							]
							]
						 ],
						
						  [
            					"title" => "this is menu",
            					"text" => "description",
						"actions" => [
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							],
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							],
							[
							'type' => 'message',
							    'label' => 'TSEL',														
							'text' => '081287717545'
							]
							]
						 ]
						]
					]
				  )
				)
			     );
		}		
		else
				if($pesan_datang=='/games')
			{
				$balas = array(
				'replyToken' => $replyToken,														
				'messages' => array(
					      array(
						   'type' => 'template',	
						   'altText' => 'Games',
						   'template' =>[
						  'type' => 'confirm',
							'text' => 'GAMES : yay or nay',
							'actions' => [
							[
							'type' => 'message',
							    'label' => 'YAY',														
							'text' => 'yay' 
							],
							[
							'type' => 'message',
							    'label' => 'NAY',
							    'text' => 'nay'
							]	
							]
									]
									)
									)
								);
			}
	else
				if($pesan_datang=="owner")
			{
				$balas = array(
				'replyToken' => $replyToken,														
				'messages' => array(
					      array(
						   'type' => 'template',	
						   'altText' => 'Owner Group',
						   'template' =>[
						  'type' => 'buttons',	
							'title' => 'Owner Group',
							'text' => 'Velda Sitanggang',
							'actions' => [
							[
							'type' => 'uri',
							    'label' => 'Contact Line',
							    'uri' => 'http://line.me/ti/p/~velda_sitanggang'
							]	
							]
									]
									)
									)
								);
			}
		else
				if($pesan_datang=='/acak')
			{
				$balas = array(
				'replyToken' => $replyToken,														
				'messages' => array(
					      array(
						   'type' => 'template',	
						   'altText' => 'Owner Group',
						   'template' =>[
						  'type' => 'buttons',	
							'title' => 'Owner Group',
							'text' => 'Velda Sitanggang',
							'actions' => [
							[
							'type' => 'text',
							    'label' => 'Contact Line',
							    'text' => 'http://line.me/ti/p/~velda_sitanggang'
							]	
							]
									]
									)
									)
								);
			}	
			else
			if($pesan_datang=='Lokasi Bot')
			{
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'location',					
												'title' => 'Lokasi Saya.. Klik Detail',					
												'address' => 'McDonald',					
												'latitude' => '-8.700088',					
												'longitude' => '115.178097' 
											)
									)
								);
			}
			else
			if($pesan_datang=='13626')
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
												'text' => 'Pesan ini dari velicious'
											)
									)
								);
			}
		}
		else if(!empty($groupid))
		{	
			$balas = array(
				'userId' => $profil->$userId,
				'replyToken' => $replyToken,														
				'messages' => array(
						array(
								'type' => 'text',									
								'text' => 'Bye semua'
							
								)
								)
								);
			$client->replyMessage($balas);
			sleep(10);
			$client->leave($groupid);
			
			
			
	$response = $bot->leaveRoom('<groupId>');
	echo $response->getHTTPStatus() . ' ' . $response->getRawBody();		
		}
		$result =  json_encode($balas);
		//$result = ob_get_clean();
		file_put_contents('./balasan.json',$result);
		$client->replyMessage($balas);
