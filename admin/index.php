<?php
	session_start();

	include("../functions.php");
	include("../params.php");
	include("../langs.php");

	if (!isset($_SESSION['connected'])) {
		header('Location: login.php');
	}
	else {
		$page = "<div class='hero-unit'><h1>Welcome to Yjing</h1><p>Your administration panel is ready.</p></div><h2>You need some help ?</h2><p>You can read the manual here. There's also my Twitter account : @tibounise.</p>";
		include("design.html");
	}
?>