<?php
	session_start();
	
	if (!isset($_SESSION['try'])) {
		$_SESSION['try'] = 0;
	}
	
	include("../params.php");
	include("../functions.php");
	include("../langs.php");
	
	if (!empty($_SESSION['connected']) AND isset($_GET['action']) AND $_GET['action'] == "logout") {
		session_destroy();
		header("Location: index.php");
	}

	elseif (isset($_SESSION['connected'])) {
		header("Location: index.php");
	} 

	elseif (!empty($_POST['username']) AND !empty($_POST['password'])) {
		if ($_POST['username'] == $login[0] AND md5($_POST['password']) == $login[1]) {
			$_SESSION['connected'] = true;
			$_SESSION['try'] = 0;
			header("Location: index.php");
		}
		else {
			$_SESSION['try'] = $_SESSION['try'] + 1;
			header("Location: login.php?error=badlogin");
		}

	}

	elseif (isset($_POST['submit']) AND (empty($_POST['username']) OR empty($_POST['password']))) {
		header("Location: login.php?error=notenough");
	}

	else {
?>
<!doctype html>
	<html>
		<head>
			<title>Yjing - Login</title>
			<style type="text/css" media="screen">
				body {
					margin: 100px;
					background-color: #CCC;
					font-family: Arial,Helvetica,sans-serif;
					font-size: 10pt;
				}
				#form {
					-webkit-border-bottom-left-radius: 25px;
					-moz-border-radius-bottomleft: 25px;
					border-bottom-left-radius: 25px;
					background-color: #507e8c;
					padding: 50px;
					width: 320px;
					text-align: center;
					margin: auto;
				}
				#form p {
					color: white;
				}
				#caption {
					-webkit-border-top-right-radius: 25px;
					-moz-border-radius-topright: 25px;
					border-top-right-radius: 25px;
					width: 418px;
					text-align: center;
					margin: auto;
					padding: 1px;
					background-color: #EEE;
				}
				.error {
					color: red;
				}
			</style>
		</head>
		<body>
			<?php
				$config_get = getSiteInfos("../".$datafile_url);
				if (!isset($_SESSION['try']) OR $_SESSION['try'] <= html_entity_decode($config_get[5])) {
			?>
			<div id="caption">
			<p>
				<?php
					if (isset($_GET['error']) AND $_GET["error"] == "notenough") {
						echo $notenough[$lang];
					}
					elseif (isset($_GET['error']) AND $_GET["error"] == "badlogin") {
						echo $badlogin[$lang];
					}
					elseif (isset($_GET['error']) AND $_GET["error"] == "bear") {
						echo "Your face is bear.";
					}
					else {
						echo $login_lang[$lang];
					}
				?>
			</p>
			</div>
			<form action="login.php" method="POST">
				<div id="form">
					<p><?php echo $username[$lang] ; ?> : <input type="text" name="username" /></p>
					<p><?php echo $password[$lang] ; ?> : <input type="password" name="password" /></p>
					<input type="submit" name="submit" value="<?php echo $log_in[$lang] ; ?> !" />
				</div>
			</form>
			<?php
				}
				else {
			?>
			<div id="caption" class="error"><p><?php echo $error_lang[$lang] ; ?></p></div>
			<div id="form"><p class="alert"><?php echo $attemps[$lang] ; ?>.</p></form>
			<?php
				}
			?>
		</body>
	</html>
<?php
	}
?>