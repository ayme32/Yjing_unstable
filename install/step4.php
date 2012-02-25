<?php 

	session_start();
	
	if (!isset($_SESSION['lang'])) {
		$lang = 0;
	} 
	else {
		$lang = $_SESSION['lang'];
	}

	$xml = new simpleXMLElement(file_get_contents("../data.xml"));

	$xml->config->title = htmlentities($_POST['title']);
	$xml->config->install = "1";

	$buffer = $xml->asXML();
	unlink("../data.xml");
	$file = fopen("../data.xml","w");
	fputs($file,$buffer);
	fclose($file);

	$file = false;
	$file = fopen("../params.php","r");
	$output = "";
	while (!feof ($file)) {
		$buffer1 = fgets($file, 4096);
		$buffer2 = $output . $buffer1;
		$output = $buffer2;
  	}
  	fclose($file);
	
	$buffer_configs = $output;
  	$buffer_configs = str_replace("<username>", $_SESSION['username'], $buffer_configs);
	$buffer_configs = str_replace("<password>", md5($_SESSION['password']), $buffer_configs);
	unlink("../params.php");
	$file = fopen("../params.php","w");
	fputs($file,$buffer_configs);
	fclose($file);
	
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
              			<li><a href="#"><?php echo $step_lang[$lang] ; ?> 1</a></li>
              			<li><a href="#"><?php echo $step_lang[$lang] ; ?> 2</a></li>
              			<li><a href="#"><?php echo $step_lang[$lang] ; ?> 3</a></li>
              			<li class="active"><a href="#"><?php echo $step_lang[$lang] ; ?> 4</a></li>
            		</ul>
          		</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="alertbox"></div>
		<p><h1><?php echo $ready[$lang] ; ?> !</h1></p>
		<p><?php echo $fast_and_easy[$lang] ; ?> ...</p>
		<p><a href="../" class="btn btn-info"><?php echo $go_website[$lang] ; ?> !</a>&nbsp;<a href="../admin" class="btn btn-warning"><?php echo $go_admin[$lang] ; ?> !</a></p>

		<br>
		<hr>
		<footer><p>Yjing is under GNU GPL v3 licence. The Twitter Bootstrap is under Apache Licence v2.0</p></footer>
	</div>

</body>
</html>
<?php
	unlink("index.php");
	unlink("step2.php");
	unlink("step3.php");
	unlink("step4.php");
	rmdir("../install");
?>