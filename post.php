<?php
session_start();

if(isset($_SESSION['name'])){
	$text = $_POST['text'];
	//parseURL($text);
	
	if($text == ':D' || $text == ':3' || $text == 'T.T'){
		$patterns = array(':D',':3','T.T');
		$replacements = array('<img src="emotes/bigsmile.png"/>','<img src="emotes/cute.png"/>','<img src="emotes/crying.png"/>');

		$text = str_replace($patterns, $replacements, $text);

		$fp = fopen("log.html", 'a');
		fwrite($fp, "<div class='msgln'> <b>".$_SESSION['name']."</b>: ".($text)."<br></div>");
		fclose($fp);
	}

	else{
		$text = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $text); //make url hyper!
		//$text = preg_replace('/[\w\-]+\.(jpg|png|gif|jpeg)/', '<img src='$text' height="42" width="42">', $text); //make url image!
		$fp = fopen("log.html", 'a');
		fwrite($fp, "<div class='msgln'> <b>".$_SESSION['name']."</b>: ".($text)."<br></div>");
		fclose($fp);
	}
}
?>