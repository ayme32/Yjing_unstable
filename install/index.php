<?php
	session_start();

	if (!isset($_SESSION['lang'])) {
		$lang = 0;
	} 
	else {
		$lang = $_SESSION['lang'];
	}

	if (isset($_POST['language'])) {
		header("Location: index.php");
	
		$_SESSION['lang'] = $_POST['language'];
	
		$xml = new simpleXMLElement(file_get_contents("../data.xml"));

		$xml->config->lang = $_POST['language'];
			
		$buffer = $xml->asXML();
		unlink("../data.xml");
		$file = fopen("../data.xml","w");
		fputs($file,$buffer);
		fclose($file);
	}

	include("../langs.php");
?>
<!doctype html>
<html>
<head>
	<title>Yjing - Installation</title>
	<style type="text/css" media="screen">
		
		body {
			padding-top: 60px;
		}
	</style>
	<link rel="stylesheet" href="../admin/bootstrap.min.css">
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">Yjing - Installation</a>
				<div class="nav-collapse">
            		<ul class="nav">
              			<li class="active"><a href="#"><?php echo $step_lang[$lang] ; ?> 1</a></li>
              			<li><a href="step2.php"><?php echo $step_lang[$lang] ; ?> 2</a></li>
              			<li><a href="#"><?php echo $step_lang[$lang] ; ?> 3</a></li>
              			<li><a href="#"><?php echo $step_lang[$lang] ; ?> 4</a></li>
            		</ul>
          		</div>
			</div>
		</div>
	</div>

	<div class="container">
		<p><h1><?php echo $setup_time[$lang] ; ?> !</h1></p>
		<p><?php echo $first_parag[$lang] ; ?></p>
		<p><?php echo $second_parag[$lang] ; ?></p>
		<br>
		<p><?php echo $third_parag[$lang] ; ?> ...</p>
		<br />
		<br />
		<form class="form-horizontal" action="index.php" method="POST">
		<div class="control-group"><label class="control-label"><?php echo $language[$lang] ; ?> :</label>
		<div class="controls">
		<select name="language">
		<option value="1"><?php echo $french_lang[$lang] ; ?></option>
		<option value="0" selected="selected"><?php echo $english_lang[$lang] ; ?></option>
		</select></div></div>
		<div class="control-group"><div class="controls"><button type="submit" class="btn btn-info"><?php echo $save_changes[$lang] ; ?></button></div></div>
		</form>
		<br />
		<hr />
		<footer><p>Yjing is under GNU GPL v3 licence. The Twitter Bootstrap is under Apache Licence v2.0</p></footer>
	</div>

</body>
</html>