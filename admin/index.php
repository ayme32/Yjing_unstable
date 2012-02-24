<?php
	session_start();

	include("../functions.php");
	include("../params.php");
	include("../langs.php");

	if (!isset($_SESSION['connected'])) {
		header('Location: login.php');
	}
	else {
		$url = "http://tibounise.github.com/Yjing/version.txt";
		$timeout = 5;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true); 
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
		if (preg_match('`^https://`i', $url)) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
		}
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$last_version = curl_exec($ch);
		curl_close($ch);

		if ($last_version > $yjing_version_int) {
			$page = "<div class='hero-unit'><h1>" . $welcome[$lang] . "</h1><p>" . $update[$lang] . " !</p></div>";
		}
		else {
			$page = "<div class='hero-unit'><h1>" . $welcome[$lang] . "</h1><p>" . $ready[$lang] . ".</p></div>";
		};
		$page .= "<h2>" . $help[$lang] ." ?</h2><p>" . $twitter[$lang] . ".</p>";
		include("design.html");

	}
?>