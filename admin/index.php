<?php
	session_start();

	include("../functions.php");
	include("../params.php");
	include("../langs.php");

	if (!isset($_SESSION['connected'])) {
		header('Location: login.php');
	}
	else {
		$page = "<div class='hero-unit'><h1>" . $welcome[$lang] . "</h1><p>" . $ready[$lang] . ".</p></div><h2>" . $help[$lang] ." ?</h2><p>" . $twitter[$lang] . ".</p>";
		include("design.html");
	}
?>