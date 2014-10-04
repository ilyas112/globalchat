<?php
session_start();
if(isset($_SESSION['name'])){
	$text = $_POST['text'];
	makeHyperlink();
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'> <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
	fclose($fp);
}

function makeHyperlink($text) {
    return preg_replace('/https?:\/\/[\w\-\.!~#?&=+\*\'"(),\/]+/','<a href="$0">$0</a>',$text);
}
?>