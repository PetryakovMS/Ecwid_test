<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$handle = fopen("post.log", 'a');
	
		fwrite($handle, date('Y-m-d G:i:s') . ' - ' . print_r($_POST, true) . "\n");
		fwrite($handle, date('Y-m-d G:i:s') . ' - ' . print_r("test", true) . "\n");

		fclose($handle);

if(!empty($_POST)){

		if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['date']) && !empty($_POST['mail']) && !empty($_POST['text']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$headers .= "From: От кого письмо <petryakov.mihail@b-leader.ru>\r\n"; 
			$headers .= "Reply-To: petryakov.mihail@b-leader.ru\r\n"; 

			$text = nl2br($_POST['text']);

			$message = '
<html>
<head>
  <title>Письмо</title>
</head>
<body>
	<div style="margin-bottom: 20px; display: flex";>
		<div style="width: 30%; float: left;">
			Имя:
		</div>
		<div style="width: 70%;">' . $_POST['name']	. '</div>
	</div>
	<div style="margin-bottom: 20px; display: flex;">
		<div style="width: 30%; float: left;">
			Телефон:
		</div>
		<div style="width: 70%;">' . $_POST['phone']. '</div>
	</div>
	<div style="margin-bottom: 20px; display: flex;">
		<div style="width: 30%; float: left;">
			Дата рождения:
		</div>
		<div style="width: 70%;">' . $_POST['date']	. '</div>
	</div>
	<div style="margin-bottom: 20px; display: flex;">
		<div style="width: 30%; float: left;">
			Дата рождения:
		</div>
		<div style="width: 70%;">' . $_POST['mail']	. '</div>
	</div>
	<div style="margin-bottom: 20px; display: flex;">
		<div style="width: 30%; float: left;">
			Сообщение:
		</div>
		<div style="width: 70%;">' . $text	. '</div>
	</div>
</body>
</html>
';
			 mail(
			    'join@ecwid.com',
			   	'Тестовое задание',
			    $message,
			    $headers,
			);
		}


	
		
}


// $this->response->addHeader('Content-Type: application/json');
// 		$this->response->setOutput(json_encode($json));